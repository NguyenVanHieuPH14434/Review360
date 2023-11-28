@if(count($listEmpReview) > 0)
    @foreach($listEmpReview as $key => $emp)
        <tr>
            <td>
                {{$key+1}}
            </td>
            <td>
                <p class="mb-0 fw-normal fs-4">
                    <img src="{{ asset($emp->user->avatar) }}" width="60" height="60" class="img-fluid rounded-circle" alt="{{$emp->user->avatar}}">
                </p>
            </td>
            <td>
                <p class="mb-0 fw-normal fs-4">{{$emp->user->name}}</p>
                <p class="mb-0 fw-normal fs-2">{{$emp->user->code}}</p>
                <p class="mb-0 fw-normal fs-2">{{$emp->user->email}}</p>
            </td>
            <td>
                <p class="mb-0 fw-normal fs-4">{{ $emp->user->getDepartment ? $emp->user->getDepartment->title : '' }}</p>
            </td>
            <td>
                <p class="mb-0 fw-normal fs-4">{{ $emp->user->getJobTitle ? $emp->user->getJobTitle->title : '' }}</p>
                <p class="mb-0 fw-normal fs-4">{{$emp->user->level_id != '' ? config('constants.level')[$emp->user->level_id] : ''}}</p>
            </td>
            <td class="td-action">
                sdsdsd
            </td>
            <td class="td-action">
                sdsdsds
            </td>
            <td class="td-action">
                sdsdsdsd
            </td>
            <td class="td-action">
                sdsdsdsd
            </td>
            <td class="td-action">
                sdsdsdsd
            </td>
            <td class="td-action">
                sdsdsdsd
            </td>
            <td class="td-action">
                sdsdsdsd
            </td>
            <td>
                <a href="{{url('employee-reviews/review/id='.$emp->user->id.'&asId='.$asID)}}" target="_blank" class="btn mb-1 waves-effect waves-light btn-primary">Đánh giá</a>
            </td>
        </tr>
    @endforeach
@endif
