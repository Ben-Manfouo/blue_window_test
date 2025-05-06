<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\Dialogue\Dialogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        return Dialogue::send_response(true, '', Brand::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make(json_decode(json_encode($request->all()), true),
            [
                'brand_name' => 'bail|required|string|unique:brands,brand_name,NULL,brand_id,deleted_at,NULL',
                'brand_image' => 'bail|required|url',
                'rating' => 'bail|required|integer|min:0|max:5'
            ]
        );
        if ($validator->stopOnFirstFailure()->fails()) {
            return Dialogue::send_response(false, $validator->errors()->first());
        }
        $user = Brand::create($request->all());
        return Dialogue::send_response(true, '', [$user->refresh()], 201);
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        if(!empty($brand))
            return Dialogue::send_response(true, '', [$brand], 201);
        else
            return Dialogue::send_response(false, __('brand not found'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if(!empty($brand)){
            $validator = Validator::make(json_decode(json_encode($request->all()), true),
                [
                    'brand_name' => 'bail|nullable|string|unique:brands,brand_name,' . $id . ',brand_id,deleted_at,NULL',
                    'brand_image' => 'bail|nullable|url',
                    'rating' => 'bail|nullable|integer|min:0|max:5'
                ]
            );
            if ($validator->stopOnFirstFailure()->fails()) {
                return Dialogue::send_response(false, $validator->errors()->first());
            }

            $brand->update($request->all()); // Update
            return Dialogue::send_response(true, '', [$brand->refresh()]);
        }
        return Dialogue::send_response(false, __('brand not found'));
    }


    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(!empty($brand)) $brand->delete();
        return Dialogue::send_response(true);
    }
}
