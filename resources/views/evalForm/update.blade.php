@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Mẫu đánh giá" action="Cập nhật"/>
@endsection
@section('styles')
    {{-- <style>
          .drag-handle {
            cursor: move;
            cursor: grab;
        }
    </style> --}}
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
@endsection
@section('content')
    <div class="card">
        <x-card-title title="Cập nhật" />
        <form class="card-body" action="{{ route('evalForm.update', $evalForm->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="table-responsive-xl">
                <div style="width: 100%; min-width: 960px;">
                    <div class="bg-primary text-center py-2">
                        <h3 class="text-white fw-bolder">Đánh giá</h3>
                    </div>
                    <div class="d-flex">
                        <div class="border fs-3 py-2 px-2" style="width: 29%;">CBNV tự đánh giá: ...</div>
                        <div class="border fs-3 py-2 px-2" style="width: 25%;">Bộ phận: ...</div>
                        <div class="border fs-3 py-2 px-2" style="width: 25%;">Vị trí: ...</div>
                        <div class="border fs-3 py-2 px-2" style="width: 21%;">Ngày đánh giá: ...</div>
                    </div>
                    <div class="d-flex">
                        <div class="border fs-3 py-2 px-2" style="width: 29%;">Quản lý trực tiếp đánh giá: ...</div>
                        <div class="border fs-3 py-2 px-2" style="width: 25%;">Bộ phận: ...</div>
                        <div class="border fs-3 py-2 px-2" style="width: 25%;">Vị trí: ...</div>
                        <div class="border fs-3 py-2 px-2" style="width: 21%;">Ngày đánh giá: ...</div>
                    </div>
                    <div class="d-flex">
                        <div class="border d-flex align-items-center text-center px-2 py-2" style="width: 4%;">STT</div>
                        <div class="border d-flex align-items-center text-center px-2 py-2" style="width: 12.5%;">Tiêu chí đánh giá</div>
                        @foreach ([1=>1, 2=>2, 3=>3, 4=>4, 5=>5] as $item)
                            <div class="border fs-3 d-flex align-items-center justify-content-center px-2 py-2" style="width: 12.5%;">{{ $item }}</div>
                        @endforeach
                        <div class="border text-wrap d-flex align-items-center text-center px-2 py-2 fs-3" style="width: 7%;">Tỷ trọng</div>
                        <div class="border text-wrap d-flex align-items-center text-center px-2 py-2 fs-3" style="width: 7%;">NV tự đánh giá</div>
                        <div class="border text-wrap d-flex align-items-center text-center px-2 py-2 fs-3" style="width: 7%;">QL trực tiếp đánh giá</div>
                    </div>
                    <div class="row nested-sortable">
                        @foreach ($catCriterias as $index => $criteria) 
                            @php
                                $romanNumeral = Config::get('constants.romanNumerals')[$index - 1]; 
                            @endphp
                            <div>
                                <div class="d-flex">
                                    <input type="hidden" name="catCriteria[]" value="{{$criteria->id}}">
                                    <label class="border my-0 py-2 px-2 text-bg-primary" style="width: 79%;" for="">{{$romanNumeral}}- {{ $criteria->title }}</label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning criteriaCount{{$criteria->id}}" style="width: 7%;" for="">0</label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning" style="width: 7%;" for="">0</label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning" style="width: 7%;" for="">0</label>
                                </div>
                                <div class="nested-sortable">
                                    @php $loopIndex = 1; @endphp
                                    @foreach ($evaluationCriterias as $evaltionCriteria)
                                        @if ($evaltionCriteria->cat_criteria == $criteria->id)
                                            <div class="d-flex 1">
                                                <label class="border d-flex align-items-center justify-content-center px-2 py-2 my-0 text-center" style="width: 4%;">{{ $loopIndex }}</label>
                                                <label class="border d-flex align-items-center px-2 py-2 my-0 text-wrap fs-3" style="width: 12.5%;">{{ $evaltionCriteria->title }}</label>
                                                @foreach ($evaltionCriteria->criteriaPoint as $criteriaPoint)
                                                    <label class="border d-flex align-items-center justify-content-center px-2 py-2 my-0 text-wrap fs-3" style="width: 12.5%;">{{ $criteriaPoint->description }}</label>
                                                @endforeach
                                                <input type="hidden" name="criteriaId[]" value="{{$evaltionCriteria->id}}">
                                                <input type="hidden" name="catPosition[]" value="{{$criteria->id}}">
                                                <style>
                                                    input:focus-visible {
                                                        border: 1px solid #333 !important;
                                                        border-top: none !important;
                                                        border-left: none !important;
                                                        outline: 1px solid #333 !important;
                                                        border-radius: 3px;
                                                    }
                                                </style>
                                                <input type="text" class="border px-2 text-center weighting{{$criteria->id}}" 
                                                    onchange="changeData({{$criteria->id}})" name="weighting[]" value="{{old('weighting') ?? $evaltionCriteria->pivot->weighting}}"
                                                    style="width: 7%;">
                                                <label class="px-2 text-center border my-0" style="width: 7%;"></label>
                                                <label class="px-2 text-center border my-0" style="width: 7%;"></label>
                                            </div>
                                            @php $loopIndex++; @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex">
                        <label class="border border-bottom-0 my-0 px-2 py-2" style="width: 66.5%"></label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 12.5%;">Điểm trung bình</label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;" id="dtb">0%</label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;">0</label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;">0</label>
                    </div>
                    <div class="d-flex">
                        <label class="border border-top-0 border-bottom-0 my-0 px-2 py-2" style="width: 66.5%"></label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 12.5%;">Xếp loại</label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;"></label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;"></label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;"></label>
                    </div>
                    <div class="d-flex">
                        <label class="border border-top-0 my-0 px-2 py-2" style="width: 66.5%"></label>
                        <label class="border my-0 px-2 py-2 text-center text-bg-danger" style="width: 19.5%;">Trung bình cộng</label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;"></label>
                        <label class="border my-0 px-2 py-2 text-center" style="width: 7%;"></label>
                    </div>
                    <div class="d-flex">
                        <label class="border my-0 py-2 px-2 text-center col-6 text-bg-warning">
                            Nhân viên tự đánh giá
                        </label>
                        <label class="border my-0 py-2 px-2 text-center col-6 text-bg-warning">
                            QL trực tiếp đánh giá
                        </label>
                    </div>
                    <div>
                        @php
                            $index = count($catCriterias) ?? 0;
                        @endphp
                        @foreach (Config::get('constants.other') as $item)
                           <div class="d-flex">
                                @foreach ($item as $it)
                                    @php
                                        $romanNumeral = Config::get('constants.romanNumerals')[$index]; 
                                    @endphp
                                    <label class="border my-0 px-2 py-2 col-6 text-start text-bg-primary">
                                        {{$romanNumeral}}- {{$it}}
                                    </label>
                                    @php
                                        $index++;
                                    @endphp
                                @endforeach
                           </div>
                           <div class="d-flex">
                                <div class="col-6 border my-0" style="height: 80px"></div>
                                <div class="col-6 border my-0" style="height: 80px"></div>
                           </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill mt-3 px-4 waves-effect waves-light">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i>
                    Lưu lại
                </div>
            </button>
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
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Thiết lập Sortable cho toàn bộ danh sách
            var groups = document.querySelectorAll('.sortable-list');

            groups.forEach(function(group) {
                new Sortable(group, {
                    group: {
                        name: 'shared',
                        put: false
                        
                    },
                });
            });
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var nestedSortables = document.querySelectorAll('.nested-sortable');
                for (var i = 0; i <  nestedSortables.length; i++) {
                    new Sortable(nestedSortables[i], {
                        // group: 'nested',
                        animation: 150,
                        fallbackOnBody: false,
                        swapThreshold: 0.65
                    });
                }
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
          // Get the sortable list
          const sortableList = document.getElementById('sortable-list');
      
          // Initialize SortableJS
          const sortable = new Sortable(sortableList, {
            onMove(evt, originalEvent) {
              // Get the dragged item
              const draggedItem = evt.dragged;
      
              // Get the target item
              const targetItem = evt.related;
      
              // If either the dragged item or the target item has class 'no-sort', prevent moving
              if (draggedItem.classList.contains('no-sort') || targetItem.classList.contains('no-sort')) {
                return false;
              }
      
              return true;
            },
          });
        });
      </script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
          // Get the sortable list
          const sortableList = document.getElementById('sortable-list');
      
          // Initialize SortableJS
          const sortable = new Sortable(sortableList, {
            filter: '.no-sort', // Specify the class that should not be sortable
            onStart(evt) {
              // Prevent sorting if the item does not have the required class
              if (!evt.from.classList.contains('sortable-list')) {
                sortable.option("disabled", true);
              }
            },
            onEnd(evt) {
              // Enable sorting after the drag-and-drop operation
              sortable.option("disabled", false);
            },
          });
        });
      </script> --}}
    <script>
        function changeData(group){
            event.preventDefault();
            let total = 0;
            $('input.weighting'+group).each(function() {
                total += parseFloat($(this).val());
            });
            $('.criteriaCount'+group).text(isNaN(total) ? '0%' : total + '%');
            let dtb = 0;
            $('input[class*="weighting"]').each(function() {
                dtb += parseFloat($(this).val());
            });
            $('#dtb').text(isNaN(dtb) ? '0%' : dtb+ '%');
        }
    </script>
@endsection