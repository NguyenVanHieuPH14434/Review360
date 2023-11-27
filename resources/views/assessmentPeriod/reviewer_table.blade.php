<tr class="tr_reviewer" data-id="{{$number_tr +1}}">
    <td>
        <select aria-label="Người đánh giá" class="selectReviewer hasSelect2 form-control customSelect floating-control" name="reviewers[{{$number_tr + 1}}][reviewer_id]">
            @if(!empty($users))
                <option value="">Chọn người đánh giá</option>
                @foreach($users as $key => $user)
                    <option value="{{$key}}">{{$user}}</option>
                @endforeach
            @endif
        </select>
        <div class="error-reviewer" style="display: none">
            <span class="text-danger" role="alert">
                <strong>Chưa chọn người đánh giá</strong>
            </span>
        </div>
    </td>
    <td class="text-center">
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="reviewers[{{$number_tr + 1}}][weighting]" placeholder="Trọng số đánh giá" aria-label="Trọng số đánh giá" aria-describedby="basic-addon1">
            <span class="input-group-text">%</span>
        </div>
    </td>
    <td class="text-center">
        <div class="form-check form-check-inline">
            <input class="form-check-input success" type="radio" name="principal_reviewer" id="success-radio" value="{{$number_tr + 1}}">
        </div>
    </td>
    <td>
        <a href="javascript:void(0)" class="delete-reviewer fs-3" data-flag="confirm">
            <i class="ti ti-trash btn-delete"></i>
        </a>
    </td>
</tr>

<script>
    $('.delete-reviewer').on('click',function (){
        $(this).parent().parent().remove();
    })
</script>
