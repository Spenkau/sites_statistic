<?php

namespace App\Repositories;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use App\Models\User;
use App\Repositories\Interfaces\SiteRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SiteRepository extends BaseRepository implements SiteRepositoryInterface
{
    public Model $model;

    public function __construct(Site $model)
    {
        $this->model = $model;
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
        $criteria = ['user_id', $this->getUserId()];

        $sites = $this->allModels('pages', $criteria);

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
        $relations = ['owner', 'pages'];

        $site = $this->findModel($id, $relations);

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
        $newSite = $this->storeModel($data);

        return new SiteResource($newSite);
    }

    /**
     * Updates selected site
     *
     * @param int $siteId
     * @param array $data
     * @return SiteResource
     */
    public function update(int $id, array $data): SiteResource
    {
        $site = $this->findModel($id, $data);

        $site->update($data);

        return new SiteResource($site);
    }

    /**
     * Removes selected site
     *
     * @param int $siteId
     * @return bool|null
     */
    public function destroy(int $id): ?bool
    {

        return $this->destroyModel($id);
    }

    public function findByCollaborator(): JsonResource
    {
        $user = User::find($this->getUserId());

        $sites = $user->public_sites(['pages'])->paginate(10);

        return SiteResource::collection($sites);
    }

    public function storeCollaborators(int $id, array $userIds = []): array
    {
        $site = $this->findModel($id);

        return $site->users()->syncWithoutDetaching($userIds);
    }

    public function removeCollaborator(int $id, int $userId): bool
    {
        $site = $this->findModel($id);

        return $site->users()->detach($userId);
    }
}
