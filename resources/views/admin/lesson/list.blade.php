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
{{--                                <h2>{{ __('Students') }}</h2>--}}
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
{{--                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All student') }}</li>--}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="filter_department">Department:</label>
                    <select class="form-control" id="filter_department">
                        <option value="">All</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Business Administration">Business Administration</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filter_level">Level:</label>
                    <select class="form-control" id="filter_level">
                        <option value="">All</option>
                        <option value="Freshman">Freshman</option>
                        <option value="Sophomore">Sophomore</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filter_status">Status:</label>
                    <select class="form-control" id="filter_status">
                        <option value="">All</option>
                        <option value="Enrolled">Enrolled</option>
                        <option value="Suspended">Suspended</option>
                        <option value="Graduated">Graduated</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button id="btn_filter" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('All Students') }}</h2>
                        </div>
                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Class Room') }}</th>
                                    <th>{{ __('Joining Date') }}</th>
                                    <th>{{ __('Birth Date') }}</th>
                                    <th>{{ __('Phone Number') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th>{{ __('Gender') }}</th>
                                    <th>{{ __('City') }}</th>
                                    <th>{{ __('Branch ID') }}</th>
                                    <th>{{ __('Period') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Updated At') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr class="removable-item">
                                        <td>{{ $student->code }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->classroom }}</td>
                                        <td>{{ $student->joining_date }}</td>
                                        <td>{{ $student->birthdate }}</td>
                                        <td>{{ $student->phone_number }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->gender === 1 ? __('Male') : __('Female') }}</td>
                                        <td>{{ $student->getCity()->first()->city_name_en }}</td>
                                        <td>{{ $student->branch_id }}</td>
                                        <td>
                                            @if($student->period === 1)
                                                {{ __('Morning') }}
                                            @elseif($student->period === 2)
                                                {{ __('Evening') }}
                                            @else
                                                {{ __('Both') }}
                                            @endif
                                        </td>

                                        <td>{{ $student->created_at }}</td>
                                        <td>{{ $student->updated_at }}</td>

                                        <td>
                                            <span id="hidden_id" style="display: none">{{ $student->id }}</span>
                                            <select name="status" class="status label-inline font-weight-bolder mb-1 badge badge-info">
                                                <option value="1" @if($student->status == 1) selected @endif>{{ __('Approved') }}</option>
                                                <option value="2" @if($student->status == 2) selected @endif>{{ __('Blocked') }}</option>
                                            </select>
                                        </td>

                                        <td>
                                            <div class="action__buttons">
{{--                                                <a href="{{route('student.view', [$student->id])}}" class="btn btn-info" title="View Details">--}}
{{--                                                    <i class="fa fa-eye"></i> View--}}
{{--                                                </a>--}}
                                                <a href="{{route('student.edit', [$student->id])}}" class="btn btn-primary" title="Edit Details">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-danger deleteItem" data-formid="delete_row_form_{{$student->id}}" title="Delete">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                                <form action="{{route('student.delete', [$student->id])}}" method="post" id="delete_row_form_{{ $student->id }}">
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
{{--                                {{$students->links()}}--}}
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
        $(".status").change(function () {
            var id = $(this).closest('tr').find('#hidden_id').html();
            var status_value = $(this).closest('tr').find('.status option:selected').val();
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
                    $.ajax({
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
        $(document).ready(function () {
            $('#btn_filter').on('click', function () {
                var filter_department = $('#filter_department').val();
                var filter_level = $('#filter_level').val();
                var filter_status = $('#filter_status').val();

                $.ajax({
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
@endpush
