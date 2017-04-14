<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 17-4-13
 * Time: 下午6:04
 */

namespace App\Repositories\v1;


use App\Models\BannerModel;

class BannerRepository
{
    public function getBanner($fields = '*')
    {
        return BannerModel::where('status', 1)
            ->select($fields)
            ->get()->toArray();
    }
}