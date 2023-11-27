<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Traits\CommonTrait;
use App\Imports\ImportDepartment;
use App\Models\Department;
use App\Services\Department\DepartmentService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    use CommonTrait;
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
        $listDepartment = $this->departmentService->listDepartment([], null);
        return view("department.index", ['listDepartment' => $listDepartment]);
    }

    public function search(Request $request) {
        $req = array_filter($request->query(), function($val) {
            return $val !== null;
        });
        if (empty($req)) {
            return redirect()->route("department.list");
        }
        $listDepartment = $this->departmentService->listDepartment($req, null);
        return view("department.index", ['listDepartment' => $listDepartment]);

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
        return redirect()->route("department.list")->with('notice', ['success', 'Tạo mới thành công!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($department)
    {
        $department = $this->findOrFailAndReturn(Department::class, $department);
        return view("department.detail", ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($department)
    {
        $department = $this->findOrFailAndReturn(Department::class, $department);
        return view("department.update", ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, $department)
    {
        $this->departmentService->updateDepartment($department, $request->all());
        return redirect()->route("department.list")->with('notice', ['success', 'Cập nhật thành công!']);
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
            return redirect()->route("department.list")->with('notice', ['success', 'Import thành công!']);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->with('import_error', $failures);
        }
    }
}
