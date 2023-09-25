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
                    <div class="customers__area__header bg-style mb-30">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('الاشتراكات') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('الاشتراكات') }}</li>
                                </ul>
                            </nav>
                        </div>
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
                                <i class="fa fa-plus"></i> {{ __('أضف اشتراك') }}
                            </a>
                        </div>
                        <div>
                          <form method="get" action="{{ route('subscriptions.index') }}" class="row align-items-end justify-content-start mb-3">

                              <div class="col-md-3">
                                  <label class="form-label">اسم الطفل</label>
                                      <select multiple class="form-select" name="child_name[]">
                                          <option value="">اختر اسم الطفل</option>
                                          @foreach($students as $student)
                                                <option value="{{$student->name}}"
                                                {{request('child_name')?in_array($student->name,request('child_name'))?'selected':'':''}}
                                                >{{$student->name}}</option>
                                          @endforeach
                                      </select>
                              </div>
                              <div class="col-md-3">
                                  <label class="form-label">اسم الاشتراك</label>
                                  <select multiple class="form-select" name="subscription_name[]">
                                      <option value="">اختر اشتراك</option>
                                      @foreach($subscription_names as $subscription_name)
                                            <option value="{{$subscription_name->name}}"
                                            {{request('subscription_name')?in_array($subscription_name->name,request('subscription_name'))?'selected':'':''}}
                                            >{{$subscription_name->name}}</option>
                                      @endforeach
                                  </select>

                              </div>
                            <div class="col-md-3">
                                  <button class="btn buttons-style" type="submit">
                                      <i class="fa fa-filter"></i>
                                  </button>

                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                        </div>
                        <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">

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
                                        <td>
                                            <!-- Add subscription-related actions/buttons here -->
                                            {{$subscription?->students->count()}}
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a id="openModalBtn2" class="btn-action mr-1 "
                                                    data-subscription="{{ $subscription }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                {{--                                                @can('edit-admins', 'admins')--}}

                                                <a class="btn-action mr-1 edit" data-toggle="tooltip" title="Edit" data-subscription="{{ $subscription }}">
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
                        <h2 class="mb-3">إضافة اشتراك</h2>
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
                                <label for="value">الدفعات</label>
                                <input type="number" name="batch" id="batch" class="form-control" required>
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
                            <button type="submit" class="btn buttons-style">إضافة</button>
                            <a id="closeModalBtn" class="btn btn-secondary">الغاء</a>
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
                        $('#batch').val(data.batch);
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
