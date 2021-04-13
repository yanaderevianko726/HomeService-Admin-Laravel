<?php
/*
 * File name: ParentCriteria.php
 * Last modified: 2021.01.31 at 15:07:51
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Criteria\Categories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ParentCriteria.
 *
 * @package namespace App\Criteria\Categories;
 */
class ParentCriteria implements CriteriaInterface
{
    /**
     * @var array
     */
    private $request;

    /**
     * ParentCriteria constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (!$this->request->has('parent')) {
            return $model;
        }
        return $model->where('parent_id', null);
    }
}
