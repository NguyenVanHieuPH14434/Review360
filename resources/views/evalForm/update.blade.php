@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Mẫu đánh giá" action="Cập nhật"/>
@endsection
@section('styles')
    <style>
          .drag-handle, .nested-sortable {
            cursor: move;
            cursor: grab;
        }
    </style>
    <style>
        .sortable-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .sortable-item {
            margin: 3px;
            padding: 10px;
            cursor: move;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
    </style>
    <style>
        input:focus-visible {
            border: 1px solid #333 !important;
            border-top: none !important;
            border-left: none !important;
            outline: 1px solid #333 !important;
            border-radius: 3px;
        }
        .highlight {
            background-color: #a0e9a6;
        }
    </style>
@endsection
@section('content')
    <x-notification />
    <div class="card">
        <x-card-title title="Cập nhật">
            <x-slot:view>
                <a href="{{ route('evalForm.show', $evalForm->id) }}" class="btn mb-1 waves-effect waves-light btn-warning">
                    <i class="ti ti-eye"></i> Chi tiết
                </a>
            </x-slot:view>  
        </x-card-title>
        <form id="evalForm" class="card-body" action="{{ route('evalForm.update', $evalForm->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="table-responsive-xl">
                <div style="width: 100%; min-width: 960px;">
                    <div class="bg-primary text-center py-2">
                        <h3 class="text-white fw-bolder">Đánh giá {{ $typeCriteria }}</h3>
                    </div>
                    <div class="d-flex">
                        <div class="border d-flex align-items-center text-center px-2 py-2" style="width: 4%;"><b>STT</b></div>
                        <div class="border d-flex align-items-center justify-content-center px-2 py-2" style="width: 14.9%;"><b>Tiêu chí đánh giá</b></div>
                        @foreach ([1=>1, 2=>2, 3=>3, 4=>4, 5=>5] as $item)
                            <div class="border fs-3 d-flex align-items-center justify-content-center px-2 py-2" style="width: 14.9%;"><b>{{ $item }}</b></div>
                        @endforeach
                        <div class="border text-wrap d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3" style="width: 7%;"><b>Tỉ trọng</b></div>
                    </div>
                    <div class="row nested-sortable">
                        @foreach ($catCriterias as $index => $criteria) 
                            @php
                                $romanNumeral = Config::get('constants.romanNumerals')[$index - 1]; 
                            @endphp
                            <div>
                                <div class="d-flex">
                                    <input type="hidden" name="catCriteria[]" value="{{$criteria->id}}">
                                    <label class="border my-0 py-2 px-2 text-bg-primary" style="width: 93%;" for=""><b>{{$romanNumeral}}- {{ $criteria->title }}</b></label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning" style="width: 7%;" for=""><b class="criteriaCount{{$criteria->id}}">0</b></label>
                                </div>
                                <div class="nested-sortable">
                                    @php $loopIndex = 1; @endphp
                                    @foreach ($evaluationCriterias as $evaltionCriteria)
                                        @if ($evaltionCriteria->cat_criteria == $criteria->id)
                                            <div class="d-flex 1">
                                                <label class="border d-flex align-items-center justify-content-center px-2 py-2 my-0 text-center" style="width: 4%;">{{ $loopIndex }}</label>
                                                <label class="border d-flex align-items-center px-2 py-2 my-0 text-wrap fs-3" style="width: 14.9%;">{{ $evaltionCriteria->title }}</label>
                                                @foreach ($evaltionCriteria->criteriaPoint as $criteriaPoint)
                                                    <label class="border d-flex align-items-center justify-content-center px-2 py-2 my-0 text-wrap fs-3" style="width: 14.9%;">{{ $criteriaPoint->description }}</label>
                                                @endforeach
                                                <input type="hidden" name="criteriaId[]" value="{{$evaltionCriteria->id}}">
                                                <input type="hidden" name="catPosition[]" value="{{$criteria->id}}">
                                                <input type="text" class="border px-2 text-center weighting{{$criteria->id}}" 
                                                 oninput="changeData({{$criteria->id}})"  name="weighting[]" value="{{old('weighting') ?? $evaltionCriteria->pivot->weighting}}"
                                                    style="width: 7%;" oninput="changeData({{$criteria->id}})">
                                            </div>
                                            @php $loopIndex++; @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-start gap-2 mt-3">
                <button class="btn btn-warning back-page">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-arrow-left"></i>
                        Quay lại
                    </div>
                </button>
                <button type="submit" class="btn btn-primary px-4 waves-effect waves-light">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-send me-2"></i>
                        Lưu lại
                    </div>
                </button>
            </div>
        </form>
    </div>
@endsection

{{-- <table id="sortable-table" class="table border text-nowrap customize-table mb-0 align-middle">
    <thead class="fs-3 text-center">
        <tr>
            <th colspan="10" class="text-bg-primary"><h3 class="text-white fw-bolder">Đánh giá</h3></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3" class="border fs-3">CBNV tự đánh giá: ...</td>
            <td colspan="2" class="border fs-3">Bộ phận: ...</td>
            <td colspan="2" class="border fs-3">Vị trí: ...</td>
            <td colspan="3" class="border fs-3">Ngày đánh giá: ...</td>
        </tr>
        <tr>
            <td colspan="3" class="border fs-3">Quản lý trực tiếp đánh giá: ...</td>
            <td colspan="2" class="border fs-3">Bộ phận: ...</td>
            <td colspan="2" class="border fs-3">Vị trí: ...</td>
            <td colspan="3" class="border fs-3">Ngày đánh giá: ...</td>
        </tr>
        <tr>
            <td class="border text-center">STT</td>
            <td class="border">Tiêu chí đánh giá</td>
            @foreach ([1=>1, 2=>2, 3=>3, 4=>4, 5=>5] as $item)
                <td class="border text-center fs-3">{{ $item }}</td>
            @endforeach
            <td class="border text-wrap text-center fs-3" style="width: 8%;">Tỷ trọng</td>
            <td class="border text-wrap text-center fs-3" style="width: 8%;">NV tự đánh giá</td>
            <td class="border text-wrap text-center fs-3" style="width: 8%;">QL trực tiếp đánh giá</td>
        </tr>
        @foreach ($catCriterias as $index => $criteria) 
                @php
                    $romanNumeral = Config::get('constants.romanNumerals')[$index - 1]; 
                @endphp
            <thead>
                <tr>
                    <th colspan="7" class="border text-bg-primary text-wrap fs-3 drag-handle">
                        {{$romanNumeral}}- {{ $criteria->title }}</th>
                    <th class="border criteriaCount{{ $criteria->id }} text-center fs-3">0%</th>
                    <th class="border text-center fs-3"></th>
                    <th class="border text-center fs-3"></th>
                </tr>
            </thead>
            <tbody class="sortable-list group{{$criteria->id}}">    
                @php $loopIndex = 1; @endphp
                @foreach ($evaluationCriterias as $evaltionCriteria)
                    @if ($evaltionCriteria->cat_criteria == $criteria->id)
                        <tr class="sortable-item">
                            <td class="border text-center">{{ $loopIndex }}</td>
                            <td class="border text-wrap fs-3" style="width: 10%;">{{ $evaltionCriteria->title }}</td>
                            @foreach ($evaltionCriteria->criteriaPoint as $criteriaPoint)
                                <td class="border text-wrap fs-3" style="width: 20%;">{{ $criteriaPoint->description }}</td>
                            @endforeach
                            <td class="border">
                                <input type="hidden" name="criteriaId[]" value="{{$evaltionCriteria->id}}">
                                <input type="text" class="form-control px-2 text-center weighting{{$criteria->id}}" 
                                    onchange="changeData({{$criteria->id}})" name="weighting[]" value="{{old('weighting') ?? $evaltionCriteria->pivot->weighting}}">
                                </td>
                            <td class="border"><input type="text" class="form-control px-2 text-center" ></td>
                            <td class="border"><input type="text" class="form-control px-2 text-center"></td> 
                        </tr>
                        @php $loopIndex++; @endphp
                    @endif
                @endforeach
            </tbody>
        @endforeach
        <tr>
            <th rowspan="3" colspan="6"></th>
            <th class="border text-center">Điểm trung bình</th>
            <th class="border text-center" id="dtb">0%</th>
            <th class="border text-center"></th>
            <th class="border text-center"></th>
        </tr>
        <tr>
            <th class="border text-center">Xếp loại</th>
            <th class="border text-center"></th>
            <th class="border text-center"></th>
            <th class="border text-center"></th>
        </tr>
        <tr>
            <th colspan="2" class="border text-center text-bg-danger">Trung bình cộng</th>
            <th class="border text-center"></th>
            <th class="border text-center"></th>
        </tr>
    </tbody>
</table>
<table class="table border text-nowrap customize-table mb-0 align-middle">
    <tr>
        <td colspan="5" class="border text-center col-6 text-bg-warning">
            Nhân viên tự đánh giá
        </td>
        <td colspan="5" class="border text-center col-6 text-bg-warning">
            QL trực tiếp đánh giá
        </td>
    </tr>
    @php
        $index = count($catCriterias) ?? 0;
    @endphp
    @foreach (Config::get('constants.other') as $item)
        <tr>
            @foreach ($item as $it)
                @php
                    $romanNumeral = Config::get('constants.romanNumerals')[$index]; 
                @endphp
                <td colspan="5" class="border text-start text-bg-primary">
                    {{$romanNumeral}}- {{$it}}
                </td>
                @php
                    $index++;
                @endphp
            @endforeach
        </tr>
        <tr>
            <td colspan="5" class="border text-start" style="height: 80px; min-height: 80px"></td>
            <td colspan="5" class="border text-start" style="height: 80px; min-height: 80px"></td>
        </tr>
    @endforeach
</table> --}}

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var nestedSortables = document.querySelectorAll('.nested-sortable');
            for (var i = 0; i < nestedSortables.length; i++) {
                new Sortable(nestedSortables[i], {
                    animation: 150,
                    fallbackOnBody: false,
                    swapThreshold: 0.65,
                    swap: true,
                    swapClass: 'highlight'
                });
            }
        });
    </script>    
    <script>
        $(function(){
            let data = @json($evaluationCriterias);
            let arrayOfObjects = Object.values(data);
            let catCriteria = [];
            arrayOfObjects.forEach(function(elm){
            let group = elm.cat_criteria.id;
                if(! catCriteria.includes(group)){
                    catCriteria.push(group);
                }
            });
            catCriteria.forEach(function(group){
                changeData(group);
            });

            //validation
            $("#evalForm").submit(function (e) {
                e.preventDefault();

                var isValid = true;

                $("[name='weighting[]']").each(function (index, element) {
                    var value = $(element).val();

                    if (value === "") {
                        isValid = false;
                        $('#notification').html(addFlashMessage('danger', `Cột tỉ trọng ${index + 1}: Không được trống!`));
                        return false;
                    }

                    if (!$.isNumeric(value)) {
                        isValid = false;
                        $('#notification').html(addFlashMessage('danger', `Cột tỉ trọng ${index + 1}: Phải là số!`));
                        return false;
                    }
                });
                removeFlashMessage();
                if (isValid) {
                    $("#evalForm").unbind('submit').submit();
                }
            });
            removeFlashMessage();
        });

        function changeData(group){
            let total = 0;
            let totalWeighting = 0;
            $('input.weighting'+group).each(function() {
                let value = $(this).val() !== '' ? $(this).val() : 0;
                total += parseFloat(value);
            });
            $('.criteriaCount'+group).text(total + '%');
            $('input[class*="weighting"]').each(function() {
                let value = $(this).val() !== '' ? $(this).val() : 0;
                totalWeighting += parseFloat(value);
            });
            $("button[type='submit']").prop('disabled', false);
            if(totalWeighting > 100) {
                $("button[type='submit']").prop('disabled', true);
                $('#notification').html(addFlashMessage('danger', 'Tỉ trọng tối đa 100%!'));
            }
            removeFlashMessage();
        }
    </script>
@endsection
