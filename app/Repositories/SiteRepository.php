<?php

namespace App\Repositories;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SiteRepository
{
    public function getAll(): AnonymousResourceCollection
    {
        $sites = Site::with('pages')->paginate(10);

        return SiteResource::collection($sites);
    }

    public function getOne(int $id): SiteResource
    {
        $site = Site::find($id)->get();

        return new SiteResource($site);
    }

    public function store(Site $data): SiteResource
    {
        return new SiteResource(Site::create($data));
    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
