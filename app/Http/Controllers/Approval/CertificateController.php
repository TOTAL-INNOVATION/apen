<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveCertificate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;

class CertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(CertificateRequest $request): RedirectResponse
    {
        app(SaveCertificate::class)->handle($request);

        return back()->with(
            'success',
            'messages.approval.certificate.created',
        );
    }

    public function destroy(string $id): RedirectResponse
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->delete();

            return back()->with(
                'success',
                'messages.approval.certificate.deleted'
            );
        }

        return back();
    }
}
