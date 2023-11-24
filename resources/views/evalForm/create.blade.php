@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Tiêu chí đánh giá" action="Tạo mới"/>
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Tạo mới" />
        <form class="card-body" action="{{ route('evaluationCriteria.store') }}" method="POST">
            @csrf
           @include('evaluationCriteria.form')
        </form>
    </div>
@endsection
