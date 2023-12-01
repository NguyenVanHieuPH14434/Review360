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
                <p class="mb-0 fw-normal">{{ $emp->user->getDepartment ? $emp->user->getDepartment->title : '' }}</p>
            </td>
            <td>
                <p class="mb-0 fw-normal">{{ $emp->user->getJobTitle ? $emp->user->getJobTitle->title : '' }}</p>
                <p class="mb-0 fw-normal">{{$emp->user->level_id != '' ? config('constants.level')[$emp->user->level_id] : ''}}</p>
            </td>
            <td class="text-center">
                {{$emp->total_point_job_rank}}
            </td>
            <td class="text-center">
                {{$emp->rank_job_rank}}
            </td>
            <td class="text-center">
                {{$emp->total_point_performance}}
            </td>
            <td class="text-center">
                {{$emp->rank_performance}}
            </td>
            <td class="text-center">
                <span class="mb-1 badge rounded-pill {{config('constants.badge-status')[$emp->status]}} fw-semibold fs-2">{{config('constants.status_assess')[$emp->status]}}</span>
            </td>
            <td class="text-center">
                {{$emp->calendar_assess}}
            </td>
            <td class="text-center">
                {{$emp->assessment_completion_date}}
            </td>
            <td class="td-action">
                <a href="{{route('employeeReview.showReview',['id' => $emp->user->id,'asId' =>$asID])}}"><i class="ti ti-eye btn-update"></i></a>
                <a href="#"><i class="ti ti-calendar btn-update"></i></a>
                <a href="{{url('employee-reviews/review/id='.$emp->user->id.'&asId='.$asID)}}"><i class="ti ti-chart-bar btn-update"></i></a>
            </td>
        </tr>
    @endforeach
@endif
