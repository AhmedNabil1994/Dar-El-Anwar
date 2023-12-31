@extends('layouts.admin')

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
                                <h2>{{trans('website.roles')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('website.roles')}}</li>
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
                        <div class="item-title btn-title-container">
                            <h2>{{trans('website.roles')}}</h2>
                            @can('create-role')
                                <a href="{{route('role.create')}}" class="btn buttons-style btn-sm"> <i class="fa fa-plus"></i> {{trans('website.addRole')}} </a>
                            @endcanany
                        </div>
                        <div class="customers__table">
                            <table id="" class="row-border data-table-filter table-style table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{trans('website.name')}}</th>
                                        <th>{{trans('website.action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr class="removable-item">
                                        <td>
                                            {{$role->name}}
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                @can('edit-role')
                                                <a href="{{route('role.edit', [$role->id])}}" class="btn-action">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                                @endcan

                                                    @can('delete-role')
                                                <a href="javascript:void(0);" data-url="{{route('role.delete', [$role->id])}}" class="btn-action delete">
                                                    <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                </a>
                                                    @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$roles->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}" />
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
@endpush
