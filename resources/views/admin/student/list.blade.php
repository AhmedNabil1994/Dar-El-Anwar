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
            <form method="get" action="{{route('student.index')}}" class="row">
                <div class="row">
                    <h1>Filters</h1>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByLevel">Level:</label>
                    <select class="form-control" name="filterByLevel">
                        <option value="">All</option>

                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByJoining">Status:</label>
                    <select class="form-control" name="filterByJoining">
                        <option value="">All</option>
                        <option value="2" {{request('filterByJoining') == 2? 'selected' : ''}}>Active</option>
                        <option value="1" {{request('filterByJoining') == 1? 'selected' : ''}}>Suspend</option>
                        <option value="3" {{request('filterByJoining') == 3? 'selected' : ''}}>Excluded</option>
                        <option value="4" {{request('filterByJoining') == 4? 'selected' : ''}}>Converted</option>
                        <option value="5" {{request('filterByJoining') == 5? 'selected' : ''}}>Joining</option>
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByGender">Gender:</label>
                    <select class="form-control" name="filterByGender">
                        <option value="">Both</option>
                        <option value="1" {{request('filterByGender') == 1? 'selected' : ''}}>Male</option>
                        <option value="2" {{request('filterByGender') == 2? 'selected' : ''}}>Female</option>
                    </select>
                </div>
                <div class="col-md-1 m-3">
                    <label for="filterByGender">Count : </label>
                    <input class="form-control" value="{{$count}}" disabled>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByPeriod">Period:</label>
                    <select class="form-control" name="filterByPeriod">
                        <option value="">Both</option>
                        <option value="1" {{request('filterByPeriod') == 1? 'selected' : ''}}>Morning</option>
                        <option value="2" {{request('filterByPeriod') == 2? 'selected' : ''}}>Evening</option>
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByClass">Class:</label>
                    <select class="form-control" name="filterByClass">
                        <option value="">All</option>
                        @foreach($class_rooms as $class_room)
                            <option value="{{$class_rooms->id}}" {{$class_rooms->id == request('filterByClass')? 'selected' : ''}}>{{$class_rooms->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByBranch">Branch:</label>
                    <select class="form-control" name="filterByBranch">
                        <option value="">All</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}" {{$branch->id == request('filterByBranch')? 'selected' : ''}}>{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mx-3 mb-3">
                    <button id="btn_filter" class="btn btn-primary mt-4">Filter</button>
                </div>
            </form>
            <div>
                <button class="btn btn-secondary" id="printButton">Print</button>
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
                                    <th>{{ __('Level') }}</th>
                                    <th>{{ __('Branch') }}</th>
                                    <th>{{ __('Period') }}</th>
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
                                        <td>{{ $student->level }}</td>
                                        <td>{{ $student->branch->name }}</td>
                                        <td>
                                            @if($student->period === 1)
                                                {{ __('Morning') }}
                                            @elseif($student->period === 2)
                                                {{ __('Evening') }}
                                            @else
                                                {{ __('Both') }}
                                            @endif
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
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
                window.print();
        });
    </script>
@endpush
