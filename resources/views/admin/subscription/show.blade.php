
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
                <div class="customers__area__header bg-style mb-30">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('تفاصيل الاشتراك') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('تفاصيل الاشتراك') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-md-12">
                        <div class="item-title">
                            <h2>{{ __('تفاصيل الاشتراك') }}</h2>
                        </div>
                        <form  action="{{route('subscriptions.update', $subscription)}}" method="post" class="row m-3">
                            @csrf
                            <h1 class="h3 mb-5" style = "margin-right:-30px">تفاصيل اشتراك: {{ $subscription->subscription->name }}</h1>

                            <div class="form-group col-md-3">
                                <label for="subscription_name"><strong>اسم الاشتراك:</strong></label>
                                <input class="form-control m-3" disabled value="{{ $subscription->subscription->name }}"/>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="subscription_amount"><strong>المبلغ:</strong></label>
                                <input class="form-control m-3" disabled value="{{ $subscription->subscription->value }}"/>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="subscription_status"><strong>حالة السداد:</strong></label>
                                <input class="form-control m-3" disabled value="{{$subscription->payment_status  == 'paid'? 'مدفوع' : 'غير مدفوع'}}"/>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="subscription_active"><strong>نشط/غير نشط:</strong></label>
                                <input class="form-control m-3" disabled value="{{ $isSubscriptionActive ? 'نشط' : 'غير نشط' }}"/>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="subscription_expiration"><strong>تاريخ انتهاء الاشتراك:</strong></label>
                                <input class="form-control m-3" disabled value="{{ $expirationDate->format('Y-m-d') }}"/>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="subscription_expiration"><strong>الطالب المسجل في هذا الاشتراك:</strong></label>
                                <input class="form-control m-3" disabled value="{{ $student->name }}"/>
                            </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    {{--                                        href="{{ route('payment.process', $subscription) }}"--}}
                                    <label for="subscription_expiration"><strong style = "font-size:20px">خيارات السداد:</strong></label>
                                    <div >
                                        <a id="openModalBtn" class="btn buttons-style pay-buttons">الدفع الآن</a>
                                        <a id="openModalBtn2" class="btn buttons-style ">المبلغ من الرصيد</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @php
        $currentMonth = now()->format('n'); // Get the current month as a number (1-12)
        $months = [
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
    @endphp

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="container">
                <h2 class="mb-3">سداد الاشتراك</h2>
                <form method="get" id="editForm" action="{{route('payment.process',$subscription)}}">
                    <div class="form-group mb-4">
                        <label for="value">المبلغ</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="value">دفعة عن شهر</label>
                        <select name="month" id="month" class="form-control">
                            @foreach ($months as $monthNumber => $monthName)
                                <option value="{{ $monthNumber }}" {{ $currentMonth == $monthNumber ? 'selected' : '' }}>
                                    @lang('website.'.$monthName)
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn print-button buttons-style">إضافة</button>
                    <a id="closeModalBtn" class="btn print-button buttons-style">الغاء</a>
                </form>
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
    <script>
        // Get references to the button and modal
        const openModalBtn = document.getElementById('openModalBtn');
        const modal = document.getElementById('modal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        // Function to open the modal
        function openModal() {
            // Update the form's action attribute

            $('#editForm').attr('action', '{{ route('payment.process', $subscription) }}');
            modal.style.display = 'block';
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = 'none';
        }

        // Event listeners for the button and close button
        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>


    <script>
        // Get references to the button and modal
        const openModalBtn2 = document.getElementById('openModalBtn2');

        // Function to open the modal
        function openModal() {
            // Update the form's action attribute

            $('#editForm').attr('action', '{{ route('payment.process.wallet', $subscription) }}');
            modal.style.display = 'block';
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = 'none';
        }

        // Event listeners for the button and close button
        openModalBtn2.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
@endpush
