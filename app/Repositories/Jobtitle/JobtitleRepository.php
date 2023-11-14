<?php

namespace App\Repositories\Jobtitle;

use LaravelEasyRepository\Repository;
use Prettus\Repository\Eloquent\BaseRepository;

interface JobtitleRepository extends Repository{

    public function listJobTitle($searchData, $limit);

    public function getLatestJobTitle();
}
