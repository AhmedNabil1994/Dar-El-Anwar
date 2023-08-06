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
                            <h2>{{ __('All Employees') }}</h2>
                        </div>
                        <div class="customers__table">
                            <table id="parent-info-table" class="row-border data-table-filter table-style">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Qualification</th>
                                        <th>University</th>
                                        <th>Graduation Date</th>
                                        <th>National ID</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthdate</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Salary</th>
                                        <th>Salary Cycle</th>
                                        <th>Hiring Date</th>
                                        <th>Work Days</th>
                                        <th>Branch</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->address }}</td>
                                            <td>{{ $employee->qualification }}</td>
                                            <td>{{ $employee->university }}</td>
                                            <td>{{ $employee->graduation_date }}</td>
                                            <td>{{ $employee->national_id }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->birthdate }}</td>
                                            <td>{{ $employee->job_title }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ $employee->salary_cycle }}</td>
                                            <td>{{ $employee->hiring_date }}</td>
                                            <td>{{ $employee->work_days }}</td>
                                            <td>{{ $employee->branch }}</td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary" title="{{ __('Edit Details') }}">
                                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                                </a>
                                                <button type="button" class="btn btn-danger deleteItem"
                                                        data-formid="delete_row_form_{{$employee->id}}" title="{{ __('Delete') }}">
                                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
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
{{--                                {{$Employees->links()}}--}}
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
