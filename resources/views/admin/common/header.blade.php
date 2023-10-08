<nav class="header__area buttons-style">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="header__navbar">
                    <div class="header__navbar__left">
                        <button class="sidebar-toggler">
                            <img src="{{asset('admin/images/icons/header/bars.svg')}}" alt="">
                        </button>
                    </div>
                    <div class="header__navbar__right">
                        <ul class="header__menu">
                            <li>
                                <a href="#" class="btn btn-dropdown site-language mx-3" style="width: 100px;color: white" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                                    زيارة الموقع
                                </a>

                            </li>
                            <li class="admin-notification-menu position-relative">
                                <a href="#" class="btn btn-dropdown site-language" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="position-absolute top-0 start-100 translate-middle
                                     @if(get_notify()->count() > 0)
                                        badge
                                     @endif
                                     rounded-pill bg-danger">{{ get_notify()->count() != 0?get_notify()->count():'' }}</span>
                                    <img src="{{asset('admin/images/icons/header/notification.svg')}}" alt="icon">
                                </a>

                                <!-- Notification Dropdown Start -->

                                <ul class="dropdown-menu custom-scrollbar" aria-labelledby="dropdownNotification">
                                    @forelse(get_notify() as $notification)
                                        @if($notification->sender)
                                            <li>
                                                <a href="{{ route('notification.show',$notification->id) }}" class="message-user-item dropdown-item">
                                                    <div class="message-user-item-left">
                                                        <div class="single-notification-item d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="user-img-wrap position-relative radius-50">
                                                                    <img src="{{ asset($notification->sender->image_path) }}" alt="img" class="radius-50">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="color-heading font-14">{{$notification->sender->name}}</h6>
                                                                <p class="font-13 mb-0">{{ __($notification->text) }}</p>
                                                                <div class="font-11 color-gray mt-1">{{$notification->created_at->diffForHumans()}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                        <p class="text-center">{{__('لا توجد بيانات')}}</p>
                                    @endforelse
                                </ul>
                            </li>

                            <!-- Notification Dropdown End -->

                            <li>
                                <a href="#" class="btn btn-dropdown user-profile" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
{{--                                    <img src="{{getImageFile(auth::user()?auth::user()->image_path:'')}}" alt="icon">--}}
                                    <!-- <img src="{{asset('admin/images/icons/user.svg')}}" alt="icon"> -->
                                    <img src="{{asset('admin/images/icons/user_2.png')}}" alt="icon">

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownUser">
                                    <li>
                                        <a class="dropdown-item" href="{{route('admin.profile')}}">
                                            @if(get_option('app_logo') != '')
                                                <img src="{{getImageFile(get_option('app_logo'))}}" alt="">
                                            @else
                                                <img src="" alt="">
                                            @endif
                                                <span>{{__('الملف الشخصي')}}</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.change-password') }}">
                                            <img src="{{asset('admin/images/icons/settings.svg')}}" alt="icon">
                                            <span>{{__('تغيير كلمة السر')}}</span>
                                        </a>
                                    </li>
                                    @if(\Illuminate\Support\Facades\Auth::guard('admins')->check())
                                    <li>
                                        <a class="dropdown-item" href="{{route('admin.logout')}}">
                                            <img src="{{asset('admin/images/icons/logout.svg')}}" alt="icon">
                                            <span>{{__('تسجيل الخروج')}}</span>
                                        </a>
                                    </li>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('students')->check())
                                        <li>
                                            <a class="dropdown-item" href="{{route('student.logout')}}">
                                                <img src="{{asset('admin/images/icons/logout.svg')}}" alt="icon">
                                                <span>{{__('تسجيل الخروج')}}</span>
                                            </a>
                                        </li>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('instructors')->check())
                                        <li>
                                            <a class="dropdown-item" href="{{route('instructor.logout')}}">
                                                <img src="{{asset('admin/images/icons/logout.svg')}}" alt="icon">
                                                <span>{{__('تسجيل الخروج')}}</span>
                                            </a>
                                        </li>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('parents')->check())
                                        <li>
                                            <a class="dropdown-item" href="{{route('parents.logout')}}">
                                                <img src="{{asset('admin/images/icons/logout.svg')}}" alt="icon">
                                                <span>{{__('تسجيل الخروج')}}</span>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

@push('script')
<script>
    $(document).ready(function() {
    $(".sidebar-toggler").click(function() {
        $(".sidebar__area").removeClass("non-active")
        $(".sidebar__area").addClass("active")
    });
    });
</script>
@endpush





