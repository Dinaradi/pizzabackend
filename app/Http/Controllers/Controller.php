<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Your API",
 *     version="1.0.0",
 *     description="Description of your API",
 *     @OA\Contact(
 *         email="contact@example.com",
 *         name="Contact Name"
 *     ),
 *     @OA\License(
 *         name="License Name",
 *         url="https://www.example.com/license"
 *     )
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
