<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __(@$title) }}</title>
    <!-- Favicon included -->
    <link rel="shortcut icon" href="{{getImageFile(get_option('app_fav_icon'))}}" type="image/x-icon">

    <!-- Apple touch icon included -->
    <link rel="apple-touch-icon" href="{{getImageFile(get_option('app_fav_icon'))}}">

    <link rel="stylesheet" href="{{asset('admin/sweetalert2/sweetalert2.css')}}">

    <!-- All CSS files included here -->
    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('admin/js/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{asset('common/css/select2.css')}}" rel="stylesheet">

    @stack('style')
    <link rel="stylesheet" href="{{asset('admin/css/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/styles/main.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/admin-extra.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/modules/employee.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/modules/chat.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body dir="rtl">

{{--@if(get_option('allow_preloader') == 1)--}}
{{--    <!-- Pre Loader Area start -->--}}
{{--    <div id="preloader">--}}
{{--        <div id="preloader_status"><img src="{{getImageFile(get_option('app_preloader'))}}" alt="img" /></div>--}}
{{--    </div>--}}
{{--    <!-- Pre Loader Area End -->--}}
{{--@endif--}}

<!-- Sidebar area start -->

@if(\Illuminate\Support\Facades\Auth::guard('admins')->check())
    @include('admin.common.sidebar')
@elseif(\Illuminate\Support\Facades\Auth::guard('students')->check())
    @include('admin.common.student.sidebar')
@elseif(\Illuminate\Support\Facades\Auth::guard('instructors')->check())
    @include('admin.common.instructor.sidebar')
@elseif(\Illuminate\Support\Facades\Auth::guard('parents')->check())
    @include('admin.common.parent.sidebar')
@endif

<!-- Sidebar area end -->

<!-- Main Content area start -->
<div class="main-content">
    <!-- Header section start -->
        @include('admin.common.header')
    <!-- Header section end -->    <!-- page content wrap start -->
    <div class="page-content-wrap">
        <!-- Page content area start -->
        @yield('content')
        <!-- Page content area end -->

        <!-- Footer section start -->
        @include('admin.common.footer')
        <!-- Footer section end -->
    </div>
    <!-- page content wrap end -->

</div>
<!-- Main Content area end -->
<script>
    function getLanguage(){
        return {
            "sEmptyTable": "{{ __('No data available in table') }}",
            "sInfo": "{{__('Showing _START_ To _END_ Of _TOTAL_ Entries')}}",
            "sInfoEmpty": "{{__('Showing 0 to 0 of 0 entries')}}",
            "sInfoFiltered": "{{__('(filtered from _MAX_ total entries)')}}",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "{{__('Show _MENU_ entries')}}",
            "sLoadingRecords": "{{__('Loading...')}}",
            "sProcessing": "{{__('Processing...')}}",
            "sSearch": "{{__('Search:')}}",
            "sZeroRecords": "{{__('No matching records found')}}",
            "oPaginate": {
                "sFirst": "{{__('First')}}",
                "sLast": "{{__('Last')}}",
                "sNext": "{{__('Next')}}",
                "sPrevious": "{{__('Previous')}}"
            },
            "oAria": {
                "sSortAscending": ": {{__('activate to sort column ascending')}}",
                "sSortDescending": ": {{__('activate to sort column descending')}}"
            }
        };
    }
</script>
<input type="hidden" id="base_url" value="{{url('/')}}">

<script src="{{asset('frontend/assets/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{asset('common/js/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/sweetalert2/sweetalert2.all.js')}}"></script>
<script src="{{ asset('common/js/iconify.min.js') }}"></script>

<script src="{{asset('admin/js/admin-custom.js')}}"></script>
<script src="{{asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<script src="{{asset('common/js/select2.min.js')}}"></script>
<script src="{{ asset('admin/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.js') }}"></script>
<script>


    $('select').each(function(index) {
        if($(this).attr('multiple'))
            $(this).addClass('js-example-basic-multiple')
        else
            $(this).addClass('js-example-basic-single')
    });
</script>

@stack('script')
<!-- All Javascript files included here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Toastr
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-left',
        };
    });
</script>
<script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('/admin/js/tinymce.js') }}"></script>

</body>
</html>
