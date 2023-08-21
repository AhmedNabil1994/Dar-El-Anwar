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
                                <h2>{{ __('Absence') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Student') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <form method="get" action="{{route('absence.index')}}" class="row">
                <div class="row">
                    <h1>Filters</h1>
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByJoining">Date From:</label>
                    <input type="date" class="form-control" name="dateFrom">
                </div>
                 <div class="col-sm-2 m-3">
                    <label for="filterByJoining">Date To:</label>
                     <input type="date" class="form-control" name="dateTo">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByDept">Department:</label>
                    <select class="form-control" name="filterByDept">
                        <option value="">All</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}" {{$department->id == request('filterByDept') ? 'selected' : ''}}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByClass">Class:</label>
                    <select class="form-control" name="filterByClass">
                        <option value="">All</option>
                        @foreach($class_rooms as $class_room)
                            <option value="{{$class_room->id}}" {{$class_room->id == request('filterByClass') ? 'selected' : ''}}>{{$class_room->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterBySubject">Subject:</label>
                    <select class="form-control" name="filterBySubject">
                        <option value="">All</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}" {{$subject->id == request('filterBySubject') ? 'selected' : ''}}>{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByInst">Teacher:</label>
                    <select class="form-control" name="filterByInst">
                        <option value="">All</option>
                        @foreach($instructors as $instructor)
                            <option value="{{$instructor->id}}" {{$instructor->id == request('filterByInst') ? 'selected' : ''}}>{{$instructor->employee->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByStudent">Student:</label>
                    <select class="form-control" name="filterByStudent">
                        <option value="">All</option>
                        @foreach($filter_students as $student)
                            <option value="{{$student->id}}" {{$student->id == request('filterByStudent') ? 'selected' : ''}}>{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByCode">Code:</label>
                    <select class="form-control" name="filterByCode">
                        <option value="">All</option>
                        @foreach($codes as $code)
                            <option value="{{$code}}" {{$code == request('filterByCode') ? 'selected' : ''}}>{{$code}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 my-3 mb-3">
                    <button id="btn_filter" class="btn btn-primary mt-4">Filter</button>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">

                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter">
                                <thead>
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Student Code') }}</th>
                                    <th>{{ __('Student Name') }}</th>
                                    <th>{{ __('Department') }}</th>
                                    <th>{{ __('Class') }}</th>
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Teacher') }}</th>
                                    <th>{{ __('Registered') }}</th>
                                    <th>{{ __('Registering Time') }}</th>
                                    <th >{{ __('Absence Range') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($students as $student)
                                    <tr class="removable-item">
                                        <td>{{\Carbon\Carbon::today()->format('d/m/Y')}}</td>
                                        <td>{{$student->code}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->department}}</td>
                                        <td>{{$student->classroom}}</td>
                                        <td>ss</td>
                                        <td>

                                            {{is_null($student->is_absence->first()) ? " ": $student->is_absence->first()->instructor->employee->name}}
                                        </td>
                                        <td>{{is_null($student->is_absence->first()) ? "Not Bone" : "Done"}}</td>
                                        <td>{{is_null($student->is_absence->first()) ? "" : $student->is_absence->first()->created_at->format('d/m/y')}}</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                                     style="width: {{$student->is_absence->count()*100/10 }};" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span>{{$student->is_absence->count()*100/10 }}%</span></div>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$students->appends(request()->input())->links()}}
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
