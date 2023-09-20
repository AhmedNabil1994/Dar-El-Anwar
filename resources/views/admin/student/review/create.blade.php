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
                                <h2>{{ trans('تقييم') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('اضافة تقييم') }}</li>
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
                            <h2>{{ trans('اضافة تقييم') }}</h2>
                        </div>
                        <form action="{{route('review.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="h2 text-dark">اسم الطفل : <span class="text-danger">{{$student->name}}</span></h2>
                                    <input type="hidden" name="student_id" value="{{$student->id}}">
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn buttons-style">حفظ</button>
                                    <a href="{{route('student.edit',$student->id)}}" class="btn btn-danger">الغاء</a>
                                </div>
                            </div>
                            <div class="row m-5">
                                <div class="box-height-100 d-flex justify-content-center align-items-center p-5 bg-info col-md-1">
                                    <h2>اضطرابات النطق</h2>
                                  </div>
                                <div class="col-md-9" >
                                    <input type="hidden" name="question[]" value="speech_disorders">
                                    <textarea style="height: 100px" class="form-control" name="speech_disorders">{{get_review($student,'speech_disorders')}}</textarea>
                                </div>
                            </div>
                            <div class="row m-5 align-items-end">
                                <div class="box-height-100 d-flex justify-content-center align-items-center p-5 bg-info col-md-1">
                                    <h2>للملتحقين بقسم القرءان</h2>
                                </div>

                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">قران حفظا</label>
                                    <input type="hidden" name="question[]" value="quran_memorization">
                                    <textarea style="height: 100px" class="form-control" name="quran_memorization">{{get_review($student,'quran_memorization')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">تلاوة معرفيا</label>
                                    <textarea style="height: 100px" class="form-control" name="cognitive_recitation">{{get_review($student,'cognitive_recitation')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">تلاوة تطبيقيا</label>
                                    <input type="hidden" name="question[]" value="practical_recitation">
                                    <textarea style="height: 100px" class="form-control" name="practical_recitation">{{get_review($student,'practical_recitation')}}<</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">علوم الشريعة</label>
                                    <input type="hidden" name="question[]" value="sharia_sciences">
                                    <textarea style="height: 100px" class="form-control" name="sharia_sciences">{{get_review($student,'sharia_sciences')}}<</textarea>
                                </div>
                            </div>
                            <div class="row m-5 align-items-end">
                                <div class="box-height-100 d-flex justify-content-center align-items-center p-5 bg-info col-md-1">
                                        <h2>للملتحقين بمواد تعليمية اخري</h2>
                                </div>
                                @foreach(\App\Models\Subject::all() as $subject)
                                    <div class="col-md-2" >
                                        <label class="form-label d-flex justify-content-center">{{$subject->name}}</label>
                                        <input type="hidden" name="question[]" value="{{str_replace(' ', '-', strtolower($subject->name))}}">
                                        <textarea style="height: 100px" class="form-control" name="{{str_replace(' ', '-', strtolower($subject->name))}}">{{get_review($student,str_replace(' ', '-', strtolower($subject->name)))}}</textarea>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row m-5 align-items-center">

                                <div class="box-height-100 d-flex justify-content-center align-items-center p-5 bg-info col-md-1">
                                    <h2>للملتحقين بقسم تعليم التلاوة</h2>
                                </div>
                                <div class="row col-md-9">

                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">تمكين الحروف</label>
                                    <input type="hidden" name="question[]" value="enable_letters">
                                    <textarea style="height: 100px" class="form-control" name="enable_letters">{{get_review($student,'enable_letters')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">قراءة بنية الكلمات</label>
                                    <input type="hidden" name="question[]" value="Reading_the_structure_of_words">
                                    <textarea style="height: 100px" class="form-control" name="Reading_the_structure_of_words">{{get_review($student,'Reading_the_structure_of_words')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">تجميع الجمل</label>
                                    <input type="hidden" name="question[]" value="assembly_of_sentences">
                                    <textarea style="height: 100px" class="form-control" name="assembly_of_sentences">{{get_review($student,'assembly_of_sentences')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">املاء</label>
                                    <input type="hidden" name="question[]" value="filling">
                                    <textarea style="height: 100px" class="form-control" name="filling">{{get_review($student,'filling')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">القرءان بدون تشكيل</label>
                                    <input type="hidden" name="question[]" value="quran_diacritics">
                                    <textarea style="height: 100px" class="form-control" name="quran_diacritics">{{get_review($student,'quran_diacritics')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">القرءان في المصحف</label>
                                    <input type="hidden" name="question[]" value="quran_in_quran">
                                    <textarea style="height: 100px" class="form-control" name="quran_in_quran">{{get_review($student,'quran_in_quran')}}</textarea>
                                </div>
                                <div class="col-md-2" >
                                    <label class="form-label d-flex justify-content-center">اداب اسلامية</label>
                                    <input type="hidden" name="question[]" value="islamic_etiquette">
                                    <textarea style="height: 100px" class="form-control" name="islamic_etiquette">{{get_review($student,'islamic_etiquette')}}</textarea>
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
    <script>
        const checkbox = document.getElementById('selectBox');
        const selectInput1 = document.getElementById('class');
        const selectInput2 = document.getElementById('appointment');

        checkbox.addEventListener('change', function() {
            if (checkbox.value === 'option1') {
                selectInput1.style.display = 'block';
                selectInput2.style.display = 'none';

            }
            else if (checkbox.value === 'option2') {
                selectInput1.style.display = 'none';
                selectInput2.style.display = 'block';
            }
            else {
                selectInput1.style.display = 'none';
                selectInput2.style.display = 'none';
            }
        });
    </script>
    <script>
        const status = document.getElementById('status');
        const joining_date = document.getElementById('joining_date');

        status.addEventListener('change', function() {
            if (status.value === '1') {
                const today = new Date();

// Get the year, month, and day
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                const day = String(today.getDate()).padStart(2, '0');

// Format the date as "YYYY-MM-DD" (or any other format you prefer)
                const formattedDate = `${year}-${month}-${day}`;

// Set the value of the 'joining_date' input field to today's date
                joining_date.value = formattedDate;
            } else {
            }
        });
    </script>
    <script>
        const add_user = document.getElementById('add_user');
        const add_user_component = document.getElementById('add_user_component');
        const parent_info = document.getElementById;
        count = 0;
        add_user.addEventListener('click', function() {
            if(count < 3 )
                $('#parent_info').append(`<h2>{{trans("website.parents_information")}}</h2>
<br>
<div class="col-md-6">
    <div class="input__group mb-25">
        <label>{{trans('website.guardian_Relationship')}} <span class="text-danger">*</span></label>
        <select name="guardian_relationship[]"  class="form-control" >
            <option value="1">{{trans('website.father')}}</option>
            <option value="2">{{trans('website.mother')}}</option>
            <option value="3">{{trans('اخري')}}</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-25">
            <label for="guardian_name">{{trans("website.guardian_name")}}</label>
            <input type="text" name="guardian_name[]" value="" placeholder='{{trans("website.guardian_name")}}' class="form-control">
            @if ($errors->has('guardian_name'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="guardian_phone_number">{{trans("website.guardian_phone_number")}}</label>
            <input type="text" name="guardian_phone_number[]" value="" placeholder="{{trans('website.guardian_phone_number')}}" class="form-control">
            @if ($errors->has('guardian_phone_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_phone_number') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="guardian_whatsapp_number">{{trans("website.guardian_whatsapp_number")}}</label>
            <input type="text" name="guardian_whatsapp_number[]" value="" placeholder='{{trans("website.guardian_whatsapp_number")}}' class="form-control">
            @if ($errors->has('guardian_whatsapp_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_whatsapp_number') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="id_number">{{trans("website.id_number")}}</label>
            <input type="number" name="id_number[]" value="" placeholder="{{trans('website.id_number')}}" class="form-control"/>
            @if ($errors->has('id_number'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('id_number') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-25">
                    <label for="profession">{{trans('website.profession')}}</label>
            <input type="text" name="profession[]" value="" placeholder="{{trans('website.profession')}}" class="form-control"/>
            @if ($errors->has('profession'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('profession') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="input__group mb-25">
                    <label>{{trans('website.guardian_email')}} <span class="text-danger">*</span></label>
            <input type="email" name="guardian_email[]" value="{{old('guardian_email')}}" placeholder="{{ trans('website.guardian_email') }}" class="form-control" />
            @if ($errors->has('guardian_email'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_email') }}</span>
            @endif
                </div>
            </div>
            <div class="col-md-6">
                <label>{{trans('website.receiving_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="receiving_officer[]" placeholder="{{ trans('website.receiving_officer') }}" class="input__checkbox" />
        @if ($errors->has('receiving_officer'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('receiving_officer') }}</span>
        @endif
                </div>
                <div class="col-md-6">
                    <label>{{trans('website.followup_officer')}} <span class="text-danger">* </span></label>
        <input type="checkbox" name="followup_officer[]"  placeholder="{{ trans('website.followup_officer') }}" class="input__checkbox" />
        @if ($errors->has('followup_officer'))
                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('followup_officer') }}</span>
        @endif
                </div>

            </div>

        </div>`);
            count++
        });
    </script>
    <script>
        $('#level_id').on('change', function() {

            $.ajax({
                type: 'GET',
                url: '{{url('/')}}/admin/student/getClasses/' + $(this).val(),
                success: function (data) {
                    $('#classroom').empty()
                    $('#classroom').append(`<option value="">اختر فصل</option>`)
                    data.forEach(function (e){
                        $('#classroom').append(`<option value="${e.id}">${e.name}</option>`)
                    })
                }
            })
        });
    </script>
    <script>
        $('#imageInput').on('change', function(event) {
            const input = event.target;
            const $imagePreview = $('#imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Set the source of the image preview to the selected file
                    $imagePreview.attr('src', e.target.result);
                    // Show the image preview
                    $imagePreview.show();
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Hide the image preview if no file is selected
                $imagePreview.hide();
            }
        });

        $('#imageInput2').on('change', function(event) {
            const input = event.target;
            const $imagePreview = $('#imagePreview2');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Set the source of the image preview to the selected file
                    $imagePreview.attr('src', e.target.result);
                    // Show the image preview
                    $imagePreview.show();
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Hide the image preview if no file is selected
                $imagePreview.hide();
            }
        });

        $('#imageInput3').on('change', function(event) {
            const input = event.target;
            const $imagePreviews = $('#imagePreviews3');
            $imagePreviews.empty(); // Clear previous previews

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    const reader = new FileReader();
                    const file = input.files[i];

                    reader.onload = function(e) {
                        // Create a new image element for each preview
                        const $img = $('<img>').attr('src', e.target.result);
                        $img.css({
                            'max-width': '150px', // Example: set width to 100px
                            'height': '150px', // Example: maintain aspect ratio
                            // Add more styles as needed
                        });
                        $imagePreviews.append($img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
    <script>
        function previewFile(input) {
            "use strict";

            const preview = document.getElementById('upload-img-box-icon');
            const file = input.files[0];
            const reader = new FileReader();

            if(input.files[0].size > 1000000){
                alert("Maximum file size is 1MB!");
            } else {
                reader.onload = function() {
                    console.log(reader)
                    preview.src =  reader.result;
                };
                if(file) {
                    reader.readAsDataURL(file);
                }
                else {
                    preview.src = "";
                }
            }
        }
    </script>

@endpush
