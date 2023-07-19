<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginAuthRequest;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('templates.user.auth.login');
    }

    public function postLogin(LoginAuthRequest $request)
    {
        $request->validated($request->all());

        try {
            $user = User::where('email', $request->email)->first();

            $response = Http::asForm()->post('http://localhost:8000/api/auth/login', [
                'email' => $request->email,
                'password' => $request->password
            ]);

            $result = json_decode((string)$response->getBody(), true);

            if ($result['success']) {
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->name);
                Session::put('user_email', $user->email);

                $notification = 'Chào mừng '.$user->name.' đến trải nghiệm dịch vụ bên HotelLab';
                $notify[] = ['success', $notification];
                return redirect()->route('home')->withNotify($notify);
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
        $response = Http::get('http://localhost:8000/api/auth/logout');
        $result = json_decode((string)$response->getBody(), true);

        if ($result['success']) {
            Session::flush();
            $notify[] = ['success', 'Đăng xuất thành công'];
            return redirect()->route('user.login')->withNotify($notify);
        } else {
            $notify[] = ['error', 'Đăng xuất thất bại, vui lòng thử lại'];
            return back()->withNotify($notify);
        }
    }
}
