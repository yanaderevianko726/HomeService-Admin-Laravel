<?php
/*
 * File name: Media.php
 * Last modified: 2021.02.22 at 22:11:53
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media as BaseMedia;


/**
 * @property mixed size
 */
class Media extends BaseMedia implements HasMedia
{
    use HasMediaTrait {
        getFirstMediaUrl as protected getFirstMediaUrlTrait;
    }

    protected $appends = [
        'url',
        'thumb',
        'icon',
        'formated_size'
    ];

    protected $hidden = [
        "responsive_images",
        "order_column",
        "created_at",
        "updated_at",
    ];

    public function getUrlAttribute()
    {
        return $this->getFullUrl();
    }

    public function getThumbAttribute()
    {
        return $this->getFirstMediaUrl('thumb');
    }

    /**
     * to generate media url in case of fallback will
     * return the file type icon
     * @param string $conversion
     * @return string url
     */
    public function getFirstMediaUrl($conversion = '')
    {
        $url = $this->getUrl();
        $array = explode('.', $url);
        $extension = strtolower(end($array));
        if (in_array($extension, config('medialibrary.extensions_has_thumb'))) {
            return asset($this->getUrl($conversion));
        } else {
            return asset(config('medialibrary.icons_folder') . '/' . $extension . '.png');
        }
    }

    public function getIconAttribute()
    {
        return $this->getFirstMediaUrl('icon');
    }

    public function getFormatedSizeAttribute()
    {
        return formatedSize($this->size);
    }
}
