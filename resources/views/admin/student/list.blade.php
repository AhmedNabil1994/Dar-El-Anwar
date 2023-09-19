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
            <form method="get" action="{{route('student.index')}}" class="row">
                <div class="row">
                    <h1>{{trans("website.filter")}}</h1>
                </div>
                <div class="text-end mb-3 d-flex justify-content-start">
                    <button class="btn buttons-style button-excel" onclick="exportToExcel()">تحويل لملف إكسيل</button>
                    <a class="btn btn-secondary" id="printTable">قم بطباعة الجدول</a>


                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByLevel">{{trans("website.level")}}:</label>
                    <select class="form-control" name="filterByLevel">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($levels as $level)
                            <option value="{{$level->id}}">{{$level->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByJoining">{{trans("website.status")}}:</label>
                    <select class="form-control" name="filterByJoining">
                        <option value="">{{trans("website.all")}}</option>
                        <option value="1" {{request('filterByJoining') == 1? 'selected' : ''}}>{{trans("website.active")}}</option>
                        <option value="0" {{request('filterByJoining') === '0'? 'selected' : ''}}>{{trans("website.suspend")}}</option>
                        <option value="3" {{request('filterByJoining') == 3? 'selected' : ''}}>{{trans("website.excluded")}}</option>
                        <option value="4" {{request('filterByJoining') == 4? 'selected' : ''}}>{{trans("website.converted")}}</option>
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByGender">{{trans("website.gender")}}:</label>
                    <select class="form-control" name="filterByGender">
                        <option value="">{{trans("website.both")}}</option>
                        <option value="1" {{request('filterByGender') == 1? 'selected' : ''}}>{{trans("website.male")}}</option>
                        <option value="2" {{request('filterByGender') == 2? 'selected' : ''}}>{{trans("website.female")}}</option>
                    </select>
                </div>
                <div class="col-md-1 m-3">
                    <label for="filterByGender">{{trans("website.count")}} : </label>
                    <input class="form-control" value="{{$count}}" disabled>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByPeriod">{{trans("website.period")}}:</label>
                    <select class="form-control" name="filterByPeriod">
                        <option value="">{{trans("website.both")}}</option>
                        <option value="1" {{request('filterByPeriod') == 1? 'selected' : ''}}>{{trans('website.morning')}}</option>
                        <option value="2" {{request('filterByPeriod') == 2? 'selected' : ''}}>{{trans('website.evining')}}</option>
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByClass">{{trans("website.class")}}:</label>
                    <select class="form-control" name="filterByClass">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($class_rooms as $class_room)
                            <option value="{{$class_room->id}}" {{$class_room->id == request('filterByClass')? 'selected' : ''}}>{{$class_room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 m-3">
                    <label for="filterByBranch">{{trans("website.branch")}}:</label>
                    <select class="form-control" name="filterByBranch">
                        <option value="">{{trans("website.all")}}</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}" {{$branch->id == request('filterByBranch')? 'selected' : ''}}>{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-end mb-3 d-flex justify-content-start">
                    <button type="submit" id="btn_filter" class="btn buttons-style btn-sm">{{trans("website.filter")}}</button>
                    <button class="btn btn-secondary btn-sm ms-3" id="printButton">{{trans("website.print")}}</button>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-style mb-30 table-title-container " style="overflow-x:auto;">
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('website.students') }}</h2>
                        </div>
                        <div class="customers__table" style="overflow: auto;">
                            <table  class="row-border data-table-filter table-style table table-bordered table-striped" >
                                <thead >
                                <tr>
                                    <th>{{ trans('website.code') }}</th>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('website.branch') }}</th>
                                    <th>{{ trans('website.address') }}</th>
                                    <th>{{ trans('website.birth_date') }}</th>
                                    <th>{{ trans('website.level') }}</th>
                                    <th>{{ trans('website.class_name') }}</th>
                                    <th>{{ trans('website.period') }}</th>
                                    <th>{{ trans('website.phone_number') }}</th>
                                    <th>{{ trans('website.gender') }}</th>
                                    <th>{{ trans('website.actions') }}</th>
                                    <th>{{ trans('website.archived') }}</th>
                                    <th>{{ trans('website.under_enrollment') }}</th>
                                    <th>{{ trans('website.subscription') }}</th>
                                    <th>{{ trans('website.notes') }}</th>
                                    <th>{{ trans('website.meals') }}</th>
                                    <th>{{ trans('website.bills') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr class="removable-item">
                                        <td>{{ $student->code }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->branch->name }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->birthdate }}</td>
                                        <td>{{ $student->level->first()?->name }}</td>
                                        <td>{{ $student->class_room?->name }}</td>
                                        <td>
                                            @if($student->period === 1)
                                                {{ __('Morning') }}
                                            @elseif($student->period === 2)
                                                {{ __('Evening') }}
                                            @else
                                                {{ __('Both') }}
                                            @endif
                                        </td>
                                        <td>{{ $student->father()?->phone_number }}</td>
                                        <td>{{ $student->gender === 1 ? trans('website.male') : trans('website.female') }}</td>

                                        <td>
                                            <div class="action__buttons">
                                                {{--<a href="{{route('student.view', [$student->id])}}" class="btn btn-info" title="View Details">--}}
                                                {{--<i class="fa fa-eye"></i> View--}}
                                                {{--</a>--}}
                                                <a  href="{{route('student.edit', [$student->id])}}" class="btn btn-primary me-2" title="Edit Details">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger deleteItem" data-formid="delete_row_form_{{$student->id}}" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form action="{{route('student.delete', [$student->id])}}" method="post" id="delete_row_form_{{ $student->id }}">
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="archeived" data-id="{{$student->id}}">
                                                <img style="width:50px" src="{{asset('admin/images/students/archived.png')}}" alt="edit">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                @if($student->status == 0)
                                                    <img style="width:50px" src="{{asset('admin/images/students/under-enrollment.png')}}" alt="edit">
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('subscriptions.index',['child_name'=>[$student->name]])}}">
                                                <img style="width:50px" src="{{asset('admin/images/students/subscription.png')}}" alt="edit">
                                            </a>
                                        </td>
                                        <td>
                                            {{$student->notes}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.assignments.student_duties',$student->id)}}">
                                                <img style="width:50px" src="{{asset('admin/images/students/meals.png')}}" alt="edit">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('invoices.index',['child_name'=>$student->name])}}">
                                                <img style="width:50px" src="{{asset('admin/images/students/bills.png')}}" alt="edit">
                                            </a>
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
    <script>
        $('.archeived').on('click',function (){
            var student_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: "{{url('/')}}/admin/student/change_status/" + student_id,
                data: {"status": 2},
                success: function (data) {

                }
            })
        })

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script>
        // Function to export the HTML table to an Excel file
        function exportToExcel() {
            const table = document.getElementById('table1'); // Replace with your table ID
            const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
            XLSX.writeFile(wb, 'exported-data.xlsx');
        }

        // Function to print the Excel file
    </script>
    <script>
        $('#printTable').on('click', function() {
            console.log('test')
            const table = document.getElementById('table1'); // Replace with your table ID
            const newWin = window.open('','_blank');

            newWin.document.write(table.outerHTML);
            newWin.document.close();
            newWin.print();
            newWin.onafterprint = function() {
                newWin.close();
            };
        });
    </script>


@endpush
