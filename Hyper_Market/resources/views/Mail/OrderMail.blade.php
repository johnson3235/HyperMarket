{{--  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OrderMail</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('/plugins/summernote/summernote-bs4.min.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('css')
</head>
<body>
    <div class="row">
    <div class="col-12">
        <img src='{{url("assets/img/logo/logo.png")}}'>
    </div>
    <div class="col-12">

</div>
</div>
<!-- jQuery -->
<script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('/plugins/chart.js') }}/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/dist/js/pages/dashboard.js') }}"></script>
@yield('js')
</body>
</html>  --}}
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=320, initial-scale=1" />
  <title>Airmail Confirm</title>
  <style type="text/css">

    /* ----- Client Fixes ----- */

    /* Force Outlook to provide a "view in browser" message */
    #outlook a {
      padding: 0;
    }

    /* Force Hotmail to display emails at full width */
    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    /* Force Hotmail to display normal line spacing */
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }


     /* Prevent WebKit and Windows mobile changing default text sizes */
    body, table, td, p, a, li, blockquote {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Remove spacing between tables in Outlook 2007 and up */
    table, td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */
    img {
      -ms-interpolation-mode: bicubic;
    }

     /* ----- Reset ----- */

    html,
    body,
    .body-wrap,
    .body-wrap-cell {
      margin: 0;
      padding: 0;
      background: #ffffff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      text-align: left;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    td, th {
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      line-height:1.5em;
    }

    b a,
    .footer a {
      text-decoration: none;
      color: #464646;
    }

    a.blue-link {
      color: blue;
      text-decoration: underline;
    }

    /* ----- General ----- */

    td.center {
      text-align: center;
    }

    .left {
      text-align: left;
    }

    .body-padding {
      padding: 24px 40px 40px;
    }

    .border-bottom {
      border-bottom: 1px solid #D8D8D8;
    }

    table.full-width-gmail-android {
      width: 100% !important;
    }


    /* ----- Header ----- */
    .header {
      font-weight: bold;
      font-size: 16px;
      line-height: 16px;
      height: 16px;
      padding-top: 19px;
      padding-bottom: 7px;
    }

    .header a {
      color: #464646;
      text-decoration: none;
    }

    /* ----- Footer ----- */

    .footer a {
      font-size: 12px;
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 650px)">
    @media only screen and (max-width: 650px) {
      * {
        font-size: 16px !important;
      }

      table[class*="w320"] {
        width: 320px !important;
      }

      td[class="mobile-center"],
      div[class="mobile-center"] {
        text-align: center !important;
      }

      td[class*="body-padding"] {
        padding: 20px !important;
      }

      td[class="mobile"] {
        text-align: right;
        vertical-align: top;
      }
    }
  </style>

</head>
<body style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
 <td valign="top" align="left" width="100%" style="background:repeat-x url(https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2) #f9f8f8;">
 <center>

   <table class="w320 full-width-gmail-android" bgcolor="#f9f8f8" background="https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2" style="background-color:transparent" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="100%" height="48" valign="top">
            <!--[if gte mso 9]>
            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:49px;">
              <v:fill type="tile" src="https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2" color="#ffffff" />
              <v:textbox inset="0,0,0,0">
            <![endif]-->
              <table class="full-width-gmail-android" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                  <td class="header center" width="100%">
                    <a href="#">
                     Marketo
                    </a>
                  </td>
                </tr>
              </table>
            <!--[if gte mso 9]>
              </v:textbox>
            </v:rect>
            <![endif]-->
        </td>
      </tr>
    </table>

    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
      <tr>
        <td align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="500">
              <tr>
                <td class="body-padding mobile-padding">

                <table cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td style="text-align:center; font-size:30px; padding-bottom:20px;">
                      Your order has been shipped!
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-bottom:20px;">
                      Hello Bob, <br>
                      <br>
                      We would like you to know that your order has shipped! To view your order or make any changes please click the "my order" button below.<br>
                      <br>
                      <b><a class="blue-link" href="#">Track shipping</a></b>
                    </td>
                  </tr>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="padding-bottom:20px; text-align:left;">
                      Date: 12/30/2013<br>
                      <b>Order Number:</b> {{'OR'.$order_Id }}
                    </td>
                  </tr>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td>
                      <b>Delivery Date</b>
                    </td>
                    <td>
                      <b>Shipping Address</b>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom" height="5"></td>
                    <td class="border-bottom" height="5"></td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px; vertical-align:top;">
                      Monday, 20th May 2014
                    </td>
                    <td style="padding-top:5px;" class="mobile">
                      Bobersaurus St,<br>
                      Victoria, BC<br>
                      V8P 8D8<br>
                    </td>
                  </tr>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="mobile-center" align="left" style="padding:40px 0;">
                      <div class="mobile-center" align="left"><!--[if mso]>
                          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:190px;" arcsize="11%" strokecolor="#407429" fill="t">
                            <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                            <w:anchorlock/>
                            <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">My Order</center>
                          </v:roundrect>
                        <![endif]--><a href="#"
                        style="background-color:#41CC00;background-image:url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);border:1px solid #407429;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;text-shadow: -1px -1px #47A54B;line-height:37px;text-align:center;text-decoration:none;width:190px;-webkit-text-size-adjust:none;mso-hide:all;">My Order</a></div>
                    </td>
                  </tr>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="text-align:left;">
                      Thanks so much,
                    </td>
                  </tr>
                  <tr>
                    <td class="left" width="129" height="20" style="padding-top:10px; text-align:left;">
                      <img class="left" width="129" height="20" src="" alt="Company Name">
                    </td>
                  </tr>
                </table>

                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    </table>

    <table class="w320" bgcolor="#E5E5E5" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td style="border-top:1px solid #B3B3B3;" align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="500" bgcolor="#E5E5E5">
              <tr>
                <td>
                  <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#E5E5E5">
                    <tr>
                      <td class="center" style="padding:25px; text-align:center;">
                        <b><a href="#">Get in touch</a></b> if you have any questions or feedback
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
      <tr>
        <td style="border-top:1px solid #B3B3B3; border-bottom:1px solid #B3B3B3;" align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="500" bgcolor="#E5E5E5">
              <tr>
                <td align="center" style="padding:25px; text-align:center">
                  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#E5E5E5">
                    <tr>
                      <td class="center footer" style="font-size:12px;">
                        <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <span class="footer-group">
                          <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="#">Support</a>
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    </table>

  </center>
  </td>
</tr>
</table>
</body>
</html>
