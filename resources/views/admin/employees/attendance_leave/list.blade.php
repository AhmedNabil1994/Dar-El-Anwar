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
                                <h2>{{ __('Employees') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Parent') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.all_emplyee') }}</h2>
                        </div>
                        <div class="employees mb-4">
                            <div class="row">
                                <!-- searching inputs -->
                                <div class="col-md-6 d-flex align-items-center">
                                    <form>
                                        <div class="input-group w-100">
                                            <input type="text" class="form-control" placeholder="{{trans('website.search')}}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end employee__filter">
                                    <div class="filter-item">
                                        <img class="img-responsive w-full" src="{{ asset('admin') }}/images/employee/salary.png" alt="now">
                                        <a href="{{route('attendance_leave.create')}}">
                                            {{trans('website.create')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customers__table" style="overflow: auto;">
                            <table id="parent-info-table" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th class="text-center" >{{trans("website.instructor_name")}}</th>
                                            <th class="text-center" >{{trans("website.start_date")}}</th>
                                            <th class="text-center" >{{trans("website.end_date")}}</th>
                                            <th class="text-center" >{{trans("website.status")}}</th>
                                            <th class="text-center" >{{trans("website.reason")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attendances_leaves as $attendance_leave)
                                        <tr>
                                            <td class="text-center">{{ $attendance_leave->employee->name }}</td>
                                            <td class="text-center">{{ $attendance_leave->start_date }}</td>
                                            <td class="text-center">{{ $attendance_leave->end_date }}</td>
                                            <td class="text-center">{{ $attendance_leave->status }}</td>
                                            <td class="text-center">{{ $attendance_leave->reason }}</td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>

                                        <div class="mt-3">
                                            {{--    {{$Employees->links()}}--}}
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
{{--    <script>--}}
{{--        'use strict'--}}
{{--        $(".status").change(function () {--}}
{{--            var id = $(this).closest('tr').find('#hidden_id').html();--}}
{{--            var status_value = $(this).closest('tr').find('.status option:selected').val();--}}
{{--            Swal.fire({--}}
{{--                title: "{{ __('Are you sure to change status?') }}",--}}
{{--                text: "{{ __('You won`t be able to revert this!') }}",--}}
{{--                icon: "warning",--}}
{{--                showCancelButton: true,--}}
{{--                confirmButtonText: "{{__('Yes, Change it!')}}",--}}
{{--                cancelButtonText: "{{__('No, cancel!')}}",--}}
{{--                reverseButtons: true--}}
{{--            }).then(function (result) {--}}
{{--                if (result.value) {--}}
{{--                    $.ajax({--}}
{{--                        type: "POST",--}}
{{--                        url: "{{route('admin.Parent.changeEmployeestatus')}}",--}}
{{--                        data: {"status": status_value, "id": id, "_token": "{{ csrf_token() }}",},--}}
{{--                        datatype: "json",--}}
{{--                        success: function (data) {--}}
{{--                            toastr.options.positionClass = 'toast-bottom-right';--}}
{{--                            toastr.success('', "{{ __('Parent status has been updated') }}");--}}
{{--                        },--}}
{{--                        error: function () {--}}
{{--                            alert("Error!");--}}
{{--                        },--}}
{{--                    });--}}
{{--                } else if (result.dismiss === "cancel") {--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush
