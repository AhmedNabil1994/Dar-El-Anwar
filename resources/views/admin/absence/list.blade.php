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
                                <h2>{{ trans('website.absence') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.all_student') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <form method="get" action="{{route('absence.index')}}" class="row">
                <div class="row">
                    <h1>{{trans("website.filter")}}</h1>
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByJoining">{{trans("website.date_from")}}:</label>
                    <input type="date" class="form-control" name="dateFrom">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByJoining">{{trans("website.date_to")}}:</label>
                    <input type="date" class="form-control" name="dateTo">
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
                    <label for="filterByClass">{{trans("website.class")}}:</label>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">

                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ trans('website.date') }}</th>
                                    <th>{{ trans('website.student_code') }}</th>
                                    <th>{{ trans('website.student_name') }}</th>
                                    <th>{{ trans('website.department') }}</th>
                                    <th>{{ trans('website.class') }}</th>
                                    <th>{{ trans('website.subject') }}</th>
                                    <th>{{ trans('website.teacher') }}</th>
                                    <th>{{ trans('website.registered') }}</th>
                                    <th>{{ trans('website.registering_time') }}</th>
                                    <th>{{ trans('website.actions') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($absences as $absence)
                                    <tr class="removable-item">
                                        <td>{{\Carbon\Carbon::today()->format('d/m/Y')}}</td>
                                        <td>{{$absence->students->code}}</td>
                                        <td>{{$absence->students->name}}</td>
                                        <td>{{$absence->dept?->name}}</td>
                                        <td>{{$absence->class_room?->name}}</td>
                                        <td>ss</td>
                                        <td>
                                            <select class="form-select-sm" name="instructor_id">
                                                @foreach($instructors as $instructor)
                                                    <option value="{{$instructor->id}}">{{$instructor->employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="action__buttons">
                                               <input type="checkbox" class="input__checkbox" data-value="{{$student->id}}" onchange="is_absence(this)" name="is_absence" {{is_null($student->is_absence->first())?"":"checked"}}/>
                                            </div>
                                        </td>
                                    </tr>
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
    <script>
        $(document).on('click', '.btn-action.delete', function(e) {
            e.preventDefault();
            var admin_id = $(this).data('id');
            var url = "{{ route('admins.delete') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: { id: admin_id, _token: "{{ csrf_token() }}" },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        window.location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    // console.log(xhr.responseText);
                    alert('Error: ' + xhr.responseText);
                }
            });
        });



    </script>
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

    <script>

        function is_absence(data)
        {
            data = {
                'student_id' : data.getAttribute('data-value'),
                'is_checked' : data.checked,
                'instructor_id' : data.parentNode.parentNode.parentNode.getElementsByTagName('td')[6].getElementsByTagName('select')[0].value,
            }

            $.ajax({
                url: '{{ route("absence.store") }}',
                type: 'get',
                data: data,
                success: function(res) {
                    console.log(res);
                },
                error: function(jqXHR, status, error) {
                    // console.log(status + ": " + error);
                }
            });
        }

    </script>
@endpush
