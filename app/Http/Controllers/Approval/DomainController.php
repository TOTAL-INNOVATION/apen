<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveDomain;
use App\Enums\ApprovalFormsEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\DomainRequest;
use App\Http\Requests\Domains\TotalSectorRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function saveTotalSectors(TotalSectorRequest $request): RedirectResponse
    {
        $request->checkIfMaxExceeded();

        $request
        ->getApproval()
        ->update([
            ...$request->validated(),
            'view' => ApprovalFormsEnum::DOMAINS_FIRST,
        ]);

        return back();
    }

    public function saveSector(DomainRequest $request): RedirectResponse
    {
        app(SaveDomain::class)->handle($request);

        return back();
    }
}
