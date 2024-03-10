<?php

namespace App\Services;

use App\Http\Resources\PageResource;
use App\Http\Resources\SiteResource;
use App\Models\Page;
use App\Models\Site;
use App\Repositories\PageRepository;
use App\Repositories\SiteRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PageService
{
    public PageRepository $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function getSitePages(int $id): AnonymousResourceCollection
    {
        return $this->pageRepository->getSitePages($id);
    }

    public function getOne(Page $page): PageResource
    {
        return $this->pageRepository->getOne($page);
    }

    public function store(array $data): PageResource
    {
        return $this->pageRepository->store($data);
    }

    public function update(Page $page, array $data): PageResource
    {
        return $this->pageRepository->update($page, $data);
    }

    public function destroy(Page $page)
    {
        return $this->pageRepository->destroy($page);
    }
}
