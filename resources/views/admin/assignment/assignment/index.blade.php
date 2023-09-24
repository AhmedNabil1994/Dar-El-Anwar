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
                                {{--                                <h2>{{ trans('website.students') }}</h2>--}}
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    {{--                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>--}}
                                    {{--                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.students') }}</li>--}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <form method="get" action="{{route('admin.assignments.assignment.index')}}" class="row">
                <div class="row">
                    <h1>{{trans("website.filter")}}</h1>
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByJoining">:{{ trans('website.dateFrom') }}</label>
                    <input type="date" class="form-control" name="dateFrom">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByJoining">:{{ trans('website.dateTo') }}</label>
                    <input type="date" class="form-control" name="dateTo">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="filterByDept">:{{ trans('website.department') }}:</label>
                    <select class="form-control" name="filterByDept">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}" {{$department->id == request('filterByDept') ? 'selected' : ''}}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByClass">:{{ trans('website.class') }}</label>
                    <select class="form-control" name="filterByClass">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($class_rooms as $class_room)
                            <option value="{{$class_room->id}}" {{$class_room->id == request('filterByClass') ? 'selected' : ''}}>{{$class_room->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterBySubject">:{{ trans('website.subject') }}</label>
                    <select class="form-control" name="filterBySubject">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}" {{$subject->id == request('filterBySubject') ? 'selected' : ''}}>{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2 m-3">
                    <label for="filterByStudent">:{{trans("website.student")}}:</label>
                    <select class="form-control" name="filterByStudent">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($filter_students as $student)
                            <option value="{{$student->id}}" {{$student->id == request('filterByStudent') ? 'selected' : ''}}>{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-3 my-3 mb-3">
                    <button id="btn_filter" class="btn buttons-style mt-4">{{trans("website.filter")}}</button>
                </div>
            </form>
            <div class="row">


                <div class="col-md-12">
                    <div class="bg-style mb-30 " style="overflow-x:auto;">
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('website.students') }}</h2>

                        </div>
                        <form method="post" action="{{route('admin.assignments.assignment.store')}}">
                            @csrf
                            <div class="col-sm-2 m-3">
                                <label for="filterByStudent">:{{trans("الواجب")}}:</label>
                                <select class="form-control" name="assignment_id" required>
                                    <option value="">اختر واجب</option>
                                    @foreach($assignments as $assignment)
                                        <option value="{{$assignment->id}}" {{$assignment->id == request('assignment_id') ? 'selected' : ''}}>{{$assignment->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2 m-3">
                                <button type="submit" class="btn buttons-style">
                                    اضافة
                                </button>
                            </div>
                            <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                                <table id="" class="row-border data-table-filter table-style table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('website.select') }}</th>
                                        <th>{{ trans('website.code') }}</th>
                                        <th>{{ trans('website.name') }}</th>
                                        <th>{{ trans('website.department') }}</th>
                                        <th>{{ trans('website.subject') }}</th>
                                        <th>{{ trans('website.teacher') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_subjects as $subject)
                                        @foreach($subject->student->where('status',1) as $student)
                                            @php
                                                $all = 0;
                                            @endphp
                                            <tr class="removable-item">
                                                <td >
                                                    <input type="checkbox" name="checks[]" value="{{$student->id}}" class="input__checkbox">
                                                </td>
                                                <td>{{ $student->code }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $subject->department->name }}</td>
                                                <td>{{ $subject?->name }}</td>
                                                <td>{{ $subject?->instructor?->employee?->name }}</td>

                                            </tr>
                                        @endforeach
                                    @endforeach

                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    {{$all_subjects->links()}}
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- The modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <form action="{{route('admin.assignments.store')}}" method="post" class="modal-content">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('website.setMark') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="hidden"  name="student_id" id="student">
                    <input type="hidden"  name="assignment_id" id="assignment">
                    <input type="hidden"  name="subject_id" id="subject">
                    <input type="hidden"  name="dept_id" id="dept">
                    <input type="hidden"  name="instructor_id" id="instructor">
                    <input type="text" class="form-control" name="markInput" id="markInput" placeholder="{{ trans('website.setMark') }}">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn buttons-style" id="saveMark">{{ trans('website.ok') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('website.close') }}</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Page content area end -->
@endsection

@push('script')
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>

    <script>
        // JavaScript to handle modal actions
        $(document).ready(function(){
            // Show the modal when the button is clicked
            $(".openModal").click(function(){
                $("#myModal").modal("show");
                var studentId = $(this).data("student-id");
                var assignment = $(this).data("assign-id");
                var subject = $(this).data("subject");
                var dept = $(this).data("dept");
                var instructor = $(this).data("inst");
                $('#student').val(studentId);
                $('#assignment').val(assignment);
                $('#dept').val(dept);
                $('#subject').val(subject);
                $('#instructor').val(instructor);
            });

            // Handle the "OK" button click
            $("#saveMark").click(function(){
                var mark = $("#markInput").val();
                // Perform any necessary actions with the mark value
                // For example, you can send it to the server using AJAX
                console.log("Entered mark:", mark);
                // Close the modal
                $("#myModal").modal("hide");
            });
        });
    </script>
@endpush
