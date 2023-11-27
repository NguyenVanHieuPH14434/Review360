<?php

namespace App\Services\AssessmentPeriod;

use App\Models\AssessmentPeriodUser;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use App\Repositories\AssessmentPeriod\AssessmentPeriodRepository;

class AssessmentPeriodServiceImplement extends Service implements AssessmentPeriodService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected AssessmentPeriodRepository $mainRepository;

    public function __construct(AssessmentPeriodRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function listAssessmentPeriod(){
        return $this->mainRepository->allAssessmentPeriod();
    }

    public function findAssessmentPeriod($id): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->mainRepository->find($id);
    }

    public function createAssessmentPeriod($data): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->mainRepository->create($data);
    }

    /**
     * @throws \Exception
     */
    public function updateStep2($id, $data): bool|string
    {
        try {
            DB::beginTransaction();
            isset($data['departments']) ?? $data['departments'] = json_encode($data['departments']);
            isset($data['jobTitles']) ?? $data['jobTitles'] =json_encode($data['jobTitles']);
            isset($data['levels']) ?? $data['levels'] = json_encode($data['levels']);
            $this->mainRepository->update($id, $data);

            if (empty($data['user_eval'])) {
                return 'Lỗi rồi';
            }

            $users = [];
            foreach ($data['user_eval'] as $user) {
                $users[] = ['assessment_id' => $id,'user_id' => $user];
            }

            AssessmentPeriodUser::insert($users);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateStep3($id, $data){

    }

    public function getListUser($data){
        return $this->mainRepository->getListUser($data);
    }

    public function deleteAssessmentPeriod($id)
    {
        return $this->mainRepository->delete($id);
    }

    public function listApCopy(){
        return $this->mainRepository->listAP();
    }
}
