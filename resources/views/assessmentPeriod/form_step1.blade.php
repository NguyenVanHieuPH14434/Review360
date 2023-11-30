<?php
    use Carbon\Carbon;
?>
<section id="steps-uid-5-p-0" role="tabpanel" aria-labelledby="steps-uid-5-h-0" class="body current" aria-hidden="false"
         style="">
    <div class="row">
        <div class="col-md-9 mb-3">
            <label for="tb-title">Kỳ đánh giá <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="tb-title" name="title"
                   value="{{ old('title') ?? $assessmentPeriod->title }}">
            @error('title')
            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label for="tb-status" class="floating-label">Sao chép từ kỳ đánh giá</label>
            <select class="form-control hasSelect2 customSelect floating-control" name="eval_copy_id" id="tb-status">
                <option value="">Chọn kỳ đánh giá sao chép</option>
                @if(!empty($listApCopy))
                    @foreach($listApCopy as $key => $item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="tb-status" class="floating-label">Loại đánh giá <span class="text-danger">*</span></label>
            @php $type_eval = old('type_eval') ?? $assessmentPeriod->type_eval @endphp
            <select class="form-control customSelect floating-control @error('type_eval') is-invalid @enderror"
                    name="type_eval" id="tb-type_eval">
                <option value="">Chọn loại đánh giá</option>
                <option value="1" {{ $type_eval == 1 ? "selected" : "" }}>Tháng</option>
                <option value="2" {{ $type_eval == 2 ? "selected" : "" }}>Quý</option>
                <option value="3" {{ $type_eval == 3 ? "selected" : "" }}>Năm</option>
                <option value="4" {{ $type_eval == 3 ? "selected" : "" }}>Đánh giá 360</option>
            </select>
            @error('type_eval')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="tb-title">Thời hạn đánh giá<span class="text-danger">*</span></label>
            <div class="input-daterange input-group" id="date-range">

                <input type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                       value="{{ old('start_date') ?? Carbon::createFromFormat('Y-m-d',$assessmentPeriod->start_date)->format('d/m/Y') }}">

                <span class="input-group-text bg-info b-0 text-white">đến</span>

                <input type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                       value="{{ old('end_date') ?? Carbon::createFromFormat('Y-m-d',$assessmentPeriod->end_date)->format('d/m/Y') }}">
            </div>
            @error('start_date')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label for="tb-status" class="floating-label">Trạng thái <span class="text-danger">*</span></label>
            @php $status = old('status') ?? $assessmentPeriod->status @endphp
            <select aria-label="Trạng thái"
                    class="form-control customSelect floating-control @error('status') is-invalid @enderror"
                    name="status" id="tb-status">
                <option value="">Chọn trạng thái</option>
                <option value="1" {{ $status == 1 ? "selected" : "" }}>Hoạt động</option>
                <option value="2" {{ $status == 2 ? "selected" : "" }}>Không hoạt động</option>
            </select>
            @error('status')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-8 col-xl-9" style="margin: 15px 0">
            <div class="form-check form-check-inline">
                <input class="form-check-input primary check-outline outline-primary" type="checkbox"
                       name="setting_point_eval" id="primary-outline-check"
                       value="1" {{ old('setting_result_eval') == 1 || $assessmentPeriod->setting_result_eval == 1 ? "checked" : ''  }}>
                <label class="form-check-label" for="primary-outline-check">Công khai điểm đánh giá</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input primary check-outline outline-primary" type="checkbox"
                       name="setting_result_eval" id="primary2-outline-check"
                       value="1" {{ old('setting_point_eval') == 2 || $assessmentPeriod->setting_point_eval == 2 ? "checked" : ''  }}>
                <label class="form-check-label" for="primary2-outline-check">Công khai kết quả đánh giá</label>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="tb-description">Mô tả</label>
            <textarea class="form-control" rows="12" style="height: 100px" id="tb-description"
                      name="description">{{ old('description') ?? $assessmentPeriod->description }}</textarea>
        </div>
    </div>
</section>
