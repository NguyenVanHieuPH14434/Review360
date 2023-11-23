<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Http\Requests\MemberRequest;
use App\Http\Traits\CommonTrait;
use App\Imports\ImportUser;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Exceptions\ConcernConflictException;

class UserController extends Controller
{
    use CommonTrait;
    private UserService $userService;
    private $roles = [
        "1" => "Admin",
        "2" => "Divsion",
        "3" => "Quản lý",
        "4" => "Nhân viên" 
    ];
    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['listUser'] = $this->userService->listUser([], null);
        $data['users'] = $this->listUsers();
        $data['listJobTitle'] = $this->listJobTitles();
        $data['listDepartment'] = $this->listDepartments();
        return view("user.index", $data);
    }

    public function search(Request $request) {
        $req = array_filter($request->query(), function($val) {
            return $val !== null;
        });
        if (empty($req)) {
            return redirect()->route("user.list");
        }
        $data['listUser'] = $this->userService->listUser($req, null);
        $data['users'] = $this->listUsers();
        $data['listJobTitle'] = $this->listJobTitles();
        $data['listDepartment'] = $this->listDepartments();
        return view("user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listUser'] = $this->listUsers();
        $data['listJobTitle'] = $this->listJobTitles();
        $data['listDepartment'] = $this->listDepartments();
        $data['roles'] = $this->roles;
        $data['levels'] = Config::get('constants.level');
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        $user = $this->userService->creatUser($request);
        return redirect()->route("user.show", [$user['id']])->with('success', 'Create success!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['user'] = $this->userService->findUser($id);
        $data['roles'] = $this->roles;
        return view('user.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['user'] = $this->userService->findUser($id);
        $data['listUser'] = $this->listUsers();
        $data['listJobTitle'] = $this->listJobTitles();
        $data['listDepartment'] = $this->listDepartments();
        $data['roles'] = $this->roles;
         $data['levels'] = Config::get('constants.level');
        return view('user.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, $id)
    {
        $user = $this->userService->updateUser($id, $request);
        return redirect()->route('user.show', [$id]);
    }

    public function importView()
    {
        return view('user.import');
    }

    public function import(ImportRequest $request)
    {
        try {
           $users = new ImportUser($this->userService, $this->roles);
           $users->import($request->file('file'));
            if($users->getErrorRows()) {
                return redirect()->back()->with('error', $users->getErrorRows()['message'] . "Error at line: " .$users->getErrorRows()['row'][0]);
            }
           return redirect()->route("user.list")->with('success', 'Import success!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->with('import_error', $failures);
        }catch (ConcernConflictException $e) {
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra trong quá trình import: ' . $e->getMessage());
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra trong quá trình import: ' . $e->getMessage());
        }
    }
}
