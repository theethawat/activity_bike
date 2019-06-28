<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ใบเสร็จรับเงิน</title>
    <script src="https://kit.fontawesome.com/942c2b45e2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body{
        font-family:'Sarabun',sans-serif;
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
</head>
<body>
    <div class="container">
        <div class="card border-dark">
            <div class="card-body">
            <h4 class="acenter">ใบเสร็จรับเงิน</h4>
            <h6 class="acenter">เขื่อนวชิราลงกรณ 444 ม.1 ต.ท่าขนุน อ.ทองผาภูมิ จ.กาญจนบุรี</h6>
            <h6 class="aright">เลขที่ 
            <?php
                if($data->bib_id != NULL){
                        if ($data -> regis_donation == "1000000") {
                            printf("SC%04d",$data->bib_id);
                        }
                        if ($data -> regis_donation == "5000") {
                            printf("VC%04d",$data->bib_id);
                        }
                        if ($data -> regis_donation == "500") {
                            printf("GC%04d",$data->bib_id);
                        }
                    }
                else {
                    print ("Not Issued");
                }
            ?>
            
            </h6>
			 <h6 class="aright"> <b>วันที่รับเงิน</b> 
            <?php
                $date = date("d/m/");
                $year = date("Y");
                $year = $year + 543;
                echo $date.$year;
            ?>
            </h6>
            <hr class="border-dark">
            <h6><strong>ชื่อกิจกรรม</strong> 10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</h6>
            <h6><strong>รายละเอียดผู้บริจาค</strong></h6>
            <h6><b>ชื่อ</b> {{ $data -> regis_prefix}}{{ $data -> regis_name}}  {{ $data -> regis_surname}} </h6>
            <h6><b>ที่อยู่</b> {{ $data -> regis_address}}</h6>
           
            <h6><strong>ประเภทการสมัคร</strong></h6>
            <ul>
                <?php
                if($data->regis_donation == "1000000" || $data->regis_donation =="5000"){
                    print "<i class='far fa-check-circle'></i> VIP <br> 
                            <i class='far fa-circle'></i> ผู้สมัครทั่วไป ";
                }
                else{
                    print "<i class='far fa-circle'></i> VIP <br> 
                    <i class='far fa-check-circle'></i> ผู้สมัครทั่วไป";
                }
                ?>
            </ul>
            <br>
			 <h6><strong>Size เสื้อ</strong> <span class="text-uppercase">{{$data->regis_size}} </span></h6>
            <div class="aright">
                <h6>จำนวนเงิน <u><?php
                    echo "&nbsp&nbsp".number_format($data->donate_value,2)."&nbsp&nbsp";
                ?>  </u> บาท </h6>
                <h6>( {{$data->donate_alphabet}} ) &nbsp&nbsp&nbsp</h6>
            </div>
            <div>
                <h6>ผู้รับเงิน ___________________________________</h6>
                <h6>แผนกบัญชีและการเงิน เขื่อนวชิราลงกรณ<br>
                โทร 034-599-882 <br>
	      โทร 034-599-887 ต่อ 2408, 2415		</h6>
            </div>
            </div>
        </div>
    </div>
    <script>
    setTimeout(function(){
        window.print()
    }, 3000);
    </script>
</body>
</html>