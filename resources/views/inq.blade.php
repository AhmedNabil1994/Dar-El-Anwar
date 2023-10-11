@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid instructions">

            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <h1 class="first" >استمارة التحاق بالدار</h1>
                </div>
                <div >
                    <h1 class=" second" >تعليمات عامة</h1>
                </div>
                <form action="{{route('settings.inq.update')}}" method="get" enctype="multipart/form-data">

<textarea name="value" class="form-control" >{!! get_setting('inq') !!}</textarea>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <button type="submit" class="btn buttons-style">
                                تم
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

