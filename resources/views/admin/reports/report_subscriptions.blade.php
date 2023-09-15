@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>قائمة الاشتراكات المدفوعة والغير</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('All Pages') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Add Page') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <form method="GET" action="{{route('reports.reportSubscribtions')}}"
                  class="customers__area bg-style mb-30 form-container row align-items-end">
                 <div class="form-group col-md-3 m-2">
                    <label for="date_from">تاريخ من</label>
                    <input type="date"
                           class="form-control"
                           name="date_from"
                           value="{{request('date_from')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="date_to">الي</label>
                    <input type="date"
                           class="form-control"
                           name="date_to"
                           value="{{request('date_to')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">

                <label for="student_name">بحث باسم الطفل</label>
                <input type="text"
                       class="form-control"
                       name="student_name"
                       value="{{request('student_name')}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="department_id">بحث القسم</label>
                    <select class="form-control"
                           name="department_id">
                        <option value="">اختر القسم</option>
                        @foreach($dapartments as $department)
                            <option value="{{$department->id}}"
                            {{$department->id == request('department_id') ? 'selected' : '' }}
                            >{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="class">الفصل</label>
                    <select class="form-control"
                            name="class">
                        <option value="">اختر الفصل</option>
                        @foreach($classes as $class)
                            <option value="{{$department->id}}"
                                {{$class->id == request('class') ? 'selected' : '' }}
                            >{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="class">الدفعة / الشهر</label>
                    <select class="form-control"
                            name="method">
                        <option value="">اختر الدفعة / الشهر</option>
                        <option value="month"
                        {{'month' == request('method') ? 'selected' : '' }}
                        >الشهر</option>
                        <option value="batch"
                            {{'batch' == request('method') ? 'selected' : '' }}
                        >الدفعة</option>
                    </select>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="subscription_id">الاشتراك</label>
                    <select class="form-control"
                            name="subscription_id">
                        <option value="">اختر الفصل</option>
                        @foreach($subscriptions as $subscription)
                            <option value="{{$subscription->id}}"
                                {{$subscription->id == request('subscription_id') ? 'selected' : '' }}
                            >{{$subscription->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="amount">المبلغ</label>
                    <select class="form-control"
                            name="amount">
                        <option value="">اختر المبلغ</option>
                        @foreach($amounts as $amount)
                            <option value="{{$amount}}"
                                {{$amount == request('amount') ? 'selected' : '' }}
                            >{{$amount}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 m-2">
                    <button type="submit" class="btn" style="background-color: #50bfa5;">
                        <i class="fa fa-filter"></i>
                    </button>
                </div>

            </form>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                        <thead style="background-color: #50bfa5;">
                        <tr>
                            <th>الكود</th>
                            <th>اسم الطفل</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>القسم</th>
                            <th>الفصل</th>
                            <th>الدفعة/الشهر</th>
                            <th>الاشتراك</th>
                            <th>المبلغ</th>
                            <th>رقم الفاتورة</th>
                            <th>اسم المستخدم</th>
                            <th>الحالة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students_subscriptions as $student_subscription)
                            <tr>
                                <td>{{ $student_subscription->student?->code }}</td>
                                <td>{{ $student_subscription->student?->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($student_subscription->created_at)->format('Y/m/d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($student_subscription->created_at)->format('h:m') }}</td>
                                <td>{{ $student_subscription->subscription?->department->name }}</td>
                                <td>{{ $student_subscription->student?->class?->name  }}</td>
                                <td>{{ $student_subscription->subscription?->type }}</td>
                                <td>{{ $student_subscription->subscription?->name }}</td>
                                <td>{{ $student_subscription->subscription?->value }}</td>
                                <td>{{ $student_subscription->subscription?->invoice->id }}</td>
                                <td>{{ $student_subscription->subscription?->invoice?->user?->name }}</td>
                                <td>{{$student_subscription->payment_status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$students_subscriptions->links()}}
                </div>
                  </div>
            <div class="customers__area bg-style mb-30 form-container row align-items-end">
                <div class="form-group col-md-3 m-2">
                    <label for="student_name">عدد الاطفال</label>
                    <input type="text"
                           disabled
                           class="form-control"
                           value="{{$students_count}}"/>
                </div>
                <div class="form-group col-md-3 m-2">

                    <label for="father_name">الاجمالي</label>
                    <input type="text"
                           class="form-control"
                           name="father_name"
                           value="{{$total}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="mother_name">مدفوع</label>
                    <input type="text"
                           class="form-control"
                           name="mother_name"
                           value="{{$total_paid}}"/>
                </div>
                <div class="form-group col-md-3 m-2">
                    <label for="mother_name">غير مدفوع</label>
                    <input type="text"
                           class="form-control"
                           name="mother_name"
                           value="{{$total_unpaid}}"/>
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
