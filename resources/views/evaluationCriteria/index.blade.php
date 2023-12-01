@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Tiêu chí đánh giá"/>
@endsection
@section('content')
<div class="card card-body rounded-2">
        <div class="row pb-5 border-bottom">
            <div class="d-flex flex-wrap gap-2 justify-content-xxl-between justify-content-start">
                <form class="d-flex flex-wrap gap-2 justify-content-start col-12 col-xxl-9" action="{{ route('jobTitle.search') }}" method="GET">
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="position-relative">
                            <input type="text" class="form-control product-search ps-3" name="title"
                                value="{{ request('title') }}" placeholder="Mã tiêu chí, tên tiêu chí">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl-3">
                        <div class="position-relative">
                            <input type="text" class="form-control product-search ps-3" name="jobTitleCode"
                                value="{{ request('jobTitleCode') }}" placeholder="Loại tiêu chí">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-xl-3">
                        <div class="position-relative">
                            <input type="text" class="form-control product-search ps-3" name="jobTitleCode"
                                value="{{ request('jobTitleCode') }}" placeholder="Chức danh">
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-xl-1 d-flex">
                        <button type="submit" style="min-height: 35px"
                            class="btn btn-info w-100 h-100 d-flex justify-content-center position-relative">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-white"></i>
                        </button>
                    </div>
                </form>
                <div class="d-flex justify-content-xl-end gap-2 col-9 col-md-3 col-xxl-2">
                    <div class="col-auto text-start mt-3 mt-xxl-0">
                        <a href="{{ route('evaluationCriteria.create') }}"
                            class="btn btn-info">
                            <i class="ti ti-plus"></i>
                            Tạo mới
                        </a>
                    </div>
                    <div class="col-auto text-start mt-3 mt-xxl-0">
                        <div class="btn-group">
                            <a href="{{ route('jobTitle.importView') }}" class="btn btn-info dropdown" >
                                <i class="ti ti-download fs-4"></i>
                                Import
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive rounded-2">
            <table class="table table-striped text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-3">
            <tr>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">No</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Mã tiêu chí</h6>
                </th>
                <th>
                    <h6 class="fs-3 fw-semibold mb-0">Tiêu chí</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Nhóm tiêu chí</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Loại tiêu chí</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Cấp độ tiêu chí</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Trạng thái</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Ngày tạo</h6>
                </th>
                <th class="th-action text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Thao tác</h6>
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($evalCris) && count($evalCris) > 0)
                    <?php $i = 1;?>
                @foreach($evalCris as $evalCri)
                    <tr>
                        <td class="text-center">
                            {{$i++}}
                        </td>
                        <td class="text-center">
                            <p class="mb-0 fw-normal fs-3">{{$evalCri->criteria_code}}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-3">{{$evalCri->title}}</p>
                        </td>
                        <td class="text-center">
                            <p class="mb-0 fw-normal fs-3">{{\App\Models\CategoryCriteria::find($evalCri->cat_criteria)->title}}</p>
                        </td>
                        <td class="text-center">
                            <span class="mb-1 badge rounded-pill text-bg-primary fw-semibold fs-2">{{config('constants.type_criteria')[$evalCri->type_criteria]}}</span>
                        </td>
                        <td class="text-center">
                            <span class="mb-1 badge rounded-pill text-bg-primary fw-semibold fs-2">{{config('constants.criterion_level')[$evalCri->criterion_level]}}</span>
                        </td>
                        <td class="text-center">
                            <span class="mb-1 badge rounded-pill {{config('constants.badge-status')[$evalCri->status]}} fw-semibold fs-2">{{config('constants.status')[$evalCri->status]}}</span>
                        </td>
                        <td class="text-center">
                            <p class="mb-0 fw-normal fs-3">{{$evalCri->created_at->format('d/m/Y')}}</p>
                        </td>
                        <td class="td-action text-center">
                            <a href="{{route('categoryCriteria.show',$evalCri->id)}}"><i class="ti ti-eye btn-update"></i></a>
                            <a href="{{route('categoryCriteria.edit',$evalCri->id)}}"><i class="ti ti-pencil btn-update"></i></a>
                            <a href="javascript:void(0)" class="delete-obj" data-flag="confirm" data-id="{{$evalCri->id}}"><i class="ti ti-trash btn-delete"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
            @if(isset($evalCris) && count($evalCris) > 0)
                <div class="box-pagination">
                    {{ $evalCris->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#perPage").on("change", function(e) {
                var selectedValue = $(this).val();

                // Lấy URL hiện tại và thêm hoặc cập nhật tham số 'per_page'
                var currentUrl = window.location.href;
                var url = new URL(currentUrl);
                url.searchParams.set('per_page', selectedValue);

                window.location.href = url.toString();
            });
        });
    </script>
@endsection
