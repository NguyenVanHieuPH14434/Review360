<?php

namespace App\Services\EvaluationCriteria;

use App\Models\EvalCriteriaDepartment;
use App\Models\EvalCriteriaJobTitle;
use App\Models\EvalCriteriaLevel;
use App\Models\EvalCriteriaUsers;
use App\Models\EvaluationCriteriaPoint;
use App\Services\EvalForm\EvalFormService;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use App\Repositories\EvaluationCriteria\EvaluationCriteriaRepository;

class EvaluationCriteriaServiceImplement extends Service implements EvaluationCriteriaService{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;
    protected $evalformservice;

    public function __construct(EvaluationCriteriaRepository $mainRepository, EvalFormService $evalformservice)
    {
        $this->mainRepository = $mainRepository;
        $this->evalformservice = $evalformservice;
    }

    public function listEvalCriteria(){
        return $this->mainRepository->allEvalCriteria();
    }

    public function findEvalCriteria($id)
    {
        return $this->mainRepository->find($id);
    }

    public function createEvalCriteria($data): ?\Illuminate\Database\Eloquent\Model
    {
        try {
            DB::beginTransaction();
            $data['criteria_code'] = $this->generateCode();
            $evalCri = $this->mainRepository->create($data);

            if($evalCri->id) {
                $criteria_id = $evalCri->id;
                $job_titles = $levels =  $departments = $users = $points = [];
                if (!empty($data['job_titles'])) {
                    foreach ($data['job_titles'] as $job_title){
                        $job_titles[] = ['criteria_id' => $criteria_id, 'job_title_id' => $job_title];
                    }
                    EvalCriteriaJobTitle::insert($job_titles);
                }

                if (!empty($data['levels'])) {
                    foreach ($data['levels'] as $level){
                        $levels[] = ['criteria_id' => $criteria_id, 'level' => $level];
                    }
                    EvalCriteriaLevel::insert($levels);
                }

                if (!empty($data['departments'])) {
                    foreach ($data['departments'] as $department){
                        $departments[] = ['criteria_id' => $criteria_id, 'department_id' => $department];
                    }

                    EvalCriteriaDepartment::insert($departments);
                }

                if (!empty($data['users'])) {
                    foreach ($data['users'] as $user){
                        $users[] = ['criteria_id' => $criteria_id, 'user_id' => $user];
                    }
                    EvalCriteriaUsers::insert($users);
                }

                if (!empty($data['points'])) {
                    foreach ($data['points'] as $key => $point){
                        $points[] = ['criteria_id' => $criteria_id, 'point' => $key, 'description' => $point];
                    }

                    EvaluationCriteriaPoint::insert($points);
                }

                $dataForm = [
                    'departments' => $data['departments']?? [],
                    'job_titles' => $data['job_titles'] ?? [],
                    'users' => $data['users'] ?? [],
                    'levels' => $data['levels'] ?? [],
                    'criteria_id' => $criteria_id,
                    'type_criteria' => $evalCri->type_criteria
                ];

                $this->evalformservice->createEvalForm($dataForm);
            }

            DB::commit();
            return $evalCri;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateEvalCriteria($id, $data)
    {
        return $this->mainRepository->update($id, $data);
    }

    public function deleteEvalCriteria($id)
    {
        return $this->mainRepository->delete($id);
    }

    public function generateCode()
    {
        $result = $this->mainRepository->getLatestEvalCriteria();
        return generateCode("EC", $result);
    }
}
