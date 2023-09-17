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
                                <h2>{{__('كل الشهادات')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('كل الشهادات')}}</li>
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
                            <h2>{{__('كل الشهادات')}}</h2>
                            <a href="{{route('certificate.create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> {{__('اضافة شهادة')}} </a>
                        </div>
                        <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                            <table id="customers-table" class="row-border data-table-filter table-style table table-bordered table-striped">
                           >
                                <thead>
                                <tr>
                                    <th>اسم الطالب</th>
                                    <th>القسم</th>
                                    <th>تاريخ الحصول</th>
                                    <th>سبب الحصول</th>
                                    <th>الإيميل</th>
                                    <th>اسم مصدر الشهادة</th>
                                    <th>طريقة التسليم</th>
                                    <th>حالة التسليم</th>
                                    <th>إعدادات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($certificates as $certificate)
                                    <tr class="removable-item">
                                        <td>
                                            {{$certificate->student?->name}}
                                        </td>
                                        <td>
                                            {{$certificate->department?->name}}
                                        </td>
                                        <td>
                                           {{$certificate->created_at->format("d/m/Y")}}
                                        </td>
                                        <td>
                                            {{$certificate->student?->email}}
                                        </td>
                                        <td>
                                            {{$certificate->body}}
                                        </td>
                                        <td>
                                            {{$certificate->role_2_title}}
                                        </td>
                                        <td>
                                            {{$certificate->receiving_way == 'hand'? 'باليد':'اونلاين'}}
                                        </td>
                                        <td>
                                        {{$certificate->receiving_type == 'yes'? 'استلم':'لم يستلم'}}
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('certificate.edit', [$certificate->uuid])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                                <a href="javascript:void(0);" data-url="{{route('certificate.delete', [$certificate->uuid])}}" class="btn-action delete" title="Delete">
                                                    <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$certificates->links()}}
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
