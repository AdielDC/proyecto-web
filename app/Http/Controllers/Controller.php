<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

class Controller extends BaseController
{
    /**
    * @OA\Info(
    *     title="API Documentation",
    *     version="1.0.0",
    *     description="API Documentation for Laravel",
    * )
    */
    use AuthorizesRequests, ValidatesRequests;
}
