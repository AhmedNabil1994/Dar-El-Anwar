@extends('frontend.layouts.app')

@section('content')

    <div class="bg-page">
        <!-- Page Header Start -->
        <header class="page-banner-header blank-page-banner-header gradient-bg position-relative">
            <div class="section-overlay">
                <div class="blank-page-banner-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="page-banner-content text-center">
                                    <h3 class="page-banner-heading color-heading pb-15">{{ __($course->title) }}</h3>

                                    <!-- Course Watch Banner Start-->
                                    <ul class="course-watch-banner-items">
                                        <li class="font-14 font-medium color-heading"><span class="iconify me-2" data-icon="carbon:video"></span>{{ @$course->lectures->count() }}
                                            {{ __('Lectures') }}
                                        </li>
                                        <li class="font-14 font-medium color-heading"><span class="iconify me-2" data-icon="akar-icons:book"></span>{{ @$course->lessons->count() }}
                                            {{ __('sections') }}
                                        </li>
                                        <li class="font-14 font-medium color-heading"><span class="iconify me-2" data-icon="ant-design:clock-circle-outlined"></span>
                                            {{@$course->lectures->count() > 0 ? @$course->video_duration : '0 min'}}
                                        </li>
                                    </ul>
                                    <!-- Course Watch Banner End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Header End -->

        <!-- Course Single Details Area Start -->
        <section class="course-single-details-area course-watch-page-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-7 col-xxl-8">
                         @if(@$lecture_type)
                            <!-- My Code Start -->

                                @if(@$lecture_type == 'youtube')
                                <div class="video-player-area">
                                    <div class="plyr__video-embed" id="playerVideoYoutube">
                                        <iframe
                                            src="https://www.youtube.com/embed/{{ @$youtube_video_src }}"
                                            allowfullscreen
                                            allowtransparency
                                            allow="autoplay">
                                        </iframe>
                                    </div>
                                </div>
                                @elseif(@$lecture_type == 'vimeo')
                                <div class="video-player-area">
                                    <div class="plyr__video-embed" id="playerVideoVimeo">
                                        <iframe
                                            src="https://player.vimeo.com/video/{{ @$vimeo_video_src }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                            allowfullscreen
                                            allowtransparency
                                            allow="autoplay"
                                        ></iframe>
                                    </div>
                                </div>
                                @elseif(@$lecture_type == 'video')
                                <div class="video-player-area">
                                    <video id="player" class="myVideo" playsinline controls controlsList="nodownload">
                                        <source src="{{ getVideoFile(@$video_src) }}" type="video/mp4" />
                                    </video>
                                </div>
                                @elseif(@$lecture_type == 'text')
                                    <p>{!! @$text_src !!}</p>
                                @elseif(@$lecture_type == 'image')
                                    <img src="{{ getImageFile(@$image_src) }}" alt="" class="img-fluid">
                                @elseif(@$lecture_type == 'pdf')
                                <embed src= " {{ getImageFile($pdf_src) }}" class="pdf-reader-frame">
                                @elseif(@$lecture_type == 'slide_document')
                                    <iframe src="{{ @$slide_document_src }}" width="100%" height="400" frameborder="0" scrolling="no"></iframe>
                                @elseif(@$lecture_type == 'audio')
                                    <audio id="audioplayer" class="myVideo" controls>
                                        <source src="{{ getVideoFile(@$audio_src) }}" type="audio/mp3" />
                                    </audio>
                                @endif

                            <!-- My Code End -->
                        @else
                            @if($course->intro_video_check == 1 && getVideoFile($course->video))
                                <div class="video-player-area">
                                    <video id="player1" playsinline controls data-poster="{{ getImageFile($course->image) }}" controlsList="nodownload">
                                        <source src="{{ getVideoFile(@$course->video) }}" type="video/mp4" />
                                    </video>
                                </div>
                            @elseif($course->intro_video_check == 2 && $course->youtube_video_id)
                                <div class="video-player-area">
                                    <div class="plyr__video-embed" id="youtubePlayer">
                                        <iframe
                                            src="https://www.youtube.com/embed/{{ @$course->youtube_video_id }}"
                                            allowfullscreen
                                            allowtransparency
                                            allow="autoplay">
                                        </iframe>
                                    </div>
                                </div>
                            @else
                                <div class="course-watch-no-video-img">
                                    <img src="{{ getImageFile($course->image) }}" alt="" class="w-100 img-fluid">
                                </div>
                            @endif
                        @endif

                    </div>

                    <div class="col-12 col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        <div class="course-single-details-right-content course-watch-right-content mt-0">
                            <div class="curriculum-content course-watch-right-side">

                                <div class="review-progress-bar-wrap">
                                    <!-- Progress Bar -->
                                    <div class="barras mb-4">
                                        <div class="progress-bar-box">
                                            <div class="progress-hint-value font-14 color-heading d-flex justify-content-between">
                                                <p class="font-20 font-medium color-heading">{{ __('Course Content') }}</p>
                                                <span class="font-15">{{number_format(studentCourseProgress(@$course->id), 2)}}% Done</span>
                                            </div>
                                            <div class="barra">
                                                <div class="barra-nivel" data-nivel="{{studentCourseProgress(@$course->id)}}%"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="course-watch-right-accordion-wrap custom-scrollbar">
                                    <div class="accordion" id="accordionExample1">

                                        @forelse(@$course->lessons as $key => $lesson)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $key }}">
                                                    <button
                                                        class="accordion-button font-medium font-18 d-flex justify-content-between {{ @$lesson_id_check == $lesson->id ?  '' : 'collapsed' }}"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $key }}" aria-expanded="{{ @$lesson_id_check == $lesson->id ?  true : false }}"
                                                        aria-controls="collapse{{ $key }}">
                                                        <span class="px-2">{{ $lesson->name }}</span>

                                                        <span class="watch-course-title-right-btns d-flex">
                                                    <span class="font-12 color-gray2 mx-2"><span class="iconify font-16 color-orange me-1" data-icon="akar-icons:clock"></span>{{ count($lesson->lectures) }} lectures</span>
                                                    <span class="font-12 color-gray2 mx-2"><span class="iconify font-16 color-orange me-1" data-icon="carbon:video"></span>
                                                        {{@$lesson->lectures->count() > 0 ? lessonVideoDuration($course->id, $lesson->id) : '0 min'}}
                                                    </span>
                                                </span>
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ @$lesson_id_check == $lesson->id ?  'show' : '' }}"
                                                     aria-labelledby="heading{{ $key }}"
                                                     data-bs-parent="#accordionExample1">
                                                    <div class="accordion-body">
                                                        <div class="play-list">

                                                            @forelse($lesson->lectures as  $lecture)
                                                                <!-- Play List Item Start-->
                                                                <div
                                                                    class="play-list-item @if(checkStudentCourseView($course_lecture_views, $course->id, $lecture->id)) watchFinishedCourse @elseif($lecture->id == @$lecture_id_check) watchContinuingCourse @endif d-flex align-items-center justify-content-between font-15">
                                                                    <div class="play-list-left d-flex align-items-center">
                                                                        <div>
                                                                            @if($lecture->id == @$lecture_id_check)
                                                                                <span class="iconify font-17" data-icon="fluent:radio-button-24-filled"></span>
                                                                            @elseif(checkStudentCourseView($course_lecture_views, $course->id, $lecture->id))
                                                                                <span class="iconify font-17" data-icon="ant-design:check-circle-filled"></span>
                                                                            @else
                                                                                <span class="iconify font-17" data-icon="fluent:radio-button-24-regular"></span>
                                                                            @endif
                                                                        </div>
                                                                        <a href="{{ route('student.my-course.show', [Str::slug($course->slug), 'lecture_uuid' => $lecture->uuid]) }}">
                                                                            <p class="ps-2">{{ $lecture->title }}</p></a>
                                                                    </div>
                                                                    <div class="play-list-right d-flex">
                                                                        <span class="video-time-count">{{ $lecture->file_duration }}</span>
                                                                    </div>
                                                                </div>
                                                                <!-- Play List Item End-->
                                                            @empty
                                                                <div class="row">
                                                                    <p>{{ __('No Data Found') }}!</p>
                                                                </div>
                                                            @endforelse

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="row">
                                                <p>{{ __('No Data Found') }}!</p>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-7 col-xxl-8">
                        <div class="course-watch-inner-title-wrap d-flex justify-content-between mt-30">
                            <div class="course-watch-inner-title-left-part">
                                <h4 class="mb-3 lectureName">Introduction</h4>
                                <div class="course-watch-enrolled-wrap d-flex">
                                    <ul>
                                        @foreach($enrolled_students as $enrolled_student)
                                            <li><img src="{{ getImageFile(@$enrolled_student->user->image_path) }}" alt=""></li>
                                        @endforeach
                                    </ul>
                                    <div class="enrolled-count font-12 ms-2"><span class="color-heading font-medium">{{ $total_enrolled_students }}</span> <span
                                            class="d-block">Enrolled</span></div>
                                </div>

                            </div>
                            <div class="course-watch-inner-title-right-part">
                                <!-- Button trigger modal -->
                                <button type="button" class="bg-transparent theme-btn color-heading mb-3" data-bs-toggle="modal" data-bs-target="#writeReviewModal">Write a review
                                </button>
                                <div class="publish-update-time text-end">
                                    <h6 class="font-14">Last update</h6>
                                    <p class="font-12">{{ $course->updated_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="course-single-details-left-content mt-0">

                            <!-- Tab panel nav list -->
                            <div class="course-tab-nav-wrap course-details-tab-nav-wrap d-flex justify-content-between">
                                <ul class="nav nav-tabs tab-nav-list border-0" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{!$action_type ? 'active' : '' }}" id="Overview-tab" data-bs-toggle="tab" href="#Overview" role="tab"
                                           aria-controls="Overview"
                                           aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="Resources-tab" data-bs-toggle="tab" href="#Resources" role="tab" aria-controls="Resources"
                                           aria-selected="true">Resources</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="Review-tab" data-bs-toggle="tab" href="#Review" role="tab" aria-controls="Review"
                                           aria-selected="false">Review</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{$action_type ? 'active' : '' }}" id="Quiz-tab" data-bs-toggle="tab" href="#Quiz" role="tab"
                                           aria-controls="Quiz" aria-selected="false">Quiz</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="Assignment-tab" data-bs-toggle="tab" href="#Assignment" role="tab" aria-controls="Quiz"
                                           aria-selected="false">Assignment</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="Notice-tab" data-bs-toggle="tab" href="#Notice" role="tab" aria-controls="Notice"
                                           aria-selected="false">Notice</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="LiveClass-tab" data-bs-toggle="tab" href="#LiveClass" role="tab" aria-controls="LiveClass"
                                           aria-selected="false">Live Class</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="Discussion-tab" data-bs-toggle="tab" href="#Discussion" role="tab" aria-controls="Discussion"
                                           aria-selected="false">Discussion</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="Certificate-tab" data-bs-toggle="tab" href="#Certificate" role="tab" aria-controls="Certificate"
                                           aria-selected="false">Certificate</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab panel nav list -->

                            <!-- Tab Content-->
                            <div class="tab-content" id="myTabContent">
                                @include('frontend.student.course.partial.partial-overview-tab')
                                @include('frontend.student.course.partial.partial-resources-tab')
                                @include('frontend.student.course.partial.partial-review-tab')
                                @include('frontend.student.course.partial.partial-quiz-tab')
                                @include('frontend.student.course.partial.partial-assignment-tab')
                                @include('frontend.student.course.partial.partial-notice-tab')
                                @include('frontend.student.course.partial.partial-liveclass-tab')
                                @include('frontend.student.course.partial.partial-discussion-tab')
                                @include('frontend.student.course.partial.partial-certificate-tab')
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Course Single Details Area End -->

        <!--Write Review Modal Start-->
        <div class="modal fade" id="writeReviewModal" tabindex="-1" aria-labelledby="writeReviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="writeReviewModalLabel">Write a Review</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-12 text-center">
                                    <div class="btn-group give-rating-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck1" name="rating">
                                        <label class="give-rating-star" for="btncheck1"><span class="iconify" data-icon="bi:star-fill"></span></label>

                                        <input type="checkbox" class="btn-check" id="btncheck2" name="rating">
                                        <label class="give-rating-star" for="btncheck2"><span class="iconify" data-icon="bi:star-fill"></span></label>

                                        <input type="checkbox" class="btn-check" id="btncheck3" name="rating">
                                        <label class="give-rating-star" for="btncheck3"><span class="iconify" data-icon="bi:star-fill"></span></label>

                                        <input type="checkbox" class="btn-check" id="btncheck4" name="rating">
                                        <label class="give-rating-star" for="btncheck4"><span class="iconify" data-icon="bi:star-fill"></span></label>

                                        <input type="checkbox" class="btn-check" id="btncheck5" name="rating">
                                        <label class="give-rating-star" for="btncheck5"><span class="iconify" data-icon="bi:star-fill"></span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <label class="font-medium font-15 color-heading">Feedback</label>
                                    <textarea class="form-control feedback" id="exampleFormControlTextarea1" rows="3" placeholder="Please write your feedback here"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-between align-items-center">
                        <button type="button" class="theme-btn theme-button3" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="theme-btn theme-button1 submitReview">Submit review</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Write Review Modal End-->
    </div>

    <input type="hidden" class="course_id" value="{{ @$course->id}}">
    <input type="hidden" class="normalVideoSource" value="{{ @$video_src }}">
    <input type="hidden" class="youTubeVideoSource" value="{{ @$youtube_video_src }}">
    <input type="hidden" class="vimeoVideoSource" value="{{ @$vimeo_video_src }}">
    <input type="hidden" class="lecture_id" value="{{ @$lecture_id_check }}">
    <input type="hidden" class="videoCompletedRoute" value="{{  route('student.video.completed') }}">
    @if(@$nextLectureUuid)
        <input type="hidden" class="nextLectureRoute" value="{{  route('student.my-course.show', [Str::slug($course->title), 'lecture_uuid' => $nextLectureUuid]) }}">
    @endif
    <input type="hidden" class="nextLectureId" value="{{  @$nextLectureId }}">

    <input type="hidden" class="studentReviewCreateRoute" value="{{ route('student.review.create') }}">
    <input type="hidden" class="studentReviewPaginateRoute" value="{{ route('student.reviewPaginate', $course->id) }}">
    <input type="hidden" class="studentAssignmentListRoute" value="{{ route('student.assignment-list') }}">
