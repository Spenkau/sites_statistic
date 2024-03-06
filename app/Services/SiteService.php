<?php

namespace App\Services;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SiteService
{
    public SiteRepository $siteRepository;

    public function __construct(SiteRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function getAll(): AnonymousResourceCollection
    {
        return $this->siteRepository->getAll();
    }

    public function getOne(int $id): SiteResource
    {
        return $this->siteRepository->getOne($id);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function store(Site $data): SiteResource
    {
        return $this->siteRepository->store($data);
    }
}
