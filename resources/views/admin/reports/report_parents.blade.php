@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('أضف صفحة') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('كل الصفحات') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('أضف صفحة') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="customers__area bg-style mb-30">
            <form method="GET" action="{{route('reports.reportParents')}}"
                  class="form-container row align-items-end">
                <div class="form-group col-md-3">
                        <label for="student_name">بحث باسم الطفل</label>
                        <input type="text"
                               class="form-control"
                               name="student_name"
                               value="{{request('student_name')}}"/>
                </div>
                <div class="form-group col-md-3">

                    <label for="father_name">بحث باسم الاب</label>
                    <input type="text"
                           class="form-control"
                           name="father_name"
                           value="{{request('father_name')}}"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="mother_name">بحث باسم الام</label>
                    <input type="text"
                           class="form-control"
                           name="mother_name"
                           value="{{request('mother_name')}}"/>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                        <i class="fa fa-filter"></i>
                    </button>
                </div>

            </form>
            </div>

            <div class="row">

            <div class="col-md-12">

                <div class="customers__area bg-style mb-30">
                    <button type="button" class="btn m-3 buttons-style button-excel" onclick="exportToExcel()">تحويل لملف إكسيل</button>

                    <div class="col-md-12 customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                    <table  id="table1" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead style="background-color: #50bfa5;">
                        <tr>
                            <th>اسم الطفل</th>
                            <th>الاب</th>
                            <th>الام</th>
                            <th>وظيفة الاب</th>
                            <th>وطيفة الام</th>
                            <th>هاتف الاب</th>
                            <th>هاتف الام</th>
                            <th>الحالة الاجتماعية</th>
                            <th>معاينة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->father()?->name }}</td>
                                <td>{{ $student->mother()?->name }}</td>
                                <td>{{ $student->father()?->profession }}</td>
                                <td>{{ $student->mother()?->profession }}</td>
                                <td>{{ $student->father()?->phone_number }}</td>
                                <td>{{ $student->mother()?->phone_number }}</td>
                                <td>{{ $student->parents_marital_status }}</td>
                                <td>
                                    <a href="{{route('student.edit',$student->id)}}" class="btn-action view"  title="{{ __('معايبة') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$students->links()}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on("click", "a.delete", function () {
            const selector = $(this);
            Swal.fire({
                title: 'Sure! You want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: $(this).data("url"),
                        success: function (data) {
                            selector.closest('.removable-item').fadeOut('fast');
                            Swal.fire({
                                title: 'Deleted',
                                html: ' <span style="color:red">Item has been deleted</span> ',
                                timer: 2000,
                                icon: 'success'
                            })
                        }
                    })
                }
            })
        });
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
@endpush
