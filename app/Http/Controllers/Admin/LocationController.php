<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationRequest as LocationRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * @func locations
     * @description 'example func'
     */
    public function locations()
    {
        $pageTitle = 'All Locations';
        $emptyMessage = 'No location found';
        $response = Http::get('http://localhost:8000/api/admin/locations');

        $locations = paginate($response->collect());
        $locations->withPath(getCurrentUrl());

        return view('admin.location.index', compact('pageTitle', 'emptyMessage', 'locations'));
    }

    /**
     * @func saveLocation
     * @description 'example func'
     * @param LocationRequest $request 'params0'
     */
    public function saveLocation(LocationRequest $request)
    {
        $request->validated($request->all());

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();

                $response = Http::attach(
                    'image', file_get_contents($image), $imageName
                )->post('http://localhost:8000/api/admin/locations', [
                    'name' => $request->name,
                ]);
            } else {
                $response = Http::post('http://localhost:8000/api/admin/locations', [
                    'name' => $request->name,
                ]);
            }

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.location.index')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.location.index')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.location.index')->withNotify($notify);
        }
    }

    /**
     * @func updateLocation
     * @description 'example func'
     * @param LocationRequest $request 'params0'
     * @param $id 'params1'
     */
    public function updateLocation(LocationRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();

                $response = Http::attach(
                    'image', file_get_contents($image), $imageName
                )->post('http://localhost:8000/api/admin/locations/'.$id, [
                    '_method' => $request->_method,
                    'name' => $request->name,
                    'status' => $request->status

                ]);
            } else {
                $response = Http::post('http://localhost:8000/api/admin/locations/'.$id, [
                    '_method' => $request->_method,
                    'name' => $request->name,
                    'status' => $request->status
                ]);
            }

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.location.index')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.location.index')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.location.index')->withNotify($notify);
        }
    }

    /**
     * @func deleteLocation
     * @description 'example func'
     * @param Request $request 'params0'
     * @param $id 'params1'
     */
    public function deleteLocation(Request $request, $id)
    {
        try {
            $response = Http::post('http://localhost:8000/api/admin/locations/'.$id, [
                '_method' => $request->_method
            ]);

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.location.index')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.location.index')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.location.index')->withNotify($notify);
        }
    }
}
