<?php

namespace App\Repositories\Interfaces;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Resources\Json\JsonResource;

interface SiteRepositoryInterface
{
    public function getUserId(): int;

    public function all(array $criteria = []): JsonResource;

    public function findById(int $id): JsonResource;

    public function store(array $data): JsonResource;

    public function update(int $id, array $data): JsonResource;

    public function destroy(int $id): ?bool;

    public function findByCollaborator();

    public function storeCollaborators(int $id, array $userIds = []): array;

    public function removeCollaborator(int $id, int $userId): bool;
}
