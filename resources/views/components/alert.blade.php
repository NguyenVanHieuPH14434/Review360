<div class="modal fade" id="al-{{ $level }}-alert" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-light-{{ $level }}">
            <div class="modal-body p-4">
                <div class="text-center text-{{ $level }}">
                    @if($level == 'danger')
                        <i class="ti ti-hexagon-letter-x fs-modal"></i>
                    @endif
                    <h4 class="mt-2">Bạn có chắc chắn muốn xóa ?</h4>
                    <p class="mt-3">
                        {{$message}}
                    </p>
                    <button type="button" class="btn btn-danger my-2 delete-obj" data-flag="delete" >
                        Xóa
                    </button>
                    <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
                        Hủy
                    </button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
