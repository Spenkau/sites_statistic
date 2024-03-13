<?php

namespace App\Repositories;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SiteRepository
{
    private int $userId;

    public function __construct()
    {
    }

    /**
     * Returns current authenticated user id
     *
     * @return int
     * @throws \Exception
     */
    public function getUserId(): int
    {
        if (Auth::check()) {
            return Auth::id();
        } else {
            throw new \Exception('User is not authenticated');
        }
    }

    /**
     * Returns user sites with pages
     *
     * @return JsonResource
     * @throws \Exception
     */
    public function all(): JsonResource
    {
        $sites = Site::with('pages')->where('user_id', $this->getUserId())->paginate(SITES_PER_PAGE);

        return SiteResource::collection($sites);
    }

    /**
     * Returns Site model in SiteResource
     *
     * @param int $id
     * @return SiteResource
     */
    public function findById(int $id): JsonResource
    {
        $site = Site::whereId($id)->with('owner')->first();

        return new SiteResource($site);
    }

    /**
     * Stores selected site
     *
     * @param array $data
     * @return SiteResource
     * @throws \Exception
     */
    public function store(array $data): SiteResource
    {
        $data['user_id'] = $this->getUserId();

        return new SiteResource(Site::create($data));
    }

    /**
     * Updates selected site
     *
     * @param Site $site
     * @param array $data
     * @return SiteResource
     */
    public function update(Site $site, array $data): SiteResource
    {
        $site->update($data);
        return new SiteResource($site);
    }

    /**
     * Removes selected site
     *
     * @param Site $site
     * @return bool|null
     */
    public function destroy(Site $site): ?bool
    {
        return $site->delete();
    }

    public function addCollaborator(int $siteId, int|array $userIds = []): bool
    {
        $site = Site::find($siteId);

        return $site->users()->syncWithoutDetaching($userIds);
    }

    public function removeCollaborator(int $siteId, int $userId): bool
    {
        $site = Site::find($siteId);

        return $site->users()->detach($userId);
    }
}
