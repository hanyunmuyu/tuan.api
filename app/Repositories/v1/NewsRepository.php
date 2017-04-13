<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 17-4-13
 * Time: 下午1:19
 */

namespace App\Repositories\v1;


use App\Models\NewsModel;

class NewsRepository
{
    public function getNews($field = '*')
    {
        return NewsModel::where('status', 1)
            ->select($field)
            ->get()->toArray();
    }
}