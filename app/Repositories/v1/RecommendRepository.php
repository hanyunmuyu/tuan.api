<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 17-4-13
 * Time: 下午2:27
 */

namespace App\Repositories\v1;


use App\Models\RecommendModel;

class RecommendRepository
{
    public function getRecommend($fields = '*')
    {
        return RecommendModel::where('status', 1)
            ->select($fields)
            ->get()->toarray();
    }
}