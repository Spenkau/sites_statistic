<?php

namespace App\Http\Controllers;

use App\Http\Requests\Page\StoreRequest;
use App\Models\Page;
use App\Models\Site;
use App\Services\PageService;
use App\Services\SiteService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public SiteService $siteService;
    public PageService $pageService;

    public function __construct(PageService $pageService, SiteService $siteService)
    {
        $this->siteService = $siteService;
        $this->pageService = $pageService;
    }

    public function index(Page $page)
    {
        $page = $this->pageService->getOne($page);

        return view('page.show')->with(['page' => $page]);
    }

    public function create(): View
    {
        return view('page.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $pages = $this->pageService->store($data);

        return to_route('page.show', ['pages' => $pages]);
    }
}
