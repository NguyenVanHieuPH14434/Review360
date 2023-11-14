<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\ImportDepartment;
use App\Services\Department\DepartmentService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    protected DepartmentService $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->has('per_page') ? $request->query("per_page") : null;
        $listDepartment = $this->departmentService->listDepartment([], $perPage);
        return view("department.index", ['listDepartment' => $listDepartment]);
    }

    public function search(Request $request) {
        if (
            $request->has('title') && ! empty($request->query('title')) ||
            $request->has('jobTitleCode') && ! empty($request->query('jobTitleCode'))
        ) {
            $perPage = $request->has('per_page') ? $request->query("per_page") : null;
            $listDepartment = $this->departmentService->listDepartment([], $perPage);
        return view("department.index", ['listDepartment' => $listDepartment]);
        }
       return redirect()->route("department.list");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("department.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = $this->departmentService->createDepartment($request->all());
        return redirect()->route("department.show", [$department['id']])->with('success', 'Create success!');
    }

    /**
     * Display the specified resource.
     */
    public function show($department)
    {
        $department = $this->departmentService->findDepartment($department);
        return view("department.detail", ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($department)
    {
        $department = $this->departmentService->findDepartment($department);
        return view("department.update", ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, $department)
    {
        $this->departmentService->updateDepartment($department, $request->all());
        return redirect()->route("department.show", [$department])->with('success', 'Update success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($department)
    {
        //
    }

    public function importView()
    {
        return view('department.import');
    }

    public function import(ImportRequest $request)
    {
        try {
            Excel::import(new ImportDepartment($this->departmentService), $request->file('file'));
            return redirect()->route("department.list")->with('success', 'Import success!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->with('import_error', $failures);
        }
    }
}
