<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function amenities()
    {
        $pageTitle = 'All Locations';
        return view('admin.amenity.index', compact('pageTitle'));
    }
}
