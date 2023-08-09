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
                                        <img class="img-responsive w-full" src="{{ asset('admin') }}/images/employee/archived.png" alt="archived">
                                        <a href="">
                                            {{trans('website.archived')}}
                                        </a>
                                    </div>
                                    <div class="filter-item">
                                        <img class="img-responsive w-full" src="{{ asset('admin') }}/images/employee/current.png" alt="now">
                                        <a href="">
                                            {{trans('website.current')}}
                                        </a>
                                    </div>
                                    <div class="filter-item">
                                        <img class="img-responsive w-full" src="{{ asset('admin') }}/images/employee/attendance.png" alt="now">
                                        <a href="">
                                            {{trans('website.attendance')}}
                                        </a>
                                    </div>
                                    <div class="filter-item">
                                        <img class="img-responsive w-full" src="{{ asset('admin') }}/images/employee/salary.png" alt="now">
                                        <a href="{{route('salaries.create')}}">
                                            {{trans('website.salaries')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customers__table" style="overflow: auto;">
                            <table id="parent-info-table" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th class="text-center" >{{trans("website.code")}}</th>
                                            <th class="text-center" >{{trans("website.instructor_name")}}</th>
                                            <th class="text-center" >{{trans("website.birth_date")}}</th>
                                            <th class="text-center" >{{trans("website.address")}}</th>
                                            <th class="text-center" >{{trans("website.qualifications")}}</th>
                                            <th class="text-center" >{{trans("website.phone_number")}}</th>
                                            <th class="text-center" >{{trans("website.job")}}</th>
                                            <th class="text-center" >{{trans("website.salary")}}</th>
                                            <th class="text-center" >{{trans("website.standard")}}</th>
                                            <th class="text-center" >{{trans("website.branch")}}</th>
                                            <th class="text-center" >{{trans("website.starting_date")}}</th>
                                            <th class="text-center" >{{trans("website.nationalId")}}</th>
                                            <th class="text-center" >{{trans("website.collage")}}</th>
                                            <th class="text-center" >{{trans("website.email")}}</th>
                                            <th class="text-center" >{{trans("website.time_of_come")}}</th>
                                            <th class="text-center" >{{trans("website.time_of_out")}}</th>
                                            <th class="text-center" >{{trans("website.days_of_working")}}</th>
                                            <th class="text-center" >{{trans("website.managment")}}</th>
                                            <th class="text-center" >{{trans("website.actions")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td class="text-center">{{ $employee->id }}</td>
                                            <td class="text-center">{{ $employee->name }}</td>
                                            <td class="text-center">{{ $employee->birthdate }}</td>
                                            <td class="text-center">{{ $employee->address }}</td>
                                            <td class="text-center">{{ $employee->qualification }}</td>
                                            <td class="text-center">
                                                <a href="tel:{{ $employee->phone }}">
                                                    {{ $employee->phone }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $employee->job_title }}</td>
                                            <td class="text-center">{{ $employee->salary?->salary }}</td>
                                            <td class="text-center">{{ $employee->level }}</td>
                                            <td class="text-center">{{ $employee->branch }}</td>
                                            <td class="text-center">{{ $employee->hiring_date }}</td>
                                            <td class="text-center">{{ $employee->national_id }}</td>
                                            <td class="text-center">{{ $employee->university }}</td>
                                            <td class="text-center">
                                                <a href="mailto:{{ $employee->email }}">
                                                    {{ $employee->email }}
                                                </a>
                                            </td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">{{ $employee->work_days }}</td>
                                            <td class="text-center"></td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary" title="{{ __('Edit Details') }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger ms-2"
                                                        data-formid="delete_row_form_{{$employee->id}}" title="{{ __('Delete') }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form action="{{ route('employees.delete', $employee->id)}}"
                                                      method="post" id="delete_row_form_{{$employee->id }}">
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </div>
                                        </td>
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
