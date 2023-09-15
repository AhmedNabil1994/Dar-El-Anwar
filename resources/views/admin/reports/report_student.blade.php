@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>تقرير الطالب</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('All Pages') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Page') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <form method="GET" action="{{route('reports.reportInvoices')}}"
                  class="customers__area bg-style mb-30 form-container row align-items-end">
                <div class="form-group col-md-3 m-2">
                    <label for="date_from">تاريخ من</label>
                    <input type="date"
                           class="form-control"
                           name="date_from"
                           value="{{request('date_from')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="date_to">الي</label>
                    <input type="date"
                           class="form-control"
                           name="date_to"
                           value="{{request('date_to')}}"/>
                </div>

                <div class="form-group col-md-3 m-2">
                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                        <i class="fa fa-filter"></i>
                    </button>
                </div>

            </form>

            <hr>

            <div class="row">
                <div class="col-md-3 border-3 border-dark border p-5">
                    <img src="{{$student->getImg()}}" class="img-fluid">
                </div>
                <div class="col-md-3 border-3 border-dark border px-5">
                    <label class="col-form-label row">الكود : {{$student->code}}</label>
                    <label class="col-form-label row">الاسم : {{$student->name}}</label>
                    <label class="col-form-label row">القسم : {{$student->dept->name}}</label>
                    <label class="col-form-label row">الفصل / المجموعة : {{$student->class_room?->name}}</label>
                </div>
                <div class="col-md-3 border-3 border-dark border px-5">
                    <label class="col-form-label row">تاريخ الميلاد : {{\Carbon\Carbon::parse($student->birthdate)->format('Y/m/d')}}</label>
                    <label class="col-form-label row">الجنس : {{$student->gender == 1? 'ذكر' : 'انثي'}}</label>
                    <label class="col-form-label row">تاريخ الالتحاق : {{\Carbon\Carbon::parse($student->joining_date)->format('Y/m/d')}}</label>
                </div>
                <div class="col-md-3 border-3 border-dark border px-5">
                    <label class="col-form-label row">حصور : %</label>
                    <label class="col-form-label row">غياب : %</label>
                    <label class="col-form-label row">اوارق : %</label>
                </div>
            </div>


            <div class="row">
                <h2 class="h2 m-5">تقرير المستوي التعليمي</h2>
            </div>

            <div class="row ">
                <div class="col-md-1 border-3 border-dark border pt-4">
                    <h2 class="h3">المواد</h2>
                </div>
                <div class="col-md-9 border-3 border-dark border p-0">
                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead style="background-color: #50bfa5;">
                        <tr>
                            <th></th>
                            <th>تاريخ التقييم</th>
                            <th>التقييم</th>
                            <th>الدرجة</th>
                            <th>النسبة المئوية</th>
                            <th>ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($student->subjects as $subject)
                        <tr>
                            <td>{{$subject->name}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <h2 class="h2 m-5">تقرير المستوي السلوكي</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-6">
                    <textarea class="form-control"></textarea>
                </div>
                <div class="col-6">
                    <div class="row align-items-center">
                        <h2 class="col-3 h2 m-5 border-end px-3 border-dark border-3">الاداء العام</h2>
                        <div class="col-3 ">
                            <p class="h3"> جيد جدا</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row align-content-between justify-content-center">
                <div class="col-3">
                    <h6 class="h6">ختم الدار</h6>
                    <img/>
                </div>
                <div class="col-3">
                    <h6 class="h6">التوقيع</h6>
                    <img/>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on("click", "a.delete", function () {
            const selector = $(this);
            Swal.fire({
                title: 'Sure! You want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: $(this).data("url"),
                        success: function (data) {
                            selector.closest('.removable-item').fadeOut('fast');
                            Swal.fire({
                                title: 'Deleted',
                                html: ' <span style="color:red">Item has been deleted</span> ',
                                timer: 2000,
                                icon: 'success'
                            })
                        }
                    })
                }
            })
        });
    </script>
@endpush
