<?php
if (request()->query('lang') == 'en') {
    app()->setLocale('en');
} else {
    app()->setLocale('ms');
}

?>
    <!doctype html>
<html lang="ms">
<head>

    <title>.: MyIMMs - e-Services :.</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/jquery-tab-ui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('styles/page.css')}}"/>
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/jquery-1.3.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-plugin-validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
    <script type="text/javascript" src="j{{asset('s/BaseCommon.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/BaseSession.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/audittrail.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datetimepicker.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/jquery-1.3.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-plugin-validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/audittrail.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/progressScreen.js')}}"></script>

    <script type="text/javascript">
        if (typeof window.event != undefined)
            document.onkeydown = function () {
                var t = event.srcElement.type;
                var kc = event.keyCode;
                var ro = event.srcElement.readOnly;
                if ((t == undefined && (kc == 8 || kc == 13)) || (t == 'text' && kc == 8 && ro) || (t == 'text' && kc == 13) || (t == 'textarea' && ro) || (kc == 8 && (t == 'submit' || t == 'select-one')))
                    return false;
            }

        //validation carian
        function fnSearchRocNo() {
            $("form").unbind("submit");
            var valid = true;

            $(".required").each(function () {
                $(this).removeClass("errFld");
            });

            var applno = $("#MAD_APPL_NO").val();
            var rocno = $("#MAD_ROC_NO").val();


            if (applno == '' && rocno == '') {

                $("#MAD_APPL_NO").addClass("errFld");
                $("#MAD_ROC_NO1").addClass("errFld");
                $("#MAD_ROC_NO2").addClass("errFld");

                valid = false;
            }


            if (!valid) {
                alert("Sila isikan maklumat berikut.");
            } else {
                $("#SEARCH_IND").val('NEW');
            }

            return valid;
        }

        function fnSearchAgency() {
            $("form").unbind("submit");
            var valid = true;

            $(".required").each(function () {
                $(this).removeClass("errFld");
            });

            var agency = $("#MAD_GOV_AGCY_CD").val();

            if (agency == '') {

                $("#MAD_GOV_AGCY_CD").addClass("errFld");

                valid = false;
            }

            if (!valid) {
                alert("Sila isikan maklumat berikut.");
            }

            return valid;
        }

        $(window).load(function () {
            if (Number(($('#currentPgNo').val())) == Number(1)) {
                $('#next').attr('disabled', true);
                $('#last').attr('disabled', true);
            }
            if (Number(1) == 1) {
                $('#go').attr('disabled', true);
            }
            if (Number(($('#currentPgNo').val())) == 1) {
                $('#prev').attr('disabled', true);
                $('#first').attr('disabled', true);
            }

            if (Number(($('#currentPgNo2').val())) == Number(1)) {
                $('#next2').attr('disabled', true);
                $('#last2').attr('disabled', true);
            }
            if (Number(1) == 1) {
                $('#go2').attr('disabled', true);
            }
            if (Number(($('#currentPgNo2').val())) == 1) {
                $('#prev2').attr('disabled', true);
                $('#first2').attr('disabled', true);
            }
        });

        function fnPaymentDet(applNo, finNo) {

            var vConfirmMsg = "Anda boleh membuat pembayaran di Kaunter atau Online. Teruskan untuk membuat pembayaran melalui Online.";

            var dialogH = 170;
            var dialogW = 500;
            //Get the window height and width
            var winH = ($(window).height() / 2) + (dialogH / 2);
            var winW = ($(window).width() / 2) - (dialogW / 2);

            var wPymt = window.showModalDialog("/myimms/confirmWin", vConfirmMsg, "resizable: yes; dialogHeight: " + dialogH + "px; dialogWidth: " + dialogW + "px; dialogTop: " + winH + "px; dialogLeft: " + winW + "px; ");

            if (wPymt == "Confirm") {

                $("#APPL_NO").val(applNo);
                $("#FIN_NO").val(finNo);

                return true;
            } else {
                return false;
            }
        }

        function fnPaymentRePrint(applNo, finNo) {

            var vPymtDet = "MAD_APPL_NO=" + applNo + "&MAD_FIN_NO=" + finNo + "&RE_PRINT=Y";
            var wPrint = window.showModalDialog("/myimms/PRAStatus/praPaymentPrint?" + vPymtDet, "", "resizable: yes; dialogHeight: 500px; dialogWidth: 1100px; ");
        }


        function gotoPageNo(type) {
            $("form").unbind("submit");

            var result = fnSearchRocNo();

            if (result) {

                var vCurrentPgNo = $('#currentPgNo').val().trim();
                if (vCurrentPgNo == '' || Number(vCurrentPgNo) == '0')
                    $('#currentPgNo').val('1');

                if (type == 'first') {
                    document.getElementById("currentPgNo").value = '1';
                } else if (type == 'prev') {
                    var vACT_PAGE = Number(1) - 1;
                    if ('1' == '1') {
                        vACT_PAGE = '1';
                    }
                    document.getElementById("currentPgNo").value = vACT_PAGE;
                } else if (type == 'go') {
                    if (Number(($('#currentPgNo').val())) > Number(1)) {
                        alert("Maksimum muka surat ialah" + " " + 1);
                        return false;
                    }
                } else if (type == 'next') {
                    var vACT_PAGE = Number(1) + 1;
                    if (Number(vACT_PAGE) > Number(1)) {
                        vACT_PAGE = '1';
                    }
                    document.getElementById("currentPgNo").value = vACT_PAGE;
                } else if (type == 'last') {
                    document.getElementById("currentPgNo").value = '1';
                }

                $("#SEARCH_IND").val('OLD');


                document.forms[0].txnDetail.value = gen_varpart();
            }
            return result;
        }

        function gotoPageNo2(type) {
            $("form").unbind("submit");

            var result = fnSearchRocNo();

            if (result) {

                var vCurrentPgNo = $('#currentPgNo2').val().trim();
                if (vCurrentPgNo == '' || Number(vCurrentPgNo) == '0')
                    $('#currentPgNo2').val('1');

                if (type == 'first') {
                    document.getElementById("currentPgNo2").value = '1';
                } else if (type == 'prev') {
                    var vACT_PAGE = Number(1) - 1;
                    if ('1' == '1') {
                        vACT_PAGE = '1';
                    }
                    document.getElementById("currentPgNo2").value = vACT_PAGE;
                } else if (type == 'go') {
                    if (Number(($('#currentPgNo2').val())) > Number(1)) {
                        alert("Maksimum muka surat ialah" + " " + 1);
                        return false;
                    }
                } else if (type == 'next') {
                    var vACT_PAGE = Number(1) + 1;
                    if (Number(vACT_PAGE) > Number(1)) {
                        vACT_PAGE = '1';
                    }
                    document.getElementById("currentPgNo2").value = vACT_PAGE;
                } else if (type == 'last') {
                    document.getElementById("currentPgNo2").value = '1';
                }

                $("#SEARCH_IND").val('OLD');


                document.forms[0].txnDetail.value = gen_varpart();
            }
            return result;
        }

        $(function () {

            $("#MAD_ROC_NO1")
                .bind('keyup', function (event) {
                    $("#MAD_ROC_NO2").val('');
                    $("#MAD_ROC_NO2").removeClass("errFld");

                    var eTyp = event.srcElement.type;
                    var eKey = event.keyCode;

                    if (eTyp == 'text' && eKey != 8) {
                        validatePhoneNo(this, $('#MAD_ROC_NO1').val());

                        if ($("#MAD_ROC_NO1").val().length == 6) {
                            $("#MAD_ROC_NO1").val($("#MAD_ROC_NO1").val() + '-');
                        }

                        if ($("#MAD_ROC_NO1").val().length == 9 && $("#MAD_ROC_NO1").val().charAt(6) == '-') {
                            $("#MAD_ROC_NO1").val($("#MAD_ROC_NO1").val() + '-');
                        }

                    } else {
                        $("#MAD_ROC_NO1").val($("#MAD_ROC_NO1").val().replace("-", ""));
                    }

                    if ($("#MAD_ROC_NO1").val().length > 6 && $("#MAD_ROC_NO1").val().charAt(6) != '-') {
                        var part2 = $("#MAD_ROC_NO1").val().substr(6, $("#MAD_ROC_NO1").val().length);
                        if (part2.indexOf("-") > -1) {
                            part2 = part2.replace("-", "");
                        }

                        $("#MAD_ROC_NO1").val($("#MAD_ROC_NO1").val().substr(0, 6) + '-' + part2);
                    }

                    if ($("#MAD_ROC_NO1").val().length > 9 && $("#MAD_ROC_NO1").val().charAt(9) != '-') {
                        var part2 = $("#MAD_ROC_NO1").val().substr(9, $("#MAD_ROC_NO1").val().length);
                        if (part2.indexOf("-") > -1) {
                            part2 = part2.replace("-", "");
                        }
                        $("#MAD_ROC_NO1").val($("#MAD_ROC_NO1").val().substr(0, 9) + '-' + part2);
                    }

                    if ($("#MAD_ROC_NO1").val().length > 14) {
                        $("#MAD_ROC_NO1").val($("#MAD_ROC_NO1").val().substr(0, 14));
                    }

                    $("#MAD_ROC_NO").val($("#MAD_ROC_NO1").val());
                });

            $("#MAD_ROC_NO2")
                .bind('blur', function (event) {
                    $("#MAD_ROC_NO").val($("#MAD_ROC_NO2").val());

                });


            $("#VIEW_IMG")
                .bind('click', function (event) {
                    window.showModalDialog("images/visapass/AP_SampleApplNo.jpg", "", "resizable: yes; dialogHeight: 450px; dialogWidth: 1100px;");
                });

            $('#currentPgNo')
                .bind('keyup', function (event) {
                    validateNumber(this, $('#currentPgNo').val());
                });

        });

    </script>
    <style type="text/css">
        .style1 {
            color: #0000FF
        }

        .labelM_3 {
            padding-left: 10px;
            background-color: #B3D9FF;
            font-size: 12px;
            line-height: 18px;
            width: 180px;
            border-bottom: 0px dotted #E0E0E0;
        }
    </style>


    <script language="javascript" type="text/javascript">
        if (typeof window.event != undefined)
            document.onkeydown = function () {
                var t = event.srcElement.type;
                var kc = event.keyCode;
                var ro = event.srcElement.readOnly;
                if ((t == undefined && (kc == 8 || kc == 13)) || (t == 'text' && kc == 8 && ro) || (t == 'text' && kc == 13) || (kc == 8 && (t == 'submit' || t == 'select-one' || t == 'button')))
                    return false;
            }

        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "{{asset('myimms/menu_index.xml')}}",
                dataType: "xml",
                success: function (xml) {
                    parseXml(xml);
                }
            });
        });

        function parseXml(xml) {
            var type = '36';
            var _lang = "{{request()->query('lang') ?? 'ms'}}";
            var jList = $("#list");
            var c_lang = '';
            var module = 'pra';
            var subModule = '';

            console.log(_lang)

            //alert('type:'+type+">> lang:"+_lang +">> module:"+module);
            if (_lang == "") {
                _lang = c_lang;
            }

            var urlPath = $(location).attr('pathname');
            var urlBind = urlPath.substring(urlPath.lastIndexOf("https://eservices.imi.gov.my/") + 1, urlPath.length);

            $(xml).find("Business").each(function () {
                if (type == $(this).attr("name")) {

                    $(xml).find("Module").each(function () {
                        var moduleType = $(this).attr("type");
                        //alert('type : '+type);

                        if (module == moduleType) {
                            if (_lang == "ms")
                                $("#menu").append($(this).find("Title_ms").text() + "<br />");
                            else
                                $("#menu").append($(this).find("Title_en").text() + "<br />");

                            $(this).find("SubMenus").each(function () {
                                var arr;
                                if (_lang == "ms")
                                    arr = $(this).find("menu_ms").text();
                                else
                                    arr = $(this).find("menu_en").text();

                                var arrPath = $(this).find("url").text();
                                var parameter = $(this).find("parameter").text();

                                var vCls = "";
                                if (arrPath == urlBind || arrPath == subModule) {
                                    vCls = " class=active ";
                                }

                                if (parameter != "")
                                    arrPath += "?type=" + type + "&lang=" + 'ms' + "&" + parameter;
                                else
                                    arrPath += "?type=" + type + "&lang=" + 'ms';

                                console.log(arrPath + vCls, xml)

                                jList.append(
                                    $("<li><span ><a href = " + arrPath + vCls + ">" + arr + "</a></span></li>")
                                );


                            });


                        }
                    });

                }
            });
        }

        function showClock() {
            var clock = new Date();
            var hours = clock.getHours();
            var minutes = clock.getMinutes();
            var seconds = clock.getSeconds();
            // for a nice disply we'll add a zero before the numbers between 0 and 9
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            document.getElementById('showText').value = hours + ":" + minutes + ":" + seconds;
            t = setTimeout('showClock()', 500);
            /* setTimeout() JavaScript method is used to call showClock() every 1000 milliseconds (that means exactly 1 second) */
        }
    </script>

    <script type="text/javascript">
        document.onclick = function () {
            document.getElementById("popFrame").style.visibility = "hidden";
        }
    </script>
