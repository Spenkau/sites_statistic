<?php

namespace App\Repositories;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Models\User;
use App\Repositories\Interfaces\SiteRepositoryInterface;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SiteRepository implements SiteRepositoryInterface
{
    public function __construct()
    {
    }

    /**
     * Returns current authenticated user id
     *
     * @return int
     * @throws Exception
     */
    public function getUserId(): int
    {
        if (Auth::check()) {
            return Auth::id();
        } else {
            throw new Exception('User is not authenticated');
        }
    }

    /**
     * Returns user sites with pages
     *
     * @return JsonResource
     * @throws Exception
     */
    public function all(): JsonResource
    {
        $sites = Site::with('pages')->where('user_id', $this->getUserId())->paginate(10);

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
        $site = Site::whereId($id)->with('owner', 'pages')->first();

        return new SiteResource($site);
    }

    /**
     * Stores selected site
     *
     * @param array $data
     * @return SiteResource
     * @throws Exception
     */
    public function store(array $data): SiteResource
    {
        $data['user_id'] = $this->getUserId();

        $site = Site::create($data);

        return new SiteResource($site);
    }

    /**
     * Updates selected site
     *
     * @param int $siteId
     * @param array $data
     * @return SiteResource
     */
    public function update(int $siteId, array $data): SiteResource
    {
        $site = $this->findById($siteId);

        $site->update($data);

        return new SiteResource($site);
    }

    /**
     * Removes selected site
     *
     * @param int $siteId
     * @return bool|null
     */
    public function destroy(int $siteId): ?bool
    {
        $site = $this->findById($siteId);

        return $site->delete();
    }

    public function findByCollaborator(): JsonResource
    {
        $user = User::find($this->getUserId());

        $sites = $user->sites('pages')->paginate(10);

        return SiteResource::collection($sites);
    }

    public function storeCollaborators(int $siteId, array $userIds = []): array
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
