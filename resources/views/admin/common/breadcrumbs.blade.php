<div class="row">
    <div class="col-md-12">
        <div class="breadcrumb__content">

            <div class="breadcrumb__content__left ">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb " dir="rtl">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('لوحة التحكم')}}</a></li>

                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ul>
                </nav>
            </div>
            <div class="breadcrumb__content__left">
                <div class="breadcrumb__title">
                    <h2>{{$title}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
