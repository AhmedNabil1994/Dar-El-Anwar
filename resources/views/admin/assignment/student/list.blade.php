@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="customers__area__header bg-style mb-30">
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
            </div>


            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-md-12">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('قائمة الواجبات') }}</h2>

                        </div>
                        <div class="row m-3 justify-content-end">
                            <div class="col-md-3">

                            </div>
                            <form method="GET" class="row align-items-end" action="{{ route('instructor.assignments.index') }}">
                                <div class="col-md-3">
                                    <label class="form-label">بحث</label>
                                    <input class="form-control" value="{{request('search')}}" name="search">
                                </div>
                                <div class="col-md-3">
                                    <button class="btn buttons-style"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="customers__table" style="overflow: auto">
                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead style="background-color: #50bfa5;">
                                <tr>
                                    <th>{{ trans('#') }}</th>
                                    <th>{{ trans('website.code') }}</th>
                                    <th>{{ trans('website.student_name') }}</th>
                                    <th>{{ trans('website.department') }}</th>
                                    <th>{{ trans('website.subject') }}</th>
                                    <th>{{ trans('website.teacher') }}</th>
                                    <th>{{ trans('الواجب') }}</th>
                                    <th>{{ trans('الدرجة') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($assignments as $assignment)
                                        <tr class="removable-item">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$assignment->student?->code}}</td>
                                            <td>{{$assignment->student?->name}}</td>
                                            <td>{{$assignment->assignment->subject?->department?->name}}</td>
                                            <td>{{$assignment->assignment?->subject?->name}}</td>
                                            <td>{{$assignment->assignment->subject?->instructor?->employee->name}}</td>
                                            <td>{{$assignment->assignment->name}}</td>
                                        <td>
                                            <label class="col-form-label d-flex justify-content-center @if(!$assignment->marks) text-danger @endif">

                                                {{$assignment->marks}}
                                            </label>
                                            <button class="btn buttons-style openModal"
                                                    data-student-id="{{$assignment->student->id}}" data-assign-id="{{$assignment->assignment->id}}">
                                                {{ trans('website.setMark') }}
                                            </button>
                                        </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$assignments->appends(request()->input())->links()}}
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
            <form action="{{route('admin.assignments.store_mark')}}" method="post" class="modal-content">
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
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn buttons-style ms-3" id="saveMark">{{ trans('website.ok') }}</button>
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
