<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    // 2011 Autocomplete jQuery AJAX By php-for-ecommerce.blogspot.com
    $.autocomplete = function(ele) {
        if (ele.val() != "") { //หากค่าใน textfield ไม่ว่าง
            $.tauto_box(ele); //เรียกใช้funcionนี้ เพื่อสร้างDialog box Auto Commplete ขึ้นมา แต่จะถูกซ่อนเอาไว้ก่อน
            $.ajax({ //เรียก function ajax ขึ้นมา
                url: 'autocomplete2.php',
                type: 'POST', //ส่งค่าแบบ POST
                data: {
                    keyword: ele.val()
                }, //ใช้ตัวแปรชื่อ keyword ส่งค่า($_POST['keyword'])
                beforeSend: function() { //ก่อนส่งค่า
                    $.loadingshow(ele); //แสดงตัว loading
                },
                success: function(data) { //หากส่งข้อมูลสมบูรณ์
                    $('#tauto_box').show(); //แสดงdialog box
                    $('#tauto_box').html(data); //เอาค่าที่ response กลับมาใส่ใน dialog box
                    $.loadinghide(ele); //ซ่อนตัว loading
                    $('#tauto_box ul li').bind('click', function(
                        event) { //หากมีการคลิกที่ text ใน dialog box แถวใดแถวหนึ่ง
                        if (event.target == this) { //ตรวจสอบการคลิกว่าถูกต้อง
                            ele.val($(this).html()) //เอาค่าที่คลิกเลือกใส่ลงใน textfield
                            $('#tauto_boxback').remove(); //ลบdialog boxซะ
                        }
                    });
                }
            });
        } else { //หากไม่เจอค่าใน textfield
            $.loadinghide(ele); //ซ่อนตัว loading
            $('#tauto_boxback').remove(); //ลบdialog box
        }
        $('#tauto_boxback,#' + ele.attr('id')).bind('click', function(event) {
            //หากมีการคลิกที่ dialogและ textfieldแสดงว่าให้ ลบ dialog ซะ
            if (event.target == this) {
                $('#tauto_boxback').remove(); //ลบ dialog ซะ
            }
        });
    }
    $.tauto_box = function(ele) { //function แสดง dialog
        if ($('#tauto_boxback').length != 0) {
            $('#tauto_boxback').remove();
        }
        $('body').append('<div id="tauto_boxback"><div id="tauto_box"></div></div>');
        $('#tauto_boxback').css('top', ((ele.position().top + ele.height()) + 7) + 'px');
        $('#tauto_box').css({
            'width': ele.width(),
            'left': ele.position().left + 'px'
        });
    }
    $.loadingshow = function(ele) { //แสดงตัว loading
        ele.addClass('loading');
    }
    $.loadinghide = function(ele) { //ซ่อนตัว loading
        ele.removeClass('loading');
    }
    $(document).ready(function() {
        $("#tautox").keyup(function() { //ตรวจจับการkeyตัวอักษรที่ textfield
            $.autocomplete($(this)); //เรียกใช้ function Auto Complete
        });
    });
    </script>
    <title>ทำ Autocomplete ด้วย jQuery+AJAX ค้นหาหมวดสินค้า</title>
    <style>
    body {
        margin: 0px;
        font-family: Tahoma, Geneva, sans-serif;
        font-size: 14px;
        background: url(mission_impossible_.jpg) no-repeat center top;
    }

    .loading {
        background: url(loader.gif);
        /*แก้ไขตัว loading ที่นี่*/
        background-repeat: no-repeat;
        background-position: right;
    }

    #tauto_boxback {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    #tauto_box {
        background: #F60;
        border: #999;
        color: #FFF;
        width: 100%;
        display: none;
        padding: 5px;
        position: absolute;
        float: left;
    }

    #tauto_box ul {
        list-style: none;
        margin: 0px auto;
        padding: 5px;
        cursor: pointer;
    }

    #tauto_box ul li {
        margin: 0px auto;
        padding: 5px;
    }

    #tauto_box ul li:hover {
        background: #F90;
    }
    </style>
</head>

<body>
    <div style="margin:0px auto;width:550px;">
        <div style="margin-top:50px;">ค้นหาหมวดสินค้า
            <input id="tautox" name="tautox" type="textfield" size="50" onkeyup="$.autocomplete($(this))" />
            เช่น <strong>ตุ๊กตา,หมี</strong>
        </div>
    </div>
</body>

</html>