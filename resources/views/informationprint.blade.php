<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลการสมัครเข้าร่วมงาน 10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</title>
    <script src="{{asset('/fontawesome/js/all.js')}}"></script>
  
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}} " rel="stylesheet" >
    <style>
    body{
        /* font-family:'Sarabun',sans-serif; */
        font-size:14px;
    }
    .acenter{
        text-align:center;
    }
    .aright{
        text-align:right;
    }
    .piccenter{
        display:block;
        margin-left:auto;
        margin-right:auto;
    }
    </style>
    <style media="print">
    @page {size:portrait}
    body{
        /* font-family:'Sarabun',sans-serif; */
        font-size:14px;
        width:100%;
        }
    </style>
</head>
<body>
        <div class="container">
            <br>
            <h5 class="acenter"><b>ข้อมูลสรุปการสมัครการเข้าร่วมงาน 10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</b> </h5>
            <h6 class="acenter">ข้อมูล ณ วันที่ <?php
                $date = date("d/m/");
                $year = date("Y");
                $year = $year + 543;
                echo $date.$year;
            ?> </h6>
            <hr>
            <h5><b>จำนวนผู้สมัคร</b></h5>
            <ul class="list-group list-group-horizontal acenter ">
                <li class="list-group-item  ">ผู้สมัครทั้งหมด <h4>{{$all_number}} คน </h4></li>
                <li class="list-group-item ">ประเภท 500 บาท <h4>{{$hundred_number}} คน </h4></li>
                <li class="list-group-item ">ประเภท 5,000 บาท <h4>{{$thousand_number}} คน </h4></li>
                <li class="list-group-item ">ประเภท 1,000,000 บาท <h4>{{$million_number}} คน </h4></li>
                        
            </ul>
            <br>
            <h5><b>ข้อมูลการสมัครตามประเภท</b></h5>
            <ul class="list-group list-group-horizontal acenter">
                <li class="list-group-item  ">ประเภท <h4>ทั่วไป</h4></li>
                <li class="list-group-item ">สมัคร <h4>{{$hundred_number}}</h4></li>
                <li class="list-group-item ">ร่วมปั่น <h4>{{$normal_join_count}}</h4></li>
                <li class="list-group-item ">เว็บไซต์ <h4>{{$hundred_number - $normal_offline}}</h4></li>
                <li class="list-group-item "> ออฟไลน์ <h4>{{$normal_offline}}</h4></li>
                <li class="list-group-item "> รับเสื้อแล้ว <h4>{{$normal_cloth_recieve}}</h4></li>
                <li class="list-group-item "> ยังไม่รับเสื้อ <h4>{{$hundred_number - $normal_cloth_recieve}}</h4></li>
                        
            </ul>
            <br>
            <ul class="list-group list-group-horizontal acenter">
                <li class="list-group-item  ">ประเภท <h4>VIP</h4></li>
                <li class="list-group-item ">สมัคร <h4>{{$thousand_number + $million_number}}</h4></li>
                <li class="list-group-item ">ร่วมปั่น <h4>{{$vip_join_count}}</h4></li>
                <li class="list-group-item ">เว็บไซต์ <h4>{{$vip_online}}</h4></li>
                <li class="list-group-item "> ออฟไลน์ <h4>{{$vip_offline}}</h4></li>
                <li class="list-group-item "> รับเสื้อแล้ว <h4>{{$vip_cloth_recieve}}</h4></li>
                <li class="list-group-item "> ยังไม่รับเสื้อ <h4>{{$thousand_number + $million_number - $vip_cloth_recieve}}</h4></li>
            </ul>
            <br>
            <h5><b>ข้อมูลการสมัครตามช่องทาง</b></h5>
            <ul class="list-group list-group-horizontal acenter">
                <li class="list-group-item  ">สมัครผ่านฝ่ายการเงินฯ <h4>{{$offline_number}} คน</h4></li>
                <li class="list-group-item ">สมัครผ่าน ThaiMTB.com <h4>{{$online_number}} คน</h4></li>
            </ul>
            <br>
            <h5><b>ไซส์เสื้อของผู้สมัคร</b></h5>
            <ul class="list-group list-group-horizontal acenter">
                <li class="list-group-item  ">SS <h4>{{$size[0]}} </h4></li>
                <li class="list-group-item "> S <h4>{{$size[1]}}</h4></li>
                <li class="list-group-item ">M <h4>{{$size[2]}}</h4></li>
                <li class="list-group-item ">L  <h4>{{$size[3]}}</h4></li>
                <li class="list-group-item "> XL  <h4>{{$size[4]}}</h4></li>
                <li class="list-group-item "> 2XL <h4>{{$size[5]}}</h4></li>
                <li class="list-group-item "> 3XL <h4>{{$size[6]}}</h4></li>
                <li class="list-group-item  "> รวม <h4>{{$size[0]+$size[1]+$size[2]+$size[3]+$size[4]+$size[5]+$size[6]}}</h4></li>    
            </ul>
            <br>
            <h5><b>การชำระเงินของผู้สมัคร</b></h5>
            <ul class="list-group list-group-horizontal acenter">
                <li class="list-group-item  ">ชำระเงินแล้ว <h4>{{$all_number - $pending_number}} คน</h4></li>
                <li class="list-group-item ">รอการชำระเงิน  <h4>{{$pending_number}} คน</h4></li>    
            </ul>
            <br>
            <h6><b>หมายเหตุ</b></h6>
            <ul>
                <li>ข้อมูลจากเว็บไซต์ ThaiMTB.com ณ ปัจจุบันเป็นข้อมูล ณ วันที่ 6 กรกฎาคม 2562</li>
                <li>ข้อมูลไซส์เสื้อนี้ รวมจำนวนของผู้บริจาคที่ยังไม่ชำระเงินด้วย</li>
            </ul>
            <br><br>
        </div>
</body>
</html>