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
                            <h2>{{ __('Page List') }}</h2>
                            <a id="openModalBtn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> {{ __('Add Page') }}
                            </a>
                        </div>
                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>كود الاشتراك</th>
                                    <th>اسم الاشتراك</th>
                                    <th>قيمة الاشتراك</th>
                                    <th>العدد</th>
                                    <th>الطلبة المسجلين</th>
                                    <th>الإجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $subscription)
                                    <tr>
                                        <td>{{$subscription->id}}</td>
                                        <td>{{$subscription->name}}</td>
                                        <td>{{$subscription->value}}</td>
                                        <td>{{$subscription->count}}</td>
                                        <td>
                                            <!-- Add subscription-related actions/buttons here -->
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                {{--                                                @can('edit-admins', 'admins')--}}

                                                <a class="btn-action mr-1 edit" data-toggle="tooltip" title="Edit" data-subscription-id="{{ $subscription }}">
                                                    <img src="{{ asset('admin/images/icons/edit-2.svg') }}" alt="edit">
                                                </a>
                                                {{--                                                @endcan--}}

                                                {{--                                                    @can('delete-admins', 'admins')--}}
                                                <form action="{{ route('subscriptions.destroy',$subscription) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action delete"  title="{{ __('Delete') }}">
                                                        <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                                    </button>
                                                </form>
                                                {{--                                                @endcan--}}

                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal to display registered student names -->
                                    <div class="modal fade" id="studentNamesModal{{$subscription->id}}" tabindex="-1" role="dialog" aria-labelledby="studentNamesModalLabel{{$subscription->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentNamesModalLabel{{$subscription->id}}">Registered Students</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
{{--                                                    <ul>--}}
{{--                                                        @foreach($subscription->students as $student)--}}
{{--                                                            <li>{{$student->name}}</li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
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

            <div id="modal" class="modal">
                <div class="modal-content">
                    <!-- Content of the modal goes here -->
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
        $(document).ready(function () {
            $('.edit').click(function (e) {
                e.preventDefault(); // Prevent the default behavior of the link

                // Get the subscription ID from the data attribute
                var subscriptionId = $(this).data('subscription');

                // Send an AJAX request to the edit route
                $.ajax({
                    type: 'GET',
                    url: '{{ route('subscriptions.edit', $subscription) }}', // Use the href attribute as the URL
                    success: function (data) {
                        $('#name').val(data.name);
                        $('#value').val(data.value);
                        $('#department_id').val(data.department_id);
                        $('#subject_id').val(data.subject_id);

                        // Update the form's action attribute
                        $('#editForm').attr('action', '{{ route('subscriptions.update',$subscription) }}');

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
