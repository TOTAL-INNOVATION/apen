<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateApprovalStatusRequest;
use App\Http\Resources\ApprovalResource;
use App\Models\Approval;
use App\Services\ApprovalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class ApprovalController extends Controller
{
    public function __construct(
        public ApprovalService $service,
    ) {}

    public function index(Request $request): Response
    {
        $approval = $this->service->getAll($request);

        return inertia()->render(
            'approvals/index',
            [
                'approvals' => ApprovalResource::collection(
                    $approval
                )
            ]
        );
    }

    public function show(string $id): RedirectResponse|Response
    {
        $approval = Approval::with([
            'user',
            'degree',
            'trainings',
            'certificates',
            'society',
            'associates',
            'domains',
            'attachments',
        ])->find($id);
        
        if (!$approval) {
            return back()
            ->with(
                'error',
                __('messages.panel_approval.notFound')
            );
        }

        return inertia()->render(
            'approvals/show',
            [
                'approval' => new ApprovalResource($approval)
            ]
        );
    }

    public function update(UpdateApprovalStatusRequest $request, string $id): RedirectResponse
    {
        $approval = $this->service->find($id);
        if (!$approval) {
            return back()
            ->with(
                'error',
                __('messages.panel_approval.notFound')
            );
        }

        $approval->update(
            $request->validated()
        );

        return back()->with(
            'success',
            __('messages.panel_approval.updated')
        );

    }

    public function destroy(string $id): RedirectResponse
    {
        $approval = $this->service->find($id);
        if (!$approval) return back();

        $approval->delete();

        return back()->with(
            'success',
            __('messages.panel_approval.delete'),
        );
    }
}
