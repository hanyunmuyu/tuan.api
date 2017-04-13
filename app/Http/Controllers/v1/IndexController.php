<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 17-4-13
 * Time: 下午1:22
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\v1\NewsRepository;
use App\Repositories\v1\RecommendRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $newsRepository;
    private $recommendRepository;

    public function __construct(
        NewsRepository $newsRepository,
        RecommendRepository $recommendRepository
    )
    {
        $this->newsRepository = $newsRepository;
        $this->recommendRepository = $recommendRepository;
    }

    public function index(Request $request)
    {
        $banner = $this->newsRepository->getNews(['id', 'title', 'banner']);
        $recommend = $this->recommendRepository->getRecommend(['id', 'title']);
        $pageData['banner'] = $banner;
        $pageData['recommend'] = $recommend;
        $this->success($pageData);
    }
}