<?php

namespace App\Repositories;

use App\Http\Resources\PageResource;
use App\Http\Resources\SiteResource;
use App\Models\Page;
use App\Models\Site;
use App\Repositories\Interfaces\PageRepositoryInterface;
use Error;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PageRepository implements PageRepositoryInterface
{
    public function getSitePages(int $id): AnonymousResourceCollection
    {
        $site = Site::find($id);

        $pages = ($site->pages)->load('details');

        return PageResource::collection($pages);
    }

    public function findOne(int $pageId): PageResource
    {
        $page = Page::whereId($pageId)->with('details')->first();

        return new PageResource($page);

    }

    public function store(array $data): PageResource
    {
        $newPage = Page::create($data);

        return new PageResource($newPage);
    }

    public function update(int $pageId, array $data): PageResource
    {
        $page = Page::find($pageId);

        return new PageResource($page->update($data));
    }

    public function destroy(int $pageId)
    {
        $page = Page::find($pageId);

        return $page->delete();
    }
}
