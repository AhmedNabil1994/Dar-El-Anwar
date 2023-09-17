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
                                <h2>{{ __('Pages') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Page') }}</li>
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
                            <h2>{{ __('الاشتراك') }}</h2>
                            <a id="openModalBtn" class="btn buttons-style btn-sm">
                                <i class="fa fa-plus"></i> {{ __('أضف صفحة') }}
                            </a>
                        </div>
                        <div>
                          <form method="get" action="{{ route('subscriptions.index') }}" class="row justify-content-start mb-3">
                              <div class="col-md-3">
                                  <label class="form-label">اسم الطفل</label>
                                  <input multiple class="form-control" name="child_name" value="{{request('child_name')}}"/>
                              </div>
                              <div class="col-md-3">
                                  <label class="form-label">اسم الاشتراك</label>
                                  <input multiple class="form-control" name="subscription_name" value="{{request('subscription_name')}}"/>

                              </div>
                            <div class="col-md-3">
                                  <button class="btn buttons-style" type="submit">تم</button>
                            </div>
                          </form>
                        </div>
                        <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>اسم الطفل</th>
                                    <th>اسم الاشتراك</th>
                                    <th>المبلغ</th>
                                    <th>حالة السداد</th>
                                    <th>نشط/غير نشط</th>
                                    <th>إجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $subscription)
                                    <tr>
                                        <td>{{$subscription->student->name}}</td>
                                        <td>{{$subscription->subscription->name}}</td>
                                        <td>{{$subscription->subscription->value}}</td>
                                        <td>{{$subscription->payment_status}}</td>
                                        <td>
                                            @php
                                                $today = now(); // Current date
                                                $purchaseDate = $subscription->created_at; // Subscription purchase date
                                                $activeDays = $subscription?->active_days;
                                                $expirationDate = $purchaseDate->addDays($activeDays); // Calculate the expiration date
                                                // Check if the subscription is still active
                                                $isSubscriptionActive = $today->lte($expirationDate);
                                            @endphp
                                            {{$isSubscriptionActive ? 'نشط' : 'غير نشط'}}
                                        </td>
                                        <td>
                                            <a href="{{ route('subscriptions.show', $subscription) }}">تفاصيل</a>
                                        </td>
                                    </tr>
                                    <!-- Modal to display registered student names -->
                                    <div class="modal fade" id="studentNamesModal{{$subscription->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="studentNamesModalLabel{{$subscription->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentNamesModalLabel{{$subscription->id}}">Registered Students</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$subscriptions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div id="modal2" class="modal2">
                <div class="modal-content">
                    <!-- Content of the modal goes here -->
                    <div class="container">
                        <h2 class="mb-3">الطلبة المسجلين</h2>
                        <div class="row justify-content-content" id="data1">

                        </div>

                            <a id="closeModalBtn2" class="btn btn-primary">الغاء</a>
                    </div>
                </div>
            </div>

            <div id="modal" class="modal">
                <div class="modal-content">
                    <div class="container">
                        <h2 class="mb-3">اضافة اشتراك</h2>
                        <form method="POST" id="editForm" action="{{route('subscriptions.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم الاشتراك</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="value">القيمة</label>
                                <input type="number" name="value" id="value" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="department_id">القسم</label>
                                <select name="department_id" id="department_id" class="form-select" required>
                                    @foreach($departs as $depart)
                                        <option value="{{$depart->id}}">{{$depart->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="subject_id">المادة</label>
                                <select name="subject_id" id="subject_id" class="form-select" required>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">اضافة</button>
                            <a id="closeModalBtn" class="btn btn-primary">الغاء</a>
                        </form>
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

    <script>
        // Get references to the button and modal
        const openModalBtn = document.getElementById('openModalBtn');
        const modal = document.getElementById('modal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        // Function to open the modal
        function openModal() {
            // Update the form's action attribute
            $('#editForm').attr('action', '{{ route('subscriptions.store') }}');
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
        const openModalStudents = document.getElementById('openModalStudents');
        const modal2 = document.getElementById('modal2');
        const closeModalBtn2 = document.getElementById('closeModalBtn2');

        // Function to open the modal
        function closeModal2() {
            modal2.style.display = 'none';
        }
        // Event listeners for the button and close button
        $('#openModalBtn2').on('click',function (){
            $('#data1').empty()
            var subscription = $(this).data('subscription');
            console.log(subscription.students)
            subscription.students.forEach(function (student) {
                $('#data1').append(`<label class="form-label mx-3">${student.name}</label>`)
            });
            modal2.style.display = 'block';

        })
        closeModalBtn2.addEventListener('click', closeModal2);

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal2();
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.edit').click(function (e) {
                e.preventDefault(); // Prevent the default behavior of the link

                // Get the subscription ID from the data attribute
                var subscription = $(this).data('subscription');
                console.log(subscription.id)
                // Send an AJAX request to the edit route
                $.ajax({
                    type: 'GET',
                    url: 'subscriptions/edit/' + subscription.id, // Use the href attribute as the URL
                    success: function (data) {
                        $('#name').val(data.name);
                        $('#value').val(data.value);
                        $('#department_id').val(data.department_id);
                        $('#subject_id').val(data.subject_id);

                        // Update the form's action attribute
                            $('#editForm').attr('action', 'subscriptions/update/' + subscription.id );

                        // Show the modal
                        $('#modal').show();
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors that occur during the AJAX request
                        console.error('Error loading edit form:', error);
                    }
                });
            });
        });
    </script>


@endpush
