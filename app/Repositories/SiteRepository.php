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
     * @param array $criteria
     * @return JsonResource
     */
    public function all(array $criteria = []): JsonResource
    {
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
    public function store(array $data): JsonResource
    {
        $newSite = $this->storeModel($data);

        return new SiteResource($newSite);
    }

    /**
     * Updates selected site
     *
     * @param int $id
     * @param array $data
     * @return JsonResource
     */
    public function update(int $id, array $data): JsonResource
    {
        $site = $this->updateModel($id, $data);

        return new SiteResource($site);
    }

    /**
     * Removes selected site
     *
     * @param int $id
     * @return bool|null
     */
    public function destroy(int $id): ?bool
    {

        return $this->destroyModel($id);
    }

    public function findByCollaborator(array $criteria = []): JsonResource
    {
        $user = User::query()->where($criteria)->get();

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
