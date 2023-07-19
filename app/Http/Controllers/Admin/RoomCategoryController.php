<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    public function roomCategories()
    {
        $pageTitle = 'All Locations';
        return view('admin.room_category.index', compact('pageTitle'));
    }
}
