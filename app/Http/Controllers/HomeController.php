<?php

namespace App\Http\Controllers;

use App\Services\SiteService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public SiteService $siteService;

    public function __construct(SiteService $siteService)
    {
        $this->siteService = $siteService;
    }

    public function index()
    {
        $sites = $this->siteService->getAll();

        return view('home')->with(['sites' => $sites]);
    }
}
