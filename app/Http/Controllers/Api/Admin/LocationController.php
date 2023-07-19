<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\Location as LocationResources;
use App\Http\Requests\Admin\LocationRequest as LocationRequest;
use App\Models\Location;

class LocationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::with('properties')->orderBy('id', 'DESC')->get();
        return $locations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $request->validated($request->all());

        try {
            $location = new Location();
            $notification = ' added successfully';

            $filename = $location->image;

            $path = imagePath()['location_api']['path'];
            $size = imagePath()['location_api']['size'];

            if ($request->hasFile('image')) {
                try {
                    $filename = uploadImage($request->image, $path, $size, $location->image);
                } catch (\Exception $exp) {
                    return $this->sendError('', 'Image could not be uploaded.', 401);
                }
            }

            $location->name  = $request->name;
            $location->image = $filename;
            $location->save();

            return $this->sendResponse(new LocationResources($location), $request->name . $notification);
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
    public function update(LocationRequest $request, $id)
    {
        $request->validated($request->all());

        try {
            $location = new Location();

            if ($request->status == 1) {
                $status = 1;
            } else {
                $status = 0;
            }

            if ($id) {
                $location = Location::findOrFail($id);
                $location->status = $status;
                $notification = ' updated successfully';
            }

            $filename = $location->image;

            $path = imagePath()['location_api']['path'];
            $size = imagePath()['location_api']['size'];

            if ($request->hasFile('image')) {
                try {
                    $filename = uploadImage($request->image, $path, $size, $location->image);
                } catch (\Exception $exp) {
                    return $this->sendError('', 'Image could not be uploaded.', 401);
                }
            }

            $location->name  = $request->name;
            $location->image = $filename;
            $location->save();

            return $this->sendResponse(new LocationResources($location), $request->name . $notification);
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
            $location = Location::findOrFail($id);
            $path = imagePath()['location_api']['path'];
            $imagePath = $path.'/'.$location->image;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            $location->delete();

            return $this->sendResponse([], 'Location deleted successfully');
        } catch (\Throwable $th) {
            return $this->sendError([], 'The data is being forced that it cannot be deleted!');
        }
    }
}
