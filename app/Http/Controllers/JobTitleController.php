<?php

namespace App\Http\Controllers;

use App\Services\Jobtitle\JobtitleService;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    protected JobtitleService $jobTitleService;
    public function __construct(JobtitleService $jobTitleService)
    {
        $this->jobTitleService = $jobTitleService;
    }

    public function index() {
        $list_job = $this->jobTitleService->listJobTitle();
        dd($list_job);
    }
}
