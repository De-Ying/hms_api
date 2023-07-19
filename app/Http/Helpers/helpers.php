<?php

use Intervention\Image\Facades\Image as Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

function sidebarVariation(){
    /// for sidebar
    $variation['sidebar'] = 'bg_img';

    //for selector
    $variation['selector'] = 'capsule--rounded2';
    $variation['selector'] = 'capsule--rounded';

    //for overlay
    $variation['overlay'] = 'overlay--indigo';

    //Opacity
    $variation['opacity'] = 'overlay--opacity-8'; // 1-10

    return $variation;
}

function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        // return route('placeholder.image', $size);
    }
    return asset('public/assets/images/default.png');
}

function imagePath()
{
    $data['gateway'] = [
        'path' => 'public/assets/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'withdraw'=>[
            'path'=>'public/assets/images/verify/withdraw'
        ],
        'deposit'=>[
            'path'=>'public/assets/images/verify/deposit'
        ]
    ];
    $data['image'] = [
        'default' => 'public/assets/images/default.png',
    ];
    $data['withdraw'] = [
        'method' => [
            'path' => 'public/assets/images/withdraw/method',
            'size' => '800x800',
        ]
    ];
    $data['ticket'] = [
        'path' => 'public/assets/support',
    ];
    $data['language'] = [
        'path' => 'public/assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'public/assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
    ];
    $data['extensions'] = [
        'path' => 'public/assets/images/extensions',
        'size' => '36x36',
    ];
    $data['seo'] = [
        'path' => 'public/assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user'=> [
            'path'=>'public/assets/images/user/profile',
            'size'=>'350x300'
        ],
        'admin'=> [
            'path'=>'public/assets/laramin/images/profile',
            'size'=>'400x400'
        ],
        'admin_api'=> [
            'path'=>'assets/laramin/images/profile',
            'size'=>'400x400'
        ]
    ];
    $data['location'] = [
            'path' => 'public/assets/images/location',
            'size' => '740x1140',
    ];
    $data['location_api'] = [
        'path' => 'assets/images/location',
        'size' => '740x1140',
    ];
    $data['property'] = [
            'path' => 'public/assets/images/property',
            'size' => '990x740',
    ];
    $data['property_type'] = [
            'path' => 'public/assets/images/property_type',
            'size' => '990x740',
    ];
    $data['property_type_api'] = [
        'path' => 'assets/images/property_type',
        'size' => '990x740',
    ];
    return $data;
}

function menuActive($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}

function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $image = Image::make($file);
    if ($size) {
        $size = explode('x', strtolower($size));
        $image->resize($size[0], $size[1]);
    }
    $image->save($location . '/' . $filename);

    if ($thumb) {
        $thumb = explode('x', $thumb);
        Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
    }

    return $filename;
}

function uploadFile($file, $location, $size = null, $old = null){
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $file->move($location, $filename);
    return $filename;
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}

function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

// Paginate
function paginate($items, $perPage = 5, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

function getCurrentUrl()
{
    return URL::current();
}

function paginateLinks($data, $design = 'admin.partials.paginate'){
    return $data->appends(request()->all())->links($design);
}
