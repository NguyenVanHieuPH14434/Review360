@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Nhóm tiêu chí" action=""/>
@endsection
@section('content')
    <x-notification/>
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
            @csrf
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
                            <h6 class="fs-4 fw-semibold mb-0">Thao tác</h6>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($listCategoryCriteria) && count($listCategoryCriteria) > 0)
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
                                    <a href="{{route('categoryCriteria.show',$categoryCriteria->id)}}"><i class="ti ti-eye btn-update"></i></a>
                                    <a href="{{route('categoryCriteria.edit',$categoryCriteria->id)}}"><i class="ti ti-pencil btn-update"></i></a>
                                    <a href="javascript:void(0)" class="delete-obj"><i class="ti ti-trash btn-delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($listCategoryCriteria) && count($listCategoryCriteria) > 0)
                    <div class="box-pagination">
                        {{ $listCategoryCriteria->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-alert level="danger" message="Những tiêu chí thuộc nhóm tiêu chí cũng sẽ bị xóa" :id="$categoryCriteria->id ?? 0"/>
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
                let url = "{{route('categoryCriteria.destroy')}}";
                let data = {
                    id:id, _token:_token, flag_del: flag_del
                };
                deleteData(url, data, flag_del);
            })
        })
    </script>
@endsection
