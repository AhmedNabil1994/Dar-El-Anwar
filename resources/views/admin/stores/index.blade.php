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
            <div class="row justify-content-end">
                <div class="form-group col-md-3">
                    <a href="{{route('stores.movement.create')}}" class="form-control btn">
                        <i class="fas fa-cash-register"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>حركات المنتجات</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>رقم الإذن</th>
                            <th>نوع الحركة</th>
                            <th>اسم الصنف</th>
                            <th>الكمية</th>
                            <th>السعر</th>
                            <th>التاريخ والوقت</th>
                            <th>المورد</th>
                            <th>المستلم</th>
                            <th>الرصيد بعد الحركة</th>
                            <th>الرصيد الحالي</th>
                            <th>البيان</th>
                            <th>الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productMovements as $movement)
                            <tr>
                                <td>{{ $movement->permission_number }}</td>
                                <td>{{ $movement->movement_type }}</td>
                                <td>{{ $movement->product->name }}</td>
                                <td>{{ $movement->quantity }}</td>
                                <td>{{ $movement->price }}</td>
                                <td>{{ $movement->created_at }}</td>
                                <td>{{ $movement->supplier }}</td>
                                <td>{{ $movement->receiver }}</td>
                                <td>{{ $movement->balance_after_movement }}</td>
                                <td>{{ $movement->current_balance }}</td>
                                <td>{{ $movement->notes }}</td>
                                <td>
                                    <button data-url="{{route('stores.movement.delete',$movement->id)}}" type="submit" class="btn-action delete"  title="{{ __('Delete') }}">
                                        <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$productMovements->links()}}
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
