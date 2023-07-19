<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Admin\PropertyTypeRequest as PropertyTypeRequest;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * @func propertiesType
     * @description 'example func'
     */
    public function propertiesType()
    {
        $pageTitle = 'All Property Types';
        $emptyMessage = 'No Property Type found';
        $response = Http::get('http://localhost:8000/api/admin/property-types');

        $property_types = paginate($response->collect());
        $property_types->withPath(getCurrentUrl());

        return view('admin.property_type.index', compact('pageTitle', 'emptyMessage', 'property_types'));
    }

    /**
     * @func savePropertyType
     * @description 'example func'
     * @param PropertyTypeRequest $request 'params0'
     */
    public function savePropertyType(PropertyTypeRequest $request)
    {
        $request->validated($request->all());

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();

                $response = Http::attach(
                    'image', file_get_contents($image), $imageName
                )->post('http://localhost:8000/api/admin/property-types', [
                    'name' => $request->name,
                ]);
            } else {
                $response = Http::post('http://localhost:8000/api/admin/property-types', [
                    'name' => $request->name,
                ]);
            }

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.type.property.index')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.type.property.index')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.type.property.index')->withNotify($notify);
        }
    }

    public function updatePropertyType(PropertyTypeRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();

                $response = Http::attach(
                    'image', file_get_contents($image), $imageName
                )->post('http://localhost:8000/api/admin/property-types/'.$id, [
                    '_method' => $request->_method,
                    'name' => $request->name,
                    'status' => $request->status

                ]);
            } else {
                $response = Http::post('http://localhost:8000/api/admin/property-types/'.$id, [
                    '_method' => $request->_method,
                    'name' => $request->name,
                    'status' => $request->status
                ]);
            }

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.type.property.index')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.type.property.index')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.type.property.index')->withNotify($notify);
        }
    }

    public function deletePropertyType(Request $request, $id)
    {
        try {
            $response = Http::post('http://localhost:8000/api/admin/property-types/'.$id, [
                '_method' => $request->_method
            ]);

            $status = $response->successful();
            $result = json_decode((string)$response->getBody(), true);

            if ($status) {
                $notify[] = ['success', $result['message']];
                return redirect()->route('admin.type.property.index')->withNotify($notify);
            } else {
                $notify[] = ['error', $result['message']];
                return redirect()->route('admin.type.property.index')->withNotify($notify);
            }
        } catch (\Throwable $th) {
            $notify[] = ['error', $th];
            return redirect()->route('admin.type.property.index')->withNotify($notify);
        }
    }
}
