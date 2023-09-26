
<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">

    <!-- Site Title -->
    <title>دار الانوار</title>
    <link rel="stylesheet" href="{{asset('invoice/css/style.css')}}">
</head>
<body>
<div class="tm_container">
    <div class="tm_invoice_wrap">
        <div class="tm_invoice tm_style1 tm_radius_0" id="tm_download_section">
            <div class="tm_invoice_in">
                <div class="tm_flex tm_flex_column_sm tm_justify_between tm_align_center tm_align_start_sm tm_f14 tm_primary_color tm_medium tm_mb5">
                    <p class="tm_m0 tm_f18 tm_bold">{{$title}}</p>
                    <p class="tm_m0">التاريخ : {{\Carbon\Carbon::today()->format('Y-m-d-F')}}</p>
                    <p class="tm_m0">رقم الفاتورة : {{$invoice->id}}</p>
                </div>
                <div class="tm_grid_row tm_col_4 tm_padd_20 tm_accent_bg tm_mb25 tm_white_color tm_align_center">

                </div>
                <div class="tm_invoice_head tm_mb10">
                    <div class="tm_invoice_left">
                        <p>
                            استلمنا من ولي امر الطفل / الطفلة {{$invoice->student->name}} <br>
                        </p>
                    </div>
                    <div class="tm_invoice_right tm_text_center">
                        <p class="tm_mb3"><b class="tm_primary_color">مبلغ</b></p>
                        <div class="tm_f30 tm_bold tm_accent_color tm_padd_15 tm_accent_bg_10 tm_border_1 tm_accent_border_20 tm_mb5">
                            {{$invoice->amount}}
                        </div>
                        <p class="tm_mb0"><i>وذلك مقابل اشتراك شهر {{\Carbon\Carbon::parse($invoice->subscription->created_at)->format('F')}}</i></p>
                    </div>
                </div>
                <div class="tm_table tm_style1 tm_mb40">
                    <div class="tm_round_border tm_radius_0">
                        <div class="tm_table_responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="tm_width_3 tm_semi_bold tm_primary_color">الاشتراك</th>
                                    <th class="tm_width_4 tm_semi_bold tm_primary_color tm_border_left">المبلغ</th>
                                     </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tm_width_3">{{$invoice->subscription->subscription->name}}</td>
                                    <td class="tm_width_2 tm_border_left tm_text_right">{{$invoice->amount}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tm_invoice_footer">
                        <div class="tm_left_footer tm_mobile_hide">
                        </div>

                        <div class="row">

                        <div class="row">
                            <p> الملاحظات : {{$invoice->note}}</p>
                        </div>
                        <div class="row">
                            <p> المستخدم : {{Auth::user()->name}}</p>
                        </div>
                        </div>
                    </div>
                </div>
            <hr class="mb">
                <div class="tm_invoice_footer">
                    <div class="row">
                        <div class="row">
                            <p></p>
                        </div>
                        <div class="row">
                            <p> العنوان : {{get_setting('app_location')}}</p>
                            <p> رقم الهاتف : {{get_setting('app_contact_number')}}</p>
                            <p> طباعة بتاريخ : {{\Carbon\Carbon::today()->format('d,F,Y')}}</p>
                            <p> في وقت : {{\Carbon\Carbon::today()->format('h:m:s')}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tm_invoice_btns tm_hide_print">
            <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
                <span class="tm_btn_text">Print</span>
            </a>
            <a  href="{{ route('invoices.download',$invoice) }}" id="tm_download_btn" class="tm_invoice_btn tm_color2">
                  <span class="tm_btn_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                  </span>
                <span class="tm_btn_text">Download</span>
            </a>
        </div>
    </div>
</div>


<script src="{{asset('invoice/js/jquery.min.js')}}"></script>
<script src="{{asset('invoice/js/jspdf.min.js')}}"></script>
<script src="{{asset('invoice/js/html2canvas.min.js')}}"></script>
<script src="{{asset('invoice/js/main.js')}}"></script>
</body>
</html>
