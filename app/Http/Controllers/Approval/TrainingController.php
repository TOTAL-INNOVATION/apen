<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\TrainingRequest;
use App\Models\Training;
use Illuminate\Http\RedirectResponse;

class TrainingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(TrainingRequest $request): RedirectResponse
    {
        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;

        $approval->trainings()->create(
            $request->validated(),
        );

        return back()
        ->with(
            'success',
            'messages.approval.training.created'
        );
    }

    public function destroy(string $id): RedirectResponse
    {
        $training = Training::find($id);
        if ($training)
            $training->delete();
        
        return back()
        ->with(
            'success',
            'messages.approval.training.deleted'
        );
    }
}
