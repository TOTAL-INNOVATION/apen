<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function previous(Request $request): RedirectResponse
    {
        /**
         * @var \App\Models\Approval
         */
        $appoval = $request->user()->approval;

        if (!$appoval)
            return back();
        
        
    }
}
