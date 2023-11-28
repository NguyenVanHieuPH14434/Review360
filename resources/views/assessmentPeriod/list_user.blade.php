<h5>Nhân viên đánh giá</h5>
<table class="table table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Ảnh</th>
        <th>Họ và tên</th>
        <th>Phòng ban</th>
        <th>Chức danh</th>
        <th>Level</th>
        <th>Quản lý trực tiếp</th>
    </tr>
    </thead>
    <tbody>
        @if(count($users) > 0)
            @foreach($users as $key => $user)
                <tr>
                    <td>
                        {{$key+1}}
                    </td>
                    <td>
                        <input type="hidden" name="user_eval[]" value="{{$user->id}}">
                        <p class="mb-0 fw-normal">
                            <img src="{{ asset($user->avatar) }}" width="60" height="60" class="img-fluid rounded-circle" alt="{{$user->avatar}}">
                        </p>
                    </td>
                    <td>
                        <p class="mb-0 fw-normal">{{$user->name}}</p>
                        <p class="mb-0 fw-normal fs-2">{{$user->code}}</p>
                        <p class="mb-0 fw-normal fs-2">{{$user->email}}</p>
                    </td>
                    <td>
                        <p class="mb-0 fw-normal">{{ $user->getDepartment ? $user->getDepartment->title : '' }}</p>
                    </td>
                    <td>
                        <p class="mb-0 fw-normal">{{ $user->getJobTitle ? $user->getJobTitle->title : '' }}</p>
                    </td>
                    <td>
                        <p class="mb-0 fw-normal">{{$user->level_id != '' ? config('constants.level')[$user->level_id] : ''}}</p>
                    </td>
                    <td>
                        <p class="mb-0 fw-normal">{{ $user->getManagement ? $user->getManagement->name : '' }}</p>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">Không có dữ liệu</td>
            </tr>
        @endif
    </tbody>
</table>
