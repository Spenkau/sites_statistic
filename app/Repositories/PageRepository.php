<?php

namespace App\Repositories;

use App\Http\Resources\PageResource;
use App\Http\Resources\SiteResource;
use App\Models\Page;
use App\Models\Site;
use Error;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PageRepository
{
    public function getSitePages(int $id): AnonymousResourceCollection
    {
        $site = Site::find($id);

        $pages = ($site->pages)->load('details');

        return PageResource::collection($pages);
    }

    public function getOne(Site $site, Page $page): PageResource
    {
        $page->load('details');
        return new PageResource($page);
//        $page = Page::find($id)->with('details')->get();

    }

    public function store(array $data): PageResource
    {
        $newPage = Page::create($data);

        return new PageResource($newPage);
    }

    public function update(Page $page, array $data): PageResource
    {
        return new PageResource($page->update($data));
    }

    public function destroy(Page $page)
    {
        return $page->delete();
    }
}
