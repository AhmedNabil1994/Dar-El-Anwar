<div class="sidebar__area ">
    <div class="sidebar__close">
        <button class="close-btn">
{{--            <i class="fa fa-close"></i>--}}
        </button>
    </div>

    <div class="sidebar__brand">
        <div>
            <a href="{{ route('admin.dashboard') }}">
                @if(get_option('app_logo') != '')
                    <!-- <img src="{{getImageFile(get_option('app_logo'))}}" alt=""> -->
                    <img src="{{ asset('admin/images/icons/dar-elanwar-logo.png') }}" alt="logo">
                @else
                    <img src="" alt="">
                @endif
            </a>
        </div>
    </div>

    <ul id="sidebar-menu" class="sidebar__menu">

        <li class=" {{ active_if_match('admin/dashboard') }} ">
            <a href="{{route('admin.dashboard')}}">
{{--                <span class="iconify" data-icon="bxs:dashboard"></span>--}}
                <span>{{__('لوحة التحكم')}}</span>
            </a>
        </li>

        @can('manage-admins')
            <li class="{{ active_if_match('admin/admins') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="bxs:user-account"></span>--}}
                    <span>{{__('المسؤولون')}}</span>
                </a>

                <ul class="{{ @$navUserParentShowClass }}">

                    @can('all-admins')
                        <li class="{{ active_if_full_match('admin/admins') }}">
                            <a href="{{route('admins.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع المسؤولين')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-roles')
                        <li class="{{ active_if_full_match('admin/role') }}">
                            <a href="{{route('role.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('المجموعات')}}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('manage-employees')
            <li class="{{ active_if_match('admin/employees') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="bx:bx-user"></span>--}}
                    <span>{{ __('الموظفون') }}</span>
                </a>
                <ul>
                    @can('all-employees')
                        <li class="{{ active_if_full_match('admin/employees') }}">
                            <a href="{{ route('employees.index') }}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('جميع الموظفين') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('create-employees')
                        <li class="{{ active_if_full_match('admin/employees/create') }}">
                            <a href="{{ route('employees.create') }}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة موظف') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('manage-student')
            <li class=" {{ active_if_match('admin/student') }} ">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="ph:student"></span>--}}
                    <span>{{__('الطلاب')}}</span>
                </a>
                <ul>
                    @can('all-student')
                        <li class="{{ active_if_full_match('admin/student') }}">
                            <a href="{{route('student.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('جميع الطلاب') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('create-student')
                        <li class="{{ active_if_full_match('admin/student/create') }}">
                            <a href="{{route('student.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة طالب') }}</span>
                            </a>
                        </li>
                    @endcan
                        <li class="{{ active_if_full_match('admin/student/reviews') }}">
                            <a href="{{route('student.review')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('تقييمات الطلاب') }}</span>
                            </a>
                        </li>
                </ul>
            </li>
        @endcan

        @can('manage-absence')
            <li class=" {{ active_if_match('admin/absence') }} ">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="ph:student"></span>--}}
                    <span>{{__('الغياب')}}</span>
                </a>
                <ul>
                    @can('all-absence')
                        <li class="{{ active_if_full_match('admin/absence') }}">
                            <a href="{{route('absence.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('عرض الغياب') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('create-absence')
                        <li class="{{ active_if_full_match('admin/absence/create') }}">
                            <a href="{{route('absence.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة غياب') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('manage-course')
            <li class="{{ active_if_match('admin/course') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>--}}
                    <span>{{__('الدورات التدريبية')}}</span>
                </a>
                <ul>

                    @can('all-course')
                        <li class="{{ active_if_full_match('admin/course') }}">
                            <a href="{{route('admin.course.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع الدورات')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('create-course')
                        <li class="{{ active_if_full_match('admin/course/create') }}">
                            <a href="{{route('admin.course.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة دورة') }}</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan

        @can('manage-subject')
            <li class="{{ active_if_match('admin/subject') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>--}}
                    <span>{{__('المواد')}}</span>
                </a>
                <ul>

                    @can('all-course')
                        <li class="{{ active_if_full_match('admin/subject') }}">
                            <a href="{{route('admin.subject.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع المواد')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('all-course')

                        <li class="{{ active_if_full_match('admin/subject/create') }}">
                            <a href="{{route('admin.subject.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة مادة') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @can('manage-department')
            <li class="{{ active_if_match('admin/departments') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="codicon:references"></span>--}}
                    <span>{{__('الأقسام')}}</span>
                </a>
                <ul>
                    @can('all-department')
                        <li class="{{ active_if_full_match('admin/departments') }}">
                            <a href="{{route('category.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع الأقسام')}}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany

        @can('manage-exam')
            <li {{ active_if_match('admin/exam') }}>
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="dashicons:welcome-learn-more"></span>--}}
                    <span>{{__('الاختبارات')}}</span>
                </a>
                <ul>

                    @can('all-exam')
                        <li class="{{ active_if_full_match('admin/exam') }}">
                            <a href="{{route('admin.exam.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('جميع الاختبارات')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('all-exam')
                        <li class="{{ active_if_full_match('admin/exam/create') }}">
                            <a href="{{route('admin.exam.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة اختبار') }}</span>
                            </a>
                        </li>
                    @endcan


                </ul>
            </li>
        @endcanany

        @canany('manage-bus')
            <li class="{{ active_if_match('admin/bus') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الحافلات')}}</span>
                </a>
                <ul>
                    @can('all-bus')
                        <li class="{{ active_if_full_match('admin/bus') }}">
                            <a href="{{route('admin.bus.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('عرض الحافلات')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('add-bus')
                        <li class="{{ active_if_full_match('admin/bus/assign') }}">
                            <a href="{{route('admin.bus.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('إضافة حافلة') }}</span>
                            </a>
                        </li>

                            <li class="{{ active_if_full_match('admin/bus/subscription') }}">
                                <a href="{{route('admin.bus.subscribtion.create')}}">
{{--                                    <i class="fa fa-circle"></i>--}}
                                    <span>{{ __('إضافة اشتراك الحافلة') }}</span>
                                </a>
                            </li>

                    @endcan
                    {{--                    <li class="{{ active_if_match('admins/course/create') }}">--}}
                    {{--                        <a href="{{route('admin.course.create')}}">--}}
{{--                    --}}{{--                            <i class="fa fa-circle"></i>--}}
                    {{--                                <span>{{ __('Create Course') }}</span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
            </li>
        @endcanany


        @can('manage-contact')
            <li class="{{ active_if_match('contact_us') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('تواصل معنا')}}</span>
                </a>
                <ul>
                    @can('send_contact')
                        <li class="{{ active_if_match('contact_us/inbox') }}">
                            <a href="{{route('admin.contact_us.contactUsInbox')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('صندوق الوارد')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('receive_contact')
                        <li class="{{ active_if_match('contact_us/sent') }}">
                            <a href="{{route('admin.contact_us.contactUsSent')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('صندوق الصادر') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('conversation_contact')
                        <li class="{{ active_if_match('contact_us/conversations') }}">
                            <a href="{{route('admin.contact_us.contactUsConversations')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('المحادثات') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('message_contact')
                        <li class="{{ active_if_match('contact_us/messages') }}">
                            <a href="{{route('admin.contact_us.contactUsMessages')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('الرسائل') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('manage-class_room')
            <li class="{{ active_if_match('class_room') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الفصول')}}</span>
                </a>
                <ul>
                    @can('all-class_room')
                        <li class="{{ active_if_match('class_room') }}">
                            <a href="{{route('class_room.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('قائمة الفصول')}}</span>
                            </a>
                        </li>
                    @endcanany
                </ul>
            </li>
        @endcanany

        @can('manage-duties')
            <li class="{{ active_if_match('assignments') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الواجبات اليومية')}}</span>
                </a>
                <ul>
                    @can('all-duties')
                        <li class="{{ active_if_full_match('admin/assignments') }}">
                            <a href="{{route('admin.assignments.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('عرض الواجبات')}}</span>
                            </a>
                        </li>
                    @endcan

                    <li class=" {{ active_if_full_match('admin/assignments/assignments') }} ">
                        <a href="{{route('admin.assignments.assignment.index')}}">
{{--                            <span class="iconify" data-icon="bxs:dashboard"></span>--}}
                            <span>{{__('الواجبات')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_full_match('admin/assignments/student/list') }}">
                        <a href="{{route('admin.assignments.assignment.student.list')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{ __('إضافة واجبات للطلاب') }}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan

        @can('manage-followup')
            <li class="{{ active_if_match('followup') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('المتابعات')}}</span>
                </a>
                <ul>
                    @can('manage-followup_index')
                        <li class="{{ active_if_match('followup/index') }}">
                            <a href="{{route('admin.followup.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('متابعة الخطط')}}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-followup_create_class')
                        <li class="{{ active_if_match('followup/create_class') }}">
                            <a href="{{route('admin.followup.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('تقرير متابعة حصة دراسية') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-followup_reading')
                        <li class="{{ active_if_match('followup/reading') }}">
                            <a href="{{route('admin.followup.reading')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('تقرير متابعة القراءة') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-followup_quran')
                        <li class="{{ active_if_match('followup/quran') }}">
                            <a href="{{route('admin.followup.quran')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('تقرير متابعة القرآن') }}</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan

        @can('manage-finance')
            <li class="{{ active_if_match('accounts') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-bus"></i>--}}
                    <span>{{__('الحسابات')}}</span>
                </a>
                <ul>
                    @can('manage-finance_treasury')
                        <li class="{{ active_if_match('accounts/treasury') }}">
                            <a href="{{route('accounts.treasury')}}">
{{--                                <i class="fa fa-money"></i>--}}
                                <span>{{__('الخزينة')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-finance_subscriptions')
                        <li class="{{ active_if_full_match('admin/subscriptions') }}">
                            <a href="{{route('subscriptions.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('الاشتراكات') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-finance_students_subscription')
                        <li class="{{ active_if_full_match('admin/subscriptions/students_subscription') }}">
                            <a href="{{route('subscriptions.students_subscription')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('سداد الاشتراكات') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-finance_invoices')
                        <li class="{{ active_if_match('admin/invoices') }}">
                            <a href="{{route('invoices.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('الفواتير') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-finance_profit')
                        <li class="{{ active_if_match('admin/profit') }}">
                            <a href="{{route('profit.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('صافي الربح') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage-finance_stores_movement')
                        <li class="{{ active_if_match('admin/stores/movement') }}">
                            <a href="{{route('stores.movement.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('المخازن') }}</span>
                            </a>
                        </li>
                    @endcan
                        <li class="{{ active_if_match('admin/product/movement') }}">
                            <a href="{{route('stores.create')}}">
                                <span>{{ __('أضف منتج') }}</span>
                            </a>
                        </li>
                    @can('manage-finance_product_movement')
                        <li class="{{ active_if_match('admin/product/movement') }}">
                            <a href="{{route('stores.product.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('تقارير المنتجات') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-finance_product_invoice_purchases')
                        <li class="{{ active_if_match('admin/product/invoice') }}">
                            <a href="{{route('stores.product.invoice.purchases')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('المشتريات') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-finance_product_invoice_sales')
                        <li class="{{ active_if_match('admin/product/invoice') }}">
                            <a href="{{route('stores.product.invoice.sales')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{ __('المبيعات') }}</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan
        @can('manage-certificate')
            <li class="{{ @$navCertificateActiveClass }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify" data-icon="fluent:certificate-20-filled"></span>--}}
                    <span> {{__('الشهادات')}} </span>
                </a>
                <ul>
                    @can('all-certificate')
                        <li class="{{ @$subNavAllCertificateActiveClass }}">
                            <a href="{{route('certificate.index')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('الشهادات المصدرة')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('create-certificate')
                        <li class="{{ @$subNavAddCertificateActiveClass }}">
                            <a href="{{route('certificate.create')}}">
{{--                                <i class="fa fa-circle"></i>--}}
                                <span>{{__('تصميم الشهادة')}}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('manage-report')
            <li class="{{ active_if_match('/reports/report_students_ages') }}">
                <a class="has-arrow" href="#">
{{--                    <i class="fa fa-paper-plane"></i>--}}
                    <span>{{__('تقارير')}}</span>
                </a>
                <ul>
                    @can('manage-report_students_ages')
                        <li class="{{ active_if_match('reports/report_students_ages') }}">
                            <a href="{{route('reports.reportStudentsAge')}}">
{{--                                <i class="fa fa-money"></i>--}}
                                <span>{{__('تقارير أعمار الطلاب')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-report_parents')
                        <li class="{{ active_if_match('reports/report_parents') }}">
                            <a href="{{route('reports.reportParents')}}">
{{--                                <i class="fa fa-money"></i>--}}
                                <span>{{__('تقرير بيانات الآباء')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-report_subscribtions')
                        <li class="{{ active_if_match('reports/report_subscribtions') }}">
                            <a href="{{route('reports.reportInvoices')}}">
{{--                                <i class="fa fa-money"></i>--}}
                                <span>{{__('قائمة الفواتير')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-report_buses')
                        <li class="{{ active_if_match('reports/report_buses') }}">
                            <a href="{{route('reports.reportBuses')}}">
{{--                                <i class="fa fa-money"></i>--}}
                                <span>{{__('قائمة مدفوعات الباص لكل سائق')}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage-report_buses')
                        <li class="{{ active_if_match('reports/report_buses') }}">
                            <a href="{{route('reports.reportCountStudent')}}">
{{--                                <i class="fa fa-money"></i>--}}
                                <span>{{__('تقرير عدد الطلبة الفعلي')}}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('manage-level')
            <li class="{{ active_if_match('admin/level') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify"></span>--}}
                    <span>{{__('المستويات')}}</span>
                </a>
                <ul>
                    <li class="{{ active_if_match('admin/level') }}">
                        <a href="{{route('level.index')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('كل المستويات')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('manage-parent')
            <li class="{{ active_if_match('admin/parent_infos') }}">
                <a class="" href="{{route('parent_infos.index')}}">
{{--                    <span class="iconify"></span>--}}
                    <span>{{__('الآباء')}}</span>
                </a>
            </li>
        @endcan


        @can('manage-goals')
            <li class="{{ active_if_match('admin/goals') }}">
                <a class="has-arrow" href="#">
{{--                    <span class="iconify"></span>--}}
                    <span>{{__('الأهداف')}}</span>
                </a>
                <ul>
{{--                    <li class="{{ active_if_match('admin/goals') }}">--}}
{{--                        <a href="{{route('admin.goals.index')}}">--}}
{{--                            <i class="fa fa-circle"></i>--}}
{{--                            <span>{{__('جميع الأهداف')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="{{ active_if_full_match('admin/goals/create') }}">
                        <a href="{{route('admin.goals.create')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('إضافة هدف')}}</span>
                        </a>
                    </li>

                    <li class="{{ active_if_full_match('admin/goals/create/review') }}">
                        <a href="{{route('admin.goals.index.review')}}">
{{--                            <i class="fa fa-circle"></i>--}}
                            <span>{{__('تقييم الأطفال')}}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan
    </ul>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            $(".close-btn").click(function () {
                $(".sidebar__area").removeClass("active")
                $(".sidebar__area").addClass("non-active")
            });
        });
    </script>
@endpush
