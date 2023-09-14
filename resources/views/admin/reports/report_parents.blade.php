@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Add Page') }}</h2>
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
            <div class="row mb-4">
                <div class="form-group col-md-3">
                    <label for="from">بحث في عمر الاطفال من</label>
                    <input type="number"
                           class="form-control"
                           name="from"
                           value="{{request('from')}}"/>
                </div>
                <div class="form-group col-md-3">

                    <label for="to">الي</label>
                    <input type="number"
                           class="form-control"
                           name="to"
                           value="{{request('to')}}"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="studen_name">فترة</label>
                    <select name="period" class="form-select">
                        <option value="">اختر الفترة</option>
                        <option value="1"
                            {{request('period') == 1?'selected':''}}
                        >صباحي</option>
                        <option value="2"
                            {{request('period') == 2?'selected':''}}
                        >مسائي</option>
                    </select>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>تقرير مفصل عن أعمار الطلبة وتواريخ ميلادهم</h2>
                    <table class="table table-bordered">
                        <thead>
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
{{--                                <td>--}}
{{--                                    <a href="{{route('student.edit',$student_age->id)}}" class="btn-action view"  title="{{ __('معايبة') }}">--}}
{{--                                        <i class="fa fa-eye"></i>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
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
