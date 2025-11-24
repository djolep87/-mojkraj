<?php

namespace App\Http\Controllers;

use App\Traits\TracksUserActivity;

abstract class Controller
{
    use TracksUserActivity;
}
