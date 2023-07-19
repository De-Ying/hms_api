<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function allUsers()
    {
        $pageTitle = 'All Locations';
        return view('admin.users.list', compact('pageTitle'));
    }

    public function activeUsers()
    {

    }

    public function bannedUsers()
    {

    }
}
