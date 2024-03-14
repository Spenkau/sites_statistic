<?php

namespace App\Repositories\Interfaces;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Resources\Json\JsonResource;

interface SiteRepositoryInterface
{
    public function getUserId(): int;

    public function all(): JsonResource;

    public function findById(int $id): JsonResource;

    public function store(array $data): SiteResource;

    public function update(int $siteId, array $data): SiteResource;

    public function destroy(int $siteId): ?bool;

    public function findByCollaborator();

    public function storeCollaborators(int $siteId, array $userIds = []): bool;

    public function removeCollaborator(int $siteId, int $userId): bool;
}
