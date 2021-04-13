<?php
/**
 * File name: LoginController.php
 * Last modified: 2021.01.06 at 17:42:50
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UploadRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    private $userRepository;
    private $uploadRepository;
    private $roleRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository, UploadRepository $uploadRepository, RoleRepository $roleRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = $userRepository;
        $this->uploadRepository = $uploadRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Redirect the user to the Facebook authentication page.
     * @param $service
     * @return RedirectResponse
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {
        $userSocial = Socialite::driver($service)->user();
        $user = User::where('email',$userSocial->email)->first();
        if(!$user){
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(Str::random());
            $user->save();
            $defaultRoles = $this->roleRepository->findByField('default','1');
            $defaultRoles = $defaultRoles->pluck('name')->toArray();
            $user->assignRole($defaultRoles);

            try {
                $upload = $this->uploadRepository->create(['uuid' => $userSocial->token]);
                $upload->addMediaFromUrl($userSocial->avatar_original)
                    ->withCustomProperties(['uuid' => $userSocial->token])
                    ->toMediaCollection('avatar');

                $cacheUpload = $this->uploadRepository->getByUuid($userSocial->token);
                $mediaItem = $cacheUpload->getMedia('avatar')->first();
                $mediaItem->copy($user, 'avatar');
            } catch (ValidatorException $e) {
                Flash::error($e->getMessage());
            }
        }
        auth()->login($user,true);
        return redirect(route('users.profile'));
    }
}
