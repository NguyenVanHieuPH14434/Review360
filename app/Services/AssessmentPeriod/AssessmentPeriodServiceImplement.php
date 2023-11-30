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

            $listUserOld = AssessmentPeriodUser::query()->where('assessment_id', $id)->pluck('user_id')->toArray();
            $listUserDiff = array_diff($data['user_eval'],$listUserOld);
            $listUserDiff2 = array_diff($listUserOld, $data['user_eval']);

            if(!empty($listUserDiff2)) {
                AssessmentPeriodReviewer::query()
                    ->join('assessment_period_user as apu', 'assessment_period_reviewer.assessment_period_user_id','=','apu.id')
                    ->whereIn('apu.user_id', $listUserDiff2)->delete();

                AssessmentPeriodUser::query()->where('assessment_id', $id)
                    ->whereIn('user_id', $listUserDiff2)->delete();
            }

            isset($data['departments']) ?? $data['departments'] = json_encode($data['departments']);
            isset($data['jobTitles']) ?? $data['jobTitles'] =json_encode($data['jobTitles']);
            isset($data['levels']) ?? $data['levels'] = json_encode($data['levels']);
            $this->mainRepository->update($id, $data);

            $userEval = !empty($listUserDiff) ? $listUserDiff :  [];

            if (!empty($userEval)) {
                $users = [];
                foreach ($userEval as $user) {
                    $users[] = ['assessment_id' => $id,'user_id' => $user];
                }

                AssessmentPeriodUser::insert($users);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateStep3($id, $data){
        try {
            DB::beginTransaction();

            AssessmentPeriodReviewer::query()->where('assessment_period_user_id',$id)->delete();

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

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

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

    public function getEmpReview($id, $asID){
        return $this->mainRepository->getEmpReview($id, $asID);
    }

    public function updateStep01($id, $data)
    {
        return $this->mainRepository->update($id, $data);
    }
}
