<?php
namespace App\Http\Controllers\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GoToController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;
        

        return back();
    }
}
