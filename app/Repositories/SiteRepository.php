<?php

namespace App\Repositories;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SiteRepository
{
    public int | null $user_id;
    public function __construct()
    {
        $this->user_id = auth()->id();
    }

    public function getAll(): AnonymousResourceCollection
    {
        $sites = Site::with('pages')->where('user_id', 1)->paginate(10);

        return SiteResource::collection($sites);
    }

    public function getOne(Site $site): SiteResource
    {
//        $site = Site::find($id)->get();

        return new SiteResource($site);
    }

    public function store(array $data): SiteResource
    {
        $data['user_id'] = $this->user_id;

        return new SiteResource(Site::create($data));
    }

    public function update(Site $site, array $data): SiteResource
    {
        $site->update($data);
        return new SiteResource($site);
    }

    public function destroy(Site $site)
    {
        return $site->delete();
    }
}
