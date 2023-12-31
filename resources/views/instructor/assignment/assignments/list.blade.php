@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="customers__area__header bg-style mb-30">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ trans('الفصول') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('الفصول') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>



            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-md-12">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ trans('قائمة الواجبات') }}</h2>
                            <a href="{{ route('admin.assignments.create') }}" class="btn buttons-style btn-sm">
                                <i class="fa fa-plus"></i> {{ trans('اضف واجب') }}
                            </a>
                        </div>
                        <div class="row m-3 justify-content-end">
                            <form method="GET" class="row align-items-end" action="{{ route('admin.assignments.assignment.index') }}">
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
                                <thead style="background-color: #50bfa5;">
                                <tr>
                                    <th>{{ trans('#') }}</th>
                                    <th>{{ trans('website.name') }}</th>
                                    <th>{{ trans('المادة') }}</th>
                                    <th>{{ trans('website.status') }}</th>
                                    @can('manage-class_room')
                                        <th>{{ trans('website.action') }}</th>
                                    @endcan
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($assignments as $assignment)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$assignment->name}}</td>
                                        <td>{{$assignment->subject?->name}}</td>
                                        <td>{{$assignment->status == 0 ?'غير نشط' : 'نشط'}}</td>
                                        @can('manage-class_room')
                                            <td>
                                                <div class="action__buttons">
                                                    {{--                                                @can('edit-admins', 'admins')--}}

                                                    <a href="{{ route('admin.assignments.assignment.edit', $assignment) }}" class=" btn-action mr-1 edit" data-toggle="tooltip" title="Edit">
                                                        <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                    </a>
                                                    {{--                                                @endcan--}}

                                                    {{--                                                    @can('delete-admins', 'admins')--}}

                                                    <a href="javascript:void(0);" data-url="{{route('admin.assignments.assignment.delete', $assignment)}}" class="btn-action delete" title="Delete">
                                                        <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                    </a>
                                                    {{--                                                @endcan--}}

                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$assignments->appends(request()->input())->links()}}
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
