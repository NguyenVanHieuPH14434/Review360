@extends('layouts.master')
<?php use Carbon\Carbon;?>
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Kỳ đánh giá</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Kỳ đánh giá</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <x-notification/>
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Danh sách</h5>
            <div class="box-action">
                <a href="{{route('assessmentPeriod.create')}}" class="btn mb-1 waves-effect waves-light btn-primary">
                   <i class="ti ti-plus"></i> Tạo mới
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            @csrf
            <div class="table-responsive rounded-2">
                    <table class="table table-striped text-nowrap customize-table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Kỳ đánh giá</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Loại đánh giá</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Ngày bắt đầu</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Ngày kết thúc</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Trạng thái</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Ngày tạo</h6>
                            </th>
                            <th class="th-action">
                                <h6 class="fs-4 fw-semibold mb-0">Thao tác</h6>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($listAssessmentPeriod) && count($listAssessmentPeriod) > 0)
                           <?php $i = 1;?>
                               @foreach($listAssessmentPeriod as $assessmentPeriod)
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">{{$assessmentPeriod->title}}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">{{config('constants.type_eval')[$assessmentPeriod->type_eval]}}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">{{Carbon::createFromFormat('Y-m-d',$assessmentPeriod->start_date)->format('d/m/Y')}}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">{{Carbon::createFromFormat('Y-m-d',$assessmentPeriod->end_date)->format('d/m/Y')}}</p>
                                        </td>
                                        <td>
                                            <span class="mb-1 badge rounded-pill {{config('constants.badge-status')[$assessmentPeriod->status]}} fw-semibold fs-2">{{config('constants.status')[$assessmentPeriod->status]}}</span>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-normal fs-4">{{$assessmentPeriod->created_at->format('d/m/Y')}}</p>
                                        </td>
                                        <td class="td-action">
                                            <a href="{{route('assessmentPeriod.show',$assessmentPeriod->id)}}"><i class="ti ti-eye btn-update"></i></a>
                                            <a href="{{route('assessmentPeriod.edit',$assessmentPeriod->id)}}"><i class="ti ti-pencil btn-update"></i></a>
                                            <a href="javascript:void(0)" class="delete-obj" data-flag="confirm"><i class="ti ti-trash btn-delete"></i></a>
                                        </td>
                                    </tr>
                               @endforeach
                           @else
                            <tr>
                                <td colspan="10"><i>Không có dữ liệu</i></td>
                            </tr>
                           @endif
                        </tbody>
                    </table>
                @if(isset($listAssessmentPeriod) && count($listAssessmentPeriod) > 0)
                    <div class="box-pagination">
                        {{ $listAssessmentPeriod->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-alert level="danger" message="Những tiêu chí thuộc nhóm tiêu chí cũng sẽ bị xóa" :id="$assessmentPeriod->id ?? 0"/>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click','.delete-obj', function (e){
                e.preventDefault();
                $('#al-danger-alert').modal('show');
                let id = $(this).data('id');
                let _token = $('input[name="_token"]').val();
                let flag_del = $(this).data('flag');
                let url = "{{route('assessmentPeriod.destroy')}}";
                let data = {id:id, _token:_token, flag_del: flag_del};
                deleteData(url, data, flag_del);
            })
        })
    </script>
@endsection
