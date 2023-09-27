@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid instructions">

            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <h1 class="first" >استمارة التحاق بالدار</h1>
                </div>
                <div >
                    <h1 class=" second" >تعليمات عامة</h1>
                </div>
                    <p class="text-black fw-bold text-end">-العمل تدار متواصل على مدار العام، ويوميا دا يوم الجمعة.</p>
                    <p class="text-black fw-bold text-end">- لا تقبل إدارة الدار المتاقشة في الأمور الفتية الخاصة ب كدراسة يالدار سواء من تاحية التصاب المقرر من الحصص الدراسية</p>
                    <p class="text-black fw-bold text-end">أو المستوى المقرر التدق الطالب يه، أو ماهية المقررات الدراسية و ما يتطليه تحقيق أعداف تلك المقررات من إعداد و تحضير و طرائق تدريس و</p>
                    <p class="text-black fw-bold text-end">أسكيب تقويم و اختيارات و تصحيح و تشاط داخل الفصل و خارجه، و تحديد مطم أو معلمة دون أحرى .</p>
                    <p class="text-black fw-bold text-end">- يسدد الاشتراك شهريا والذي يطد تيعا لتقدم مستوى الفلب وعد الساعت الدراسية التي يقضيها الطالب لدار يداية كل شهر ميلادى ولن يقيل</p>
                    <p class="text-black fw-bold text-end">تواجد الطالب يأتدار للشهر التالي يدون سداد إلا في حالات معيتة تقيلها إدارة الطالب وفى السوم لن يقيل تواجد الطتب أكثرمن شهرين يدون سداد</p>
                    <p class="text-black fw-bold text-end">الاشتراك مهما كاتت الأسبب</p>
                    <p class="text-black fw-bold text-end">- الدار غر مشولة عن أي غيب للطلب خلال الشهر و لن يعوض يقيمة مالية الا في حكة الاتقطاع التام.</p>
                    <p class="text-black fw-bold text-end">- لا تقيل إدارة الدار المتاقشة في توعية و مستوى الكتب الدراسية المستخدمة، و يلتزم ولي الأمر يسداد شمن الكتب الدراسية التي ترى الإدارة</p>
                    <p class="text-black fw-bold text-end">اضفتها تدشا لما سيق إقراره خلال " IO " أيام من تأريغ المطئية بالحضور لاستلام الكتب الدراسية المضافة، هذا و لا تد الدا مسئولة عن</p>
                    <p class="text-black fw-bold text-end">ضيع الكتب الدراسية من الطالب لأي سبب كان سواء أخبر الطلب عن مكان احتمال ضياعه منه أو لم يخبر، كما لا يقل اليتة تواجد الطلب فى الدار</p>
                    <p class="text-black fw-bold text-end">بغير الكتب الدراسية الخصة يه أو التواجد يكتب دراسية تتفة.</p>
                    <p class="text-black fw-bold text-end">- الالتزام يالحضور في الوقت المحدد للطتب ، و في حلة التأخير لأي سيب كان يحق لإدارة الدار رفض التحاق الطالب يمجموعته الدراسية ذلك</p>
                    <p class="text-black fw-bold text-end">اليوم دون أدتى مسئولية عليها شي عدم دخول الطالب لمقر الدار ، إلا شي الحلات التي تقبلها إدارة الدار</p>
                    <p class="text-black fw-bold text-end">، كما لا يقل الاتصراف قيل تهاية وفت المدارسة المحدد، إلا شي الحالات التي تقيلها دارة الدار .</p>
                    <p class="text-black fw-bold text-end">- لا يقيل اليتة الغيب يدون إنن معتمد من المشرفة المختصة، و لا يسمح يتكرار الغيب سواء يلنن أو يدون إذن يشكل يؤشر على مستوى الطالب.</p>
                    <p class="text-black fw-bold text-end">- يلتزم ولي الأمر يمتايعة واجبك الطالب، ومعاونة الدار في ضيط سلو كيات الطالب داخل الدار و خارجها..</p>
                    <p class="text-black fw-bold text-end">يحدد ولي الأمر طريقة اتصراف الطلب من الدار يذتاه و لا تد الدار مسئولة اليتة ع الطالب خارج اركاتها .</p>
                    <p class="text-black fw-bold text-end">- فى حالة احتيا الطلب لدروات خاصة فى التخاطب أو صعويات التعلم يلزم الضلب يهذه الدورات كشرط أساسي للتواحد يالدار .وذلك من خلا</p>
                    <p class="text-black fw-bold text-end">أخصانى تخطب متخصص وتتايع التتنج مع إدارة الدار .</p>
                    <p class="text-black fw-bold text-end">- يلتزم ولي الأمر شي يداية كل عام ميلادى يسداد قيمة لاشتراك المقررة وذك تظير الاشتراك كبرتامج والموقع الالكتروتي الدار لما يأن المبلغ لا</p>
                    <p class="text-black fw-bold text-end">يسترد يأي حل.</p>
            </div>

        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

