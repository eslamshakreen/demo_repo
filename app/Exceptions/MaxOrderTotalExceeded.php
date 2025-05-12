<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaxOrderTotalExceeded extends Exception
{
    /**
     * Render the exception as an HTTP response.
     */
    public function render($request)
    {
        return response()->json([
            'status' => 'error',
            'message' => 'إجمالي الطلب تجاوز الحدّ الأقصى 10,000 د.ل',
        ], 422);
    }
}
