<?php

namespace App\Http\Controllers;


class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('report.index');
    }

    public function danhgiatheocacky()
    {
        return view('report.danh_gia_theo_cac_ky');
    }

}
