<?php

namespace App\Http\Controllers\Panel;

use App\Actions\DeleteFile;
use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateApprovalStatusRequest;
use App\Http\Resources\ApprovalResource;
use App\Models\Approval;
use App\Services\ApprovalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

const RELATIONS_TO_LOAD = [
    'user',
    'degree',
    'trainings',
    'certificates',
    'society',
    'associates',
    'domains',
    'attachments',
];

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
        $approval = Approval::with(RELATIONS_TO_LOAD)->find($id);
        
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
                'flash',
                [
                    'type' => FlashEnum::ERROR,
                    'message' => __('messages.panel_approval.notFound'),
                ]
            );
        }

        $approval->update(
            $request->validated()
        );

        return back()->with(
            'flash',
            [
                'type' => FlashEnum::SUCCESS,
                'message' => __('messages.panel_approval.updated'),
            ]
        );

    }

    public function destroy(string $id): RedirectResponse
    {
        $approval = Approval::with(RELATIONS_TO_LOAD)->find($id);

        if (!$approval) return back();

        $approval
        ->getFiles()
        ->each(function(string $path) {
            app(DeleteFile::class)
            ->handle($path);
        });

        $approval->delete();

        return back()->with(
            'flash',
            [
                'type' => FlashEnum::SUCCESS,
                'message' => __('messages.panel_approval.delete'),
            ],
        );
    }
}
