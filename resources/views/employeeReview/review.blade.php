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
                    <h3 class="fw-semibold">NV0001 - Nguyễn Khánh Duy</h3>
                    <div class="info-user">
                        <span>Phòng ban: Thor division</span>
                        <span>Chức danh: Thor division</span>
                        <span>Level: Thor division</span>
                        <span>Người quản lý: Thor division</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                            <button type="button" class="btn btn-secondary active">
                                <i class="ti ti-printer fs-4"></i> JobRank
                            </button>
                            <button type="button" class="btn btn-secondary">
                                <i class="ti ti-trash fs-4"></i> Performance
                            </button>
                        </div>
                    </div>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu chí đánh giá</th>
                                <th>Mức 1</th>
                                <th>Mức 2</th>
                                <th>Mức 3</th>
                                <th>Mức 4</th>
                                <th>Mức 5</th>
                                <th>Tỷ trọng</th>
                                <th>NV tự đánh giá</th>
                                <th>Nguyễn Văn A</th>
                                <th>Nguyễn Văn B</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7">I - Hiệu quả công việc thực hiện trong kỳ đánh giá</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><p class="mb-0 fw-normal">1</p></td>
                                <td><p class="mb-0 fw-normal">Khối lượng công việc (Effort)</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">< 50%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">50 - 70%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">70 - 85%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">85 - 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">> 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">15%</p></td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user1][tieuchi1]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user2][tieuchi1]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user3][tieuchi1]">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0 fw-normal">1</p></td>
                                <td><p class="mb-0 fw-normal">Khối lượng công việc (Effort)</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">< 50%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">50 - 70%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">70 - 85%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">85 - 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">> 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">15%</p></td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user1][tieuchi2]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user2][tieuchi2]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user3][tieuchi2]">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">I - Hiệu quả công việc thực hiện trong kỳ đánh giá</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><p class="mb-0 fw-normal">1</p></td>
                                <td><p class="mb-0 fw-normal">Khối lượng công việc (Effort)</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">< 50%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">50 - 70%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">70 - 85%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">85 - 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">> 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">15%</p></td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user1][tieuchi1]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user2][tieuchi1]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user3][tieuchi1]">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0 fw-normal">1</p></td>
                                <td><p class="mb-0 fw-normal">Khối lượng công việc (Effort)</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">< 50%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">50 - 70%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">70 - 85%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">85 - 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">> 95%</p></td>
                                <td class="text-center"><p class="mb-0 fw-normal">15%</p></td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user1][tieuchi2]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user2][tieuchi2]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="default-star-rating" data-score-name="score[user3][tieuchi2]">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td>Điểm trung bình</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td>Xếp loại</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td colspan="2">Trung bình cộng</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/libs/jquery-raty-js/lib/jquery.raty.js')}}"></script>
    <script>
        $(function () {
            $.fn.raty.defaults.path = "{{asset('assets/images/rating/')}}";
            $(".default-star-rating").raty();
        });
    </script>
@endsection
