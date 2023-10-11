@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="row mb-none-30">
            <div class="col-xl-3 col-lg-5 col-md-5 mb-30">
@if($user->getImg())
                <div class="card b-radius--10 overflow-hidden box--shadow1">
                    <div class="card-body p-0">
                        <div class="p-3 bg--white">
                            <div class="">
                                <img src="{{ asset( $user->getImg())}}" alt="profile-image"
                                     class="b-radius--10 w-100">
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                    <div class="card-body">
                        <h5 class="mb-20 text-muted">@lang('معلومات ولي الامر')</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @lang('الاسم')
                                <span class="font-weight-bold">{{$user->name}}</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-xl-9 col-lg-7 col-md-7 mb-30">

                <div class="row mb-none-30">
                    <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                        <div class="dashboard-w1 bg--1 b-radius--10 box-shadow has--link">
                            <a href="" class="item--link"></a>
                            <div class="icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                        </div>
                    </div><!-- dashboard-w1 end -->

                </div>


                <div class="card mt-50">
                    <div class="card-body">
                        <h5 class="card-title mb-50 border-bottom pb-2">{{$user->name}} @lang('معلومات')</h5>

                        <form id="signup-form" action="{{route('parents.parent_update',$user)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="student_id" class="col-md-6 mt-2 col-form-label text-md-right">{{ __('اسم الطفل') }}</label>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" disabled value="{{$user->student?->name}}">
                                    </div>
                                </div>


                                <div class="col-md-6 mt-2">
                                    <label for="name" class="col-form-label text-md-right">{{ __('الاسم') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6 mt-2">
                                        <input id="father_name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" >
                                    </div>
                                </div>



                                <div class="col-md-6 mt-2">
                                    <label for="relationship" class="col-md-4 col-form-label text-md-right">{{ __('نوع الصلة') }}</label>

                                    <div class="col-md-6 mt-2">
                                        <select name="guardian_relationship" placeholder="{{trans('website.guardian_Relationship')}}" class="form-control" >
                                            <option value="1" @if($user->relationship == 1) selected @endif>{{trans('website.father')}}</option>
                                            <option value="2" @if($user->relationship == 2) selected @endif>{{trans('website.mother')}}</option>
                                            <option value="3" @if($user->relationship == 3) selected @endif >{{trans('اخري')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="father_occupation" class="col-form-label text-md-right">{{ __('المهنة') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6 mt-2">
                                        <input id="profession" type="text" class="form-control"  name="profession" value="{{ old('profession', $user->profession) }}" >
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="national_id" class="col-form-label text-md-right">{{ __('الرقم القومي') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6 mt-2">
                                        <input id="national_id" type="text" class="form-control"  name="national_id" value="{{ old('national_id', $user->national_id) }}" >
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="national_id" class="col-form-label text-md-right">{{ __('الهاتف') }} <span class="required-star">*</span></label>
                                    <div class="col-md-6 mt-2">
                                        <input id="phone_number" type="text" class="form-control"  name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" >
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="whatsapp_number" class="col-md-4 col-form-label text-md-right">{{ __('رقم الواتس اب') }}</label>
                                    <div class="col-md-6 mt-2">
                                        <input id="whatsapp_number" type="text" class="form-control" name="whatsapp_number" value="{{ old('whatsapp_number', $user->whatsapp_number)  }} ">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2 d-flex align-items-center">
                                    <label for="student_pickup_optional" class="col-md-2 col-form-label text-md-right">{{ __('مسئول استلام') }}</label>
                                    <input class="form-check-input" type="checkbox" id="student_pickup_optional" name="student_pickup_optional" {{ $user->student_pickup_optional == 1 ? 'checked' : '' }}>

                                </div>

                                <div class="col-md-6 mt-2 d-flex align-items-center">
                                    <label for="follow_up_person" class="col-md-2 col-form-label text-md-right">{{ __('مسئول متابعة') }}</label>
                                    <input class="form-check-input" type="checkbox" id="follow_up_person" name="follow_up_person" {{ $user->follow_up_person == 1 ? 'checked' : '' }}>

                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="parents_marital_status" class="col-md-4 col-form-label text-md-right">{{ __('website.parents_marital_status') }}</label>
                                    <div class="col-md-6 mt-2">
                                        <select id="parents_marital_status" class="form-control @error('parents_marital_status') is-invalid @enderror" name="parents_marital_status"  autocomplete="parents_marital_status">
                                            <option value="1" {{ old('parents_marital_status' ,$user->studnet?->parents_marital_status) == 1 ? 'selected' : '' }}>{{ __('متزوجين') }}</option>
                                            <option value="2" {{ old('parents_marital_status',$user->studnet?->parents_marital_status) == 2 ? 'selected' : '' }}>{{ __('مطلقين') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('الايميل') }}</label>
                                    <div class="col-md-6 mt-2">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email)  }} ">
                                    </div>
                                </div>


                                <div class="form-group col-md-3 mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة السر') }}
                                        <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input  id="password" type="password" class="form-control"
                                               name="password" autocomplete="new-password" >

                                    </div>
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تأكيد كلمة السر') }}
                                        <span class="required-star">*</span></label>
                                    <div class="col-md-12">
                                        <input id="confirm-password" type="password"
                                               class="form-control"
                                               name="password_confirmation" autocomplete="new-password" >

                                    </div>
                                    <div>
                                        <p id="message"></p>
                                    </div>
                                </div>
                                <h2>{{trans('اﻟﻮﺛﺎﺋﻖ و اﻟﻤﺴﺘﻨﺪات')}}</h2>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group mb-25">

                                            <label for="birth_certificate">{{trans("website.birth_certificate")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="birth_certificate"  id="imageInput" value="" placeholder='{{trans("website.birth_certificate")}}' class="form-control">
                                            <img id="imagePreview" src="{{asset($user->student->get_birth_certificate?->file_name)}}" alt="Image Preview" style="max-width: 150px; height: 200px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group mb-25">
                                            <label for="another_file">{{trans("website.another")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="another_file"  id="imageInput2" value="" placeholder="{{trans('')}}" class="form-control">
                                            <img id="imagePreview2" src="{{asset($user->student->get_another_file?->file_name)}}" alt="Image Preview" style=" max-width: 150px; height: 200px;">
                                            @if ($errors->has('another_file'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group mb-25">
                                            <label for="parents_card_copy">{{trans("website.parentsCardsCopy")}} <i class="fa fa-file"></i></label>
                                            <input type="file" name="parents_card_copy[]"  multiple id="imageInput3" value="" placeholder="Parents Card Copy" class="form-control">
                                            <div id="imagePreviews3" style="display: flex; flex-wrap: wrap;">
                                                @if($user->student->parents_card_copy)
                                                    @foreach(json_decode($user->student->parents_card_copy) as $photo)
                                                        <img src="{{api_asset($photo)}}" style=" max-width: 150px; height: 150px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('تعديل') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Add Sub Balance MODAL --}}
    <div id="previewModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('اضافة او خصم مبلغ في المحفظة')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('student.wallet') }}" class="register" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-md-2 control-label">خصم مبلغ</label>
                                <input class="quakeCheckid" onchange='quakeCheckd()' type="checkbox" data-width="100%" data-height="44px" data-onstyle="-success"
                                       data-offstyle="-danger" data-toggle="toggle" data-on="اضف مبلغ"
                                       data-off="@lang('خصم مبلغ')" name="act">
                            </div>


                            {{--                            <div class="form-group col-md-12">--}}
                            {{--                                <select name="wallet" onchange='quakeCheck()' class="form-control quakeInterestWallet" required>--}}
                            {{--                                    <option value="deposit_wallet">@lang('Deposit Wallet')</option>--}}
                            {{--                                    <option value="interest_wallet">@lang('Interest Wallet')</option>--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}

                            <div class="form-group col-md-12">
                                <label>@lang('المبلغ')<span class="text-danger">*</span></label>
                                <div class="input-group has_append">
                                    <input type="text" name="amount" class="form-control quakeamount"
                                           placeholder="اضف المبلغ">
                                    <div class="input-group-append">
                                        <div class="input-group-text">جنيه مصري</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Edit By Mohamed Maghraby -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('غلق')</button>
                        <button type="submit" class="btn buttons-style quakeConfirm">
                            <i class='spinner fa fa-spinner fa-spin quakeSpinner' style='display: none'></i>
                            @lang('اضافة')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(function ($) {
            "use strict";
            $("select[name=country]").val("{{ @$user->address->country }}");
        });
        $('.register').on('submit', function(){
            $('.quakeConfirm').attr('disabled', 'true');
            $('.quakeSpinner').show();
        });
    </script>
    <script>
        $(document).ready(function () {
            'use strict'
            $("#preview-modal").on("click", function () {
                $("#previewModal").modal("show");
            });



        });
    </script>
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
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}/student/student/getClasses/' + $('#level_id').val(),
            success: function (data) {
                $('#classroom').empty()
                $('#classroom').append(`<option value="">اختر فصل</option>`)
                data.forEach(function (e){
                    $('#classroom').append(`<option value="${e.id}" >${e.name}</option>`)
                    $('#classroom').val({{$user->class_room_id}})
                })
            }
        })

    </script>
    <script>
        $('#level_id').on('change', function() {

            $.ajax({
                type: 'GET',
                url: '{{url('/')}}/student/student/getClasses/' + $(this).val(),
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

    <script>
        // Get references to the password and confirm password input fields
        const passwordField = document.getElementById("password");
        const confirmPasswordField = document.getElementById("confirm-password");
        const message = document.getElementById("message");

        // Add an event listener to the form
        document.getElementById("signup-form").addEventListener("submit", function (e) {
            if (passwordField.value !== confirmPasswordField.value) {
                e.preventDefault(); // Prevent form submission
                message.innerText = "Passwords do not match!";
                message.style.color = "red";
            } else {
                message.innerText = ""; // Clear any previous error message
            }
        });
    </script>
@endpush
