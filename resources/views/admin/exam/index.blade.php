@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('website.exam') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('trans.all_exams ') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <h1> </h1>


    {{--<div class="instructor-profile-right-part">
        <div class="instructor-quiz-list-page">
            <div class="row m-0 quiz-list-page-top mb-4">

                <div class="col-md-5">

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if($exams->count() > 0)
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ trans('website.quizName') }}</th>
                                <th scope="col">{{ trans('website.quizType') }}</th>
                                <th scope="col">{{ trans('website.unPublish') }}</th>
                                <th scope="col">{{ trans('website.status') }}</th>
                                <th scope="col">{{ trans('website.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{$exam->name}}</td>
                                    <td>{{ucfirst(str_replace("_", " ", $exam->type))}}</td>
                                    <td>{{$exam->questions->count()}}</td>

                                <td> @if($exam->status == 1) <div class="quiz-status">{{ __('Publish') }}</div> @else  <div class="quiz-status unpublish">{{ __('Unpublish') }}</div> @endif </td>
                                <td><a href="{{route('exam.question', [$exam->uuid])}}" class="add-question-btn theme-btn theme-button1 default-hover-btn">{{ __('Add Question') }}</a></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="iconify" data-icon="charm:menu-meatball"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">

                                            @if($exam->status == 1)
                                                <li><a class="dropdown-item" href="{{route('exam.status-change', [$exam->uuid, 0])}}"><span class="iconify" data-icon="ic:outline-publish"></span>{{ __('Unpublish') }}</a></li>
                                            @else
                                                <li><a class="dropdown-item" href="{{route('exam.status-change', [$exam->uuid, 1])}}"><span class="iconify" data-icon="ic:outline-publish"></span>{{ __('Publish') }}</a></li>
                                            @endif
                                            <li><a class="dropdown-item" href="{{route('exam.view', [$exam->uuid])}}"><span class="iconify" data-icon="carbon:view"></span>{{ __('View') }}</a></li>
                                            <li><a class="dropdown-item" href="{{route('exam.edit', [$exam->uuid])}}"><span class="iconify" data-icon="clarity:note-edit-line"></span>{{ __('Edit') }}</a></li>
                                            <li><a href="{{route('exam.delete', [$exam->uuid])}}"  class="dropdown-item"  ><span class="iconify" data-icon="gg:trash"></span>{{ __('Delete') }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                    <!-- If there is no data Show Empty Design Start -->
                    <div class="empty-data">
                        <img src="{{ asset('frontend/assets/img/empty-data-img.png') }}" alt="img" class="img-fluid">
                        <h5 class="my-3">{{ __('Empty Quiz') }}</h5>
                    </div>
                    <!-- If there is no data Show Empty Design End -->

                    @endif

                </div>
            </div>

        </div>
    </div>--}}

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.adminList') }}</h2>
                            <a href="{{ route('admin.exam.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> {{ trans('website.add_exam') }}
                            </a>
                        </div>

                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('website.quizName') }}</th>
                                    <th scope="col">{{ trans('website.quizType') }}</th>
                                    <th scope="col">{{ trans('website.totalQuestion') }}</th>
                                    <th scope="col">{{ trans('website.status') }}</th>
                                    <th scope="col">{{trans('website.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$exam->name}}</td>
                                        <td>{{ucfirst(str_replace("_", " ", $exam->type))}}</td>
                                        <td>{{$exam->questions->count()}}</td>

                                        <td> @if($exam->status == 1) <div class="quiz-status">{{ __('Publish') }}</div> @else  <div class="quiz-status unpublish">{{ __('Unpublish') }}</div> @endif </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="iconify" data-icon="charm:menu-meatball"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">

                                                    @if($exam->status == 1)
                                                        <li class="mb-1"><a class="dropdown-item" href="{{route('admin.exam.status-change', [$exam->uuid, 0])}}"><span class="me-2 iconify" data-icon="ic:outline-publish"></span>{{ trans('website.unPublish') }}</a></li>
                                                    @else
                                                        <li class="mb-1"><a class="dropdown-item" href="{{route('admin.exam.status-change', [$exam->uuid, 1])}}"><span class="me-2 iconify" data-icon="ic:outline-publish"></span>{{ trans('website.publish') }}</a></li>
                                                    @endif
                                                    <li class="mb-1"><a class="dropdown-item" href="{{route('admin.exam.view', [$exam->id])}}"><span class="me-2 iconify" data-icon="carbon:view"></span>{{ trans('website.view') }}</a></li>
                                                    <li class="mb-1" ><a class="dropdown-item" href="{{route('admin.exam.edit', $exam->id)}}"><span class="me-2 iconify" data-icon="clarity:note-edit-line"></span>{{ trans('website.edit') }}</a></li>
                                                    <li class="mb-1"><a href="{{route('admin.exam.delete', [$exam->id])}}"  class="dropdown-item"  ><span class="me-2 iconify" data-icon="gg:trash"></span>{{ trans('website.delete') }}</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$exams->appends(request()->input())->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--            @endcan--}}
        </div>
    </div>

@endsection
