<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function runSiteСheckup()
    {
        Artisan::call('update:page-details');

        return response()->json(['message' => 'Проверка страниц пройдена!']);
    }

    public function runApiCheckup()
    {
        Artisan::call('update:api-point-details');

        return response()->json(['message' => 'Проверка API пройдена!']);
    }
}
