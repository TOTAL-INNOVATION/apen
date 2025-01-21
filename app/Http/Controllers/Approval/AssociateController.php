<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveAssociate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\AssociateRequest;
use App\Models\Associate;
use Illuminate\Http\RedirectResponse;

class AssociateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(AssociateRequest $request): RedirectResponse
    {
        app(SaveAssociate::class)->handle($request);

        return back()->with(
            'success',
            'messages.approval.associates.created'
        );
    }

    public function destroy(string $id): RedirectResponse
    {
        $associate = Associate::find($id);
        if ($associate) {
            $associate->delete();

            return back()->with(
                'success',
                'messages.approval.associates.deleted'
            );
        }

        return back();
    }
}
