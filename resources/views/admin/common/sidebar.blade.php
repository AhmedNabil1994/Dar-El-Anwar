<div class="sidebar__area ">
    <div class="sidebar__close">
        <button class="close-btn">
            <i class="fa fa-close"></i>
        </button>
    </div>

    <div class="sidebar__brand">
        <a href="{{ route('admin.dashboard') }}">
            @if(get_option('app_logo') != '')
                <img src="{{getImageFile(get_option('app_logo'))}}" alt="">
            @else
                <img src="" alt="">
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
                            
                            <span>{{__('جميع المسؤولين')}}</span>
                        </a>
                    </li>

                    <li class="{{ @$subNavUserRoleActiveClass }}">
                        <a href="{{route('role.index')}}">
                            
                            <span>{{__('المجموعات')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('user_management')
            <li class="{{ @$navEmployeeParentActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="bx:bx-user"></span>
                    <span>{{ __('الموظفون') }}</span>
                </a>
                <ul class="{{ @$navEmployeeParentShowClass }}">
                    <li class="{{ @$subNavEmployeeListActiveClass }}">
                        <a href="{{ route('employees.index') }}">
                            
                            <span>{{ __('جميع الموظفين') }}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavEmployeeCreateActiveClass }}">
                        <a href="{{ route('employees.create') }}">
                            
                            <span>{{ __('إضافة موظف') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('manage_student')
            <li class=" {{ active_if_match('admins/student') }} ">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="ph:student"></span>
                    <span>{{__('الطلاب')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('admins/student') }}">
                        <a href="{{route('student.index')}}">
                            
                            <span>{{ __('جميع الطلاب') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admins/student/create') }}">
                        <a href="{{route('student.create')}}">
                            
                            <span>{{ __('إضافة طالب') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

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
                                
                                <span>{{__('Pending Instructor')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('approved_instructor')
                        <li class="{{ active_if_match('admins/instructor/approved') }}">
                            <a href="{{route('instructor.approved')}}">
                                
                                <span>{{__('Approved Instructors')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('approved_instructor')
                        <li class="{{ active_if_match('admins/instructor/blocked') }}">
                            <a href="{{route('instructor.blocked')}}">
                                
                                <span>{{__('Blocked Instructors')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('add_instructor')
                        <li class="{{ active_if_match('admins/instructor/create') }}">
                            <a href="{{route('instructor.create')}}">
                                
                                <span>{{ __('Add Instructor') }}</span>
                            </a>
                        </li>
                    @endcan
                    -->

                    @can('all_instructor')

                        <li class="
                        {{ active_if_match('admins/instructor') }}
                        {{ active_if_match('admins/instructor/view/*') }}
                    ">
                            <a href="{{route('instructor.index')}}">
                                
                                <span>{{__('All Instructors')}}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany--}}

        @can('manage_absence')
            <li class=" {{ active_if_match('admins/absence') }} ">
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="ph:student"></span>
                    <span>{{__('الغياب')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('admins/absence') }}">
                        <a href="{{route('absence.index')}}">
                            
                            <span>{{ __('عرض الغياب') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admins/absence/create') }}">
                        <a href="{{route('absence.create')}}">
                            
                            <span>{{ __('إضافة غياب') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can(['manage_course'])
            <li>
                <a class="has-arrow" href="#">
                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>
                    <span>{{__('الدورات التدريبية')}}</span>
                </a>
                <ul>
                   {{-- @can('pending_course')
                        <li class="{{ active_if_match('admins/course/review-pending') }}">
                            <a href="{{route('admin.course.review_pending')}}">
                                
                                <span>{{__('Review Pending')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('hold_course')
                        <li class="{{ active_if_match('admins/course/hold') }}">
                            <a href="{{route('admin.course.hold')}}">
                                
                                <span>{{__('Hold')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('approved_course')

                        <li class="{{ active_if_match('admins/course/approved') }}">
                            <a href="{{route('admin.course.approved')}}">
                                
                                <span>{{__('Approved')}}</span>
                            </a>
                        </li>
                    @endcan
--}}
                    @can('all_course')
                        <li class="{{ active_if_match('admins/course') }}">
                            <a href="{{route('admin.course.index')}}">
                                
                                <span>{{__('جميع الدورات')}}</span>
                            </a>
                        </li>
                    @endcan

                    {{--<li class="{{ active_if_match('admins/course/enroll') }}">
                        <a href="{{route('admin.course.enroll')}}">
                            
                            <span>{{ __('Enroll In Course') }}</span>
                        </a>
                    </li>--}}

                    <li class="{{ active_if_match('admins/course/create') }}">
                        <a href="{{route('admin.course.create')}}">
                            
                            <span>{{ __('إضافة دورة') }}</span>
                        </a>
                    </li>


                </ul>
            </li>
        @endcan

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
                                
                                <span>{{__('جميع المواد')}}</span>
                            </a>
                        </li>
                    @endcan

                        <li class="{{ active_if_match('admins/subject/create') }}">
                            <a href="{{route('admin.subject.create')}}">
                                
                                <span>{{ __('إضافة مادة') }}</span>
                            </a>
                        </li>

                        <li class="{{ active_if_match('admins/subject/create') }}">
                        {{--<a href="{{route('admin.subject.enroll')}}">
                            
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
                                
                                <span>{{__('جميع الاختبارات')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li class="{{ active_if_match('admins/exam/create') }}">
                        <a href="{{route('admin.exam.create')}}">
                            
                            <span>{{ __('إضافة اختبار') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admins/subject/create') }}">
                        {{--<a href="{{route('admin.subject.enroll')}}">
                            
                            <span>{{ __('Assign Subject') }}</span>
                        </a>--}}
                    </li>

                </ul>
            </li>
        @endcanany

        @canany(['manage_bus'])
            <li>
                <a class="has-arrow" href="#">
                    <i class="fa fa-bus"></i>
                    <span>{{__('الحافلات')}}</span>
                </a>
                <ul>
                    @can('all_course')
                        <li class="{{ active_if_match('admins/bus') }}">
                                <a href="{{route('admin.bus.index')}}">
                                
                                <span>{{__('عرض الحافلات')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li class="{{ active_if_match('admins/bus/assign') }}">
                        <a href="{{route('admin.bus.create')}}">
                            
                            <span>{{ __('إضافة حافلة') }}</span>
                        </a>
                    </li>

                    {{--                    <li class="{{ active_if_match('admins/course/create') }}">--}}
                    {{--                        <a href="{{route('admin.course.create')}}">--}}
                    {{--                            --}}
                    {{--                                <span>{{ __('Create Course') }}</span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
            </li>
        @endcanany


        @can('manage_contact')
        <li>
                <a class="has-arrow" href="#">
                    <i class="fa fa-bus"></i>
                    <span>{{__('تواصل معنا')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('contact_us/inbox') }}">
                        <a href="{{route('admin.contact_us.contactUsInbox')}}">
                            
                            <span>{{__('صندوق الوارد')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('contact_us/sent') }}">
                        <a href="{{route('admin.contact_us.contactUsSent')}}">
                            
                            <span>{{ __('صندوق الصادر') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('contact_us/conversations') }}">
                        <a href="{{route('admin.contact_us.contactUsConversations')}}">
                            
                            <span>{{ __('المحادثات') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('contact_us/messages') }}">
                        <a href="{{route('admin.contact_us.contactUsMessages')}}">
                            
                            <span>{{ __('الرسائل') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

        @endcanany

        @can('manage_class_room')
            <li>
                <a class="has-arrow" href="#">
                    <i class="fa fa-bus"></i>
                    <span>{{__('الفصول')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('class_room') }}">
                        <a href="{{route('class_room.index')}}">
                            
                            <span>{{__('قائمة الفصول')}}</span>
                        </a>
                    </li>

                </ul>
            </li>

        @endcanany
{{--        <li>--}}
{{--            <a class="has-arrow" href="#">--}}
{{--                <i class="fa fa-bus"></i>--}}
{{--                <span>{{__('Goals')}}</span>--}}
{{--            </a>--}}
{{--            <ul>--}}
{{--                <li class="{{ active_if_match('goals/inbox') }}">--}}
{{--                    <a href="{{route('admin.contact_us.contactUsInbox')}}">--}}
{{--                        --}}
{{--                        <span>{{__('All Goals')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="{{ active_if_match('goals/sent') }}">--}}
{{--                    <a href="{{route('admin.contact_us.contactUsSent')}}">--}}
{{--                        --}}
{{--                        <span>{{ __('Create Goals') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--        </li>--}}
        @can('manage_duties')
            <li>
            <a class="has-arrow" href="#">
                <i class="fa fa-bus"></i>
                <span>{{__('الواجبات اليومية')}}</span>
            </a>
            <ul>
                <li class="{{ active_if_match('assignments/index') }}">
                    <a href="{{route('admin.assignments.index')}}">
                        
                            <span>{{__('عرض الواجبات')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('assignments/create') }}">
                    <a href="{{route('admin.assignments.create')}}">
                        
                        <span>{{ __('إضافة واجب') }}</span>
                    </a>
                </li>

            </ul>
        </li>
        @endcan

        @can('manage_followup')
        <li>
            <a class="has-arrow" href="#">
                <i class="fa fa-bus"></i>
                <span>{{__('المتابعات')}}</span>
            </a>
            <ul>
                <li class="{{ active_if_match('followup/index') }}">
                    <a href="{{route('admin.followup.index')}}">
                        
                        <span>{{__('متابعة الخطط')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('followup/create_class') }}">
                    <a href="{{route('admin.followup.create')}}">
                        
                        <span>{{ __('تقرير متابعة حصة دراسية') }}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('followup/reading') }}">
                    <a href="{{route('admin.followup.reading')}}">
                        
                        <span>{{ __('تقرير متابعة القراءة') }}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('followup/quran') }}">
                    <a href="{{route('admin.followup.quran')}}">
                        
                        <span>{{ __('تقرير متابعة القران') }}</span>
                    </a>
                </li>

            </ul>
        </li>
        @endcan

        @can('manage_finance')
        <li>
            <a class="has-arrow" href="#">
                <i class="fa fa-bus"></i>
                <span>{{__('الحسابات')}}</span>
            </a>
            <ul>
                <li class="{{ active_if_match('accounts/treasury') }}">
                    <a href="{{route('accounts.treasury')}}">
                        <i class="fa fa-money"></i>
                        <span>{{__('الخزينة')}}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/subscriptions') }}">
                    <a href="{{route('subscriptions.index')}}">
                        
                        <span>{{ __('الاشتراكات') }}</span>
                    </a>
                </li>


                <li class="{{ active_if_match('admin/students_subscription') }}">
                    <a href="{{route('subscriptions.students_subscription')}}">
                        
                        <span>{{ __('سداد الاشتراكات') }}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/invoices') }}">
                    <a href="{{route('invoices.index')}}">
                        
                        <span>{{ __('الفواتير') }}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/profit') }}">
                    <a href="{{route('profit.index')}}">
                        
                        <span>{{ __('صافي الربح') }}</span>
                    </a>
                </li>

                <li class="{{ active_if_match('admin/stores/movement') }}">
                    <a href="{{route('stores.movement.index')}}">
                        
                        <span>{{ __('المخازن') }}</span>
                    </a>
                </li>
                <li class="{{ active_if_match('admin/product/movement') }}">
                    <a href="{{route('stores.product.index')}}">
                        
                        <span>{{ __('تقارير المنتجات') }}</span>
                    </a>
                </li>
                <li class="{{ active_if_match('admin/product/invoice') }}">
                    <a href="{{route('stores.product.invoice.purchases')}}">
                        
                        <span>{{ __('المشتريات') }}</span>
                    </a>
                </li>
                <li class="{{ active_if_match('admin/product/invoice') }}">
                    <a href="{{route('stores.product.invoice.sales')}}">
                        
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
                            
                            <span>{{__('الشهادات المصدرة')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavAddCertificateActiveClass }}">
                        <a href="{{route('certificate.create')}}">
                            
                            <span>{{__('تصميم الشهادة')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('manage_report')
            <li class="{{ active_if_match('/reports/report_students_ages/') }}">
                <a class="has-arrow" href="#">
                    <i class="fa fa-paper-plane"></i>
                    <span>{{__('تقارير')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('reports/report_students_ages') }}">
                        <a href="{{route('reports.reportStudentsAge')}}">
                            <i class="fa fa-money"></i>
                            <span>{{__('تقارير اعمار الطلاب')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('reports/report_parents') }}">
                        <a href="{{route('reports.reportParents')}}">
                            <i class="fa fa-money"></i>
                            <span>{{__('تقرير بيانات الاباء')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('reports/report_subscribtions') }}">
                        <a href="{{route('reports.reportInvoices')}}">
                            <i class="fa fa-money"></i>
                            <span>{{__('قائمة الفواتير')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('reports/report_buses') }}">
                        <a href="{{route('reports.reportBuses')}}">
                            <i class="fa fa-money"></i>
                            <span>{{__('قائمة مدفوعات الباص لكل سائق')}}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('reports/report_buses') }}">
                        <a href="{{route('reports.reportCountStudent')}}">
                            <i class="fa fa-money"></i>
                            <span>{{__('تقرير عدد الطلبة الفعلي')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('manage_level')
            <li class="{{ @$navLevelActiveClass }}">
                <a class="has-arrow" href="#">
                    <span class="iconify"></span>
                    <span>{{__('المستويات')}}</span>
                </a>
                <ul>
                    <li class="{{ @$navLevelActiveClass }}">
                        <a href="{{route('level.index')}}">
                            
                            <span>{{__('All Level')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

{{--        @can('manage_language')--}}
{{--            <li>--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="fa6-solid:language"></span>--}}
{{--                    <span>{{__('Manage Language')}}</span>--}}
{{--                </a>--}}
{{--                <ul>--}}
{{--                    <li class="{{ active_if_match('admins/language') }}">--}}
{{--                        <a href="{{route('language.index')}}">--}}
{{--                            --}}
{{--                            <span>{{__('Language Settings')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('support_ticket')--}}
{{--            <li class="{{ @$navSupportTicketParentActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="ic:twotone-support-agent"></span>--}}
{{--                    <span>{{__('Support Ticket')}}</span>--}}
{{--                </a>--}}
{{--                <ul class="">--}}
{{--                    <li class="{{ @$subNavSupportTicketIndexActiveClass }}">--}}
{{--                        <a href="{{ route('support-ticket.admin.index') }}">--}}
{{--                            --}}
{{--                            <span> {{__('All Tickets')}} </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ @$subNavSupportTicketOpenActiveClass }}">--}}
{{--                        <a href="{{ route('support-ticket.admin.open') }}">--}}
{{--                            --}}
{{--                            <span>{{__('Open Ticket')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}




{{--


--}}

{{--        @can('user_management')--}}
{{--            <li class="{{ @$navUserParentActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="fa fa-male" data-icon="bxs:user-account"></span>--}}
{{--                    <span>{{__('User Managment')}}</span>--}}
{{--                </a>--}}

{{--                <ul class="{{ @$navUserParentShowClass }}">--}}

{{--                    <li class="{{ @$subNavUserCreateActiveClass }}">--}}
{{--                        <a href="{{route('user.create')}}">--}}
{{--                            --}}
{{--                            <span> {{__('Add User')}} </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ @$subNavUserActiveClass }}">--}}
{{--                        <a href="{{route('user.index')}}">--}}
{{--                            --}}
{{--                            <span>{{__('All Users')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--        @endcan--}}



{{--<!----}}
{{--                @can('user_management')--}}
{{--            <li class="{{ @$navEmailActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="dashicons:email"></span>--}}
{{--                    <span>{{__('Email Management')}}</span>--}}
{{--                </a>--}}
{{--                <ul class="{{ @$navEmailParentShowClass }}">--}}
{{--                    <li class="{{ @$subNavEmailTemplateActiveClass }}">--}}
{{--                        <a href="{{route('email-template.index')}}">--}}
{{--                            --}}
{{--                            <span>{{__('Email Template')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="{{ @$subNavSendMailActiveClass }}">--}}
{{--                        <a href="{{route('email-template.send-email')}}">--}}
{{--                            --}}
{{--                            <span>{{__('Send Email')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}


{{--        <li class="{{ @$navPageParentActiveClass }}">--}}
{{--            <a class="has-arrow" href="#">--}}
{{--                <span class="iconify" data-icon="dashicons:edit-page"></span>--}}
{{--                <span>{{__('Manage Page')}}</span>--}}
{{--            </a>--}}
{{--            <ul class="">--}}
{{--                <li class="{{ @$subNavPageAddActiveClass }}">--}}
{{--                    <a href="{{route('page.create')}}">--}}
{{--                        --}}
{{--                        <span> {{__('Add Page')}} </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ @$subNavPageIndexActiveClass }}">--}}
{{--                    <a href="{{route('page.index')}}">--}}
{{--                        --}}
{{--                        <span>{{__('All Pages')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--        </li>--}}

{{--        <li class="{{ @$navMenuParentActiveClass }}">--}}
{{--            <a class="has-arrow" href="#">--}}
{{--                <span class="iconify" data-icon="bi:menu-up"></span>--}}
{{--                <span>{{__('Manage Menu')}}</span>--}}
{{--            </a>--}}
{{--            <ul class="">--}}
{{--                <li class="{{ @$subNavStaticMenuIndexActiveClass }}">--}}
{{--                    <a href="{{route('menu.static')}}">--}}
{{--                        --}}
{{--                        <span>{{__('Static Menu')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ @$subNavDynamicMenuIndexActiveClass }}">--}}
{{--                    <a href="{{route('menu.dynamic')}}">--}}
{{--                        --}}
{{--                        <span>{{__('Dynamic Menu')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--        </li>--}}

{{---->--}}

{{--        @canany(['application_setting', 'global_setting', 'home_setting', 'mail_configuration', 'payment_option', 'content_setting'])--}}
{{--            <li class="{{ @$navApplicationSettingParentActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="mdi:application-cog-outline"></span>--}}
{{--                    <span>{{__('Application Settings')}}</span>--}}
{{--                </a>--}}
{{--                <ul class="">--}}
{{--                    @can('global_setting')--}}
{{--                        <li class="{{ @$subNavGlobalSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.general_setting') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Global Settings')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}


{{--                    <li class="{{ @$subNavLocationSettingsActiveClass }}">--}}
{{--                        <a href="{{ route('settings.location.country.index') }}">--}}
{{--                            --}}
{{--                            <span>{{__('Location Settings')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    @can('home_setting')--}}
{{--                        <li class="{{ @$subNavHomeSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.section-settings') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Home Settings')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('mail_configuration')--}}

{{--                        <li class="{{ @$subNavMailConfigSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.mail-configuration') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Mail Configuration')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}
{{--                    @can('payment_option')--}}
{{--                        <li class="{{ @$subNavPaymentOptionsSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.payment_method_settings') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Payment Options')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}
{{--                    @can('content_setting')--}}
{{--                        <li class="{{ @$subNavInstructorSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.instructor-feature') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Become Instructor')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ @$subNavFAQSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.faq.cms') }}">--}}
{{--                                --}}
{{--                                <span>{{__('FAQ')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ @$subNavSupportSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.support-ticket.cms') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Support Ticket')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ @$subNavAboutUsSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.about.gallery-area') }}">--}}
{{--                                --}}
{{--                                <span>{{__('About Us')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ @$subNavContactUsSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.contact.cms') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Contact Us')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ @$subNavMaintenanceModeSettingsActiveClass }}">--}}
{{--                            <a href="{{ route('settings.maintenance') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Maintenance Mode')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ @$subNavCacheActiveClass }}">--}}
{{--                            <a href="{{ route('settings.cache-settings') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Cache Settings')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ @$subNavMigrateActiveClass }}">--}}
{{--                            <a href="{{ route('settings.migrate-settings') }}">--}}
{{--                                --}}
{{--                                <span>{{__('Migrate Settings')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    @endcan--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcanany--}}

{{--        <li class="{{ @$navPolicyActiveClass }}">--}}
{{--            <a class="has-arrow" href="#">--}}
{{--                <span class="iconify" data-icon="dashicons:privacy"></span>--}}
{{--                <span>{{__('Policy Setting')}}</span>--}}
{{--            </a>--}}
{{--            <ul>--}}
{{--                <li class="{{ @$subNavTermConditionsActiveClass }}">--}}
{{--                    <a href="{{ route('admin.terms-conditions') }}">--}}
{{--                        --}}
{{--                        <span> {{__('Terms Conditions')}} </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ @$subNavPrivacyPolicyActiveClass }}">--}}
{{--                    <a href="{{ route('admin.privacy-policy') }}">--}}
{{--                        --}}
{{--                        <span> {{__('Privacy Policy')}} </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ @$subNavCookiePolicyActiveClass }}">--}}
{{--                    <a href="{{ route('admin.cookie-policy') }}">--}}
{{--                        --}}
{{--                        <span> {{__('Cookie Policy')}} </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

{{--        @can('content_setting')--}}
{{--            <li class="{{ @$navContactUsParentActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="fluent:contact-card-32-regular"></span>--}}
{{--                    <span>{{__('Contact Us')}}</span>--}}
{{--                </a>--}}
{{--                <ul class="{{ @$navContactUsParentShowClass }}">--}}
{{--                    <li class="{{ @$subNavContactUsIndexActiveClass }}">--}}
{{--                        <a href="{{ route('contact.index') }}">--}}
{{--                            --}}
{{--                            <span> {{__('All Contact Us')}} </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ @$subNavContactUsIssueIndexActiveClass }}">--}}
{{--                        <a href="{{ route('contact.issue.index') }}">--}}
{{--                            --}}
{{--                            <span>{{__('All Contact Us Issue')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ @$subNavContactUsIssueAddActiveClass }}">--}}
{{--                        <a href="{{ route('contact.issue.create') }}">--}}
{{--                            --}}
{{--                            <span>{{__('Add Contact Us Issue')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('manage_blog')--}}
{{--            <li class="{{ @$navBlogParentActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="jam:blogger-square"></span>--}}
{{--                    <span>{{__('Manage Blog')}} </span>--}}
{{--                </a>--}}
{{--                <ul>--}}
{{--                    <li class="{{ active_if_match('admins/blog/create') }}">--}}
{{--                        <a href="{{route('blog.create')}}">--}}
{{--                            --}}
{{--                            <span>{{__('Add Blog')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ active_if_match('admins/blog') }} {{ active_if_match('admins/blog/edit/*') }}">--}}
{{--                        <a href="{{route('blog.index')}}">--}}
{{--                            --}}
{{--                            <span>{{__('All Blog')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ @$subNavBlogCommentListActiveClass }}">--}}
{{--                        <a href="{{route('blog.blog-comment-list')}}">--}}
{{--                            --}}
{{--                            <span>{{ __('Blog Comment List') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ @$subNavBlogCategoryIndexActiveClass }}">--}}
{{--                        <a href="{{route('blog.blog-category.index')}}">--}}
{{--                            --}}
{{--                            <span>{{__('Blog Category')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        <li class="{{ @$navForumParentActiveClass }}">--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="carbon:forum"></span>--}}
{{--                    <span>{{ __('Manage Forum') }}</span>--}}
{{--                </a>--}}
{{--                <ul>--}}
{{--                    <li class="{{ @$subNavForumCategoryIndexActiveClass }}">--}}
{{--                        <a href="{{route('admin.forum.category.index')}}">--}}
{{--                            --}}
{{--                            <span>{{ __('Forum Category') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--        @can('account_setting')--}}
{{--            <li>--}}
{{--                <a class="has-arrow" href="#">--}}
{{--                    <span class="iconify" data-icon="bytesize:settings"></span>--}}
{{--                    <span>{{__('Account Settings')}}</span>--}}
{{--                </a>--}}
{{--                <ul class="{{ @$navUserParentShowClass }}">--}}
{{--                    <li class="{{ active_if_match('admins/profile') }}">--}}
{{--                        <a href="{{route('admin.profile')}}">--}}
{{--                            --}}
{{--                            <span> {{__('Profile')}} </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ active_if_match('admins/profile/change-password') }}">--}}
{{--                        <a href="{{ route('admin.change-password') }}">--}}
{{--                            --}}
{{--                            <span>{{__('Change Password')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('manage_affiliate')--}}
{{--        <li class="">--}}
{{--            <a class="has-arrow" href="#">--}}
{{--                <span class="iconify" data-icon="tabler:affiliate"></span>--}}
{{--                <span>{{__('Manage Affiliate')}}</span>--}}
{{--            </a>--}}
{{--            <ul class="">--}}
{{--                <li class="{{ @$subNavAffiliateManageListActiveClass }}">--}}
{{--                    <a href="{{route('affiliate.affiliate-request-list')}}">--}}
{{--                        --}}
{{--                        <span> {{__('Affiliate Request List')}} </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ active_if_match('admins/affiliate/affiliation-settings') }}">--}}
{{--                    <a href="{{ route('affiliate.affiliation-settings') }}">--}}
{{--                        --}}
{{--                        <span>{{__('Affiliate Settings')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ @$subNavAffiliateHistoryActiveClass }}">--}}
{{--                    <a href="{{ route('affiliate.affiliate-history') }}">--}}
{{--                        --}}
{{--                        <span>{{__('Affiliate history')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        @endif--}}

{{--        <li class="mb-5 text-center">--}}
{{--            <a href="#">--}}
{{--                <span>--}}
{{--                    <h3>{{ __('Software Version') }} {{ config('app.current_version') }}</h3>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--        </li>--}}
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
