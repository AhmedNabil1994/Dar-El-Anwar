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


            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title btn-title-container">
                            <h2>{{ trans('website.admin_list') }}</h2>
                           @can('add-admin')
                                <a href="{{ route('admins.create') }}" class="btn buttons-style btn-sm">
                                    <i class="fa fa-plus"></i> {{ trans('website.add_admin') }}
                                </a>
                            @endcan
                        </div>
                        <div class="row m-3 ">
                            <form method="GET" class="row align-items-end justify-content-center" action="{{ route('admins.index') }}">
                                <div class="col-md-3">
                                    <label class="form-label">بحث</label>
                                    <input class="form-control" value="{{request('search')}}" name="search">
                                </div>
                                <div class="col-md-3">
                                    <button class="btn buttons-style"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="customers__table" style="overflow: auto">
                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead >
                                <tr>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('website.username') }}</th>
                                    <th>{{ trans('website.email') }}</th>
                                    <th>{{ trans('website.phone_number') }}</th>
                                    <th>{{ trans('الصفة') }}</th>
                                    <th>{{ trans('المجموعة') }}</th>
                                    <th>{{ trans('مستخدم حاص') }}</th>
                                    <th>{{ trans('website.action') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admins as $admin)
                                    <tr class="removable-item">
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>{{ $admin->position }}</td>
                                        <td>{{ $admin->roles->first()?->name }}</td>
                                        <td>{{ $admin->private_user == 1? 'نعم' : 'لا' }}</td>
                                        <td>
                                            <div class="action__buttons">
                                                @can('edit-admins')

                                                <a href="{{ route('admins.edit', $admin) }}" class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                    <i class="fa text-info fa-edit"></i>
                                                </a>
                                                @endcan


                                                    @can('delete-admins')
                                                        <a href="javascript:void(0);" data-url="{{route('admins.delete', $admin)}}" class="btn-action delete" title="Delete">
                                                        <i class="fa text-danger fa-trash"></i>
                                                </a>
                                                @endcan

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
