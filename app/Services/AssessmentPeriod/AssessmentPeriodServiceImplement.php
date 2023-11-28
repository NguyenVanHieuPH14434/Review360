<?php

namespace App\Services\AssessmentPeriod;

use App\Models\AssessmentPeriodReviewer;
use App\Models\AssessmentPeriodUser;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use App\Repositories\AssessmentPeriod\AssessmentPeriodRepository;
use function PHPUnit\Framework\isEmpty;

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
        $dataReviewer = [];
        if(!empty($data['reviewers'])) {
            foreach ($data['reviewers'] as $key => $item) {
                $dataReviewer[] = [
                    'assessment_period_user_id' => $id,
                    'user_id' => $item['reviewer_id'],
                    'peg_person' => $data['principal_reviewer'] == $key ? $item['reviewer_id'] : 0 ,
                    'principal_reviewer' =>  $data['principal_reviewer'] == $key ? 1 : 0,
                    'weighting' => $item['weighting'],
                    'status' => 2
                ];
            }
            AssessmentPeriodReviewer::insert($dataReviewer);
        }

        return true;
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

    public function listAp(){
        return $this->mainRepository->listAP();
    }

    public function listEmpReview($asID) {
        return $this->mainRepository->getListEmpReview($asID);
    }

    public function getEmpReview($id){
        return $this->mainRepository->getEmpReview($id);
    }
}
