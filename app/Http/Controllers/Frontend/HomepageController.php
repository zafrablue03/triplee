<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class HomepageController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('created_at')->get();

        return view('pages.frontend.index', compact('services'));
    }
}
