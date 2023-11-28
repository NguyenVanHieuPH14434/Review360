<div class="card">
    <div class="card-body">
        <div class="mb-4">
            <h5 class="mb-0">Đánh giá nhân viên</h5>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Họ và tên: {{$userInfo['name']}}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Mã nhân viên: {{$userInfo['code']}}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Email: {{$userInfo['email']}}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Phòng ban: {{$userInfo['department']}}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Chức danh: {{$userInfo['jobTitle']}}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Level: {{$userInfo['level']}}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-3 card-subtitle">Quản lý trực tiếp: {{$userInfo['management']}}</p>
            </div>
        </div>
        <div class="button-group">
            <form class="form-reviewer" method="post">
                @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 40%">Người đánh giá</th>
                        <th>Trọng số</th>
                        <th>Đánh giá chính</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="tb-reviewer">
                    <tr class="tr_reviewer" data-id="1">
                        <td class="td_select_1">
                            <select aria-label="Người đánh giá" data-id="1" class="selectReviewer hasSelect2 form-control customSelect floating-control" name="reviewers[1][reviewer_id]">
                                @if(!empty($users))
                                    <option value="">Chọn người đánh giá</option>
                                    @foreach($users as $key => $user)
                                        <option value="{{$key}}">{{$user}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td class="text-center td_weighting_1">
                            <div class="input-group">
                                <input type="number" class="form-control weightingInput" name="reviewers[1][weighting]" placeholder="Trọng số đánh giá" aria-label="Trọng số đánh giá" aria-describedby="basic-addon1">
                                <span class="input-group-text">%</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input success" type="radio" name="principal_reviewer" id="success-radio" value="1">
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <a href="javascript:void(0)" class="btn mb-1 waves-effect waves-light btn-primary add-more-reviewer">
                <i class="ti ti-plus"></i> Thêm người đánh giá
            </a>
        </div>
    </div>
</div>
<input type="hidden" id="reviewers" value="">
<input type="hidden" id="trongso" value="">
<input type="hidden" id="error_reviewer" value="">
<input type="hidden" id="userID" value="{{$userInfo['user_id']}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
    $( '.hasSelect2' ).select2({
        theme: 'bootstrap-5',
        dropdownParent: $("#reviewerModal")
    });

    $(document).on('change','.selectReviewer', function (){
        let id = $(this).val();
        let idSelect = $(this).data('id');
        if (id !== '') {
            $('.error-reviewer').hide();
        }else{
            $('.error-reviewer').show();
        }

        let dataReviewers = $('#reviewers').val();
        if(dataReviewers === '') {
            dataReviewers = id;
        }else{
            dataReviewers = dataReviewers.split(',');
            if ($.inArray(id, dataReviewers)  === -1) {
                dataReviewers.push(id);
            }else{
                $('.td_select_'+idSelect).find('.error-reviewer').remove();
                let html = '<div class="error-reviewer">';
                html += '<span class="text-danger" role="alert"><strong>Người đánh giá bị trùng</strong>';
                html += '</span></div>';
                $('.td_select_'+idSelect).append(html);
                $(this).val('').trigger('change');
            }
        }
        $('#reviewers').val(dataReviewers.toString());
    })

    $('.add-more-reviewer').on('click',function (e){
        e.preventDefault();
        let _token = $('input[name="_token"]').val();
        let error = true;
        let userID = $('#userID').val();
        $('.tb-reviewer').find('.selectReviewer').each(function (){
            if($(this).val() === ''){
                error = false;
                let idSelect = $(this).data('id');
                $('.td_select_'+idSelect).find('.error-reviewer').remove();
                let html = '<div class="error-reviewer">';
                html += '<span class="text-danger" role="alert"><strong>Chưa chọn người đánh giá</strong>';
                html += '</span></div>';
                $('.td_select_'+idSelect).append(html);
            }
        })

        if (error) {
            let number_tr = $('table .tr_reviewer').last().attr('data-id');
            $.ajax({
                url: "{{route('assessmentPeriod.addReviewer')}}",
                type: "POST",
                dataType: "JSON",
                data: {_token:_token, userid:userID,number_tr:number_tr},
                success: function (response) {
                    $('.tb-reviewer').append(response.html);
                    $( '.hasSelect2' ).select2({
                        theme: 'bootstrap-5',
                        dropdownParent: $("#reviewerModal")
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    })

    $('.btn-reviewer').on('click',function (e) {
        e.preventDefault();
        let error = $('#error_reviewer').val();
        if (error === '') {
            $.ajax({
                url: "{{route('assessmentPeriod.updateStep3', $userInfo['id'])}}",
                type: "POST",
                dataType: "JSON",
                data: $('.form-reviewer').serialize(),
                success: function (response) {
                    $('.modal-reviewer').modal('hide');
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });

</script>
