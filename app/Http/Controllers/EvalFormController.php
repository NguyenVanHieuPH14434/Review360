<?php

namespace App\Http\Controllers;

use App\Services\EvalForm\EvalFormService;
use Illuminate\Http\Request;

class EvalFormController extends Controller
{
    protected EvalFormService $evalFormService;

    public function __construct(
        EvalFormService $evalFormService,
    )
    {
        $this->evalFormService = $evalFormService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['evalForms'] = $this->evalFormService->listEvalForm();
        return view("evalForm.index", $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
