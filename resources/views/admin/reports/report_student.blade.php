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
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('تقرير الطالب') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <form method="post" action="{{route('reports.StoreReportStudent')}}">
                  @csrf
              <input type="hidden" name="student_id" value="{{$student->id}}">
            <div class="customers__area bg-style mb-30 form-container row align-items-end">
                <div class="form-group col-md-3 m-2">
                    <label for="date_from">تاريخ من</label>
                    <input type="date"
                           class="form-control"
                           name="date_from"
                           required
                           value="{{\Carbon\Carbon::parse($student->student_report?->date_from)->toDateString()}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="date_to">الي</label>
                    <input type="date"
                           class="form-control"
                           name="date_to"
                           required
                           value="{{\Carbon\Carbon::parse($student->student_report?->date_to)->toDateString()}}"/>
                </div>



            <hr>

            <div class="row">
                <div class="col-md-3 border-3 border-dark border p-5">
                    <img src="{{$student->getImg()}}" class="img-fluid">
                </div>
                <div class="col-md-3 border-3 border-dark border px-5">
                    <label class="col-form-label row">الكود : {{$student->code}}</label>
                    <label class="col-form-label row">الاسم : {{$student->name}}</label>
                    <label class="col-form-label row">القسم : {{$student->dept->first()?->name}}</label>
                    <label class="col-form-label row">الفصل / المجموعة : {{$student->class_room?->name}}</label>
                </div>
                <div class="col-md-3 border-3 border-dark border px-5">
                    <label class="col-form-label row">تاريخ الميلاد : {{\Carbon\Carbon::parse($student->birthdate)->format('Y/m/d')}}</label>
                    <label class="col-form-label row">الجنس : {{$student->gender == 1? 'ذكر' : 'انثي'}}</label>
                    <label class="col-form-label row">تاريخ الالتحاق : {{\Carbon\Carbon::parse($student->joining_date)->format('Y/m/d')}}</label>
                </div>
                <div class="col-md-3 border-3 border-dark border px-5">
                    <label class="col-form-label row">حصور : {{$student_subject_attendance}}%</label>
                    <label class="col-form-label row">غياب : {{$student_subject_absence}}%</label>
                    <label class="col-form-label row">اوارق :
                    <input type="number" class="form-control" style="width:100px" name="paper_precent" value="{{$student->student_report?->paper_precent}}"> %
                    </label>
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
                            @php
                                $student_subject = \App\Models\StudentSubject::where('student_id',$student->id)
                                           ->where('subject_id',$subject->id)->first();
                            @endphp
                        <tr>
                            <input type="hidden" name="subject_id[]" value="{{$subject->id}}">
                            <td>{{$subject->name}}</td>
                            <td><input type="date" class="form-control" name="performance_date[]" value="{{\Carbon\Carbon::parse($student_subject?->review_date)->toDateString()}}"></td>
                            <td><input type="text" class="form-control" name="review_name[]" value="{{$student_subject?->review_name}}"></td>
                            <td><input type="number" class="form-control" name="grade[]" value="{{$student_subject?->grade}}"></td>
                            <td><input type="number" class="form-control" name="precentage[]" value="{{$student_subject?->precentage}}"></td>
                            <td><input type="text" class="form-control" name="notes[]" value="{{$student_subject?->notes}}"></td>
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
                    <textarea class="form-control" name="attitude">{{$student->student_report?->attitude}}</textarea>
                </div>
                <div class="col-6">
                    <div class="row align-items-center">
                        <h2 class="col-3 h2 m-5 border-end px-3 border-dark border-3">الاداء العام</h2>
                        <div class="col-3 ">
                            <input type="text" class="form-control" name="performance" value="{{$student->student_report?->performance}}">
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

                <div class="form-group col-md-3 m-2">
                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                        {{__('website.save')}}
                    </button>
                </div>
            </div>
            </form>
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
