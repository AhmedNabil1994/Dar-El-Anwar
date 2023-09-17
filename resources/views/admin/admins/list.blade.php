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
                                <h2>{{ trans('website.admins') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.allAdmins') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <h1> </h1>



{{--             {{dd(auth()->guard('admins')->user()->roles('manage-admins'))}}--}}
{{--                @if (auth()->guard('admins')->user()->hasPermissionTo('manage-admins'))--}}

{{--                <p>You have the "manage-admins" permission on the "web" guard</p>--}}
{{--                @endif--}}
{{--             --}}


{{--            </h1>--}}
{{--                @can('manage-admins', 'web')--}}
{{--            @endcan--}}

{{--            @can('manage-admins', 'admins')--}}
{{--            @endcan--}}


{{--        @can('manage-admins', 'admins')--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('website.admin_list') }}</h2>
                            <a href="{{ route('admins.create') }}" class="btn buttons-style btn-sm">
                                <i class="fa fa-plus"></i> {{ trans('website.add_admin') }}
                            </a>
                        </div>

                        <div class="customers__table">
                            <table id="customers-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('website.email') }}</th>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('website.phone_number') }}</th>
                                    <th>{{ trans('website.status') }}</th>
                                    <th>{{ trans('website.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admins as $admin)
                                    <tr class="removable-item">
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>{{ $admin->hidden ? __('Inactive') : __('Active') }}</td>
                                        <td>
                                            <div class="action__buttons">
{{--                                                @can('edit-admins', 'admins')--}}

                                                <a href="{{ route('admins.edit', $admin) }}" class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
{{--                                                @endcan--}}

{{--                                                    @can('delete-admins', 'admins')--}}

                                                <button type="button" class="btn-action delete" data-id="{{ $admin->id }}" title="{{ __('Delete') }}">
                                                    <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                                </button>
{{--                                                @endcan--}}

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$admins->appends(request()->input())->links()}}
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
@endpush