</head>

<body onload="javascript:showClock();">
<iframe src="{{asset('js/popcal.html')}}" name="popFrame" id="popFrame" scrolling="no" frameborder="0"
        style="border:0; visibility:hidden;position:absolute;z-index:65535"></iframe>
<input type="hidden" name="hdCurrLang" id="hdCurrLang" value="ms"/>
<input type="hidden" name="hdCode" id="hdCode"/>
<input type="hidden" name="counter" id="counter"/>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td height="96" width="775" background="{{asset('images/header/ms_Animated96.gif')}}">
            <table border="0" width="775">
                <tr>
                    <td width="25">&nbsp;</td>
                    <td width="130">&nbsp;</td>
                    <td width="110">&nbsp;</td>
                    <td width="40">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td rowspan="3" valign="bottom">

                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td rowspan="2" align="">
                        <div
                            style="width: 80px; overflow: auto; height: 30px; margin: 0; position: absolute; top: 58px;left: 398px; float: left;">
                            <input type="text" name="showText" id="showText" readonly="true"
                                   style="width:60px;text-align:center;border:0px; font-size:11pt; font-weight: bold; font-family: Century Gothic;"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><br>{{__('You logged in as VISITOR')}}</td>
                </tr>
            </table>
        </td>
        <td height="96" background="{{asset('images/header/square.jpg')}}">&nbsp;</td>
        <td height="96" width="220" background="{{asset('images/header/square.jpg')}}">
            <table border="0" width="220">
                <tr>
                    <td align="center">


                        {{__(date('l'))}} {{date('j F Y')}}

                    </td>
                </tr>
                <tr>
                    <td><img src="{{asset('images/header/JIM_verticalLine.jpg')}}" width="200" height="7" border="0"
                             alt=""></td>
                </tr>
                <tr>
                    <td align="center">


                    </td>
                </tr>
                <tr>
                    <td><img src="{{asset('images/header/JIM_verticalLine.jpg')}}" width="200" height="7" border="0"
                             alt=""></td>
                </tr>
                <tr>
                    <td align="center">&nbsp;

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div id="boxmaster-b">
    <div id="boxmain">
        <div id="boxmenu">
            <div id="box_menucontentPublic">
                <div id="box_menucontainerPublic">
                    <br>
                    <li><span id="menu" class="submenu"></span>
                        <ul>
                            <ol id="list" style="text-transform: uppercase">
                                <!--- List items will be added dynamically. --->
                            </ol>
                        </ul>
                    </li>
                </div>
            </div>
        </div>

        <div id="box_contentPublic">
            <div id="msg">


            </div>
            <?php
                $query["lang"] = app()->getLocale();
            ?>


            <div class="form_container">
                <form method="post" action="{{route('search', ["lang" => app()->getLocale()])}}" id="PRAStatus">

                    @csrf
                    <input type="hidden" name="txnDetail">
                    <input type="hidden" name="SEARCH_IND" id="SEARCH_IND" value=""/>

                    <input type="hidden" name="APPL_NO" id="APPL_NO"/>
                    <input type="hidden" name="FIN_NO" id="FIN_NO"/>
                    <input type="hidden" name="VSTR_TYP" id="VSTR_TYP" value="M"/>
                    <input type="hidden" name="CurrLang" id="CurrLang" value="{{request()->query('lang') ?? 'ms'}}"/>

                    <div id="progressWin"
                         style="display: block; top: 0; left: 0; width: 100%; height: 100%; position: absolute;">
                        <div id="progressBg"
                             style=" background-image: url('{{asset('styles/ui-lightness/images/ui-bg_diagonals-thick_20_666666_40x40.png')}}'); opacity: 0.6; filter: alpha(opacity=60); background-repeat: repeat; top: 0; left: 0; width: 100%; height: 100%; position: absolute; z-index: 1;"></div>
                        <div id="progressTxt"
                             style="font-size: 15px; font-weight: bold; position: absolute; top: 40%; width: 100%; overflow: visible; z-index: 2;"
                             align="center">
                            <table width="350px" align="center" bgcolor="grey"
                                   style="height: 80px; border-color: black; border-width: medium; border-style: solid; ">
                                <tr>
                                    <td valign="middle" align="center">
                                        <img src="{{asset('images/loading.gif')}}" border="0"/>
                                        <BR>
                                        Pemprosesan Sedang Dijalankan. Sila Tunggu . . .
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div>
                        <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                            <tbody>
                            <tr>
                                <td colspan="3" class="rowheader">Pertanyaan Status Pegawai Dagang (DP11)</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="label"><font color="red">* </font>{{ __("Application No.") }}</td>
                                <td colspan="2"><input type="text" name="application" id="MAD_APPL_NO" maxlength="45"
                                                       size="45" value="" style="text-transform: uppercase"></td>
                            </tr>
                            <tr>
                                <td class="label"><font color="red">* </font>{{__("Company Registration No.")}}</td>
                                <td colspan="2">
                                    <input type="text" name="registration" id="MAD_ROC_NO" maxlength="20" size="45"
                                           value="" style="text-transform: uppercase">
                                </td>
                            </tr>
                            <tr>
                                <td class="label">&nbsp;&nbsp;&nbsp;{{__("The poisonous face")}}</td>
                                <td colspan="2">
                                    <input type="text" name="document" id="MAD_DOC_NO" maxlength="20" size="45" value=""
                                           style="text-transform: uppercase">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="submit" name="search" id="search" value="{{__("Search")}}"
                                           style="width:100px">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">

                            <tr>
                                <td colspan="6" height="20px"></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table class="tblwidth" align="center" border="0" bgcolor="#F4F4FF">
                            <tr class="subheader">
                                <td width="5%">{{ __("Bil") }}</td>
                                <td width="10%">{{ __("Tarikh Permohonan") }}</td>
                                <td width="20%">{{ __("No Permohonan") }}</td>
                                <td width="20%">{{ __("Nama Pemohon") }}</td>
                                <td width="15%">{{ __("Warganegara") }}</td>
                                <td width="15%">{{ __("No Dokumen") }}</td>
                                <td width="10%">{{ __("Status Permohonan") }}</td>
                                <td width="5%">&nbsp;</td>
                            </tr>

                            @foreach($pra_status_list as $pra_status)
                                <tr class="grida" align="center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{\Carbon\Carbon::parse($pra_status->application_date)}}</td>
                                    <td>{{$pra_status->application_no}}</td>
                                    <td>{{$pra_status->employee_name}}</td>
                                    <td>{{$pra_status->employer_identification_card_no}}
                                    <td>{{$pra_status->document_no}}</td>
                                    <td>{{__($pra_status->status)}}</td>
                                </tr>
                            @endforeach


                            <tr>
                                <td colspan="3" style="height: 10px;"><font
                                        style="font-weight: bolder">{{__("Total Record")}}
                                        : {{$pra_status_list->total()}}</font></td>
                                <td colspan="4" style="height: 10px; text-align: right">

                                    <?php
                                    $query = request()->query();
                                    $query["page"] = 1;
                                    ?>
                                    <form action="{{route('search', $query)}}" method="post"
                                          style="display: inline-block">
                                        @csrf
                                        <input type="submit" name="searchStatusPRA" value="&nbsp;Ι&nbsp;<&nbsp;"
                                               title="Click here to show first page records">
                                        <input name="MAD_ROC_NO1" type="hidden"
                                               value="{{request()->MAD_ROC_NO1 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_ROC_NO2" type="hidden"
                                               value="{{request()->MAD_ROC_NO2 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_APPL_NO" type="hidden"
                                               value="{{request()->MAD_APPL_NO ?? null}}" size="51" maxlength="45"
                                               style="text-transform: uppercase">
                                    </form>

                                    <?php
                                    $query['page'] = $pra_status_list->currentPage() - 1;
                                    ?>
                                    <form action="{{route('search', $query)}}" method="post"
                                          style="display: inline-block">
                                        @csrf
                                        <input name="MAD_ROC_NO1" type="hidden"
                                               value="{{request()->MAD_ROC_NO1 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_ROC_NO2" type="hidden"
                                               value="{{request()->MAD_ROC_NO2 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_APPL_NO" type="hidden"
                                               value="{{request()->MAD_APPL_NO ?? null}}" size="51" maxlength="45"
                                               style="text-transform: uppercase">
                                        <input type="submit" name="searchStatusPRA" value="&nbsp;<<&nbsp;"
                                               title="Click here to show previous page records"
                                               @if($pra_status_list->currentPage() == 1) disabled @endif>
                                    </form>


                                    &nbsp;<input type="text" name="currentPgNo"
                                                 value="{{$pra_status_list->currentPage()}}"
                                                 size="{{$pra_status_list->lastPage()}}"><font
                                        style="font-weight: bolder">&nbsp;{{__("of")}}
                                        &nbsp; {{$pra_status_list->lastPage()}}</font>
                                    &nbsp;<input type="submit" name="searchStatusPRA" value="{{__('GO')}}"
                                                 title="Click Here to find specific page number"
                                                 onclick="return gotoPageNo('go');">

                                    <?php
                                    $query['page'] = $pra_status_list->currentPage() + 1;
                                    ?>

                                    <form action="{{route('search', $query)}}" method="post"
                                          style="display: inline-block">
                                        @csrf
                                        <input name="MAD_ROC_NO1" type="hidden"
                                               value="{{request()->MAD_ROC_NO1 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_ROC_NO2" type="hidden"
                                               value="{{request()->MAD_ROC_NO2 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_APPL_NO" type="hidden"
                                               value="{{request()->MAD_APPL_NO ?? null}}" size="51" maxlength="45"
                                               style="text-transform: uppercase">
                                        <input type="submit" name="searchStatusPRA" value="&nbsp;>>&nbsp;"
                                               title="Click here to show next page records"
                                               @if($pra_status_list->currentPage() == $pra_status_list->lastPage()) disabled @endif>
                                    </form>


                                    <?php
                                    $query["page"] = $pra_status_list->lastPage();
                                    ?>
                                    <form action="{{route('search', $query)}}" method="post"
                                          style="display: inline-block">
                                        @csrf
                                        <input name="MAD_ROC_NO1" type="hidden"
                                               value="{{request()->MAD_ROC_NO1 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_ROC_NO2" type="hidden"
                                               value="{{request()->MAD_ROC_NO2 ?? null}}" size="35" maxlength="20"
                                               style="text-transform: uppercase">
                                        <input name="MAD_APPL_NO" type="hidden"
                                               value="{{request()->MAD_APPL_NO ?? null}}" size="51" maxlength="45"
                                               style="text-transform: uppercase">
                                        <input type="submit" name="searchStatusPRA" value=" > Ι "
                                               title="Click here to show last page records"
                                               @if($pra_status_list->currentPage() == $pra_status_list->lastPage()) disabled @endif>
                                    </form>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" height="20px"></td>
                            </tr>
                        </table>
                    </div>

                    <div style="display: none;"><input type="hidden" name="_sourcePage"
                                                       value="akRvQcK6Gq1ICUgpjXoFvI4ZzQL1UdQ0SQUW6bS2A4WlfZ4pTO9M139jCjT_KMa0"/><input
                            type="hidden" name="__fp" value="Xw1fVIK1PQ0="/></div>
                </form>
            </div>


        </div>
    </div>
</div>
</BODY>
</HTML>

