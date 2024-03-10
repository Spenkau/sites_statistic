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

    public function getOne($site): SiteResource
    {
        return $this->siteRepository->getOne($site);
    }

    public function store(array $data): SiteResource
    {
//        $data->user_id = $this->user_id;

        return $this->siteRepository->store($data);
    }

    public function update(Site $site, array $data)
    {
        return $this->siteRepository->update($site, $data);
    }

    public function destroy(Site $site)
    {
        return $this->siteRepository->destroy($site);
    }
}
