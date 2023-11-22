<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    public function listUser($searchData, $limit);

    public function findUser($id);

    public function creatUser($request);

    public function generateUserCode();

    public function updateUser($id, $request);

    public function getAllUser();
}
