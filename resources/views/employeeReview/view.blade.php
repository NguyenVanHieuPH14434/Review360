@extends('layouts.master')
@section('breadcrumb')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8">Đánh giá nhân viên</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Đánh giá nhân viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <link rel="stylesheet" href="{{asset('assets/libs/jquery-raty-js/lib/jquery.raty.css')}}">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center gap-4 mb-4">
                <div class="position-relative">
                    <div class="border border-2 border-primary rounded-circle">
                        <img src="{{asset('assets/images/profile/user-1.jpg')}}" class="rounded-circle m-1" alt="user1" width="60">
                    </div>
                </div>
                <div>
                    <h3 class="fw-semibold">{{$review['user']->code}} - {{$review['user']->name}}</h3>
                    <div class="info-user">
                        <span>Phòng ban: {{$review['user']->getDepartment->title}}</span>
                        <span>Chức danh: {{$review['user']->getJobTitle->title}}</span>
                        <span>Level: {{$review['user']->level_id != '' ? config('constants.level')[$review['user']->level_id] : ''}}</span>
                        <span>Người quản lý: {{$review['user']->getManagement->name}}</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <form method="post" action="{{route('employeeReview.storeEmpReview')}}">
                            @csrf
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab">
                                        <span><i class="ti ti-home-2 fs-4"></i></span>
                                        <span class="d-none d-md-block ms-2">Performance</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" data-bs-toggle="tab" href="#profile2" role="tab">
                                        <span><i class="ti ti-user fs-4"></i></span>
                                        <span class="d-none d-md-block ms-2">Job Rank</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-3">
                                        <table class="table table-responsive table-bordered table-review">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">STT</th>
                                                <th style="width: 200px">Tiêu chí đánh giá</th>
                                                <th class="text-center">Mức 1</th>
                                                <th class="text-center">Mức 2</th>
                                                <th class="text-center">Mức 3</th>
                                                <th class="text-center">Mức 4</th>
                                                <th class="text-center">Mức 5</th>
                                                <th class="text-center">Tỷ trọng</th>
                                                @if(count($review['reviewers']) > 0)
                                                    @foreach($review['reviewers'] as $userReview)
                                                        <th class="text-center" style="width: 100px">
                                                            <p class="mb-0 fw-normal">{{$userReview['principal_reviewer'] == 2 ? "NV tự đánh giá" : $userReview['name']}}</p>
                                                            <p class="mb-0 fw-normal">{{$userReview['code']}}</p>
                                                            <span class="mb-1 badge rounded-pill font-medium bg-secondary-subtle text-secondary">
                                                                Trọng số:{{$userReview['weighting']}}
                                                            </span>
                                                        </th>
                                                    @endforeach
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($review['dataCri']) > 0)
                                                @if(array_key_exists(1, $review['dataCri']))
                                                    @foreach($review['dataCri'][1] as $r => $item)
                                                        @foreach($item as $k => $cri)
                                                            @if($k == 'cat_title')
                                                                <tr>
                                                                    <td colspan="7">{{$cri}}</td>
                                                                    <td class="percent_cat_{{$r}}"><span>{{(count($item)-1) * 20}}</span>%</td>
                                                                    @if(count($review['reviewers']) > 0)
                                                                        @foreach($review['reviewers'] as $userReview)
                                                                            <?php $results = json_decode($userReview['result'],true);?>
                                                                            <td class="text-center">
                                                                                <input type="text" class="input_score score_review_{{$userReview['id']}}" name="totalPointCri[{{$userReview['id']}}][{{$r}}]" id="score_review_{{$r}}_{{$userReview['id']}}" value="{{$results['performance']['totalPointCri'][$userReview['id']][$r]}}">
                                                                            </td>
                                                                        @endforeach
                                                                    @endif
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td><p class="mb-0 fw-normal">{{$k}}</p></td>
                                                                    <td><p class="mb-0 fw-normal">{{$cri['title']}}</p></td>
                                                                    @foreach($cri['points'] as $point)
                                                                        <td class="text-center">
                                                                            <p class="mb-0 fw-normal">{{$point['description']}}</p>
                                                                        </td>
                                                                    @endforeach
                                                                    <td class="text-center percent_cri_{{$k}}"><span>20</span>%</td>
                                                                    @if(count($review['reviewers']) > 0)
                                                                        @foreach($review['reviewers'] as $userReview)
                                                                            <?php $result_review = json_decode($userReview['result_review'],true);?>
                                                                            <td class="text-center">
                                                                                <div class="default-star-rating cri_{{$r}}_{{$userReview['id']}}" data-cri="{{$k}}" data-user="{{$userReview['id']}}" data-cat="{{$r}}" data-score="{{$result_review[$k]}}" data-score-name="empReview[{{$userReview['id']}}][{{$k}}]">
                                                                                </div>
                                                                            </td>
                                                                        @endforeach
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            @endif
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="2">Điểm trung bình</td>
                                                @if(count($review['reviewers']) > 0)
                                                    @foreach($review['reviewers'] as $userReview)
                                                        <?php $results = json_decode($userReview['result'],true);?>
                                                        <td class="text-center">
                                                            <input type="text" value="{{$results['performance']['scoreAverage'][$userReview['id']]}}" name="scoreAverage[{{$userReview['id']}}]" class="input_score total_review total_score_review_{{$userReview['id']}}">
                                                        </td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="2">Xếp loại</td>
                                                @if(count($review['reviewers']) > 0)
                                                    @foreach($review['reviewers'] as $userReview)
                                                        <?php $results = json_decode($userReview['result'],true);?>
                                                        <td class="text-center">
                                                            <input class="input_score rating_{{$userReview['id']}}" value="{{$results['performance']['rating'][$userReview['id']]}}" name="rating[{{$userReview['id']}}]" type="text">
                                                        </td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="3">Trung bình cộng</td>
                                                <td class="text-center">
                                                    <input type="text" class="input_score average_point" name="averagePointPerformance" value="{{$userReview['total_point_performance']}}">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" class="input_score average_rating" name="averageRatingPerformance" value="{{$userReview['rank_performance']}}">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                                    <table class="table table-responsive table-bordered table-review">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">STT</th>
                                            <th style="width: 200px">Tiêu chí đánh giá</th>
                                            <th class="text-center">Mức 1</th>
                                            <th class="text-center">Mức 2</th>
                                            <th class="text-center">Mức 3</th>
                                            <th class="text-center">Mức 4</th>
                                            <th class="text-center">Mức 5</th>
                                            <th class="text-center">Tỷ trọng</th>
                                            @if(count($review['reviewers']) > 0)
                                                @foreach($review['reviewers'] as $userReview)
                                                    <th class="text-center" style="width: 100px">
                                                        <p class="mb-0 fw-normal">{{$userReview['principal_reviewer'] == 2 ? "NV tự đánh giá" : $userReview['name']}}</p>
                                                        <p class="mb-0 fw-normal">{{$userReview['code']}}</p>
                                                        <span class="mb-1 badge rounded-pill font-medium bg-secondary-subtle text-secondary">
                                                                Trọng số:{{$userReview['weighting']}}
                                                            </span>
                                                    </th>
                                                @endforeach
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($review['dataCri']) > 0)
                                            @if(array_key_exists(2, $review['dataCri']))
                                                @foreach($review['dataCri'][2] as $r => $item)
                                                    @foreach($item as $k => $cri)
                                                        @if($k == 'cat_title')
                                                            <tr>
                                                                <td colspan="7">{{$cri}}</td>
                                                                <td class="percent_cat_{{$r}}"><span>{{(count($item)-1) * 20}}</span>%</td>
                                                                @if(count($review['reviewers']) > 0)
                                                                    @foreach($review['reviewers'] as $userReview)
                                                                            <?php $results = json_decode($userReview['result'],true);?>
                                                                        <td class="text-center">
                                                                            <input type="text" class="input_score score_review_{{$userReview['id']}}" name="totalPointCri[{{$userReview['id']}}][{{$r}}]" id="score_review_{{$r}}_{{$userReview['id']}}" value="{{$results['job_rank']['totalPointCri'][$userReview['id']][$r]}}">
                                                                        </td>
                                                                    @endforeach
                                                                @endif
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td><p class="mb-0 fw-normal">{{$k}}</p></td>
                                                                <td><p class="mb-0 fw-normal">{{$cri['title']}}</p></td>
                                                                @foreach($cri['points'] as $point)
                                                                    <td class="text-center">
                                                                        <p class="mb-0 fw-normal">{{$point['description']}}</p>
                                                                    </td>
                                                                @endforeach
                                                                <td class="text-center percent_cri_{{$k}}"><span>20</span>%</td>
                                                                @if(count($review['reviewers']) > 0)
                                                                    @foreach($review['reviewers'] as $userReview)
                                                                            <?php $result_review = json_decode($userReview['result_job_rank'],true);?>
                                                                        <td class="text-center">
                                                                            <div class="default-star-rating cri_{{$r}}_{{$userReview['id']}}" data-cri="{{$k}}" data-user="{{$userReview['id']}}" data-cat="{{$r}}" data-score="{{$result_review[$k]}}" data-score-name="empReview[{{$userReview['id']}}][{{$k}}]">
                                                                            </div>
                                                                        </td>
                                                                    @endforeach
                                                                @endif
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="2">Điểm trung bình</td>
                                            @if(count($review['reviewers']) > 0)
                                                @foreach($review['reviewers'] as $userReview)
                                                        <?php $results = json_decode($userReview['result'],true);?>
                                                    <td class="text-center">
                                                        <input type="text" value="{{$results['job_rank']['scoreAverage'][$userReview['id']]}}" name="scoreAverage[{{$userReview['id']}}]" class="input_score total_review total_score_review_{{$userReview['id']}}">
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="2">Xếp loại</td>
                                            @if(count($review['reviewers']) > 0)
                                                @foreach($review['reviewers'] as $userReview)
                                                        <?php $results = json_decode($userReview['result'],true);?>
                                                    <td class="text-center">
                                                        <input class="input_score rating_{{$userReview['id']}}" value="{{$results['job_rank']['rating'][$userReview['id']]}}" name="rating[{{$userReview['id']}}]" type="text">
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan="3">Trung bình cộng</td>
                                            <td class="text-center">
                                                <input type="text" class="input_score average_point" name="averagePointPerformance" value="{{$userReview['total_point_job_rank']}}">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" class="input_score average_rating" name="averageRatingPerformance" value="{{$userReview['rank_job_rank']}}">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="assessment_id" value="{{$asID}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="number_review" value="{{count($review['reviewers'])}}">
@endsection
@section('script')
    <script src="{{asset('assets/libs/jquery-raty-js/lib/jquery.raty.js')}}"></script>
    <script>
        $(function (x) {
            $.fn.raty.defaults.path = "{{asset('assets/images/rating/')}}";
            $(".default-star-rating").raty({
                readOnly: true,
            });
            $('.table-review').find(".default-star-rating input").addClass('starReview');
        });
    </script>
@endsection

