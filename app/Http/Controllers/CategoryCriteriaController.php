<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCriteriaRequest;
use App\Models\CategoryCriteria;
use App\Services\CategoryCriteria\CategoryCriteriaService;
use Illuminate\Http\Request;

class CategoryCriteriaController extends Controller
{
    protected CategoryCriteriaService $categoryCriteriaService;
    public function __construct(CategoryCriteriaService $categoryCriteriaService)
    {
        $this->categoryCriteriaService = $categoryCriteriaService;
    }

    public function index() {
        $data['listCategoryCriteria'] = $this->categoryCriteriaService->listCategoryCriteria();
        return view("categoryCriteria.index", $data);
    }

    public function create()
    {
        $data['categoryCriteria'] = new CategoryCriteria();
        return view('categoryCriteria.create', $data);
    }

    public function store(CategoryCriteriaRequest $request)
    {
        $data = $this->categoryCriteriaService->createCategoryCriteria($request->all());
        return redirect()->route("categoryCriteria.show", $data->id)->with('success', 'Create success!');
    }

    public function edit($id)
    {
        $data['categoryCriteria'] = $this->categoryCriteriaService->findCategoryCriteria($id);
        return view('categoryCriteria.update', $data);
    }

    public function update($id, CategoryCriteriaRequest $request)
    {
        $this->categoryCriteriaService->updateCategoryCriteria($id, $request->all());
        return redirect()->route("categoryCriteria.show", [$id])->with('success', 'Update success!');
    }

    public function show($id)
    {
        $data['categoryCriteria'] = $this->categoryCriteriaService->findCategoryCriteria($id);
        return view('categoryCriteria.view',  $data);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        //todo: xóa tiêu chí thuộc nhóm

        if ($request->flag_del == 'delete') {
            $this->categoryCriteriaService->deleteCategoryCriteria($id);
        }

        return json_encode(['code' => 200]);
    }
}
