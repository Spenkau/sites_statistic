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

    public function show(int $siteId, int $pageId): View
    {
        $page = $this->pageService->findOne($pageId);

        return view('page.show', ['site' => $siteId, 'page' => $page]);
    }

    public function create(int $siteId): View
    {
        return view('page.create', ['site' => $siteId]);
    }

    public function store(int $siteId, StoreRequest $request)
    {
        try {
//            $request->merge(['site_id' => $site->id]);

            $data = $request->validated();

            $page = $this->pageService->store($data);

            return redirect()->route('site.page.show', ['site' => $siteId, 'page' => $page]);
        } catch (\Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['error' => 'Страница с таким адресом уже существует!']);
            }
            return response()->json($e);
        }

    }
    public function edit(int $siteId, int $pageId)
    {
        $page = $this->pageService->findOne($pageId);

        return view('page.edit', ['site' => $siteId, 'page' => $page]);
    }

    public function update(int $siteId, int $pageId, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->pageService->update($pageId, $data);

        return redirect()->route('site.page.show', ['site' => $siteId, 'page' => $pageId]);
    }

    public function destroy(int $siteId,int $pageId)
    {
        try {
            $this->pageService->destroy($pageId);
            return redirect()->route('site.show', ['site' => $siteId]);
        } catch (\Exception $exception) {
            return 'Ошибка удаления страницы: ' . $exception;
        }
    }
}
