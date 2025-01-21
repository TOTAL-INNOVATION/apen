<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveAttachment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\AttachmentRequest;
use App\Models\Attachment;
use Illuminate\Http\RedirectResponse;

class AttachmentController extends Controller
{
    public function store(AttachmentRequest $request): RedirectResponse
    {
        app(SaveAttachment::class)->handle($request);

        return back()->with(
            'success',
            'messages.approval.attachments.created'
        );
    }

    public function destroy(string $id): RedirectResponse
    {
        $attachment = Attachment::find($id);
        if ($attachment) {
            $attachment->delete();
            return back()->with(
                'success',
                'messages.approval.attachments.deleted'
            ); 
        }

        return back();
    }
}
