<?php

namespace App\Http\Controllers\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoToCertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;
        if ($approval->trainings->count()) {
            $approval->update([
                'view' => ApprovalFormsEnum::CERTIFICATES,
            ]);
        }
    }
}
