<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function properties()
    {
        $pageTitle = 'All Locations';
        return view('admin.property.index', compact('pageTitle'));
    }
}
