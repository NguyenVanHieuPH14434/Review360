<?php

namespace App\Services\EvalForm;

use App\Models\EvalForm;
use App\Models\EvalFormCriteria;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use App\Repositories\EvalForm\EvalFormRepository;
use function PHPUnit\Framework\isEmpty;

class EvalFormServiceImplement extends Service implements EvalFormService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected EvalFormRepository $mainRepository;

    public function __construct(EvalFormRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    /**
     * @throws \Exception
     */
    public function createEvalForm($data): bool
    {
      if (!empty($data['users']))  {
          foreach ($data['users'] as $user) {
              $this->createEvalForm(['user_id' => $user], $data['criteria_id'],$data['type_criteria']);
          }
      }

      if(!empty($data['departments']) && !empty($data['job_titles'])) {
        foreach ($data['departments'] as $department) {
            $this->actionJobTitle($data['job_titles'], $data['levels'], $data['criteria_id'],$data['type_criteria'],$department);
        }
      }

      if(empty($data['departments']) && !empty($data['job_titles'])){
          $this->actionJobTitle($data['job_titles'], $data['levels'], $data['criteria_id'],$data['type_criteria'],null);
      }

      return true;
    }

    public function createCriInEvalForm($data, $criteria_id, $type_criteria): bool
    {

        $checkEvalForm = EvalForm::where('job_title_id', $data['job_title_id']);
        isset($data['department_id']) && $data['department_id'] != '' ? $checkEvalForm->where('department_id', $data['department_id']) : $checkEvalForm->whereNull('department_id');
        isset($data['level_id']) && $data['level_id'] != '' ? $checkEvalForm->where('level_id', $data['level_id']) : $checkEvalForm->whereNull('level_id');
        isset($data['user_id']) && $data['user_id'] != '' ? $checkEvalForm->where('user_id', $data['user_id']) : $checkEvalForm->whereNull('user_id');
        $checkEvalForm = $checkEvalForm->first();

        $evalForm = $checkEvalForm ?? $this->mainRepository->create($data);

        try {
            DB::beginTransaction();
            $data = ['eval_form_id' => $evalForm->id,'criteria_id' => $criteria_id, 'type_criteria' => $type_criteria];
            EvalFormCriteria::create($data);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }

    /**
     * @throws \Exception
     */
    public function actionJobTitle($job_titles, $levels, $criteria_id, $type_criteria, $department): bool
    {
        foreach ($job_titles as $job_title) {
            if(!empty($levels)){
                foreach ($levels as $level){
                    $array_data = ['job_title_id' => $job_title, 'level_id' => $level,'department_id'=>$department];
                    $this->createCriInEvalForm($array_data, $criteria_id, $type_criteria);
                }
            }else{
                $array_data = ['job_title_id' => $job_title,'department_id'=>$department];
                $this->createCriInEvalForm($array_data, $criteria_id, $type_criteria);
            }
        }

        return true;
    }

    public function listEvalForm()
    {
        return $this->mainRepository->allEvalForm();
    }

    public function updateEvalForm($id, $data)
    {
        // TODO: Implement listEvalForm() method.
    }
}
