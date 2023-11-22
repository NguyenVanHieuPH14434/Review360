<?php

namespace App\Services\User;

use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserServiceImplement extends Service implements UserService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function listUser($searchData, $limit)
    {
      return $this->userRepository->listUser($searchData, $limit);
    }

    public function findUser($id)
    {
      return $this->userRepository->find($id);
    }

    public function creatUser($request)
    {
      $data = $request->all();
      $data['code'] = $this->generateUserCode();
      $data['avatar'] = checkIssetImage($request, [
        'image'=>'avatar',
        'prefixName'=>'',
        'folder'=>'uploads/users',
        'imageOld'=>''
      ]);
      $data['password'] = "password";
      return $this->userRepository->create($data);
    }

    public function generateUserCode()
    {
        $result = $this->userRepository->getLatestUser();
        return generateCode("THOR", $result);
    }

    public function updateUser($id, $request)
    {
      $data = $request->all();
      $currentData = $this->userRepository->find($id);
      $data['avatar'] = checkIssetImage($request, [
        'image'=>'avatar',
        'prefixName'=>'',
        'folder'=>'uploads/users',
        'imageOld'=> $currentData->avatar
      ]);
      return $this->userRepository->update($id, $data);
    }

    public function getAllUser() 
    {
      return $this->userRepository->all();
    }
}
