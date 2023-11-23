<div class="row">
    <div class="col-md-6 mb-3">
        <label for="title" class="form-label">Tiêu chí <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title">
        @error('title')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
        <label for="cat_criteria" class="form-label">Nhóm tiêu chí <span class="text-danger">*</span></label>
        <select class="form-select customSelect @error('cat_criteria') is-invalid @enderror" name="cat_criteria" id="cat_criteria">
            <option value="">Chọn nhóm tiêu chí</option>
            @foreach($listCategoryCriteria as $key => $categoryCriteria)
                <option value="{{$key}}" {{old('cat_criteria') == $key ?? "selected"}}>{{$categoryCriteria}}</option>
            @endforeach
        </select>
        @error('status')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label for="cat_criteria" class="form-label">Loại tiêu chí <span class="text-danger">*</span></label>
        <select class="form-select customSelect @error('type_criteria') is-invalid @enderror" name="type_criteria" id="type_criteria">
            <option value="">Chọn loại tiêu chí</option>
            @foreach(config('constants.type_criteria') as $key => $type_criteria)
                <option value="{{$key}}" {{old('type_criteria') == $key ?? "selected"}}>{{$type_criteria}}</option>
            @endforeach
        </select>
        @error('type_criteria')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label for="job_title" class="form-label">Chức danh <span class="text-danger">*</span></label>
        <select class="form-select hasSelect2 customSelect @error('job_title') is-invalid @enderror" name="job_titles[]" multiple id="job_title" aria-placeholder="Chọn chức danh">
            @foreach($jobTitles as $k => $jobTitle)
                <option value="{{$k}}">{{$jobTitle}}</option>
            @endforeach
        </select>
        @error('job_title')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="department" class="form-label">Áp dụng riêng cho level</label>
        <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="levels[]" multiple id="selectLevel" aria-placeholder="Chọn level">
            @foreach(config('constants.level') as $key => $level)
                <option value="{{$key}}">{{$level}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="department" class="form-label">Áp dụng riêng cho phòng ban</label>
        <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="departments[]" multiple id="selectDepartment" aria-placeholder="Chọn phòng ban">
            <option value="">Chọn phòng ban áp dụng</option>
            @foreach($departments as $k => $department)
                <option value="{{$k}}">{{$department}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="department" class="form-label">Áp dụng riêng cho nhân viên</label>
        <select class="form-select hasSelect2 customSelect @error('status') is-invalid @enderror" name="users[]" multiple id="selectUser" aria-placeholder="Chọn nhân viên">
            <option value="">Chọn nhân viên áp dụng</option>
            @foreach($users as $k => $user)
                <option value="{{$k}}">{{$user}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="1">{{ old('description') }}</textarea>
    </div>

    <div class="col-md-4 mb-3">
        <label for="criterion_level" class="form-label">Cấp độ mục tiêu <span class="text-danger">*</span></label>
        <select class="form-select @error('criterion_level') is-invalid @enderror" name="criterion_level" id="criterion_level">
            <option value="">Chọn cấp độ mục tiêu</option>
            @foreach(config('constants.criterion_level') as $key => $criterion_level)
                <option value="{{$key}}" {{old('criterion_level') == $key ?? "selected"}}>{{$criterion_level}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
            <option value="">Chọn trạng thái</option>
            <option value="1">Hoạt động</option>
            <option value="2">Không hoạt động</option>
        </select>
    </div>

</div>
<h5 style="margin: 15px 0 25px 0;">Khung thiết lập mức đánh giá</h5>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Mức 1</label>
    <div class="col-md-10">
        <textarea class="form-control" name="points[1]" id="description" cols="30" rows="2">{{ old('description') }}</textarea>
    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Mức 2</label>
    <div class="col-md-10">
        <textarea class="form-control" name="points[2]" id="description" cols="30" rows="2">{{ old('description') }}</textarea>
    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Mức 3</label>
    <div class="col-md-10">
        <textarea class="form-control" name="points[3]" id="description" cols="30" rows="2">{{ old('description') }}</textarea>
    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Mức 4</label>
    <div class="col-md-10">
        <textarea class="form-control" name="points[4]" id="description" cols="30" rows="2">{{ old('description') }}</textarea>
    </div>
</div>
<div class="mb-3 row">
    <label for="example-text-input" class="col-md-2 col-form-label">Mức 5</label>
    <div class="col-md-10">
        <textarea class="form-control" name="points[5]" id="description" cols="30" rows="2">{{ old('description') }}</textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary rounded-pill px-4 waves-effect waves-light">
    <div class="d-flex align-items-center">
        <i class="ti ti-send me-2 fs-4"></i>
        Lưu lại
    </div>
</button>
@section('script')
    <script>
        $('#selectDepartment,#selectLevel,#selectUser').select2( {
            theme: 'bootstrap-5',
        });
    </script>
@endsection
