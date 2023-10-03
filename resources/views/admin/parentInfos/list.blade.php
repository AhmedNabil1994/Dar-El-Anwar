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
                                <h2>{{ __('الآباء') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('لوحة التحكم')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('جميع الآباء') }}</li>
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
                            <h2>{{ __('جميع الآباء') }}</h2>
                        </div>
                        <div class="row">
                            <form class="row justify-content-center align-items-center" method="get" action="{{ route('parent_infos.index') }}">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="search_key" value="{{request('search_key')}}">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit"><i class="fa fa-filter"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="customers__table">
                            <table id="parent-info-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('اسم الطالب') }}</th>
                                    <th>{{ __('الاسم') }}</th>
                                    <th>{{ __('رقم التليفون') }}</th>
                                    <th>{!! __('نوع الصلة') !!}</th>
                                    <th>{{ __('مسئول متابعة') }}</th>
                                    <th>{{ __('مسئول استلام') }}
                                    <th>{{ __('الحالة الاجتماعة') }}</th>
                                     <th>{{ __('الاجراءات') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($parentInfos as $parentInfo)
                                    <tr class="removable-item">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $parentInfo->student?->name }}</td>
                                        <td>{{ $parentInfo->name }}</td>
                                        <td>{{ $parentInfo->phone_number }}</td>
                                        @if($parentInfo->relationship == 1)
                                            <td>الاب</td>
                                        @elseif($parentInfo->relationship == 2 )
                                            <td>الام</td>
                                        @else
                                            <td>اخري</td>
                                        @endif
                                        <td>{{ $parentInfo->follow_up_person == 1? 'نعم' : 'لا' }}</td>
                                        <td>{{ $parentInfo->student_pickup_optional == 1? 'نعم' : 'لا' }}</td>
                                        <td>{{ $parentInfo->student?->parents_marital_status == 1 ? 'متزروجين' : 'مطلقين' }}</td>

{{--                                            <span id="hidden_id" style="display: none">{{ $parentInfo->id }}</span>--}}
{{--                                            <select name="status" class="status label-inline font-weight-bolder mb-1 badge badge-info">--}}
{{--                                                <option value="1" @if($parentInfo->status == 1) selected @endif>{{ __('Approved') }}</option>--}}
{{--                                                <option value="2" @if($parentInfo->status == 2) selected @endif>{{ __('Blocked') }}</option>--}}
{{--                                            </select>--}}
{{--                                        </td>--}}
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{ route('parent_infos.edit', [$parentInfo->id]) }}" class="btn" title="{{ __('Edit Details') }}">
                                                    <i class="fa fa-edit text-info"></i>
                                                <button type="button" class="btn deleteItem" data-formid="delete_row_form_{{$parentInfo->id}}" title="{{ __('Delete') }}">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button>
                                                <form action="{{ route('parent_infos.destroy', [$parentInfo->id]) }}" method="post" id="delete_row_form_{{ $parentInfo->id }}">
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                                        <div class="mt-3">
                                {{$parentInfos->links()}}
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
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
{{--    <script>--}}
{{--        'use strict'--}}
{{--        $(".status").change(function () {--}}
{{--            var id = $(this).closest('tr').find('#hidden_id').html();--}}
{{--            var status_value = $(this).closest('tr').find('.status option:selected').val();--}}
{{--            Swal.fire({--}}
{{--                title: "{{ __('Are you sure to change status?') }}",--}}
{{--                text: "{{ __('You won`t be able to revert this!') }}",--}}
{{--                icon: "warning",--}}
{{--                showCancelButton: true,--}}
{{--                confirmButtonText: "{{__('Yes, Change it!')}}",--}}
{{--                cancelButtonText: "{{__('No, cancel!')}}",--}}
{{--                reverseButtons: true--}}
{{--            }).then(function (result) {--}}
{{--                if (result.value) {--}}
{{--                    $.ajax({--}}
{{--                        type: "POST",--}}
{{--                        url: "{{route('admin.Parent.changeParentStatus')}}",--}}
{{--                        data: {"status": status_value, "id": id, "_token": "{{ csrf_token() }}",},--}}
{{--                        datatype: "json",--}}
{{--                        success: function (data) {--}}
{{--                            toastr.options.positionClass = 'toast-bottom-right';--}}
{{--                            toastr.success('', "{{ __('Parent status has been updated') }}");--}}
{{--                        },--}}
{{--                        error: function () {--}}
{{--                            alert("Error!");--}}
{{--                        },--}}
{{--                    });--}}
{{--                } else if (result.dismiss === "cancel") {--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush
