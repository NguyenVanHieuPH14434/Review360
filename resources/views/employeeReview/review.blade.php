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
                                                <th>STT</th>
                                                <th>Tiêu chí đánh giá</th>
                                                <th class="text-center">Mức 1</th>
                                                <th class="text-center">Mức 2</th>
                                                <th class="text-center">Mức 3</th>
                                                <th class="text-center">Mức 4</th>
                                                <th class="text-center">Mức 5</th>
                                                <th class="text-center">Tỷ trọng</th>
                                                @if(count($review['reviewers']) > 0)
                                                    @foreach($review['reviewers'] as $userReview)
                                                        <th class="text-center" style="width: 150px">
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
                                                                            <td class="text-center">
                                                                                <input type="text" class="score_review_{{$userReview['id']}}" name="empReview[{{$userReview['id']}}][total_cri][{{$r}}]" id="score_review_{{$r}}_{{$userReview['id']}}" value="0">
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
                                                                            <td class="text-center">
                                                                                <div class="default-star-rating cri_{{$r}}_{{$userReview['id']}}" data-cri="{{$k}}" data-user="{{$userReview['id']}}" data-cat="{{$r}}" data-score-name="empReview[{{$userReview['id']}}][score][{{$k}}]">
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
                                                        <td class="text-center">
                                                            <input type="text" name="empReview[{{$userReview['id']}}][total_score_review]" class="total_review total_score_review_{{$userReview['id']}}">
                                                        </td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="2">Xếp loại</td>
                                                @if(count($review['reviewers']) > 0)
                                                    @foreach($review['reviewers'] as $userReview)
                                                        <td class="text-center">
                                                            <input class="rating_{{$userReview['id']}}" name="empReview[{{$userReview['id']}}][rating]" type="text">
                                                        </td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td colspan="3">Trung bình cộng</td>
                                                <td class="text-center">
                                                    <input type="text" class="average_point" name="empReview[{{$userReview['id']}}][average_point]">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" class="average_rating" name="empReview[{{$userReview['id']}}][average_rating]">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                                </div>
                            </div>
                            <div class="actions clearfix">
                                <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                    <i class="ti ti-send me-2 fs-4"></i>Lưu lại
                                </button>
                            </div>
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
                click: function(score, evt) {
                    let cat = $(this).data('cat');
                    let cri = $(this).data('cri');
                    let user = $(this).data('user');
                    let score_review = $('#score_review_'+cat+'_'+user);
                    let table_review = $('.table-review');
                    let total_score = score;
                    let percent = $('.percent_cri_'+cri+' span').html();
                    let total_score_review = 0;
                    let average_point = 0;
                    let number_review = $('#number_review').val();

                    table_review.find('.cri_'+cat+'_'+user+' .starReview').each(function (){
                        total_score = Number(total_score) + Number($(this).val());
                    });

                    total_score =  total_score*percent/100;
                    score_review.val(total_score);

                   // tinh diem trung binh
                   table_review.find('.score_review_'+user).each(function (){
                       total_score_review = Number(total_score_review) + Number($(this).val());
                    });

                   $('.total_score_review_'+user).val(parseFloat(total_score_review).toFixed(2));

                   // xep loai
                    if(total_score_review >= 1 && total_score_review <= 2) {
                        $('.rating_'+user).val('D')
                    }else if(total_score_review > 2 && total_score_review <= 3) {
                        $('.rating_'+user).val('C')
                    }else if(total_score_review > 3 && total_score_review <= 4) {
                        $('.rating_'+user).val('B')
                    }else if(total_score_review > 4 && total_score_review <= 5) {
                        $('.rating_'+user).val('A')
                    }

                    // xep loai trung binh
                    table_review.find('.total_review').each(function (){
                        average_point = Number(average_point) + Number($(this).val());
                    });
                    average_point = parseFloat(average_point / number_review).toFixed(2);

                    if(average_point >= 1 && average_point <= 2) {
                        $('.average_rating').val('D')
                    }else if(average_point > 2 && average_point <= 3) {
                        $('.average_rating').val('C')
                    }else if(average_point > 3 && average_point <= 4) {
                        $('.average_rating').val('B')
                    }else if(average_point > 4 && average_point <= 5) {
                        $('.average_rating').val('A')
                    }

                    $('.average_point').val(average_point)
                }
            });
            $('.table-review').find(".default-star-rating input").addClass('starReview');
        });
    </script>
@endsection

