<?php

namespace App\Services\Dialogue;
class Dialogue
{

    public static function merge_responses($response = null, $request_response = null){

        return response()->json(
            array_merge($request_response??[], $response??[])
        );
    }
    public static function send_response($success = false, $message = null, $data = null, $status_code = 200){

        return response()->json([
            ResponseKeys::SUCCESS->value => $success,
            ResponseKeys::MESSAGE->value => $message ?? '',
            ResponseKeys::DATA->value => $data ?? []
        ], $status_code);
    }
}
