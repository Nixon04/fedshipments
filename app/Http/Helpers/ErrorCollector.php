<?php

namespace App\Helpers;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ErrorCollector
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public static function NativeErrorsReturns(\Throwable $e, string $title = 'General Error'):JsonResponse{
        if($e instanceof ConnectException){
            Log::error("[$title] Connection Error", [
                'status' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'title' => $title,
                'message' => 'Error Connection',
                'status' => 'error',
            ]);
        }

        Log::error("[$title] Unexpected Error", [
            'status' => $e->getMessage(),
            'line'   => $e->getLine(),
            'file'   => $e->getFile(),
        ]);

        return response()->json([
            'title'   => $title,
            'message' => 'Oops seems something went wrong',
            'status'  => 'error',
        ], );
        
    }


}
