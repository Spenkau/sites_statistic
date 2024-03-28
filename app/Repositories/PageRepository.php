<?php

namespace App\Repositories;

use App\Http\Resources\PageResource;
use App\Http\Resources\SiteResource;
use App\Models\Page;
use App\Models\Site;
use App\Repositories\Interfaces\PageRepositoryInterface;
use Error;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    public Model $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function all($criteria): AnonymousResourceCollection
    {
        $pages = $this->allModels(['details'], $criteria);

        return PageResource::collection($pages);
    }

    public function findOne(int $id): PageResource
    {
        $page = $this->findModel($id, 'details');

        return new PageResource($page);
    }

    public function store(array $data): PageResource
    {
        $newPage = $this->storeModel($data);

        return new PageResource($newPage);
    }

    public function update(int $pageId, array $data): PageResource
    {
        $updatedPage = $this->updateModel($pageId, $data);

        return new PageResource($updatedPage);
    }

    public function destroy(int $pageId): bool
    {
        return $this->destroyModel($pageId);
    }

    public function getModel()
    {
        return $this->model;
    }
}
