<?php

namespace App\Actions\Service;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ListServicesAction
{
    /**
     * @return Collection<int, Service>
     */
    public function handle(bool $onlyActive = true): Collection
    {
        $query = Service::query();

        if ($onlyActive) {
            $query->active();
        }

        return $query
            ->orderBy('name')
            ->get();
    }
}
