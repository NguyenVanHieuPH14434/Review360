@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Mẫu đánh giá"/>
@endsection
@section('content')
<div class="card card-body rounded-2">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Danh sách</h5>
        </div>
        <div class="table-responsive rounded-2">
            <table class="table table-striped text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-3">
            <tr>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">No</h6>
                </th>
                <th>
                    <h6 class="fs-3 fw-semibold mb-0">Phòng ban</h6>
                </th>
                <th>
                    <h6 class="fs-3 fw-semibold mb-0">Chức danh</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Level chức danh</h6>
                </th>
                <th>
                    <h6 class="fs-3 fw-semibold mb-0">User</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Trạng thái</h6>
                </th>
                <th class="text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Ngày tạo</h6>
                </th>
                <th class="th-action text-center">
                    <h6 class="fs-3 fw-semibold mb-0">Action</h6>
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($evalForms) && count($evalForms) > 0)
                    <?php $i = 1;?>
                @foreach($evalForms as $evalForm)
                    <tr>
                        <td class="text-center">
                            {{$i++}}
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-3">{{$evalForm->department != '' ? $evalForm->department->title : ''}}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-3">{{$evalForm->jobTitle->title}}</p>
                        </td>
                        <td>
                            <p class="mb-0 fw-normal fs-3">{{$evalForm->level_id != '' ? config('constants.level')[$evalForm->level_id] : ''}}</p>
                        </td>
                        <td class="text-center">
                            <p class="mb-0 fw-normal fs-3">{{$evalForm->level_id != '' ? config('constants.level')[$evalForm->level_id] : ''}}</p>
                        </td>
                        <td class="text-center">
                            <span class="mb-1 badge rounded-pill {{config('constants.badge-status')[$evalForm->status]}} fw-semibold fs-2">{{config('constants.status')[$evalForm->status]}}</span>
                        </td>
                        <td class="text-center">
                            <p class="mb-0 fw-normal fs-3">{{$evalForm->created_at->format('d/m/Y')}}</p>
                        </td>
                        <td class="td-action text-center">
                            <a href="{{route('categoryCriteria.show',$evalForm->id)}}"><i class="ti ti-eye btn-update"></i></a>
                            <a href="{{route('categoryCriteria.edit',$evalForm->id)}}"><i class="ti ti-pencil btn-update"></i></a>
                            <a href="javascript:void(0)" class="delete-obj" data-flag="confirm" data-id="{{$evalForm->id}}"><i class="ti ti-trash btn-delete"></i></a>
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
