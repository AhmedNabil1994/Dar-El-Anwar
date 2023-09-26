@extends('layouts.admin')

@push('style')
    <style>
        /* Styling for the modal */
        .modal {
            display: none;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .modal2 {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
@endpush
@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('اضافة اشتراك لباص') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('اضافة اشتراك لباص') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('اضافة اشتراك لباص') }}</h2>

                        </div>
                        <div>
                            <form method="post" action="{{ route('admin.bus.subscribtion.store') }}"
                                  class="row justify-content-center align-items-end mb-3">
                                @csrf
                                <div class="col-md-3">
                                    <label class="form-label">اسم الباص</label>
                                    <select required class="form-control" name="bus_id">
                                        <option value="">__</option>
                                        @foreach($buses as $bus)
                                            <option value="{{$bus->id}}">{{$bus->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">اسم الاشتراك</label>
                                    <select required class="form-control"
                                            name="subscription_id">
                                        <option value="">اختر الاشتراك</option>
                                        @foreach($subscriptions as $subscription)
                                            <option value="{{$subscription->id}}"
                                            >{{$subscription->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn buttons-style" type="submit">اشتراك</button>
                                </div>
                            </form>

                        </div>
{{--                        <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">--}}
{{--                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>اسم الطفل</th>--}}
{{--                                    <th>اسم الاشتراك</th>--}}
{{--                                    <th>المبلغ</th>--}}
{{--                                    <th>المدفوع</th>--}}
{{--                                    <th>الرصيد</th>--}}
{{--                                    <th>الباقي</th>--}}
{{--                                    <th>نشط/غير نشط</th>--}}
{{--                                    <th>إجراءات</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($subscriptions as $subscription)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$subscription->student?->name}}</td>--}}
{{--                                        <td>{{$subscription->subscription?->name}}</td>--}}
{{--                                        <td>{{$subscription->subscription?->value * $subscription->subscription?->batch}}</td>--}}
{{--                                        <td>{{$subscription->subscription?->value * $subscription->rec_time}}</td>--}}
{{--                                        <td>{{$subscription->student?->wallet}}</td>--}}
{{--                                        <td>{{$subscription->subscription?->value * ($subscription->subscription?->batch - $subscription->rec_time)}}</td>--}}
{{--                                        <td>--}}
{{--                                            @php--}}
{{--                                                $today = now(); // Current date--}}
{{--                                                $purchaseDate = $subscription->created_at; // Subscription purchase date--}}
{{--                                                $activeDays = $subscription?->active_days;--}}
{{--                                                $expirationDate = $purchaseDate->addDays($activeDays); // Calculate the expiration date--}}
{{--                                                // Check if the subscription is still active--}}
{{--                                                $isSubscriptionActive = $today->lte($expirationDate);--}}
{{--                                            @endphp--}}
{{--                                            {{$isSubscriptionActive ? 'نشط' : 'غير نشط'}}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ route('subscriptions.show', $subscription) }}">تفاصيل</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <!-- Modal to display registered student names -->--}}
{{--                                    <div class="modal fade" id="studentNamesModal{{$subscription->id}}" tabindex="-1" role="dialog"--}}
{{--                                         aria-labelledby="studentNamesModalLabel{{$subscription->id}}" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog" role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h5 class="modal-title" id="studentNamesModalLabel{{$subscription->id}}">Registered Students</h5>--}}
{{--                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <div class="mt-3">--}}
{{--                                {{$subscriptions->links()}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
