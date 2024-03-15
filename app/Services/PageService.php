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

    public function findOne(int $pageId): PageResource
    {
        return $this->pageRepository->findOne($pageId);
    }

    public function store(array $data): PageResource
    {
        return $this->pageRepository->store($data);
    }

    public function update(int $pageId, array $data): PageResource
    {
        return $this->pageRepository->update($pageId, $data);
    }

    public function destroy(int $pageId)
    {
        return $this->pageRepository->destroy($pageId);
    }
}
