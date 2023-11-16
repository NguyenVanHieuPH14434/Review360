@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Thể loại tiêu chí</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Thể loại tiêu chí</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Danh sách</h5>
            <div class="box-action">
                <a href="{{route('categoryCriteria.create')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                   <i class="ti ti-plus"></i> Tạo mới
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive rounded-2">
                <table class="table table-striped text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">No</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Nhóm tiêu chí</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Mô tả</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Trạng thái</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Ngày tạo</h6>
                        </th>
                        <th class="th-action">
                            <h6 class="fs-4 fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($listCategoryCriteria) > 0)
                            <?php $i = 1;?>
                            @foreach($listCategoryCriteria as $categoryCriteria)
                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal fs-4">{{$categoryCriteria->title}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal fs-4">{{$categoryCriteria->description}}</p>
                                    </td>
                                    <td>
                                        <span class="mb-1 badge rounded-pill {{config('constants.badge-status')[$categoryCriteria->status]}} fw-semibold fs-2">{{config('constants.status')[$categoryCriteria->status]}}</span>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal fs-4">{{$categoryCriteria->created_at->format('d/m/Y')}}</p>
                                    </td>
                                    <td class="td-action">
                                        <a href="{{route('categoryCriteria.edit',$categoryCriteria->id)}}"><i class="ti ti-pencil btn-update"></i></a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#al-danger-alert"><i class="ti ti-trash btn-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="box-pagination">
                    {{ $listCategoryCriteria->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-alert level="danger" message="Please try again."/>
@endsection
