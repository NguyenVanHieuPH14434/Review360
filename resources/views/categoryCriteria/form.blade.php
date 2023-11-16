<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tb-title">Nhóm tiêu chí <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="tb-title" name="title" value="{{ old('title') }}">
        @error('title')
        <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="tb-status" class="floating-label">Trạng thái <span class="text-danger">*</span></label>
        <select aria-label="Trạng thái" class="form-control hasSelect2 customSelect floating-control @error('status') is-invalid @enderror" name="status" id="tb-status">
            <option value="">Chọn trạng thái</option>
            <option value="1">Hoạt động</option>
            <option value="2">Không hoạt động</option>
        </select>
        @error('status')
        <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        <label for="tb-description">Mô tả</label>
        <textarea class="form-control" rows="12" style="height: 100px" id="tb-description" name="description">{{ old('description') }}</textarea>
    </div>

    <div class="col-12">
        <div class="ms-auto mt-3 mt-md-0">
            <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                <div class="d-flex align-items-center">
                    <i class="ti ti-send me-2 fs-4"></i>
                    Lưu lại
                </div>
            </button>
        </div>
    </div>
</div>
