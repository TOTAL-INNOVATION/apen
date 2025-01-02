<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Decree\{StoreRequest, UpdateRequest};
use Illuminate\Http\Request;

class DecreeController extends Controller
{
    /**
     * Display a listing of the decrees.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Store a newly created decree in storage.
     */
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Update the specified decree in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified decree from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
