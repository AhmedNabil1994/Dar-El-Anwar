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
                                <h2>{{ trans('التقييم') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('admin.dashboard')}}">{{trans('website.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{trans('التقييم')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            

            <div class="row" id ="print-form-eval">

                <div class="customers__area bg-style mb-30">
                <div class="col-md-12">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{ __('التقييم') }}</h2>
                        </div>
                        <div class ="form-content">
                        <div class = "data">
                                <img src="{{asset('admin/images/icons/dar-elanwar-logo.png')}}" alt="logo">
                            <div class = "">
                                <h1>تقرير تقييم الطالب</h1>
                                <div class ="one">
                                    <span>الطالب:</span>
                                    <span>{{$student->name}}</span>
                                </div>
                                <div class ="two">
                                    <span>تاريخ التقييم:</span>
                                    <span>{{\Carbon\Carbon::parse($goal->date)->format('d/m/Y')}}</span>
                                    <span>المادة:</span>
                                    <span>{{$goal->subject?->name}}</span>
                                </div>
                                <div class ="three">
                                    <span>الهدف:</span>
                                    <span>{{$goal->name}}</span>
                                </div>
                            </div>
                        </div>
            </div>
                        <form method="post" action="{{route('admin.goals.store.student.review')}}"
                              class="customers__table" >
                            @csrf
                            <input type="hidden" name="student" value="{{$student->id}}">
                            <input type="hidden" name="exam" value="{{$exam->id}}">
                            <input type="hidden" name="goal" value="{{$goal->id}}">
                            <!-- <div class="customers__table "> -->
                            <table  class="row-border data-table-filter table-style table table-bordered ">
                                <thead>
                                <tr>
                                    <th>{{ trans('التقييم') }}</th>
                                    <th>{{ trans('درجة التقييم') }}</th>
                                    <th>{{ trans('ملاحظات التقييم') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr class="removable-item">
                                        <input type="hidden" name="question[]" value="{{$question->id}}"/>
                                        <td>{{$question->name}}</td>
                                        <td>
                                            @switch($question->type)
                                                @case(1)

                                                    <select disabled name="grade[]" class="form-control">
                                                        <option value="">__</option>
                                                        <option value="1" {{$exam_results->where('question_id',$question->id)->first()?->answer == 1 ? 'selected' : ''}}>نعم</option>
                                                        <option value="0" {{$exam_results->where('question_id',$question->id)->first()?->answer == 0 ? 'selected' : ''}}>لا</option>
                                                    </select>
                                                    @break
                                                @case(2)
                                                    <select disabled name="grade[]" class="form-control">
                                                        <option value="">__</option>
                                                        <option value="3" {{$exam_results->where('question_id',$question->id)->first()?->answer == 3 ? 'selected' : ''}}>ممتاز</option>
                                                        <option value="2" {{$exam_results->where('question_id',$question->id)->first()?->answer == 2 ? 'selected' : ''}}>جيد</option>
                                                        <option value="1" {{$exam_results->where('question_id',$question->id)->first()?->answer == 1 ? 'selected' : ''}}>متوسط</option>
                                                        <option value="0" {{$exam_results->where('question_id',$question->id)->first()?->answer == 0 ? 'selected' : ''}}>ضعيف</option>
                                                    </select>
                                                    @break
                                                @case(3)
                                                    <input disabled type="number" name="grade[]" class="form-control" value="{{$exam_results->where('question_id',$question->id)->first()?->answer}}">
                                                    @break
                                            @endswitch

                                        </td>
                                        <td><textarea name="notes[]" class="form-control" disabled
                                                      style="height: 50px;">{{$exam_results->where('question_id',$question->id)->first()?->notes}}</textarea></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                        <button id = "print" class="btn btn-secondary me-3 mt-3" type="button">{{ trans('طباعة') }}</button>
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
    <script src="{{asset('admin/js/jasonday-printThis-23be1f8/printThis.js')}}"></script>
    <script>

        $(document).ready(function(){
            $("#print").on("click",function printDiv() {
            console.log("clicked")
            $("#print-form-eval").printThis({
                importStyle: true, 
                loadCSS: "./main.css",
            })
        })
    })
        
    </script>
@endpush


