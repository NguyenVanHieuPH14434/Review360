<section id="steps-uid-5-p-0" role="tabpanel" aria-labelledby="steps-uid-5-h-0" class="body current" aria-hidden="false" style="">
    <div class="row">
        <h5 style="margin-bottom:  20px">Tìm kiếm nhân viên</h5>
        <div class="col-md-6 mb-3">
            <label for="tb-status" class="floating-label">Phòng ban</label>
            <select aria-label="Phòng ban" multiple="multiple" class="selectEmp hasSelect2 form-control selectDepartment customSelect floating-control" name="departments[]" id="selectDepartment"  aria-placeholder="Tìm kiếm theo phòng ban">
                @if(!empty($departments))
                    @foreach($departments as $key => $department)
                        <option value="{{$key}}" @if(in_array($key, $departmentSelected)) selected @endif>{{$department}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="tb-status" class="floating-label">Chức danh</label>
            <select aria-label="Chức danh" multiple="multiple" class="selectEmp hasSelect2 form-control selectJobTitle customSelect floating-control" name="jobTitles[]" id="selectJobTitle"  aria-placeholder="Tìm kiếm theo chức danh">
                @if(!empty($jobTitles))
                    @foreach($jobTitles as $key => $jobTitle)
                        <option value="{{$key}}" @if(in_array($key, $jobTitleSelected)) selected @endif>{{$jobTitle}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="department" class="form-label">Level</label>
            <select class="form-select hasSelect2 customSelect selectEmp" name="levels[]" multiple id="selectLevel" aria-placeholder="Tìm kiếm theo level">
                @foreach(config('constants.level') as $key => $level)
                    <option value="{{$key}}"  @if(in_array($key, config('constants.level'))) selected @endif>{{$level}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="department" class="form-label">Nhân viên</label>
            <select class="form-select hasSelect2 selectEmp customSelect" name="users[]" multiple id="selectUser" aria-placeholder="Tìm kiếm theo nhân viên">
                @foreach($users as $k => $user)
                    <option value="{{$k}}" @if(in_array($key, $userSelected)) selected @endif>{{$user}}</option>
                @endforeach
            </select>
        </div>
        <div class="box-eval-form">
            @if(isset($router)  && $router == 'assessmentPeriod.editStep2')
                @include('assessmentPeriod.list_user')
            @endif
        </div>
    </div>
</section>
