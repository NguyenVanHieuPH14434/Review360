<?php

namespace App\Http\Controllers;

use App\Services\AssessmentPeriod\AssessmentPeriodService;
use Illuminate\Http\Request;

class EmployeeReviewController extends Controller
{
    protected AssessmentPeriodService $assessmentPeriodService;

    public function __construct(AssessmentPeriodService $assessmentPeriodService)
    {
        $this->assessmentPeriodService = $assessmentPeriodService;
    }
    public function index() {
        $data['listAssessmentPeriod'] = $this->assessmentPeriodService->listAp();
        return view("employeeReview.index",$data);
    }

    public function getListEmpReview(Request $request): bool|string
    {
        $data['asID'] = $request->asID;
        $data['listEmpReview'] = $this->assessmentPeriodService->listEmpReview($request->asID);
        return json_encode(['code' => '200','html' => view('employeeReview.list_emp_review', $data)->render()]);
    }

    public function empReview($id, $asID){
        $data['asID'] = $asID;
        $data['review'] = $this->assessmentPeriodService->getEmpReview($id, $asID);
        return view("employeeReview.review",$data);
    }

    public function storeEmpReview(Request $request) {
        dd($request->all());
    }

}
