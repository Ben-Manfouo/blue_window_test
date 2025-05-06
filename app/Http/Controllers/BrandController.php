<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Country;
use App\Services\Dialogue\Dialogue;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index(Request $request)
    {

        $page = array_key_exists('page', $request->all()) ? intval($request->all()['page']) : 1;
        $per_page = 20;
        $countryCode = request()->header('CF-IPCountry');
        $brands = Brand::with('countries')->where(function ($query) use ($countryCode){
            if(!empty($countryCode)){
                $query->whereHas('countries', function ($q) use ($countryCode) {
                    $q->where('country_iso_2_code', $countryCode);
                });
            }
        })->orderBy('rating', 'desc')->get();


        return Dialogue::send_response(true, '', new LengthAwarePaginator(
            collect($brands)->slice(($page - 1) * $per_page, $per_page)->values(), // Only items for the current page
            count($brands), // Total items
            $per_page, // Items per page
            $page, // Current page
            ['path' => Paginator::resolveCurrentPath()] // Path for pagination links
        ));
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
        $brand = Brand::create($request->all());
        $brand->refresh()->load('countries');
        return Dialogue::send_response(true, '', [$brand], 201);
    }

    public function show($id)
    {
        $brand = Brand::with('countries')->find($id);
        if(!empty($brand))
            return Dialogue::send_response(true, '', [$brand]);
        else
            return Dialogue::send_response(false, __('brand not found'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::with('countries')->find($id);
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

            $brand->update($request->all());
            return Dialogue::send_response(true, '', [$brand]);
        }
        return Dialogue::send_response(false, __('brand not found'));
    }


    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(!empty($brand)) $brand->delete();
        return Dialogue::send_response(true);
    }


    public function assignCountries(Request $request, $id)
    {
        $validator = Validator::make(json_decode(json_encode($request->all()), true),
            [
                'country_ids' => 'required|array',
                'country_ids.*' => 'exists:countries,country_iso_2_code',
            ]
        );
        if ($validator->stopOnFirstFailure()->fails()) {
            return Dialogue::send_response(false, $validator->errors()->first());
        }

        $brand = Brand::find($id);
        if(!empty($brand)){
            $brand->countries()->sync(Country::whereIn('country_iso_2_code', $request->country_ids)->pluck('country_id'));
            $brand->refresh()->load('countries');
            return Dialogue::send_response(true, '', [$brand->refresh()]);
        }
        return Dialogue::send_response(false, __('brand not found'));
    }


    public function addCountries(Request $request, $id)
    {
        $validator = Validator::make(json_decode(json_encode($request->all()), true),
            [
                'country_ids' => 'required|array',
                'country_ids.*' => 'exists:countries,country_iso_2_code',
            ]
        );
        if ($validator->stopOnFirstFailure()->fails()) {
            return Dialogue::send_response(false, $validator->errors()->first());
        }

        $brand = Brand::find($id);
        if(!empty($brand)){
            $brand->countries()->syncWithoutDetaching(Country::whereIn('country_iso_2_code', $request->country_ids)->pluck('country_id'));
            $brand->refresh()->load('countries');
            return Dialogue::send_response(true, '', [$brand->refresh()]);
        }
        return Dialogue::send_response(false, __('brand not found'));
    }


    public function removeCountries(Request $request, $id)
    {
        $validator = Validator::make(json_decode(json_encode($request->all()), true),
            [
                'country_ids' => 'required|array',
                'country_ids.*' => 'exists:countries,country_iso_2_code',
            ]
        );
        if ($validator->stopOnFirstFailure()->fails()) {
            return Dialogue::send_response(false, $validator->errors()->first());
        }

        $brand = Brand::find($id);
        if(!empty($brand)){
            $brand->countries()->detach(Country::whereIn('country_iso_2_code', $request->country_ids)->pluck('country_id'));
            $brand->refresh()->load('countries');
            return Dialogue::send_response(true, '', [$brand->refresh()]);
        }
        return Dialogue::send_response(false, __('brand not found'));
    }
}
