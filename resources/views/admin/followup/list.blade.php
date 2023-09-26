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
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('متابعة الخطط') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('المتابعات') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="customers__area bg-style mb-30">
            <div class="item-title d-flex justify-content-center mx-4">
                <a href="{{route('admin.followup.index')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>خطة متابعة المعلمين</a>
                <a href="{{route('admin.followup.quran')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>متابعة القرآن</a>
                <a href="{{route('admin.followup.create')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>متابعة حصة دراسية</a>
                <a href="{{route('admin.followup.reading')}}" class="icon"><i class="fa fa-paper-plane mx-3"></i>متابعة القراءة</a>
            </div>
            <form method="get" action="{{route('admin.followup.index')}}" class="row">
                <div class="row">
                    <h1>{{trans("website.filter")}}</h1>
                </div>
                <div class="col-md-2 m-3">
                    <label for="followup_date">{{trans("website.followup_date")}}:</label>
                    <input type="date" class="form-control" name="followup_date" value="{{request('followup_date')}}">
                </div>
                <div class="col-md-2 m-3">
                    <label for="filterByInstructor">{{trans("website.teacher")}}:</label>
                    <select class="form-control" name="filterByInstructor">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($instructors as $instructor)
                            <option value="{{$instructor->id}}" {{$instructor->id == request('filterByInstructor') ? 'selected' : ''}}>{{$instructor->employee?->name}}</option>
                        @endforeach
                     </select>
                </div>
                <div class="col-md-2 m-3">
                    <label for="filterBySubject">{{trans("website.subject")}}:</label>
                    <select class="form-control" name="filterBySubject">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}" {{$subject->id == request('filterBySubject') ? 'selected' : ''}}>{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 m-3">
                    <label for="filterByClass">{{trans("website.class")}}:</label>
                    <select class="form-control" name="filterByClass">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($classes as $class)
                            <option value="{{$class->id}}" {{$class->id == request('filterByClass') ? 'selected' : ''}}>{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 m-3">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="dateFrom">:{{trans("website.dateFrom")}}</label>
                    <input type="date" class="form-control" name="dateFrom" value="{{request('dateFrom')}}">
                </div>
                <div class="col-sm-2 m-3">
                    <label for="dateTo">:{{trans("website.dateTo")}}</label>
                    <input type="date" class="form-control" name="dateTo" value="{{request('dateTo')}}">
                </div>
                <div class="text-end mb-3 d-flex justify-content-start">
                    <button type="submit" id="btn_filter" class="btn buttons-style btn-sm">{{trans("website.filter")}}</button>
                </div>
            </form>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-style mb-30 table-title-container " style="overflow-x:auto;">
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('website.students') }}</h2>
                        </div>
                        <div class="customers__table" style = "overflow:auto" >
                            <!-- <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped"> -->
                            <table  class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>{{ trans('website.followup_date') }}</th>
                                    <th>{{ trans('website.teacher') }}</th>
                                    <th>{{ trans('website.class') }}</th>
                                    <th>{{ trans('website.subject') }}</th>
                                    <th>{{ trans('website.status') }}</th>
                                    <th>{{ trans('website.edit') }}</th>
                                    <th>{{ trans('website.delete') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($followups as $followup)
                                    <tr class="removable-item">
                                        <td>{{ $followup->created_at}}</td>
                                        <td>{{ $followup->instructor?->employee?->name }}</td>
                                        <td>{{ $followup->classroom?->name }}</td>
                                        <td>{{ $followup->subject?->name }}</td>
                                        <td><input class="form-check-input toggleButton"
                                                   data-id="{{$followup->id}}" type="checkbox"
                                            {{$followup->status == 1 ? 'checked' : '' }}></td>
                                        @if($followup->type == 1)
                                        <td>
                                            <a href="{{route('admin.followup.editClass', [$followup])}}" class="btn-action" title="Edit">
                                                <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                            </a>
                                        </td>
                                        @elseif($followup->type == 2)
                                            <td>
                                                <a href="{{route('admin.followup.editReading', [$followup])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                            </td>
                                        @elseif($followup->type == 3)
                                            <td>
                                                <a href="{{route('admin.followup.editQuran', [$followup])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                            </td>
                                        @endif


                                        <td>
                                            <a href="javascript:void(0);" data-url="{{route('admin.followup.delete', [$followup])}}" class="btn-action delete" title="Delete">
                                                <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{$followups->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
    <script>
        'use strict'
        // $(".status").change(function () {
        //     var id = $(this).closest('tr').find('#hidden_id').html();
        //     var status_value = $(this).closest('tr').find('.status option:selected').val();
            Swal.fire({
                title: "{{ __('Are you sure to change status?') }}",
                text: "{{ __('You won`t be able to revert this!') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{__('Yes, Change it!')}}",
                cancelButtonText: "{{__('No, cancel!')}}",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    // $.ajax({
                        type: "POST",
                        url: "{{route('admin.student.changeStudentStatus')}}",
                        data: {"status": status_value, "id": id, "_token": "{{ csrf_token() }}",},
                        datatype: "json",
                        success: function (data) {
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr.success('', "{{ __('Student status has been updated') }}");
                        },
                        error: function () {
                            alert("Error!");
                        },
                    });
                } else if (result.dismiss === "cancel") {
                }
            });
        });
        // $(document).ready(function () {
        //     $('#btn_filter').on('click', function () {
        //         var filter_department = $('#filter_department').val();
        //         var filter_level = $('#filter_level').val();
        //         var filter_status = $('#filter_status').val();

                // $.ajax({
                    type: 'GET',
                    url: '/students/filter',
                    data: {
                        department: filter_department,
                        level: filter_level,
                        status: filter_status
                    },
                    success: function (data) {
                        // Update the table with the filtered data
                        // ...
                    }
                });
            });
        });

    </script>
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
                window.print();
        });
    </script>
    <script>
        $('.toggleButton').on('change',function(){
            $.ajax({
                type: "GET",
                url:  '{{route('admin.followup.change_status')}}',
                data: {"status": $(this).val(), "followup_id": $(this).data('id')},
                datatype: "json",
                success: function (response) {
                    toastr.options.positionClass = 'toast-bottom-right';

                    if (response.status == 404){
                        toastr.error(response.msg);
                    }

                    if (response.status == 200) {
                        $('.appendAddRemove'+ response.course_id).html(`

                    `)
                        toastr.info(response.msg);
                    }
                },
                error: function () {
                    alert("Error!");
                },
            });
        })

    </script>
@endpush
