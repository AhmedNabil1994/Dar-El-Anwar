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
                                <h2>{{ __('Parents') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Parent') }}</li>
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
                            <h2>{{ __('All Parents') }}</h2>
                        </div>
                        <div class="customers__table">
                            <table id="parent-info-table" class="row-border data-table-filter table-style">
                                <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Student ID') }}</th>
                                    <th>{{ __('Father Name') }}</th>
                                    <th>{{ __('Father Occupation') }}</th>
                                    <th>{{ __('Father National ID') }}</th>
                                    <th>{{ __('Father Phone Number') }}</th>
                                    <th>{{ __('Father WhatsApp Number') }}</th>
                                    <th>{{ __('Mother Name') }}</th>
                                    <th>{{ __('Mother Occupation') }}</th>
                                    <th>{{ __('Mother National ID') }}</th>
                                    <th>{{ __('Mother Phone Number') }}</th>
                                    <th>{{ __('Mother WhatsApp Number') }}</th>
                                    <th>{{ __('Follow-up Person') }}</th>
                                    <th>{{ __('Follow-up Name') }}</th>
                                    <th>{{ __('Follow-up Relationship') }}</th>
                                    <th>{{ __('Follow-up Phone Number') }}</th>
                                    <th>{{ __('Follow-up WhatsApp Number') }}</th>
                                    <th>{{ __('Parents Marital Status') }}</th>
                                    <th>{{ __('Parents ID Card') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Updated At') }}</th>
{{--                                    <th>{{ __('Status') }}</th>--}}
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($parentInfos as $parentInfo)
                                    <tr class="removable-item">
                                        <td>{{ $parentInfo->id }}</td>
                                        <td>{{ $parentInfo->student_id }}</td>
                                        <td>{{ $parentInfo->father_name }}</td>
                                        <td>{{ $parentInfo->father_occupation }}</td>
                                        <td>{{ $parentInfo->father_national_id }}</td>
                                        <td>{{ $parentInfo->father_phone_number }}</td>
                                        <td>{{ $parentInfo->father_whatsapp_number }}</td>
                                        <td>{{ $parentInfo->mother_name }}</td>
                                        <td>{{ $parentInfo->mother_occupation }}</td>
                                        <td>{{ $parentInfo->mother_national_id }}</td>
                                        <td>{{ $parentInfo->mother_phone_number }}</td>
                                        <td>{{ $parentInfo->mother_whatsapp_number }}</td>
                                        <td>{{ $parentInfo->follow_up_person }}</td>
                                        <td>{{ $parentInfo->follow_up_name }}</td>
                                        <td>{{ $parentInfo->follow_up_relationship }}</td>
                                        <td>{{ $parentInfo->follow_up_phone_number }}</td>
                                        <td>{{ $parentInfo->follow_up_whatsapp_number }}</td>
                                        <td>{{ $parentInfo->parents_marital_status }}</td>
                                        <td>{{ $parentInfo->parents_id_card }}</td>
                                        <td>{{ $parentInfo->created_at }}</td>
                                        <td>{{ $parentInfo->updated_at }}</td>
{{--                                        <td>--}}
{{--                                            <span id="hidden_id" style="display: none">{{ $parentInfo->id }}</span>--}}
{{--                                            <select name="status" class="status label-inline font-weight-bolder mb-1 badge badge-info">--}}
{{--                                                <option value="1" @if($parentInfo->status == 1) selected @endif>{{ __('Approved') }}</option>--}}
{{--                                                <option value="2" @if($parentInfo->status == 2) selected @endif>{{ __('Blocked') }}</option>--}}
{{--                                            </select>--}}
{{--                                        </td>--}}
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{ route('parent_infos.edit', [$parentInfo->id]) }}" class="btn btn-primary" title="{{ __('Edit Details') }}">
                                                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                                                </a>
                                                <button type="button" class="btn btn-danger deleteItem" data-formid="delete_row_form_{{$parentInfo->id}}" title="{{ __('Delete') }}">
                                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
                                                </button>
                                                <form action="{{ route('parent_infos.destroy', [$parentInfo->id]) }}" method="post" id="delete_row_form_{{ $parentInfo->id }}">
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                                        <div class="mt-3">
{{--                                {{$Parents->links()}}--}}
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
