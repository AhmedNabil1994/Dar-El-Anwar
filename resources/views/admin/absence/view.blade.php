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
                                <h2>{{ trans('عرض الغياب') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('الغياب') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="customers__area bg-style mb-30">
            <form method="get" action="{{route('absence.index')}}" class="row">
                <div class="row">
                    <h1>{{trans("website.filter")}}</h1>
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByJoining">{{trans("website.date")}}:</label>
                    <input type="date" class="form-control" name="dateFrom" value="{{request('dateFrom')}}">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByDept">{{trans("website.department")}}:</label>
                    <select class="form-control" name="filterByDept">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}" {{$department->id == request('filterByDept') ? 'selected' : ''}}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByClass">{{trans("website.level")}}:</label>
                    <select class="form-control" name="filterByClass">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($class_rooms as $class_room)
                            <option value="{{$class_room->id}}" {{$class_room->id == request('filterByClass') ? 'selected' : ''}}>{{$class_room->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterBySubject">{{trans("website.subject")}}:</label>
                    <select class="form-control" name="filterBySubject">
                        <option value="">{{trans('website.all')}}</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}" {{$subject->id == request('filterBySubject') ? 'selected' : ''}}>{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByInst">{{trans("website.teacher")}}:</label>
                    <select class="form-control" name="filterByInst">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($instructors as $instructor)
                            <option value="{{$instructor->id}}" {{$instructor->id == request('filterByInst') ? 'selected' : ''}}>{{$instructor->employee->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByStudent">{{trans("website.student")}}:</label>
                    <select class="form-control" name="filterByStudent">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($filter_students as $student)
                            <option value="{{$student->id}}" {{$student->id == request('filterByStudent') ? 'selected' : ''}}>{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByCode">{{trans("website.code")}}:</label>
                    <select class="form-control" name="filterByCode">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($codes as $code)
                            <option value="{{$code}}" {{$code == request('filterByCode') ? 'selected' : ''}}>{{$code}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 my-3 mb-3">
                    <button id="btn_filter" class="btn buttons-style mt-4">{{trans("website.filter")}}</button>
                </div>
            </form>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">

                        <div class="customers__table" style="overflow: auto">
                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead style="background-color: #50bfa5;">
                                <tr>
                                    <th>{{ trans('website.date') }}</th>
                                    <th>{{ trans('website.student_code') }}</th>
                                    <th>{{ trans('website.student_name') }}</th>
                                    <th>{{ trans('website.department') }}</th>
                                    <th>{{ trans('website.level') }}</th>
                                    <th>{{ trans('website.subject') }}</th>
                                    <th>{{ trans('website.teacher') }}</th>
                                    <th>{{ trans('website.registered') }}</th>
                                    <th>{{ trans('website.registering_time') }}</th>
                                    <th>{{ trans('نسبة الغياب') }}</th>
                                    <th>{{ trans('الغاء الغياب') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($absences as $absence)
                                    <form method="GET" action="{{route('absence.store')}}">
                                        <tr class="removable-item">
                                            <td>{{\Carbon\Carbon::parse($absence->date)->format('y/m/d')}}</td>
                                            <td>{{$absence->student?->code}}</td>
                                            <td>{{$absence->student?->name}}</td>
                                            <td>{{$absence->student_subject->subject->department?->name}}</td>
                                            <td>{{$absence->student?->level?->first()?->name}}</td>
                                            <td>{{$absence->student_subject->subject->name}}</td>
                                            <td>{{$absence->student_subject->subject->instructor?->employee?->name}}</td>
                                            <td>{{$absence->instructor?->employee?->name}}</td>
                                            <td>{{\Carbon\Carbon::parse($absence->time)->format('H:i:s')}}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                         style="width:
                                                     {{$absence->student_subject->abscence_count*100/10 }};
                                                     "
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                    <span>
                                                        {{$absence->student_subject->abscence_count*100/10 }}%
                                                    </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" data-url="{{route('absence.delete', [$absence->id])}}" class="btn-action delete" title="Delete">
                                                    <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$absences->appends(request()->input())->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--            @endcan--}}
        </div>
    </div>
    <!-- Page content area end -->

@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Ajax Search Script -->
    <script>
        $(function() {
            $('#searchForm input[name="search"]').on('keyup', function() {
                alert('hello');
                $.ajax({
                    url: '{{ route("admins.index") }}',
                    type: 'GET',
                    data: $('#searchForm').serialize(),
                    success: function(res) {
                        $('#admins-list').html(res);
                    },
                    error: function(jqXHR, status, error) {
                        // console.log(status + ": " + error);
                    }
                });
            });
        });
    </script>


@endpush
