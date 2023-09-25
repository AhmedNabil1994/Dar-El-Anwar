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
                                <h2>{{ trans('الفصول') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('الفصول') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <h1> </h1>


            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('قائمة الواجبات') }}</h2>

                        </div>
                        <div class="row m-3 justify-content-end">
                            <div class="col-md-3">

                            </div>
                            <form method="GET" action="{{route('admin.assignments.index')}}"
                                  class="customers__area bg-style mb-30 form-container row align-items-end justify-content-center">

                                <div class="col-sm-3 m-3">
                                    <label for="instructor_id">{{trans("معلم")}}:</label>
                                    <select class="form-control" name="instructor_id">
                                        <option value="">{{trans("website.all")}}</option>
                                        @foreach($instructors as $instructor)
                                            <option value="{{$instructor->id}}" {{$instructor->id == request('instructor_id') ? 'selected' : ''}}>{{$instructor->employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 m-2">
                                    <label for="date_from">تاريخ من</label>
                                    <input type="date"
                                           class="form-control"
                                           name="date_from"
                                           value="{{request('date_from')}}"/>
                                </div>
                                <div class="col-md-3 m-2">
                                    <label for="date_to">الي</label>
                                    <input type="date"
                                           class="form-control"
                                           name="date_to"
                                           value="{{request('date_to')}}"/>
                                </div>
                                <div class="col-md-3 m-2">
                                    <label class="label-text-title color-heading font-medium font-16 mb-3">{{__('website.department')}}
                                    </label>
                                    <select class="form-control" name="department_id">
                                        <option value="">{{__('website.chosseDepartment')}}</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" @if($department->id == old('department_id')) selected @endif>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 m-2">
                                    <label for="class">الفصل</label>
                                    <select class="form-control"
                                            name="class">
                                        <option value="">اختر الفصل</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}"
                                                {{$class->id == request('class') ? 'selected' : '' }}
                                            >{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 m-2">
                                    <label for="subject_id">المادة</label>
                                    <select name="subject_id" id="subject_id" class="form-control" >
                                        <option value="">اختر المادة</option>
                                    @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}"
                                                {{$subject->id == request('subject_id') ? 'selected' : '' }}
                                            >{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 m-2">
                                    <label for="student_name">بحث باسم الطالب</label>
                                    <input type="text"
                                           class="form-control"
                                           name="student_name"
                                           value="{{request('student_name')}}"/>
                                </div>

                                <div class="col-md-3 m-2">
                                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                                        <i class="fa fa-filter"></i>
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="customers__table" style="overflow: auto">
                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead style="background-color: #50bfa5;">
                                <tr>
                                    <th>{{ trans('website.code') }}</th>
                                    <th>{{ trans('website.student_name') }}</th>
                                    <th>{{ trans('website.department') }}</th>
                                    <th>{{ trans('website.subject') }}</th>
                                    <th>{{ trans('website.teacher') }}</th>
                                    <th>{{ trans('عدد الواجبات') }}</th>
                                    @can('manage-class_room')
                                        <th>{{ trans('website.action') }}</th>
                                    @endcan
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all_subjects as $subject)
                                    @php
                                        $students = \App\Models\Student::whereHas('subjects', function ($q) use ($subject){
                                            $q->where('subjects.id', $subject->id);
                                        });
                                        if(request('student_name'))
                                            $students->where('name','like','%'.request('student_name').'%');
                                        if(request('class'))
                                            $students->where('class_room_id',request('class'));
                                        $students = $students->get();
                                    @endphp
                                    @foreach($students as $student)
                                        <tr class="removable-item">
                                            <td>{{$student?->code}}</td>
                                            <td>{{$student?->name}}</td>
                                            <td>{{$subject->department?->name}}</td>
                                            <td>{{$subject?->name}}</td>
                                            <td>{{$subject->instructor?->employee?->name}}</td>
                                            <td>{{$student->assignment->where('subject_id',$subject->id)->count()}}</td>
                                            <td><a href="{{route('admin.assignments.create_points',[$student,$subject])}}">ضع درجات</a></td>
{{--                                            @php--}}
{{--                                                $assignments = \App\Models\StudentDuties::where('student_id',$student->id)->get();--}}
{{--                                                $all = 0;--}}
{{--                                            @endphp--}}

{{--                                            @foreach($assignments as $assignment)--}}
{{--                                                <td>--}}
{{--                                                    @php--}}

{{--                                                        $grade = $assignment->marks??'لم يتم اضافة درجة بعد' ;--}}
{{--                                                        if($grade != 0)--}}
{{--                                                            $all += 1;--}}
{{--                                                    @endphp--}}
{{--                                                    <label class="col-form-label d-flex justify-content-center @if(!$assignment->marks) text-danger @endif">--}}

{{--                                                        {{$grade}}--}}
{{--                                                    </label>--}}
{{--                                                    <button class="btn buttons-style openModal"--}}
{{--                                                            data-student-id="{{$student->id}}" data-assign-id="{{$assignment->assignment->id}}">--}}
{{--                                                        {{ trans('website.setMark') }}--}}
{{--                                                    </button>--}}
{{--                                                </td>--}}
{{--                                            @endforeach--}}
{{--                                            @can('manage-class_room')--}}
{{--                                                <td>--}}
{{--                                                    <div class="action__buttons">--}}
{{--                                                        --}}{{--                                                @can('edit-admins', 'admins')--}}

{{--                                                        <a href="{{ route('instructor.assignments.edit', $assignment) }}" class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">--}}
{{--                                                            <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">--}}
{{--                                                        </a>--}}
{{--                                                        --}}{{--                                                @endcan--}}

{{--                                                        --}}{{--                                                    @can('delete-admins', 'admins')--}}

{{--                                                        <a href="javascript:void(0);" data-url="{{route('instructor.assignments.delete', $assignment)}}" class="btn-action delete" title="Delete">--}}
{{--                                                            <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">--}}
{{--                                                        </a>--}}
{{--                                                        --}}{{--                                                @endcan--}}

{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            @endcan--}}
                                        </tr>
                                    @endforeach
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$all_subjects->appends(request()->input())->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--            @endcan--}}
        </div>
    </div>
    <!-- Page content area end -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <form action="{{route('instructor.assignments.student.store_mark')}}" method="post" class="modal-content">
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
                    <input type="text" class="form-control" name="markInput" id="markInput" placeholder="{{ trans('website.setMark') }}">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn buttons-style" id="saveMark">{{ trans('website.ok') }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('website.close') }}</button>
                </div>

            </form>
        </div>
    </div>

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

    <script>
        // JavaScript to handle modal actions
        $(document).ready(function(){
            // Show the modal when the button is clicked
            $(".openModal").click(function(){
                $("#myModal").modal("show");
                var studentId = $(this).data("student-id");
                var assignment = $(this).data("assign-id");
                $('#student').val(studentId);
                $('#assignment').val(assignment);
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
