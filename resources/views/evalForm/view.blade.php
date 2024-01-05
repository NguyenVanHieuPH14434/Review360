@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb titlePage="Mẫu đánh giá" action="Chi tiết"/>
@endsection

@section('content')
    <x-notification />
    <div class="card">
        <x-card-title title="Chi tiết">
            <x-slot:update>
                <a href="{{ route('evalForm.edit', $evalForm->id) }}"
                    class="btn mb-1 waves-effect waves-light btn-secondary">
                    <i class="ti ti-edit fs-5"></i>
                    Cập nhật
                </a>
            </x-slot:update> 
        </x-card-title>
        <form id="evalForm" class="card-body">
            <div class="table-responsive-xl">
                <div style="width: 100%; min-width: 960px;">
                    <div class="bg-primary text-center py-2">
                        <h3 class="text-white fw-bolder">Đánh giá {{ $typeCriteria }}</h3>
                    </div>
                    <div class="d-flex">
                        <div class="border d-flex align-items-center text-center px-2 py-2" style="width: 4%;"><b>STT</b></div>
                        <div class="border d-flex align-items-center justify-content-center text-center px-2 py-2" style="width: 12.5%;"><b>Tiêu chí đánh giá</b></div>
                        @foreach ([1=>1, 2=>2, 3=>3, 4=>4, 5=>5] as $item)
                            <div class="border fs-3 d-flex align-items-center justify-content-center px-2 py-2" style="width: 12.5%;"><b>{{ $item }}</b></div>
                        @endforeach
                        <div class="border text-wrap d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3" style="width: 7%;"><b>Tỉ trọng</b></div>
                        <div class="border text-wrap d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3" style="width: 7%;"><b>NV tự đánh giá</b></div>
                        <div class="border text-wrap d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3" style="width: 7%;"><b>QL trực tiếp đánh giá</b></div>
                    </div>
                    <div class="row nested-sortable">
                        @foreach ($catCriterias as $index => $criteria) 
                            @php
                                $romanNumeral = Config::get('constants.romanNumerals')[$index - 1]; 
                            @endphp
                            <div>
                                <div class="d-flex">
                                    <label class="border my-0 py-2 px-2 text-bg-primary" style="width: 79%;" for=""><b>{{$romanNumeral}}- {{ $criteria->title }}</b></label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning" style="width: 7%;" for=""><b class="criteriaCount{{$criteria->id}}">0</b></label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning" style="width: 7%;" for=""><b>0</b></label>
                                    <label class="border my-0 py-2 px-2 text-center text-bg-warning" style="width: 7%;" for=""><b>0</b></label>
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
                                                <input type="text" class="border px-2 text-center weighting{{$criteria->id}} bg-white" 
                                                 readonly disabled name="weighting[]" value="{{$evaltionCriteria->pivot->weighting}}"
                                                    style="width: 7%;">
                                                <label class="border d-flex align-items-center justify-content-center px-2 py-2 my-0 text-wrap fs-3" style="width: 7%;">0</label>
                                                <label class="border d-flex align-items-center justify-content-center px-2 py-2 my-0 text-wrap fs-3" style="width: 7%;">0</label>
                                            </div>
                                            @php $loopIndex++; @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex">
                        <label class="border my-0 border-bottom-0" style="width: 67.7%"></label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 13%;">Điểm trung bình</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                    </div>
                    <div class="d-flex">
                        <label class="border border-top-0 border-bottom-0 my-0" style="width: 67.7%"></label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 13%;">Xếp loại</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                    </div>
                    <div class="d-flex">
                        <label class="border border-top-0 my-0" style="width: 67.7%"></label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0 text-bg-danger" style="width: 20%;">Trung bình cộng</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                        <label for="" class="d-flex align-items-center justify-content-center text-center px-2 py-2 fs-3 border my-0" style="width: 7%;">0</label>
                    </div>
                    <div class="d-flex">
                        <label for="" class="col-6 border my-0 text-bg-warning text-center px-2 py-2 fs-3"><b>Nhân viên tự đánh giá</b></label>
                        <label for="" class="col-6 border my-0 text-bg-warning text-center px-2 py-2 fs-3"><b>QL trực tiếp đánh giá</b></label>
                    </div>
                    @php
                        $index = count($catCriterias) ?? 0;
                    @endphp
                    @foreach (Config::get('constants.other') as $item)
                        <div class="d-flex">
                            @foreach ($item as $it)
                                @php
                                    $romanNumeral = Config::get('constants.romanNumerals')[$index]; 
                                @endphp
                                    <label for="" class="col-6 border my-0 text-bg-primary px-2 py-2 fs-3">{{$romanNumeral}}- {{$it}}</label>
                                @php
                                    $index++;
                                @endphp
                            @endforeach
                        </div>
                       <div class="d-flex">
                            <div class="border col-6 my-0" style="height: 80px"></div>
                            <div class="border col-6 my-0" style="height: 80px"></div>
                       </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-warning back-page fs-3 mt-3">
                <div class="d-flex align-items-center">
                    <i class="ti ti-arrow-left"></i>
                    Quay lại
                </div>
            </button>
        </form>
    </div>
@endsection

@section('script')
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
        });

        function changeData(group){
            let total = 0;
            $('input.weighting'+group).each(function() {
                let value = $(this).val() !== '' ? $(this).val() : 0;
                total += parseFloat(value);
            });
            $('.criteriaCount'+group).text(total + '%');
        }
    </script>
@endsection
