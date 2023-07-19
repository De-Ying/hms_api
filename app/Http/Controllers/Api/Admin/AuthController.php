<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\StoreAuthRequest;
use App\Http\Requests\Auth\UpdateAuthRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;

use App\Http\Resources\Auth as AuthResources;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    /**
     * @func register
     * @description 'example func'
     * @param StoreAuthRequest $request 'params0'
     */
    public function register(StoreAuthRequest $request)
    {
        $request->validated($request->all());

        $admin = new Admin();

        $filename = $admin->image;

        $path = imagePath()['profile']['admin_api']['path'];
        $size = imagePath()['profile']['admin_api']['size'];

        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size, $admin->image);
            } catch (\Exception $exp) {
                return $this->sendError('', 'Image could not be uploaded.', 401);
            }
        }

        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->image    = $filename;
        $admin->save();

        $notification = ' register successfully';

        return $this->sendResponse(new AuthResources($admin), $request->name . $notification, 201);
    }

    /**
     * @func login
     * @description 'example func'
     * @param LoginAuthRequest $request 'params0'
     */
    public function login(LoginAuthRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return $this->sendError('', 'Credentials do not match', 401);
        }

        $admin = Admin::where('email', $request->email)->firstOrFail();

        $notification = 'Admin login successfully';

        return $this->sendResponse(new AuthResources($admin), $notification);
    }

    /**
     * @func logout
     * @description 'example func'
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        $notification = 'Admin logout successfully';

        return $this->sendResponse([], $notification);
    }

    /**
     * @func profile
     * @description 'example func'
     */
    public function profile($id)
    {
        $admin = Admin::where('id', $id)->first();
        return $admin;
    }

    /**
     * @func profileUpdate
     * @description 'example func'
     * @param UpdateAuthRequest $request 'params0'
     * @param $id 'params1'
     */
    public function profileUpdate(UpdateAuthRequest $request, $id)
    {
        $request->validated($request->all());

        $admin = Admin::findOrFail($id);

        $filename = $admin->image;

        $path = imagePath()['profile']['admin_api']['path'];
        $size = imagePath()['profile']['admin_api']['size'];

        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size, $admin->image);
            } catch (\Exception $exp) {
                return $this->sendError('', 'Image could not be uploaded.', 401);
            }
        }

        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->image    = $filename;
        $admin->save();

        $notification = 'Profile changed successfully';

        return $this->sendResponse(new AuthResources($admin), $notification);
    }

    /**
     * @func password
     * @description 'example func'
     * @param $id 'params0'
     */
    public function password($id)
    {
        $admin = Admin::where('id', $id)->first();
        return $admin;
    }

    /**
     * @func passwordUpdate
     * @description 'example func'
     * @param UpdatePasswordRequest $request 'params0'
     * @param $id 'params1'
     */
    public function passwordUpdate(UpdatePasswordRequest $request, $id)
    {
        $request->validated($request->all());

        $admin = Admin::findOrFail($id);
        $admin->password = Hash::make($request->password);
        $admin->save();
        $notification = 'Password changed successfully.';
        return $this->sendResponse(new AuthResources($admin), $notification);
    }
}
