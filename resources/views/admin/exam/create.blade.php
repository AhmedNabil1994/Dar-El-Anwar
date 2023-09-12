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
                                <h2>{{ trans('website.addExam') }}</h2>
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


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title row row-cols-6 justify-content-between m-5">
                            <h5>{{trans('website.createExam')}}</h5>
                            <button class="btn btn-sm buttons-style" id="addRowBtn">{{trans("website.add_row")}}</button>

                        </div>
                        <div class="ibox-content mt-15">

                            <form id="exam_form" method="post" action="{{route('admin.exam.store')}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="course_id">{{trans('website.courseName')}}</label>
                                        <select type="text"
                                                class="form-control"
                                                id="course_id"
                                                name="course_id" >
                                            <option value="">{{trans("website.select_subject_name")}}</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('course_name')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="exam_name">{{trans('website.examName')}}</label>
                                        <input type="exam_name"
                                               class="form-control"
                                               id="exam_name"
                                               name="exam_name" />
                                        @error('exam_name')
{{--                                        <span class="text-danger">{{ $message}}</span>--}}
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-4">
                                    <div class="customers__table table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                                        <!-- <table id="customers-table" class="row-border data-table-filter table-style"> -->
                                        <table id="customers-table" class="row-border data-table-filter table-style table table-bordered">
                                            <thead style="background-color: #50bfa5;">
                                            <tr>
                                                <th>{{ trans('website.questionName') }}</th>
                                                <th>{{ trans('website.evaluationType') }}</th>
                                                <th>{{ trans('website.action') }}</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                        </table>
                                        <div class="mt-3">
{{--                                            {{$admins->appends(request()->input())->links()}}--}}
                                        </div>

                                    </div>
                                </div>

                            </form>

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
            // Add row when the button is clicked
            $("#addRowBtn").click(function() {
                var newRow = $(" <tr class='removable-item'></tr>");
                var columns = "";
                // Add the new row's columns
                columns += `<td><input class="form-control" name="question_name[]" /></td>`;
                columns += `<td>
                                <select class="form-select" name="review_type[]">
                                    <option value="1">yes / No</option>
                                    <option value="2">Excellent - Good - Average - Poor</option>
                                    <option value="3">Degree From 0000 to 0000</option>
                                </select>
                            </td>`;
                columns += `<td>
                    <button type="button" class="btn btn-action btn-danger delete deleteBtn" title="{{ __('Delete') }}">
                        <img src="{{ asset('admin/images/icons/trash-2.svg') }}" alt="{{ __('Delete') }}">
                    </button>
                </td>`;
                if(!($("#actions").length > 0)){
                    var submitbtn = $(`<div class="form-group" id="actions">
                                    <button type="submit" class="btn buttons-style" style="background-color: #50bfa5;">{{trans('website.save')}}</button>
                                    <a href="{{route('admin.exam.index')}}" class="btn btn-secondary">{{trans('website.cancel')}}</a>
                                </div>`)
                    $('#exam_form').append(submitbtn)
                }
                // Append the columns to the new row
                newRow.append(columns);
                // Append the new row to the table body
                $("#customers-table").append(newRow);

            });


            // Delete row when the delete button is clicked
            $(document).on("click", ".deleteBtn", function() {
                $(this).closest("tr").remove();
            });
        });

    </script>
@endpush
