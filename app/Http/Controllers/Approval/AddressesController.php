<?php
namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveAddresses;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\AddressRequest;

class AddressesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddressRequest $request)
    {
        app(SaveAddresses::class)->handle($request);

        return back();
    }
}
