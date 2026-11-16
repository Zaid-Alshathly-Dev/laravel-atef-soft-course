<?php
namespace App\Helpers;

class ApiResponse{
    public static function sendApi( int $code, bool $status, string $message = null, $data=null,$errors=null){
        return response()->json([
            'code' => $code,
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'errors' => $errors
        ],$code);
    }
}
?>