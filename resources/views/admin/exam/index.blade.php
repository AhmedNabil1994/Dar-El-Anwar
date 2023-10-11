@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('website.all_exams') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.all_exams') }}</li>
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
                        <div class="item-title d-flex justify-content-between align-items-end">
                            <h2>{{ trans('website.all_exams') }}</h2>
                            @can('create-exam')
                            <a href="{{ route('admin.exam.create') }}" class="btn btn-sm buttons-style" style="background-color: #50bfa5;">
                                <i class="fa fa-plus"></i> {{ trans('website.add_exam') }}
                            </a>
                            @endcan
                        </div>
                        <form action="{{ route('admin.exam.index') }}" class="row m-3" method="get">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="search_key" value="{{request('search_key')}}">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn buttons-style"><i class="fa fa-filter"></i></button>
                            </div>
                        </form>
                        <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead style="background-color: #50bfa5;">
                                <tr>
                                    <th scope="col">{{ trans('website.quizName') }}</th>
                                    <th scope="col">{{ trans('website.totalQuestion') }}</th>
                                    <th scope="col">{{trans('website.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$exam->name}}</td>
                                        <td>{{$exam->questions->count()}}</td>
                                            <!--  __('Unpublish') ==> to write Unpublish -->
                                         <td>
                                             <div class="action__buttons">

                                                 @can('edit-exam')
                                                     <a href="{{route('admin.exam.edit', [$exam])}}" class="btn-action" title="Edit">
                                                         <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                     </a>
                                                 @endcan

                                                 @can('delete-exam')
                                                     <a href="javascript:void(0);" data-url="{{route('admin.exam.delete', [$exam])}}" class="btn-action delete" title="Delete">
                                                         <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                     </a>
                                                 @endcan
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
