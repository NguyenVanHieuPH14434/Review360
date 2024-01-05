<?php

namespace App\Http\Controllers;

use App\Http\Traits\CommonTrait;
use App\Models\EvalForm;
use App\Services\EvalForm\EvalFormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class EvalFormController extends Controller
{
    use CommonTrait;
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
        $data = $this->getData($id);
        return view('evalForm.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->getData($id);
        return view('evalForm.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evalFrom = $this->evalFormService->updateEvalForm($id, $request->all());
        return redirect()->back()->with('notice', ['success', 'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getData ($id)
    {
        $data['evalForm'] = $this->findOrFailAndReturn(EvalForm::class, $id);
        $data['typeCriteria'] = Config::get('constants.type_criteria')[$data['evalForm']->evaluationCriteria[0]->pivot->type_criteria];
        $data['evaluationCriterias'] = $data['evalForm']->evaluationCriteria->sortBy('pivot.position');
        $data['catCriterias'] = [];
        $dataCatPosition = [];
        foreach ($data['evaluationCriterias'] as $key => $value) {
            $cate = $value->catCriteria->id;
            if(!in_array($cate, array_keys($data['catCriterias']))){
                $data['catCriterias'][$cate] = $value->catCriteria;
                if(! is_null($value->pivot->cat_position)){
                    $dataCatPosition[$key] = $value->pivot->cat_position;
                }
            }
        }
        if(! empty($dataCatPosition) && count($data['catCriterias']) == count($dataCatPosition)){
            $data['catCriterias'] = array_combine(array_values($dataCatPosition), $data['catCriterias']);
            ksort($data['catCriterias']);
        }
        return $data;
    }
}
