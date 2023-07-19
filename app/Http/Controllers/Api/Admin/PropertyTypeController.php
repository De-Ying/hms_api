<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\PropertyType as PropertyTypeResources;
use App\Http\Requests\Admin\PropertyTypeRequest as PropertyTypeRequest;
use App\Models\PropertyType;

class PropertyTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyTypes = PropertyType::with('properties')->orderBy('id', 'DESC')->get();
        return $propertyTypes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyTypeRequest $request)
    {
        $request->validated($request->all());

        try {
            $propertyType = new PropertyType();
            $notification = ' added successfully';

            $filename = $propertyType->image;

            $path = imagePath()['property_type_api']['path'];
            $size = imagePath()['property_type_api']['size'];

            if ($request->hasFile('image')) {
                try {
                    $filename = uploadImage($request->image, $path, $size, $propertyType->image);
                } catch (\Exception $exp) {
                    return $this->sendError('', 'Image could not be uploaded.', 401);
                }
            }

            $propertyType->name  = $request->name;
            $propertyType->image = $filename;
            $propertyType->save();

            return $this->sendResponse(new PropertyTypeResources($propertyType), $request->name . $notification);
        } catch (\Throwable $th) {
            return $this->sendError('', $th, 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyTypeRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            $propertyType = new PropertyType();

            if ($request->status == 1) {
                $status = 1;
            } else {
                $status = 0;
            }

            if ($id) {
                $propertyType = PropertyType::findOrFail($id);
                $propertyType->status = $status;
                $notification = ' updated successfully';
            }

            $filename = $propertyType->image;

            $path = imagePath()['property_type_api']['path'];
            $size = imagePath()['property_type_api']['size'];

            if ($request->hasFile('image')) {
                try {
                    $filename = uploadImage($request->image, $path, $size, $propertyType->image);
                } catch (\Exception $exp) {
                    return $this->sendError('', 'Image could not be uploaded.', 401);
                }
            }

            $propertyType->name  = $request->name;
            $propertyType->image = $filename;
            $propertyType->save();

            return $this->sendResponse(new PropertyTypeResources($propertyType), $request->name . $notification);
        } catch (\Throwable $th) {
            return $this->sendError('', $th, 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $propertyType = PropertyType::findOrFail($id);
            $path = imagePath()['property_type_api']['path'];
            $imagePath = $path.'/'.$propertyType->image;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            $propertyType->delete();

            return $this->sendResponse([], 'PropertyType deleted successfully');
        } catch (\Throwable $th) {
            return $this->sendError([], 'The data is being forced that it cannot be deleted!');
        }
    }
}
