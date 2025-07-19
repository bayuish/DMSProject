<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // <<< INI SANGAT PENTING

class Controller extends BaseController // <<< INI SANGAT PENTING
{
    use AuthorizesRequests, ValidatesRequests;
}
