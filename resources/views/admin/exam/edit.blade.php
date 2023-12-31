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
                                <h2>{{ trans('website.editExam') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admins.index')}}">{{ trans('website.all_exams') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('website.editExam') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>


            {{--            @can('create-admins', 'admins')--}}

            <div class="row">
                <div class="customers__area bg-style mb-30">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <!-- <div class="row"> -->
                        <!-- <div class="col-md-12"> -->
                        <div class="ibox-title row row-cols-6 justify-content-between">
                            <div>
                                <h5>{{trans('website.editExam')}}</h5>
                            </div>
                            <div>
                                <button class="btn buttons-style btn-sm w-100" id="addRowBtn">{{trans('website.add_row')}}</button>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                        <div class="ibox-content mt-15">

                            <form id="exam_form" method="post" action="{{route('admin.exam.update',$exam->id)}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="course_id">{{trans('website.courseName')}}</label>

                                        <select type="text"
                                                class="form-control"
                                                id="course_id"
                                                name="course_id" >
                                            <option value="">{{trans("website.selectCourseName")}}</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}" {{$exam->course_id == $subject->id ? "selected":""}}>{{$subject->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('course_id')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="exam_name">{{trans('website.examName')}}</label>
                                        <input type="exam_name"
                                               class="form-control"
                                               id="exam_name"
                                               name="exam_name" value="{{$exam->name}}"/>
                                        @error('exam_name')
                                            {{-- <span class="text-danger">{{ $message}}</span>--}}
                                        @enderror
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <div class="row mb-4">
                                    <!-- <div class="customers__area bg-style mb-30"> -->
                                    <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                                        <table id="customers-table" class="row-border data-table-filter table-style table table-bordered">
                                            <thead style="background-color: #50bfa5;">
                                            <tr>
                                                <th>{{ trans('website.questionName') }}</th>
                                                <th>{{ trans('website.evaluationType') }}</th>
                                                <th>{{ trans('website.actions') }}</th>
                                            </tr>
                                            </thead>
                                                @foreach($exam->questions as $question)
                                                <tr class='removable-item'>
                                                    <td><input class="form-control" name="question_name[]" value="{{$question->name}}"/></td>
                                                    <td>
                                                        <select class="form-select" name="review_type[]">
                                                            <option value="1" {{$question->type == 1 ? "selected":""}}>{{trans('website.yesNo')}}</option>
                                                            <option value="2" {{$question->type == 2 ? "selected":""}}>{{trans("website.excelentGoodAveragePoor")}}</option>
                                                            <option value="3" {{$question->type == 3 ? "selected":""}}>{{trans("website.degreeFrom")}} 0000 {{trans("website.to")}} 0000</option>
                                                        </select>
                                                    </td>
                                                    <td >
                                                        <button type="button" id = "deleteRowBtn" class="btn btn-action btn-danger delete deleteBtn" title="{{ __('Delete') }}">
                                                            <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <div class="mt-3">
                                            {{--                                            {{$admins->appends(request()->input())->links()}}--}}
                                        </div>

                                    </div>
                                <!-- </div> -->
                                </div>

                            </form>

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

@push('script')
    <script>
        $(document).ready(function() {
            if(($("#customers-table tbody tr").length > 0)){
                var submitbtn = $(`<div class="form-group">
                                    <button type="submit" class="btn buttons-style">{{trans('website.save')}}</button>
                                    <a href="{{route('admin.exam.index')}}" class="btn btn-secondary">{{trans('website.cancel')}}</a>
                                </div>`)
                $('#exam_form').append(submitbtn)
            }

            // Add row when the button is clicked
            $("#addRowBtn").click(function() {
                var newRow = $("<tr class='removable-item'></tr>");
                var columns = "";
                // Add the new row's columns
                columns += `<td><input class="form-control" name="question_name[]" /></td>`;
                columns += `<td>
                                <select class="form-select" name="review_type[]">
                                    <option value="1">{{trans('website.yesNo')}}</option>
                                    <option value="2">{{trans('website.excelentGoodAveragePoor')}}</option>
                                    <option value="3">{{trans('website.degreeFrom')}}0000 {{trans("website.to")}} 0000</option>
                                </select>
                            </td>`;
                columns += `<td>
                    <button type="button" id = "deleteRowBtn" class="btn btn-action btn-danger delete deleteBtn" title="{{ __('Delete') }}">
                        <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ trans('website.delete') }}">
                    </button>
                </td>`;

                // Append the columns to the new row
                newRow.append(columns);
                // Append the new row to the table body
                $("#customers-table").append(newRow);

            });
            if(!($("#customers-table tbody tr").length > 0)){
                var submitbtn = $(`<div class="form-group">
                                    <button type="submit" class="btn buttons-style">{{trans('website.save')}}</button>
                                    <a href="{{route('admin.exam.index')}}" class="btn btn-secondary">{{trans('website.cancel')}}</a>
                                </div>`)
                $('#exam_form').append(submitbtn)
            }

            // Delete row when the delete button is clicked


            $(document).on("click", ".deleteBtn", function() {
                $(this).closest("tr").remove();
            });

            
        });

    </script>
@endpush
