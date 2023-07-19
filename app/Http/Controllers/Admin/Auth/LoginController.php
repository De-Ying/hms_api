<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginAuthRequest;
use Illuminate\Support\Facades\Http;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function postLogin(LoginAuthRequest $request)
    {
        $request->validated($request->all());

        try {
            $admin = Admin::where('email', $request->email)->first();

            $response = Http::post('http://localhost:8000/api/admin/auth/login', [
                'email' => $request->email,
                'password' => $request->password
            ]);

            $result = json_decode((string)$response->getBody(), true);

            if ($result['success']) {
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $admin->name);
                Session::put('admin_email', $admin->email);
                Session::put('admin_image', $admin->image);

                $notification = 'Chào mừng '.$admin->name.' đến với trang quản trị';
                $notify[] = ['success', $notification];
                return redirect()->route('admin.dashboard')->withNotify($notify);
            } else {
                return redirect()->withInput();
            }
        } catch (\Exception $e) {
            $notify[] = ['error', 'Đăng nhập thất bại, vui lòng thử lại!'];
            return back()->withNotify($notify);
        }
    }

    public function logout()
    {
        $response = Http::get('http://localhost:8000/api/admin/auth/logout');
        $result = json_decode((string)$response->getBody(), true);

        if ($result['success']) {
            Session::flush();
            $notify[] = ['success', 'Đăng xuất thành công'];
            return redirect()->route('admin.login')->withNotify($notify);
        } else {
            $notify[] = ['error', 'Đăng xuất thất bại, vui lòng thử lại'];
            return back()->withNotify($notify);
        }
    }
}
