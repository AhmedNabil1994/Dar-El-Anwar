<div class="sidebar__area ">
    <div class="sidebar__close">
        <button class="close-btn">
{{--            <i class="fa fa-close"></i>--}}
        </button>
    </div>

    <div class="sidebar__brand">
        <a href="{{ route('admin.dashboard') }}">
            @if(get_option('app_logo') != '')
{{--                <img src="{{getImageFile(get_option('app_logo'))}}" alt="">--}}
            @else
{{--                <img src="" alt="">--}}
            @endif
        </a>
    </div>

    <ul id="sidebar-menu" class="sidebar__menu">

        <li class=" {{ active_if_match('admins/dashboard/') }} ">
            <a href="{{route('admin.dashboard')}}">
                <span class="iconify" data-icon="bxs:dashboard"></span>
                <span>{{__('لوحة التحكم')}}</span>
            </a>
        </li>

        @can('manage-admins')
            <li class="{{ @$navUserParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="bxs:user-account"></span>
                    <span>{{__('المسؤولون')}}</span>
                </a>

                <ul class="{{ @$navUserParentShowClass }}">

                    <li class="{{ @$subNavPageIndexActiveClass }}">
                        <a href="{{route('admins.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('جميع المسؤولين')}}</span>
                        </a>
                    </li>

                    <li class="{{ @$subNavUserRoleActiveClass }}">
                        <a href="{{route('role.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('المجموعات')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

            <li class="">
                <a class="" href="{{route('student.profile')}}">
                    <span class="iconify" data-icon="bx:bx-user"></span>
                    <span>{{ __('ملفي الشخصي') }}</span>
                </a>

            </li>

        <li class="">
            <a class="" href="{{route('notification.index')}}">
                <span class="iconify" data-icon="bx:bx-user"></span>
                <span>{{ __('الاشعارات') }}</span>
            </a>

        </li>

        <li class="">
            <a class="" href="{{route('student.subscriptions.index')}}">
                <span class="iconify" data-icon="bx:bx-user"></span>
                <span>{{ __('الاشتراكات') }}</span>
            </a>

        <li class="{{ @$navCertificateActiveClass }}">
            <a class="" href="{{route('student.certificate.index')}}">
                <span class="iconify" data-icon="fluent:certificate-20-filled"></span>
                <span>{{__('شهاداتي')}}</span>
            </a>
        </li>

        <li class="">
            <a class="" href="{{route('student.class_room.index')}}">
                <span class="iconify" data-icon="fluent:certificate-20-filled"></span>
                <span>{{__('الفصول')}}</span>
            </a>
        </li>

        <li class="">
            <a class="" href="{{route('student.course.index')}}">
                <span class="iconify" data-icon="fluent:certificate-20-filled"></span>
                <span>{{__('المواعيد')}}</span>
            </a>
        </li>

        <li class="">
            <a class="" href="{{route('student.subject.index')}}">
                <span class="iconify" data-icon="fluent:certificate-20-filled"></span>
                <span>{{__('المواد')}}</span>
            </a>
        </li>




    @can('manage_student')
            <li class=" {{ active_if_match('admins/student') }} ">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="ph:student"></span>
                    <span>{{__('الطلاب')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('admins/student') }}">
                        <a href="{{route('student.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('جميع الطلاب') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admins/student/create') }}">
                        <a href="{{route('student.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('إضافة طالب') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

            <li class="aiz-side-nav-item">
                <a href="{{ route('student.chats.index') }}"
                   class="aiz-side-nav-link {{ active_if_match('student.chats.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_8863" data-name="Group 8863" transform="translate(-4 -4)">
                            <path id="Path_18925" data-name="Path 18925"
                                  d="M18.4,4H5.6A1.593,1.593,0,0,0,4.008,5.6L4,20l3.2-3.2H18.4A1.6,1.6,0,0,0,20,15.2V5.6A1.6,1.6,0,0,0,18.4,4ZM7.2,9.6h9.6v1.6H7.2Zm6.4,4H7.2V12h6.4Zm3.2-4.8H7.2V7.2h9.6Z"
                                  fill="#707070" />
                        </g>
                    </svg>
                    <span class="aiz-side-nav-text">{{ __('المراسلة') }}</span>
                </a>
            </li>

        {{-- @canany(['manage_instructor', 'all_instructor'])
             <li>
                 <a class="has-arrow" href="#">
                     <span class="iconify" data-icon="la:chalkboard-teacher"></span>
                     <span>{{__('Manage Instructor')}}</span>
                 </a>
                 <ul>
 <!--                    @can('pending_instructor')
                         <li class="{{ active_if_match('admins/instructor/pending') }}">
                             <a href="{{route('instructor.pending')}}">
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('Pending Instructor')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}

{{--                     @can('approved_instructor')--}}
{{--                         <li class="{{ active_if_match('admins/instructor/approved') }}">--}}
{{--                             <a href="{{route('instructor.approved')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('Approved Instructors')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}
{{--                     @can('approved_instructor')--}}
{{--                         <li class="{{ active_if_match('admins/instructor/blocked') }}">--}}
{{--                             <a href="{{route('instructor.blocked')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('Blocked Instructors')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}

{{--                     @can('add_instructor')--}}
{{--                         <li class="{{ active_if_match('admins/instructor/create') }}">--}}
{{--                             <a href="{{route('instructor.create')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{ __('Add Instructor') }}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}
{{--                     -->--}}

{{--                     @can('all_instructor')--}}

{{--                         <li class="--}}
{{--                         {{ active_if_match('admins/instructor') }}--}}
{{--                         {{ active_if_match('admins/instructor/view/*') }}--}}
{{--                     ">--}}
{{--                             <a href="{{route('instructor.index')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('All Instructors')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}
{{--                 </ul>--}}
{{--             </li>--}}
{{--         @endcanany--}}

{{--        @can('manage_absence')--}}
{{--            <li class=" {{ active_if_match('admins/absence') }} ">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="ph:student"></span>--}}
{{--                    <span>{{__('الغياب')}}</span>--}}
{{--                </a>--}}
{{--                <ul>--}}
{{--                    <li class="{{ active_if_match('admins/absence') }}">--}}
{{--                        <a href="{{route('absence.index')}}">--}}
{{--                            <i class="fa fa-circle"></i>--}}
{{--                            <span>{{ __('عرض الغياب') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ active_if_match('admins/absence/create') }}">--}}
{{--                        <a href="{{route('absence.create')}}">--}}
{{--                            <i class="fa fa-circle"></i>--}}
{{--                            <span>{{ __('إضافة غياب') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can(['manage_course'])--}}
{{--            <li>--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>--}}
{{--                    <span>{{__('الدورات التدريبية')}}</span>--}}
{{--                </a>--}}
{{--                <ul>--}}
{{--                    --}}{{-- @can('pending_course')--}}
{{--                         <li class="{{ active_if_match('admins/course/review-pending') }}">--}}
{{--                             <a href="{{route('admin.course.review_pending')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('Review Pending')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}
{{--                     @can('hold_course')--}}
{{--                         <li class="{{ active_if_match('admins/course/hold') }}">--}}
{{--                             <a href="{{route('admin.course.hold')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('Hold')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}
{{--                     @can('approved_course')--}}

{{--                         <li class="{{ active_if_match('admins/course/approved') }}">--}}
{{--                             <a href="{{route('admin.course.approved')}}">--}}
{{--                                 <i class="fa fa-circle"></i>--}}
{{--                                 <span>{{__('Approved')}}</span>--}}
{{--                             </a>--}}
{{--                         </li>--}}
{{--                     @endcan--}}
{{-- --}}
{{--                    @can('all_course')--}}
{{--                        <li class="{{ active_if_match('admins/course') }}">--}}
{{--                            <a href="{{route('admin.course.index')}}">--}}
{{--                                <i class="fa fa-circle"></i>--}}
{{--                                <span>{{__('جميع الدورات')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    --}}{{--<li class="{{ active_if_match('admins/course/enroll') }}">--}}
{{--                        <a href="{{route('admin.course.enroll')}}">--}}
{{--                            <i class="fa fa-circle"></i>--}}
{{--                            <span>{{ __('Enroll In Course') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="{{ active_if_match('admins/course/create') }}">--}}
{{--                        <a href="{{route('admin.course.create')}}">--}}
{{--                            <i class="fa fa-circle"></i>--}}
{{--                            <span>{{ __('إضافة دورة') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}

        @canany(['manage_subject'])
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>
                    <span>{{__('المواد')}}</span>
                </a>
                <ul>

                    @can('all_course')
                        <li class="{{ active_if_match('admins/subject') }}">
                            <a href="{{route('admin.subject.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع المواد')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li class="{{ active_if_match('admins/subject/create') }}">
                        <a href="{{route('admin.subject.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('إضافة مادة') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admins/subject/create') }}">
                        {{--<a href="{{route('admin.subject.enroll')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('Assign Subject') }}</span>
                        </a>--}}
                    </li>

                </ul>
            </li>
        @endcanany

        @canany('manage_department')
            <li class="{{ @$navCourseActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="codicon:references"></span>
                    <span>{{__('الاقسام')}}</span>
                </a>
                <ul>
                    @can('manage_course_category')
                        <li class="{{ active_if_match('admins/category') }}">
                            <a href="{{route('category.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع الأقسام')}}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @canany(['manage_exam'])
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>
                    <span>{{__('الاختبارات')}}</span>
                </a>
                <ul>

                    @can('all_course')
                        <li class="{{ active_if_match('admins/exam') }}">
                            <a href="{{route('admin.exam.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع الاختبارات')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li class="{{ active_if_match('admins/exam/create') }}">
                        <a href="{{route('admin.exam.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('إضافة اختبار') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admins/subject/create') }}">
                        {{--<a href="{{route('admin.subject.enroll')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('Assign Subject') }}</span>
                        </a>--}}
                    </li>

                </ul>
            </li>
        @endcanany

        @canany(['manage_bus'])
            <li>
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الحافلات')}}</span>
                </a>
                <ul>
                    @can('all_course')
                        <li class="{{ active_if_match('admins/bus') }}">
                            <a href="{{route('admin.bus.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('عرض الحافلات')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li class="{{ active_if_match('admins/bus/assign') }}">
                        <a href="{{route('admin.bus.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('إضافة حافلة') }}</span>
                        </a>
                    </li>

                    {{--                    <li class="{{ active_if_match('admins/course/create') }}">--}}
                    {{--                        <a href="{{route('admin.course.create')}}">--}}
{{--                    --}}{{--                            <i class="fa fa-circle"></i>--}}
                    {{--                                <span>{{ __('Create Course') }}</span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
            </li>
        @endcanany


        @can('manage_contact')
            <li>
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('تواصل معنا')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('contact_us/inbox') }}">
                        <a href="{{route('admin.contact_us.contactUsInbox')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('صندوق الوارد')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('contact_us/sent') }}">
                        <a href="{{route('admin.contact_us.contactUsSent')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('صندوق الصادر') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('contact_us/conversations') }}">
                        <a href="{{route('admin.contact_us.contactUsConversations')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('المحادثات') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('contact_us/messages') }}">
                        <a href="{{route('admin.contact_us.contactUsMessages')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('الرسائل') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

        @endcanany

        @can('manage_class_room')
            <li>
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الفصول')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('class_room') }}">
                        <a href="{{route('class_room.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('قائمة الفصول')}}</span>
                        </a>
                    </li>

                </ul>
            </li>

        @endcanany
        {{--        <li>--}}
        {{--            <a class="has-arrow" href="#">--}}
{{--        --}}{{--                <i class="fa fa-bus"></i>--}}
        {{--                <span>{{__('Goals')}}</span>--}}
        {{--            </a>--}}
        {{--            <ul>--}}
        {{--                <li class="{{ active_if_match('goals/inbox') }}">--}}
        {{--                    <a href="{{route('admin.contact_us.contactUsInbox')}}">--}}
{{--        --}}{{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span>{{__('All Goals')}}</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}

        {{--                <li class="{{ active_if_match('goals/sent') }}">--}}
        {{--                    <a href="{{route('admin.contact_us.contactUsSent')}}">--}}
{{--        --}}{{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span>{{ __('Create Goals') }}</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}

        {{--            </ul>--}}
        {{--        </li>--}}
        @can('manage_duties')
            <li>
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الواجبات اليومية')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('assignments/index') }}">
                        <a href="{{route('admin.assignments.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('عرض الواجبات')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('assignments/create') }}">
                        <a href="{{route('admin.assignments.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('إضافة واجب') }}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan

        @can('manage_followup')
            <li>
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('المتابعات')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('followup/index') }}">
                        <a href="{{route('admin.followup.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('متابعة الخطط')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('followup/create_class') }}">
                        <a href="{{route('admin.followup.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('تقرير متابعة حصة دراسية') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('followup/reading') }}">
                        <a href="{{route('admin.followup.reading')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('تقرير متابعة القراءة') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('followup/quran') }}">
                        <a href="{{route('admin.followup.quran')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('تقرير متابعة القران') }}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan

        @can('manage_finance')
            <li>
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الحسابات')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('accounts/treasury') }}">
                        <a href="{{route('accounts.treasury')}}">
{{--                            <i class="fa fa-money"></i>--}}
                            <span>{{__('الخزينة')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/subscriptions') }}">
                        <a href="{{route('subscriptions.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('الاشتراكات') }}</span>
                        </a>
                    </li>


                    <li class="{{ active_if_match('admin/students_subscription') }}">
                        <a href="{{route('subscriptions.students_subscription')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('سداد الاشتراكات') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/invoices') }}">
                        <a href="{{route('invoices.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('الفواتير') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/profit') }}">
                        <a href="{{route('profit.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('صافي الربح') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/stores/movement') }}">
                        <a href="{{route('stores.movement.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('المخازن') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/movement') }}">
                        <a href="{{route('stores.product.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('تقارير المنتجات') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/invoice') }}">
                        <a href="{{route('stores.product.invoice.purchases')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('المشتريات') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/invoice') }}">
                        <a href="{{route('stores.product.invoice.sales')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('المبيعات') }}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan
        @can('manage_certificate')
            <li class="{{ @$navCertificateActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="fluent:certificate-20-filled"></span>
                    <span>{{__('الشهادات')}}</span>
                </a>
                <ul>
                    <li class="{{ @$subNavAllCertificateActiveClass }}">
                        <a href="{{route('certificate.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('الشهادات المصدرة')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavAddCertificateActiveClass }}">
                        <a href="{{route('certificate.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('تصميم الشهادة')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('manage_report')
            <li class="{{ active_if_match('/reports/report_students_ages/') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-paper-plane"></i>--}}
                    <span>{{__('تقارير')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('reports/report_students_ages') }}">
                        <a href="{{route('reports.reportStudentsAge')}}">
{{--                            <i class="fa fa-money"></i>--}}
                            <span>{{__('تقارير اعمار الطلاب')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('reports/report_parents') }}">
                        <a href="{{route('reports.reportParents')}}">
{{--                            <i class="fa fa-money"></i>--}}
                            <span>{{__('تقرير بيانات الاباء')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('reports/report_subscribtions') }}">
                        <a href="{{route('reports.reportInvoices')}}">
{{--                            <i class="fa fa-money"></i>--}}
                            <span>{{__('قائمة الفواتير')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('reports/report_buses') }}">
                        <a href="{{route('reports.reportBuses')}}">
{{--                            <i class="fa fa-money"></i>--}}
                            <span>{{__('قائمة مدفوعات الباص لكل سائق')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('reports/report_buses') }}">
                        <a href="{{route('reports.reportCountStudent')}}">
{{--                            <i class="fa fa-money"></i>--}}
                            <span>{{__('تقرير عدد الطلبة الفعلي')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('manage_level')
            <li class="{{ @$navLevelActiveClass }}">
                <a class="has-arrow" href="">
                    <span class="iconify"></span>
                    <span>{{__('المستويات')}}</span>
                </a>
                <ul>
                    <li class="{{ @$navLevelActiveClass }}">
                        <a href="{{route('level.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('All Level')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
    </ul>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(".close-btn").click(function() {
                $(".sidebar__area").removeClass("active")
                $(".sidebar__area").addClass("non-active")
            });
        });
    </script>
@endpush
