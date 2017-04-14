<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 17-4-13
 * Time: 下午1:22
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\v1\BannerRepository;
use App\Repositories\v1\NewsRepository;
use App\Repositories\v1\RecommendRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $recommendRepository;
    private $bannerRepository;
    public function __construct(
        RecommendRepository $recommendRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->recommendRepository = $recommendRepository;
        $this->bannerRepository = $bannerRepository;
    }

    public function index(Request $request)
    {
        $banner = $this->bannerRepository->getBanner(['id', 'title', 'img']);
        $recommend = $this->recommendRepository->getRecommend(['id', 'title']);
        $pageData['banner'] = $banner;
        $pageData['recommend'] = $recommend;
        $this->success($pageData);
    }
}