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

        <li class=" {{ active_if_match('admins/dashboard/') }} ">
            <a href="{{route('instructor.profile')}}">
                <span class="iconify" data-icon="bxs:dashboard"></span>
                <span>{{__('ملفي الشخصي')}}</span>
            </a>
        </li>

        <li class=" {{ active_if_match('admins/dashboard/') }} ">
            <a href="{{route('admin.dashboard')}}">
                <span class="iconify" data-icon="bxs:dashboard"></span>
                <span>{{__('موادي')}}</span>
            </a>
        </li>


        <li class=" {{ active_if_match('admins/dashboard/') }} ">
            <a href="{{route('admin.dashboard')}}">
                <span class="iconify" data-icon="bxs:dashboard"></span>
                <span>{{__('دوراتي')}}</span>
            </a>
        </li>

        <li>
            <a class="has-arrow {{ active_if_match('assignments') }}" href="#">
                <i class="fa fa-bus"></i>
                <span>{{__('الواجبات اليومية')}}</span>
            </a>
            <ul>
                <li class=" {{ active_if_full_match('instructor/assignments') }} ">
                    <a href="{{route('instructor.assignments.index')}}">
                        <span class="iconify" data-icon="bxs:dashboard"></span>
                        <span>{{__('الواجبات')}}</span>
                    </a>
                </li>

                <li class="  {{ active_if_full_match('instructor/assignments/student') }} ">
                    <a href="{{route('instructor.assignments.student.index')}}">
                        <span class="iconify" data-icon="bxs:dashboard"></span>
                        <span>{{__('اضافة واجب لطالب')}}</span>
                    </a>
                </li>

                <li class="  {{ active_if_full_match('instructor/assignments/student/list') }} ">
                    <a href="{{route('instructor.assignments.student.list')}}">
                        <span class="iconify" data-icon="bxs:dashboard"></span>
                        <span>{{__('واجبات الطلاب')}}</span>
                    </a>
                </li>

            </ul>
        </li>
        {{--        <li>--}}
        {{--            <a class="has-arrow" href="#">--}}
        {{--                <i class="fa fa-bus"></i>--}}
        {{--                <span>{{__('Goals')}}</span>--}}
        {{--            </a>--}}
        {{--            <ul>--}}
        {{--                <li class="{{ active_if_match('goals/inbox') }}">--}}
        {{--                    <a href="{{route('admin.contact_us.contactUsInbox')}}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span>{{__('All Goals')}}</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}

        {{--                <li class="{{ active_if_match('goals/sent') }}">--}}
        {{--                    <a href="{{route('admin.contact_us.contactUsSent')}}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
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
                            <i class="fa fa-circle"></i>
                            <span>{{__('عرض الواجبات')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('assignments/create') }}">
                        <a href="{{route('admin.assignments.create')}}">
                            <i class="fa fa-circle"></i>
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
                            <i class="fa fa-circle"></i>
                            <span>{{__('متابعة الخطط')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('followup/create_class') }}">
                        <a href="{{route('admin.followup.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('تقرير متابعة حصة دراسية') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('followup/reading') }}">
                        <a href="{{route('admin.followup.reading')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('تقرير متابعة القراءة') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('followup/quran') }}">
                        <a href="{{route('admin.followup.quran')}}">
                            <i class="fa fa-circle"></i>
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
                            <i class="fa fa-circle"></i>
                            <span>{{ __('الاشتراكات') }}</span>
                        </a>
                    </li>


                    <li class="{{ active_if_match('admin/students_subscription') }}">
                        <a href="{{route('subscriptions.students_subscription')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('سداد الاشتراكات') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/invoices') }}">
                        <a href="{{route('invoices.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('الفواتير') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/profit') }}">
                        <a href="{{route('profit.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('صافي الربح') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_match('admin/stores/movement') }}">
                        <a href="{{route('stores.movement.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('المخازن') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/movement') }}">
                        <a href="{{route('stores.product.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('تقارير المنتجات') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/invoice') }}">
                        <a href="{{route('stores.product.invoice.purchases')}}">
                            <i class="fa fa-circle"></i>
                            <span>{{ __('المشتريات') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_if_match('admin/product/invoice') }}">
                        <a href="{{route('stores.product.invoice.sales')}}">
                            <i class="fa fa-circle"></i>
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
                            <i class="fa fa-circle"></i>
                            <span>{{__('الشهادات المصدرة')}}</span>
                        </a>
                    </li>
                    <li class="{{ @$subNavAddCertificateActiveClass }}">
                        <a href="{{route('certificate.create')}}">
                            <i class="fa fa-circle"></i>
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
                <a class="has-arrow" href="">
                    <span class="iconify"></span>
                    <span>{{__('المستويات')}}</span>
                </a>
                <ul>
                    <li class="{{ @$navLevelActiveClass }}">
                        <a href="{{route('level.index')}}">
                            <i class="fa fa-circle"></i>
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
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span> {{__('All Tickets')}} </span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ @$subNavSupportTicketOpenActiveClass }}">--}}
        {{--                        <a href="{{ route('support-ticket.admin.open') }}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span> {{__('Add User')}} </span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ @$subNavUserActiveClass }}">--}}
        {{--                        <a href="{{route('user.index')}}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span>{{__('Email Template')}}</span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}

        {{--                    <li class="{{ @$subNavSendMailActiveClass }}">--}}
        {{--                        <a href="{{route('email-template.send-email')}}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span> {{__('Add Page')}} </span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="{{ @$subNavPageIndexActiveClass }}">--}}
        {{--                    <a href="{{route('page.index')}}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
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
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span>{{__('Static Menu')}}</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="{{ @$subNavDynamicMenuIndexActiveClass }}">--}}
        {{--                    <a href="{{route('menu.dynamic')}}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
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
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Global Settings')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                    @endcan--}}


        {{--                    <li class="{{ @$subNavLocationSettingsActiveClass }}">--}}
        {{--                        <a href="{{ route('settings.location.country.index') }}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span>{{__('Location Settings')}}</span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}

        {{--                    @can('home_setting')--}}
        {{--                        <li class="{{ @$subNavHomeSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.section-settings') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Home Settings')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                    @endcan--}}

        {{--                    @can('mail_configuration')--}}

        {{--                        <li class="{{ @$subNavMailConfigSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.mail-configuration') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Mail Configuration')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                    @endcan--}}
        {{--                    @can('payment_option')--}}
        {{--                        <li class="{{ @$subNavPaymentOptionsSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.payment_method_settings') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Payment Options')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                    @endcan--}}
        {{--                    @can('content_setting')--}}
        {{--                        <li class="{{ @$subNavInstructorSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.instructor-feature') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Become Instructor')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}

        {{--                        <li class="{{ @$subNavFAQSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.faq.cms') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('FAQ')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                        <li class="{{ @$subNavSupportSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.support-ticket.cms') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Support Ticket')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}

        {{--                        <li class="{{ @$subNavAboutUsSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.about.gallery-area') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('About Us')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}

        {{--                        <li class="{{ @$subNavContactUsSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.contact.cms') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Contact Us')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                        <li class="{{ @$subNavMaintenanceModeSettingsActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.maintenance') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Maintenance Mode')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                        <li class="{{ @$subNavCacheActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.cache-settings') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
        {{--                                <span>{{__('Cache Settings')}}</span>--}}
        {{--                            </a>--}}
        {{--                        </li>--}}
        {{--                        <li class="{{ @$subNavMigrateActiveClass }}">--}}
        {{--                            <a href="{{ route('settings.migrate-settings') }}">--}}
        {{--                                <i class="fa fa-circle"></i>--}}
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
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span> {{__('Terms Conditions')}} </span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="{{ @$subNavPrivacyPolicyActiveClass }}">--}}
        {{--                    <a href="{{ route('admin.privacy-policy') }}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span> {{__('Privacy Policy')}} </span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="{{ @$subNavCookiePolicyActiveClass }}">--}}
        {{--                    <a href="{{ route('admin.cookie-policy') }}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span> {{__('All Contact Us')}} </span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ @$subNavContactUsIssueIndexActiveClass }}">--}}
        {{--                        <a href="{{ route('contact.issue.index') }}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span>{{__('All Contact Us Issue')}}</span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ @$subNavContactUsIssueAddActiveClass }}">--}}
        {{--                        <a href="{{ route('contact.issue.create') }}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span>{{__('Add Blog')}}</span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ active_if_match('admins/blog') }} {{ active_if_match('admins/blog/edit/*') }}">--}}
        {{--                        <a href="{{route('blog.index')}}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span>{{__('All Blog')}}</span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ @$subNavBlogCommentListActiveClass }}">--}}
        {{--                        <a href="{{route('blog.blog-comment-list')}}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span>{{ __('Blog Comment List') }}</span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ @$subNavBlogCategoryIndexActiveClass }}">--}}
        {{--                        <a href="{{route('blog.blog-category.index')}}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                            <i class="fa fa-circle"></i>--}}
        {{--                            <span> {{__('Profile')}} </span>--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                    <li class="{{ active_if_match('admins/profile/change-password') }}">--}}
        {{--                        <a href="{{ route('admin.change-password') }}">--}}
        {{--                            <i class="fa fa-circle"></i>--}}
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
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span> {{__('Affiliate Request List')}} </span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="{{ active_if_match('admins/affiliate/affiliation-settings') }}">--}}
        {{--                    <a href="{{ route('affiliate.affiliation-settings') }}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
        {{--                        <span>{{__('Affiliate Settings')}}</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="{{ @$subNavAffiliateHistoryActiveClass }}">--}}
        {{--                    <a href="{{ route('affiliate.affiliate-history') }}">--}}
        {{--                        <i class="fa fa-circle"></i>--}}
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
