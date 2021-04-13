<?php
/**
 * File name: RoleRepository.php
 * Last modified: 2021.01.03 at 15:29:51
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Spatie\Permission\Models\Role;

/**
 * Class RoleRepository
 * @package App\Repositories
 * @version May 29, 2018, 5:23 pm UTC
 *
 * @method Role findWithoutFail($id, $columns = ['*'])
 * @method Role find($id, $columns = ['*'])
 * @method Role first($columns = ['*'])
 */
class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
