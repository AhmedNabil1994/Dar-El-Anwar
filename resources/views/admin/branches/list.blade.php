@extends('layouts.admin')

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
                                    <h2>{{ __('جميع الفروع') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{route('page.index')}}">{{ __('الفروع ') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="all-students bg-style mb-30 table-title-container " style="overflow-x:auto;">
                        @can('create-branch')
                            <div class="ibox-title">
                                <a href="{{route('branches.create')}}" class="btn buttons-style">{{__('اضافة فرع')}}</a>

                            </div>
                        @endcan
                        <div class="item-title d-flex justify-content-between ms-3 my-2">
                            <h2>{{ trans('الفروع') }}</h2>
                        </div>
                        <div class="customers__table print-table all-students" style="overflow: auto;">
                            <table id="table1"
                                   class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>الاجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branches as $branch)
                                    <tr class="removable-item">
                                        <td>{{ $branch->name }}</td>
                                        <td>
                                            @can('edit-branch')
                                                <a href="{{ route('branches.edit', $branch) }}"
                                                   class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                    <i class="fa text-info fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete-branch')
                                                <a href="javascript:void(0);"
                                                   data-url="{{route('branches.delete', [$branch->id])}}"
                                                   class="btn-action delete" title="Delete">
                                                    <i class="fa text-danger fa-trash"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="mt-3">
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
        $('#printTable').on('click', function () {
            console.log('test')
            const table = document.getElementById('table1'); // Replace with your table ID
            const newWin = window.open('', '_blank');

            newWin.document.write(table.outerHTML);
            newWin.document.close();
            newWin.print();
            newWin.onafterprint = function () {
                newWin.close();
            };
        });
    </script>

@endpush
