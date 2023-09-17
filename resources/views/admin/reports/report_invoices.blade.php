@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
           @include('admin.common.breadcrumbs',['title' => 'قائمة الفواتير'])


            <form method="GET" action="{{route('reports.reportInvoices')}}"
                  class="customers__area bg-style mb-30 form-container row align-items-end">
                <div class="form-group col-md-3 m-2">
                    <label for="date_from">تاريخ</label>
                    <input type="date"
                           class="form-control"
                           name="date"
                           value="{{request('date')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">

                    <label for="student_name">بحث باسم الطالب</label>
                    <input type="text"
                           class="form-control"
                           name="student_name"
                           value="{{request('student_name')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="invoice_id">رقم الفاتورة</label>
                    <input type="number"
                           class="form-control"
                           name="invoice_id"
                           value="{{request('invoice_id')}}"/>
                </div>
                <div class="form-group col-md-1 m-2">
                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                        <i class="fa fa-filter"></i>
                    </button>
                </div>

            </form>

            <hr>
            <div class="row">
                <div class="col-md-12 customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead >
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>اسم الطالب</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>قيمة الفاتورة</th>
                            <th>الدفعة عن شهر</th>
                            <th>الاشتراك</th>
                            <th>الملاحظات</th>
                            <th>المستخدم</th>
                            <th>طباعة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->student?->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($invoice->paid_at)->format('Y/m/d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($invoice->paid_at)->format('h:m') }}</td>
                                <td>{{ $invoice->amount }}</td>
                                <td>{{ \Carbon\Carbon::parse($invoice->paid_at)->format('F')  }}</td>
                                <td>{{ $invoice->subscription?->subscription?->name }}</td>
                                <td>{{ $invoice->note }}</td>
                                <td>{{ $invoice->user?->name }}</td>
                                <td><a href="{{ route('invoices.print',$invoice->id) }}" >
                                    <i class="fa fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$invoices->links()}}
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
@endpush
