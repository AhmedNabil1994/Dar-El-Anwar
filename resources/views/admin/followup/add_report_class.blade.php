@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('website.add_student') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.add_student') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.add_student') }}</h2>
                        </div>
                        <div class="item-title d-flex justify-content-center mx-4">
                           <a href="{{route('admin.followup.index')}}" class="icon"><i class="fa fa-paper-plane mx-3">خطة متابعة المعلمين</i></a>
                           <a href="{{route('admin.followup.quran')}}" class="icon"><i class="fa fa-paper-plane mx-3">متابعة القرآن</i></a>
                           <a href="{{route('admin.followup.create')}}" class="icon"><i class="fa fa-paper-plane mx-3">متابعة حصة دراسية</i></a>
                           <a href="{{route('admin.followup.reading')}}" class="icon"><i class="fa fa-paper-plane mx-3">متابعة القراءة</i></a>
                        </div>
                        <form action="{{route('admin.followup.storeClass')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                            <label>تنظيم جلوس الطلاب وحقائبهم
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="organizing_students_seating_and_bags">
                                            <textarea class="form-text" style="height: 150px" name="organizing_students_seating_and_bags"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>العدل في توزيع المشاركات
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="fairness_in_distributing_shares">
                                            <textarea class="form-text" style="height: 150px" name="fairness_in_distributing_shares"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>جذب انتباه جميع الطلاب
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="attract_the_attention_of_all_students">
                                            <textarea class="form-text" style="height: 150px" name="attract_the_attention_of_all_students"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>مدى حسن إدارة الوقت
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="how_well_you_manage_time">
                                            <textarea class="form-text" style="height: 150px" name="how_well_you_manage_time"></textarea>
                                        </div>
                                        </div>
                                     <div class="col-md-6">
                                         <div class="input__group mb-25">
                                             <label>مدى حسن استخدام الوسائل
                                             <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="how_well_the_means_are_used">
                                             <textarea class="form-text" style="height: 150px" name="how_well_the_means_are_used"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>كيفية إدارة المعلم للتقويم بالمراجعة
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="how_the_teacher_manages_the_evaluation_by_reviewing">
                                            <textarea class="form-text" style="height: 150px" name="how_the_teacher_manages_the_evaluation_by_reviewing"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>ملاحظات عامة حول مستوى الطلاب بالمراجعة
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="general_comments_about_students_level_of_review">
                                            <textarea class="form-text" style="height: 150px" name="general_comments_about_students_level_of_review"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>مدى الجودة في التمهيد للجديد والربط مع الدروس السابقة
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="how_well_it_introduces_the_new_and_links_with_previous_lessons">
                                            <textarea class="form-text" style="height: 150px" name="how_well_it_introduces_the_new_and_links_with_previous_lessons"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>مدى كفاية شرح الدرس الجديد وتنوع الأمثلة
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="the_adequacy_of_explaining_the_new_lesson_and_the_variety_of_examples">
                                            <textarea class="form-text" style="height: 150px" name="the_adequacy_of_explaining_the_new_lesson_and_the_variety_of_examples"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>كيفية تقويم المعلم لمستوى استيعاب الطلاب للدرس الجديد
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="how_the_teacher_evaluates_the_level_of_students_understanding_of_the_new_lesson">
                                            <textarea class="form-text" style="height: 150px" name="how_the_teacher_evaluates_the_level_of_students_understanding_of_the_new_lesson"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>ملاحظات حول استيعاب الطلاب للدرس الجديد
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="feedback_on_students_understanding_of_the_new_lesson">
                                            <textarea class="form-text" style="height: 150px" name="feedback_on_students_understanding_of_the_new_lesson"></textarea>
                                        </div>
                                    </div>
                                 <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label>ملاحظات حول مستوى بعض الطلاب ودفاترهم
                                            <span class="text-danger">*</span></label>
                                            <input type="hidden" name="q[]" value="notes_about_the_level_of_some_students_and_their_notebooks">
                                            <textarea class="form-text" style="height: 150px" name="notes_about_the_level_of_some_students_and_their_notebooks"></textarea>
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
