<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvalCriteriaRequest;
use App\Http\Traits\CommonTrait;
use App\Services\EvaluationCriteria\EvaluationCriteriaService;
use Illuminate\Http\Request;

class EvaluationCriteriaController extends Controller
{
    use CommonTrait;
    protected EvaluationCriteriaService $evaluationCriteriaService;

    public function __construct(
        EvaluationCriteriaService $evaluationCriteriaService,
    )
    {
        $this->evaluationCriteriaService = $evaluationCriteriaService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['evalCris'] = $this->evaluationCriteriaService->listEvalCriteria();
        return view("evaluationCriteria.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jobTitles'] = $this->listJobTitles();
        $data['departments'] = $this->listDepartments();
        $data['users'] = $this->listUsers();
        $data['listCategoryCriteria'] = $this->listCateCriteria();
        return view('evaluationCriteria.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvalCriteriaRequest $request)
    {
        $evalCri = $this->evaluationCriteriaService->createEvalCriteria($request->all());
        return redirect()->route("evaluationCriteria.list")->with('success', 'Create success!');
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
