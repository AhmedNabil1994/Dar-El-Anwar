@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">

                                <h2>{{ trans('تقرير متابعة القرآن') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('اضافة متابعة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">

                            <h2>{{ trans('تقرير متابعة القرآن') }}</h2>
                        </div>
                        <div class="item-title d-flex justify-content-center mx-4">
                            <a href="{{route('admin.followup.index')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>خطة متابعة المعلمين</a>
                            <a href="{{route('admin.followup.quran')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>متابعة القرآن</a>
                            <a href="{{route('admin.followup.create')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>متابعة حصة دراسية</a>
                            <a href="{{route('admin.followup.reading')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>متابعة القراءة</a>
                        </div>
                        <form action="{{route('admin.followup.storeQuran')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.followup_date')}} <span class="text-danger">*</span></label>
                                        <input type="date" name="followup_date" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.teacher')}} <span class="text-danger">*</span></label>
                                        <select name="teacher_id" class="form-control" />
                                        <option value="" selected>{{trans('website.teacher')}}</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}" >{{ $instructor->employee?->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('teacher_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('teacher_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.time_working')}} <span class="text-danger">*</span></label>
                                        <input type="datetime-local" name="time_working" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.observer')}} <span class="text-danger">*</span></label>
                                        <select name="observer" class="form-control" />
                                        <option value="" selected>{{trans('website.observer')}}</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}" >{{ $instructor->employee?->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('observer'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('observer') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.class_number')}} <span class="text-danger">*</span></label>
                                        <input type="number" name="class_number" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.subject')}} <span class="text-danger">*</span></label>
                                        <select name="subject_id" class="form-control" />
                                        <option value="" selected>{{trans('website.subject')}}</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('subject_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subject_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label>{{trans('website.class')}} <span class="text-danger">*</span></label>
                                        <select name="class_id" class="form-control" />
                                        <option value="" selected>{{trans('website.class')}}</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('class_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('class_id') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <hr>



                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>مدى الالتزام بخطة التسميع وكمية المراجعه المقررة بسجلات الطالب
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="adherence_to_the_recitation_plan_and_the_amount_of_review_scheduled_for_the_students_records">
                                        <textarea class="form-text" style="height: 150px" name="adherence_to_the_recitation_plan_and_the_amount_of_review_scheduled_for_the_students_records"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>مدى الأجادة في الوقوف على أخطاء الطلاب لدى التسميع ومعالجة تلك الأخطاء
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="proficiency_in_identifying_students_errors_during_listening_and_addressing_those_errors">
                                        <textarea class="form-text" style="height: 150px" name="proficiency_in_identifying_students_errors_during_listening_and_addressing_those_errors"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>مدى متابعه انتظام الطلاب وحضورهم في الوقت المحدد ومتابعة الطلاب الغائبين
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="monitoring_students_regularity_and_attendance_on_time_and_following_up_on_absent_students">
                                        <textarea class="form-text" style="height: 150px" name="monitoring_students_regularity_and_attendance_on_time_and_following_up_on_absent_students"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>مدى الالتزام بقصر الاسناد على الطلاب المجازين وفى المستويات المقررة للأجازة
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="commitment_to_restricting_grants_to_students_who_are_on_leave_and_at_the_levels_specified_for_the_leave">
                                        <textarea class="form-text" style="height: 150px" name="commitment_to_restricting_grants_to_students_who_are_on_leave_and_at_the_levels_specified_for_the_leave"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>مدى الاجادة فى بمن لدية ضعف في القراءة والتجويد
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="proficiency_among_those_who_have_weakness_in_reading_and_intonation">
                                        <textarea class="form-text" style="height: 150px" name="proficiency_among_those_who_have_weakness_in_reading_and_intonation"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>مدى وجود محفوظات خلال اكتر من دورتين لكامل المحفوظ
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="which_archives_exist_for_more_than_two_cycles_for_the_entire_archive">
                                        <textarea class="form-text" style="height: 150px" name="which_archives_exist_for_more_than_two_cycles_for_the_entire_archive"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>ملاحظات حول مستوى بعض الطلاب ودفاترهم
                                            <span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="notes_about_the_level_of_some_students_and_their_notebookt">
                                        <textarea class="form-text" style="height: 150px" name="notes_about_the_level_of_some_students_and_their_notebookt"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>تعقيب المعلم<span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="teachers_comment">
                                        <textarea class="form-text" style="height: 150px" name="teachers_comment"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input__group mb-25">
                                        <label>توصيات المشرف<span class="text-danger">*</span></label>
                                        <input type="hidden" name="q[]" value="supervisor_recommendations">
                                        <textarea class="form-text" style="height: 150px"  name="supervisor_recommendations"></textarea>
                                    </div>
                                </div>








                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <button class="btn buttons-style" type="submit">{{ trans('website.save') }}</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script src="{{asset('admin/js/custom/admin-profile.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#government-select').change(function() {
                var governmentId = $(this).val();
                // alert(governmentId);
                $.ajax({
                    // url: '/cities/1',
                    url: '/cities/' + governmentId,
                    type: 'GET',
                    success: function(response) {
                        var options = '';
                        // console.log(response);

                        $.each(response, function(key, value) {
                                options += '<option value="' + value.id + '">' + value.city_name_en + '</option>';
                            }
                        );

                        // alert(response);
                        $('#city-select').html(options);
                    },
                    // error: function(xhr, textStatus, errorThrown) {
                    //     console.log(xhr.responseText);
                    //     alert('Error: ' + xhr.responseText);
                    // }
                });
            });
        });
    </script>
@endpush
