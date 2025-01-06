<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Inertia\Response;

class AdminPageController extends Controller
{
    public function __invoke(): Response
    {
        return inertia()->render(
            'profile/index'
        );
    }
}
