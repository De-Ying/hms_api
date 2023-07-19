<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UpdateAuthRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'All Locations';
        return view('admin.dashboard', compact('pageTitle'));
    }

    public function profile($id)
    {
        $pageTitle = 'Profile';
        $response = Http::get('http://localhost:8000/api/admin/profiles/'.$id);
        $admin = $response->collect();
        return view('admin.profile', compact('pageTitle', 'admin'));
    }

    public function updateProfile(UpdateAuthRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            $admin = Admin::where('id', $id)->first();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();

                $response = Http::attach(
                    'image', file_get_contents($image), $imageName
                )->post('http://localhost:8000/api/admin/profiles/'.$id, [
                    '_method' => $request->_method,
                    'name' => $request->name,
                    'email' => $request->email
                ]);
            } else {
                $response = Http::post('http://localhost:8000/api/admin/profiles/'.$id, [
                    '_method' => $request->_method,
                    'name' => $request->name,
                    'email' => $request->email
                ]);
            }

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                Session::put('admin_name', $admin->name);
                Session::put('admin_email', $admin->email);
                Session::put('admin_image', $admin->image);

                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.profile')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.profile')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.profile')->withNotify($notify);
        }
    }

    public function password($id)
    {
        $pageTitle = 'Password Setting';
        $response = Http::get('http://localhost:8000/api/admin/password/'.$id);
        $admin = $response->collect();
        return view('admin.password', compact('pageTitle', 'admin'));
    }

    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            $response = Http::post('http://localhost:8000/api/admin/password/'.$id, [
                '_method' => $request->_method,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ]);

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.password')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.password')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.password')->withNotify($notify);
        }
    }
}
