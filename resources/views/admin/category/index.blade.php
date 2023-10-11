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
                                    <h2>{{trans('website.categories')}}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{trans('website.categories')}}</li>
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
                                <h2>{{trans('website.categories')}}</h2>
                                @can('create-department')
                                <a href="{{route('category.create')}}" class="btn buttons-style btn-sm"> <i class="fa fa-plus"></i> {{trans('اضف قسم')}} </a>
                                @endcan
                            </div>
                            <form action="{{ route('category.index') }}" class="row m-3" method="get">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="search_key" value="{{request('search_key')}}">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn buttons-style"><i class="fa fa-filter"></i></button>
                                </div>
                            </form>
                            <div class="customers__table">
                                <table id="" class="row-border data-table-filter table-style">

                                    <thead>
                                    <tr>
                                        <th>{{trans('website.name')}}</th>
                                        <th>{{trans('website.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="removable-item">

                                        <td>
                                            {{$category->name}}
                                        </td>

                                        <td>
                                            <div class="action__buttons">
                                                @can('edit-department')
                                                <a href="{{route('category.edit', [$category->uuid])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                                @endcan
                                                    @can('delete-department')
                                                <a href="javascript:void(0);" data-url="{{route('category.delete', [$category->uuid])}}" class="btn-action delete" title="Delete">
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
                                    {{$categories->links()}}
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
