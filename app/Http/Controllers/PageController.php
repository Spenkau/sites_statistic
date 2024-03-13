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

        return view('page.show')->with(['site' => $site, 'page' => $page]);
    }

    public function create(Site $site): View
    {
        return view('page.create', compact('site'));
    }

    public function store(Site $site, StoreRequest $request)
    {
        try {
//            $request->merge(['site_id' => $site->id]);

            $data = $request->validated();
            $data['site_id'] = $site->id;
            $page = $this->pageService->store($data);

            return redirect()->route('site.page.show', ['site' => $site, 'page' => $page]);
        } catch (\Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['error' => 'Страница с таким адресом уже существует!']);
            }
            return response()->json($e);
        }

    }
    public function edit(Site $site, Page $page)
    {
        return view('page.edit')->with(['site' => $site, 'page' => $page]);
    }

    public function update(Site $site, Page $page, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->pageService->update($page, $data);

        return redirect()->route('site.page.show', ['site' => $site, 'page' => $page]);
    }

    public function destroy(Site $site, Page $page)
    {
        try {
            $this->pageService->destroy($page);
            return redirect()->route('site.show', ['site' => $site]);
        } catch (\Exception $exception) {
            return 'Ошибка удаления страницы: ' . $exception;
        }
    }
}
