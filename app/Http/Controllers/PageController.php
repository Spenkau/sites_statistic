<?php

namespace App\Http\Controllers;

use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
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

    public function index()
    {
        return redirect()->back();
    }

    public function show(Site $site, Page $page)
    {
        $page = $this->pageService->getOne($site, $page);

        return view('page.show')->with(['page' => $page]);
    }

    public function create(Site $site): View
    {
        return view('page.create', compact('site'));
    }

    public function store(Site $site, StoreRequest $request)
    {
        $request->merge(['site_id' => $site->id]);

        $data = $request->validated();

        $page = $this->pageService->store($data);

        return redirect()->to('/site/' . $site->id . '/page/' . $page->id);
//        return redirect()->to('/site/' . $site->id);
    }

    public function edit(Page $page)
    {
        return view('page.edit')->with(['page' => $page]);
    }

    public function update(Page $page, UpdateRequest $request)
    {
        $data = $request->validated();

        $updatedSite = $this->pageService->update($page, $data);
    }

    public function destroy(Site $site)
    {
        $this->siteService->destroy($site);
    }
}
