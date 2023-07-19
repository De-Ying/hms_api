<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreAuthRequest;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function register()
    {
        return view('templates.user.auth.register');
    }

    public function postRegister(StoreAuthRequest $request)
    {
        $request->validated($request->all());

        try {
            $response = Http::post('http://localhost:8000/api/auth/register', [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ]);

            $result = json_decode((string)$response->getBody(), true);

            if ($result['success']) {
                $notification = 'Chúc mừng bạn đã đăng ký thành công tài khoản';
                $notify[] = ['success', $notification];
                return redirect()->route('user.login')->withNotify($notify);;
            } else {
                return redirect()->withInput();
            }
        } catch (\Exception $e) {
            $notify[] = ['error', 'Đăng ký thất bại, vui lòng thử lại!'];
            return back()->withNotify($notify);
        }
    }
}
