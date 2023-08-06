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
                                <h2>{{ __('Absence') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Student') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <h1> </h1>

            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">

                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Student Code') }}</th>
                                    <th>{{ __('Student Name') }}</th>
                                    <th>{{ __('Department') }}</th>
                                    <th>{{ __('Class') }}</th>
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Teacher') }}</th>
                                    <th>{{ __('Registered') }}</th>
                                    <th>{{ __('Registering Time') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($students as $student)
                                    <tr class="removable-item">
                                        <td>{{\Carbon\Carbon::today()->format('d/m/Y')}}</td>
                                        <td>{{$student->code}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->department}}</td>
                                        <td>{{$student->classroom}}</td>
                                        <td>ss</td>
                                        <td>
                                            <select class="form-select-sm" name="instructor_id">
                                                @foreach($instructors as $instructor)
                                                    <option value="{{$instructor->id}}">{{$instructor->employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{{is_null($student->is_absence->first()) ? "Not Bone" : "Done"}}</td>
                                        <td>{{is_null($student->is_absence->first()) ? "" : $student->is_absence->first()->created_at->format('d/m/y')}}</td>
                                        <td>
                                            <div class="action__buttons">
                                               <input type="checkbox" class="input__checkbox" data-value="{{$student->id}}" onchange="is_absence(this)" name="is_absence" {{is_null($student->is_absence->first())?"":"checked"}}/>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$students->appends(request()->input())->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
{{--            @endcan--}}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.btn-action.delete', function(e) {
            e.preventDefault();
            var admin_id = $(this).data('id');
            var url = "{{ route('admins.delete') }}";

            $.ajax({
                type: "POST",
                url: url,
                data: { id: admin_id, _token: "{{ csrf_token() }}" },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        window.location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    // console.log(xhr.responseText);
                    alert('Error: ' + xhr.responseText);
                }
            });
        });



    </script>
    <!-- Ajax Search Script -->
    <script>
        $(function() {
            $('#searchForm input[name="search"]').on('keyup', function() {
                alert('hello');
                $.ajax({
                    url: '{{ route("admins.index") }}',
                    type: 'GET',
                    data: $('#searchForm').serialize(),
                    success: function(res) {
                        $('#admins-list').html(res);
                    },
                    error: function(jqXHR, status, error) {
                        // console.log(status + ": " + error);
                    }
                });
            });
        });
    </script>

    <script>

        function is_absence(data)
        {
            data = {
                'student_id' : data.getAttribute('data-value'),
                'is_checked' : data.checked,
                'instructor_id' : data.parentNode.parentNode.parentNode.getElementsByTagName('td')[6].getElementsByTagName('select')[0].value,
            }

            $.ajax({
                url: '{{ route("absence.store") }}',
                type: 'get',
                data: data,
                success: function(res) {
                    console.log(res);
                },
                error: function(jqXHR, status, error) {
                    // console.log(status + ": " + error);
                }
            });
        }

    </script>
@endpush