@endsection

@push('style')
    <!-- Video Player css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">
@endpush

@push('script')
    <!--Tinymce js-->
    <script src="{{ asset('frontend/assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tinymce-script.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/course-video-ended.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vimeo/api/player.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/rating.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/course/student-review-paginate.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/course/student-assignment.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/course/zoom-copy-url.js') }}"></script>

    <script>
        "use strict"
        //Youtube Video duration done;
        var course_id = $('.course_id').val();
        var lecture_id = $('.lecture_id').val();
        var videoCompletedRoute = $('.videoCompletedRoute').val();
        var nextLectureRoute = $('.nextLectureRoute').val();
        var youTubeVideoSource = $('.youTubeVideoSource').val()

        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('playerVideoYoutube', {
                height: '626',
                width: '100%',
                videoId: youTubeVideoSource,
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            event.target.playVideo();
        }

        var done = false;

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                console.log('done')
                $.ajax({
                    type: "GET",
                    url: videoCompletedRoute,
                    data: {'course_id': course_id, 'lecture_id': lecture_id},
                    datatype: "json",
                    success: function (response) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        if (nextLectureRoute) {
                            window.location.href = nextLectureRoute;
                        } else {
                            location.reload();
                        }
                    },
                    error: function (error) {

                    },
                });
            }
        }

    </script>

    <!-- Video Player js -->
    <script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>
    <script>
        const zai_player = new Plyr('#player');
        const zai_player1 = new Plyr('#player1');
        const zai_player2 = new Plyr('#playerVideoYoutube');
        const zai_player3 = new Plyr('#youtubePlayer');
        const zai_player4 = new Plyr('#playerVideoVimeo');
        const zai_player5 = new Plyr('#audioplayer');
    </script>
    <!-- Video Player js -->
@endpush
