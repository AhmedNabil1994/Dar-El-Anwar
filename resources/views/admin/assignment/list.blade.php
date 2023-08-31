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
            <form method="get" action="{{route('admin.assignments.index')}}" class="row">
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


                <div class="col-md-3 my-3 mb-3">
                    <button id="btn_filter" class="btn btn-primary mt-4">Filter</button>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-style mb-30 " style="overflow-x:auto;">
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('website.students') }}</h2>
                        </div>
                        <div class="customers__table " >
                            <table id="" class="row-border data-table-filter table-style">
                                <thead>
                                    <tr>
                                        <th>{{ trans('website.select') }}</th>
                                        <th>{{ trans('website.code') }}</th>
                                        <th>{{ trans('website.name') }}</th>
                                        <th>{{ trans('website.department') }}</th>
                                        <th>{{ trans('website.subject') }}</th>
                                        <th>{{ trans('website.teacher') }}</th>
                                        @for($i = 1; $i <= 15; $i++)
                                            <th >{{ $i }}</th>
                                        @endfor
                                        <th>{{ trans('website.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    @php
                                        $all = 0;
                                    @endphp
                                    <tr class="removable-item">
                                        <td class="d-flex justify-content-center">
                                            <input type="checkbox" class="input__checkbox">
                                        </td>
                                        <td>{{ $student->code }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->dept->name }}</td>
                                        <td>{{ $student->subject->name }}</td>
                                        <td>{{ $student->subject->instructor?->employee?->name }}</td>
                                        @for($i = 1; $i <= 15; $i++)
                                        <td>

                                            <label class="col-form-label d-flex justify-content-center">
                                                @php
                                                    $old_marks = json_decode($student->assignment?->marks);
                                                    $grade = isset($old_marks?->$i)?  $old_marks?->$i : 0 ;
                                                    if($grade != 0)
                                                        $all += 1;
                                                @endphp
                                                {{$grade}}
                                            </label>
                                            <button class="btn btn-success openModal"
                                            data-student-id="{{$student->id}}" data-assign-id="{{$i}}"
                                            data-subject="{{$student->subject->id}}" data-dept="{{$student->dept->id}}"
                                            data-inst="{{$student->subject->instructor?->id}}">
                                                {{ trans('website.set_mark') }}
                                            </button>
                                        </td>
                                        @endfor
                                        <td class="row justify-content-center">
                                            {{$all*100/15}} %
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{$students->links()}}
                            </div>
                        </div>
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
                    <h4 class="modal-title">{{ trans('website.enter_mark') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="hidden"  name="student_id" id="student">
                    <input type="hidden"  name="assignment_id" id="assignment">
                    <input type="hidden"  name="subject_id" id="subject">
                    <input type="hidden"  name="dept_id" id="dept">
                    <input type="hidden"  name="instructor_id" id="instructor">
                    <input type="text" class="form-control" name="markInput" id="markInput" placeholder="Enter mark">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveMark">{{ trans('website.ok') }}</button>
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
