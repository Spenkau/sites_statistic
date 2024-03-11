<?php

namespace App\Repositories;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class SiteRepository
{
    public ?int $user_id = null;

    public function __construct() {}

    public function getUserId(): int
    {
        if ($this->user_id === null) {
            if (Auth::check()) {
                $this->user_id = Auth::user()->id;
            } else {
                throw new \Exception('User is not authenticated');
            }
        }

        return $this->user_id;
    }

    public function getAll(): AnonymousResourceCollection
    {
        $sites = Site::with('pages')->where('user_id', $this->getUserId())->paginate(10);

        return SiteResource::collection($sites);
    }

    public function getOne(Site $site): SiteResource
    {
//        $site = Site::find($id)->get();

        return new SiteResource($site);
    }

    public function store(array $data): SiteResource
    {
        $data['user_id'] = $this->getUserId();

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
