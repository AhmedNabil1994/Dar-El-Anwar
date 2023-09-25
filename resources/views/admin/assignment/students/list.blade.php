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
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-style mb-30 " style="overflow-x:auto;">
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('الواجبات اليومية') }}</h2>
                        </div>
                        <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="" class="row-border data-table-filter table-style table table-bordered">
                                <thead>
                                <tr>
                                    <th>{{ trans('website.code') }}</th>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('website.department') }}</th>
                                    <th>{{ trans('website.subject') }}</th>
                                    <th>{{ trans('website.teacher') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students_duties as $student_duty)
                                    @php
                                        $all = 0;
                                    @endphp
                                    <tr class="removable-item">
                                        <td class="d-flex justify-content-center">
                                            <input type="checkbox" class="input__checkbox">
                                        </td>
                                        <td>{{ $student_duty->student->code }}</td>
                                        <td>{{ $student_duty->student->name }}</td>
                                        <td>{{ $student_duty->assignment?->dept?->name }}</td>
                                        <td>{{ $student_duty->assignment?->subject?->name }}</td>
                                        <td>{{ $student_duty->assignment?->subject?->instructor?->employee?->name }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{$students_duties->links()}}
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
