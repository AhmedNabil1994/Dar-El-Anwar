@extends('layouts.admin')
@push('style')
    <style>
        @media print {
            .notprint {
                display: none;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('جميع الطلاب') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{route('page.index')}}">{{ __('الطلاب ') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customers__area bg-style mb-30">
                <form method="get" action="{{route('student.index')}}" class="row">

                    <div class="text-end mb-3 d-flex justify-content-start">
                        <button type="button" class="btn buttons-style button-excel" onclick="exportToExcel()">تحويل
                            لملف إكسيل
                        </button>
                        <button class="btn btn-secondary " id="printTable" type="button">قم بطباعة الجدول</button>
                        <a href="{{route('student.create')}}" class="btn buttons-style btn-sm mx-3">
                            <span>{{ __('إضافة طالب') }}</span>
                        </a>

                    </div>
                    <div class="row">
                        <h1>{{trans("website.filter")}}</h1>
                    </div>
                    <!-- <div class="form_container"> -->
                    <div class="col-md-3 m-3">
                        <label for="filterByLevel">{{trans("website.department")}}:</label>
                        <select class="form-control" name="filterByLevel">
                            <option value="">{{trans("website.all")}}</option>
                            @foreach($departs as $depart)
                                <option value="{{$depart->id}}"
                                    {{request('filterByLevel') == $depart->id? 'selected' : ''}}
                                >{{$depart->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(request()->routeIs('student.index'))
                        <div class="col-md-3 m-3">
                            <label for="filterByJoining">{{trans("website.status")}}:</label>
                            <select class="form-control" name="filterByJoining">
                                <option value="">{{trans("website.all")}}</option>
                                <option
                                    value="1" {{request('filterByJoining') == 1? 'selected' : ''}}>{{trans("website.active")}}</option>
                                <option
                                    value="4" {{request('filterByJoining') == 4? 'selected' : ''}}>{{trans("website.converted")}}</option>
                            </select>
                        </div>
                    @endif

                    <div class="col-md-3 m-3">
                        <label for="filterByGender">{{trans("website.gender")}}:</label>
                        <select class="form-control" name="filterByGender">
                            <option value="">{{trans("website.both")}}</option>
                            <option
                                value="1" {{request('filterByGender') == 1? 'selected' : ''}}>{{trans("website.male")}}</option>
                            <option
                                value="2" {{request('filterByGender') == 2? 'selected' : ''}}>{{trans("website.female")}}</option>
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
                            <option
                                value="1" {{request('filterByPeriod') == 1? 'selected' : ''}}>{{trans('website.morning')}}</option>
                            <option
                                value="2" {{request('filterByPeriod') == 2? 'selected' : ''}}>{{trans('website.evining')}}</option>
                        </select>
                    </div>
                    <div class="col-md-3 m-3">
                        <label for="filterByClass">{{trans("website.class")}}:</label>
                        <select class="form-control" name="filterByClass">
                            <option value="">{{trans("website.all")}}</option>
                            @foreach($class_rooms as $class_room)
                                <option
                                    value="{{$class_room->id}}" {{$class_room->id == request('filterByClass')? 'selected' : ''}}>{{$class_room->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 m-3">
                        <label for="filterByBranch">{{trans("website.branch")}}:</label>
                        <select class="form-control" name="filterByBranch">
                            <option value="">{{trans("website.all")}}</option>
                            @foreach($branches as $branch)
                                <option
                                    value="{{$branch->id}}" {{$branch->id == request('filterByBranch')? 'selected' : ''}}>{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 m-3">
                        <label for="filterByBranch">{{trans("website.search")}}:</label>
                        <input class="form-control" type="text" value="{{request('search_key')}}" name="search_key">
                    </div>
                    <div class="text-end mb-3 d-flex justify-content-start">
                        <button type="submit" id="btn_filter"
                                class="btn buttons-style btn-sm">{{trans("website.filter")}}</button>

                    </div>
                    <!-- </div> -->
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="all-students bg-style mb-30 table-title-container " style="overflow-x:auto;">
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('website.students') }}</h2>

                        </div>
                        <div class="customers__table  all-students" style="overflow: auto;">
                            <table id="table1"
                                   class="print-table row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>{{ trans('website.code') }}</th>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('website.branch') }}</th>
                                    <th>{{ trans('website.address') }}</th>
                                    <th>{{ trans('website.birth_date') }}</th>
                                    <th>{{ trans('website.level') }}</th>
                                    <th >{{ trans('website.class_name') }}</th>
                                    <th>{{ trans('website.period') }}</th>
                                    <th>{{ trans('website.phone_number') }}</th>
                                    <th>{{ trans('website.gender') }}</th>
                                    <th>{{ trans('website.actions') }}</th>
                                    <th class="notprint">{{ trans('الحالة') }}</th>
                                    <th class="notprint">{{ trans('website.subscription') }}</th>
                                    <th class="notprint">{{ trans('website.notes') }}</th>
                                    <th class="notprint">{{ trans('website.meals') }}</th>
                                    <th class="notprint">{{ trans('website.bills') }}</th>
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
                                        <td>
                                            @foreach($student->dept as $dept)
                                                /{{ $dept->name }}/ <br/>
                                            @endforeach
                                        </td>
                                        <td >
                                            @foreach($student->class_room as $classroom)
                                                /{{ $classroom->name }}/ <br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($student->period === 1)
                                                {{ __('صباحي') }}
                                            @elseif($student->period === 2)
                                                {{ __('مسائي') }}
                                            @else
                                                {{ __('كلاهما') }}
                                            @endif
                                        </td>
                                        <td>{{ $student->father()?->phone_number }}</td>
                                        <td>{{ $student->gender === 1 ? trans('website.male') : trans('website.female') }}</td>

                                        <td class="notprint">
                                            <div class="action__buttons">
                                                {{--<a href="{{route('student.view', [$student->id])}}" class="btn btn-info" title="View Details">--}}
                                                {{--<i class="fa fa-eye"></i> View--}}
                                                {{--</a>--}}
                                                <a href="{{route('student.edit', [$student->id])}}" class="btn  me-2"
                                                   title="Edit Details">
                                                    <!-- <i class="fa fa-edit"></i> -->
                                                    <img src="{{ asset('admin/images/icons/edit-2.svg') }}"
                                                         alt="{{ __('edit') }}">
                                                </a>
                                                <button type="button" class="btn  deleteItem"
                                                        data-formid="delete_row_form_{{$student->id}}" title="Delete">
                                                    <!-- <i class="fa fa-trash"></i> -->
                                                    <img src="{{ asset('admin/images/icons/trash-2.svg') }}"
                                                         alt="{{ __('Delete') }}">
                                                </button>
                                                <form action="{{route('student.delete', [$student->id])}}" method="post"
                                                      id="delete_row_form_{{ $student->id }}">
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </div>
                                        </td>
                                        <td class="notprint">
                                            <select class="student_status" data-url="{{route('student.change_status',$student->id)}}">
                                                <option value="1" @if($student->status == 1) selected @endif>نشط
                                                </option>
                                                <option value="3" @if($student->status == 3) selected @endif>مستبعد
                                                </option>
                                                <option value="4" @if($student->status == 4) selected @endif>محول
                                                </option>
                                            </select>
                                        </td>
                                        <td class="notprint">
                                            <a href="{{route('subscriptions.index',['child_name'=>[$student->name]])}}"
                                               class="image-container">
                                                <img src="{{asset('admin/images/students/subscription.png')}}"
                                                     alt="edit">
                                            </a>
                                        </td>
                                        <td>
                                            {{$student->notes}}
                                        </td>
                                        <td class="notprint">
                                            <a href="{{route('admin.assignments.student_duties',$student->id)}}"
                                               class="image-container">
                                                <img src="{{asset('admin/images/students/meals.png')}}" alt="edit">
                                            </a>
                                        </td>
                                        <td class="notprint">
                                            <a href="{{route('invoices.index',['child_name'=>$student->name])}}"
                                               class="image-container">
                                                <img src="{{asset('admin/images/students/bills.png')}}" alt="edit">
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
    <script src="{{asset('admin/js/jasonday-printThis-23be1f8/printThis.js')}}"></script>
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
        document.getElementById('printButton').addEventListener('click', function () {
            window.print();
        });
    </script>
    <script>
        $('.archeived').on('click', function () {
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
            const wb = XLSX.utils.table_to_book(table, {sheet: "Sheet 1"});
            XLSX.writeFile(wb, 'exported-data.xlsx');
        }

        // Function to print the Excel file
    </script>
    <script>
        $(document).ready(function () {
            $("#printTable").on("click", function printDiv() {
                console.log("clicked")
                $(".print-table").printThis({
                    importStyle: true,
                    loadCSS: "./main.css",
                })
            })
        })
    </script>
    <script>
        $('.student_status').on('change', function(){
            const selector = $(this);
            if (selector.val() == 3)
            {
                Swal.fire({
                    title: 'هل متأكد من استبعاد هذا الطالب',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم استبعده!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'GET',
                            url: $(this).data("url"),
                            data: {
                                status: selector.val(),
                            },
                            success: function (data) {
                                selector.closest('.removable-item').fadeOut('fast');
                                Swal.fire({
                                    title: 'تم استبعاده',
                                    html: ' <span style="color:red">تم استبعاده</span> ',
                                    timer: 2000,
                                    icon: 'success'
                                })
                            }
                        })
                    }
                })
            }
            else if(selector.val() == 4){
                $.ajax({
                    type: 'GET',
                    url: $(this).data("url"),
                    data: {
                        status: selector.val(),
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'تم نقله',
                            html: ' <span style="color:green">تم نقله</span> ',
                            timer: 2000,
                            icon: 'success'
                        })
                    }
                })
            }
            else if(selector.val() == 1){
                $.ajax({
                    type: 'GET',
                    url: $(this).data("url"),
                    data: {
                        status: selector.val(),
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'تم تنشيطه',
                            html: ' <span style="color:green">تم تنشيطه</span> ',
                            timer: 2000,
                            icon: 'success'
                        })
                    }
                })
            }

        });
    </script>

@endpush
