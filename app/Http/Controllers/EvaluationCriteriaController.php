<?php

namespace App\Http\Controllers;

use App\Services\AssessmentSetup\AssessmentSetupService;
use App\Services\CategoryCriteria\CategoryCriteriaService;
use App\Services\Department\DepartmentService;
use App\Services\EvaluationCriteria\EvaluationCriteriaService;
use App\Services\Jobtitle\JobTitleService;
use Illuminate\Http\Request;

class EvaluationCriteriaController extends Controller
{
    protected EvaluationCriteriaService $evaluationCriteriaService;
    protected CategoryCriteriaService $categoryCriteriaService;
    protected JobTitleService $jobtitleService;
    protected AssessmentSetupService $assessmentSetupService;
    protected DepartmentService $departmentService;

    public function __construct(
        EvaluationCriteriaService $evaluationCriteriaService,
        CategoryCriteriaService $categoryCriteriaService,
        JobTitleService $jobtitleService,
        AssessmentSetupService $assessmentSetupService,
        DepartmentService $departmentService,
    )
    {
        $this->evaluationCriteriaService = $evaluationCriteriaService;
        $this->categoryCriteriaService = $categoryCriteriaService;
        $this->jobtitleService = $jobtitleService;
        $this->assessmentSetupService = $assessmentSetupService;
        $this->departmentService = $departmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $perPage = $request->has('per_page') ? $request->query("per_page") : null;
        return view("evaluationCriteria.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listJobTitle = $this->jobtitleService->listJobTitle([], null);
        $listCategoryCriteria =$this->categoryCriteriaService->listCategoryCriteria();
        $listAssessmentSetup = $this->assessmentSetupService->listAssessmentSetup();
        $listDepartments = $this->departmentService->listDepartment([], null);
        return view('evaluationCriteria.create', 
        [
            'listCategoryCriteria' => $listCategoryCriteria,
            'listJobTitle' => $listJobTitle,
            'listAssessmentSetup' => $listAssessmentSetup,
            'listDepartments' => $listDepartments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $evaluationCriteria = $this->evaluationCriteriaService->createEvaluationCriteria($request->all());
        dd($evaluationCriteria);
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
