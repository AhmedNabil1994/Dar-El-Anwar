
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
                                <h2>{{ __('Edit Page') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{ __('All Pages') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Page') }}</li>
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
                            <h2>{{ __('Edit Page') }}</h2>
                        </div>
                        <form action="{{route('subscriptions.update', $subscription)}}" method="post" class="form-horizontal">
                            @csrf
                            <h1>تفاصيل الاشتراك: {{ $subscription->subscription->name }}</h1>

                            <div class="form-group">
                                <label for="subscription_name"><strong>اسم الاشتراك:</strong></label>
                                <p class="form-control-static">{{ $subscription->subscription->name }}</p>
                            </div>

                            <div class="form-group">
                                <label for="subscription_amount"><strong>المبلغ:</strong></label>
                                <p class="form-control-static">{{ $subscription->subscription->value }}</p>
                            </div>

                            <div class="form-group">
                                <label for="subscription_status"><strong>حالة السداد:</strong></label>
                                <p class="form-control-static">{{$subscription->payment_status}}</p>
                            </div>

                            <div class="form-group">
                                <label for="subscription_active"><strong>نشط/غير نشط:</strong></label>
                                <p class="form-control-static">{{ $isSubscriptionActive ? 'نشط' : 'غير نشط' }}</p>
                            </div>

                            <div class="form-group">
                                <label for="subscription_expiration"><strong>تاريخ انتهاء الاشتراك:</strong></label>
                                <p class="form-control-static">{{ $expirationDate->format('Y-m-d') }}</p>
                            </div>

                            <h2>الطالب المسجل في هذا الاشتراك:</h2>
                            <ul>
                                    <li>{{ $student->name }}</li>
                            </ul>
                            @if(!$isSubscriptionActive)
                                <h2>خيارات السداد:</h2>
                                <a href="{{ route('payment.process', $subscription) }}" class="btn btn-primary">الدفع الآن</a>
                                <a href="{{ route('payment.process.wallet', $subscription) }}" class="btn btn-primary">المبلغ من الرصيد</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <!-- Summernote CSS - CDN Link -->
    <link href="{{ asset('common/css/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/slug.js')}}"></script>
    <script src="{{asset('admin/js/custom/form-editor.js')}}"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({dialogsInBody: true});
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
@endpush
