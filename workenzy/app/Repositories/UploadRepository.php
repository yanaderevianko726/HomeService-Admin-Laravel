<?php
/*
 * File name: UploadRepository.php
 * Last modified: 2021.02.06 at 12:58:49
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Repositories;

use App\Models\Media;
use App\Models\Upload;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UploadRepository
 * @package App\Repositories
 * @version June 12, 2018, 11:30 am UTC
 *
 * @method Upload findWithoutFail($id, $columns = ['*'])
 * @method Upload find($id, $columns = ['*'])
 * @method Upload first($columns = ['*'])
 */
class UploadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Upload::class;
    }

    /**
     * @param $uuid
     */
    public function clear($uuid)
    {
        try {
            $uploadModel = $this->getByUuid($uuid);
            return $uploadModel->delete();
        } catch (Exception $e) {

        }
    }

    public function getByUuid($uuid = '')
    {
        $uploadModel = Upload::query()->where('uuid', $uuid)->first();
        return $uploadModel;
    }

    /**
     * clear all uploaded cache
     */
    public function clearAll()
    {
        Upload::query()->where('id', '>', 0)->delete();
        Media::query()->where('model_type', '=', 'App\Models\Upload')->delete();
    }

    /**
     * @return Builder[]|Collection
     */
    public function allMedia($collection = null)
    {
        $medias = Media::query()->where('model_type', '=', 'App\Models\Upload');
        if ($collection) {
            $medias = $medias->where('collection_name', $collection);
        }
        $medias = $medias->orderBy('id', 'desc')->get();
        return $medias;
    }


    public function collectionsNames()
    {
        $medias = Media::all('collection_name')->pluck('collection_name', 'collection_name')->map(function ($c) {
            return ['value' => $c,
                'title' => Str::title(preg_replace('/_/', ' ', $c))
            ];
        })->unique();
        unset($medias['default']);
        $medias->prepend(['value' => 'default', 'title' => 'Default'], 'default');
        return $medias;
    }

}
