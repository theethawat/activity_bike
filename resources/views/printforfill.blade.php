<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายการชื่อผู้สมัครเข้าร่วมงาน 10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</title>
    <script src="{{asset('/fontawesome/js/all.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun:300&display=swap" rel="stylesheet">
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
    @page {size:landscape}
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
            <h6 class="acenter"><strong>รายชื่อ และ รายละเอียดผู้สมัครเข้าร่วมโครงการ 10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</strong> </h6>
            <h6 class="acenter"> {{$describe}} ข้อมูล ณ วันที่  <?php
            
                $date = date("d/m/");
                $year = date("Y");
                $year = $year + 543;
                echo $date.$year;
            ?></h6>
            <br>
         <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">BIB</th>
                        <th scope="col">ชื่อ-นามสกุล</th>

                        <th scope="col">ไซส์เสื้อ</th>
                        <th scope="col">วันเกิด</th>
                        <th scope="col">หมายเลขบัตรประชาชน</th> 
                        <th scope="col">เบอร์โทรศัพท์</th>
                        <th scope="col">ที่อยู่</th> 
                        <th scope="col">ชำระเงิน</th>
                        

                        
                        
                        <th scope="col">ร่วมปั่น</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">เงินบริจาค (บาท)</th>
                        <!-- <th scope="col">ช่องทางการสมัคร</th> -->
                    </tr>
                </thead>
                <tbody>

                <?php
                $count = 0;
				$allmoney = 0;
                ?>

                @foreach ($data as $datalist)

                     <tr>
                        <td scope="col"><?php $count++;?> {{$count}} </td>
                        <td scope="col">
                       <?php
                        if($datalist->bib_id != NULL){
                             if ($datalist -> regis_donation == "1000000" && $datalist->regis_method == "Offline") {
                             printf("SC%04d",$datalist->bib_id);
                            }
                            if ($datalist -> regis_donation == "5000" && $datalist->regis_method == "Offline") {
                            printf("VC%04d",$datalist->bib_id);
                            }
                            if ($datalist -> regis_donation == "500" && $datalist->regis_method == "Offline") {
                            printf("GC%04d",$datalist->bib_id);
                            }
                            if ($datalist -> regis_donation == "1000000" && $datalist->regis_method != "Offline") {
                                printf("SW%04d",$datalist->bib_id);
                               }
                               if ($datalist -> regis_donation == "5000" && $datalist->regis_method != "Offline") {
                               printf("VW%04d",$datalist->bib_id);
                               }
                               if ($datalist -> regis_donation == "500" && $datalist->regis_method != "Offline") {
                               printf("GW%04d",$datalist->bib_id);
                               }
							$allmoney += $datalist->donate_value;
                        }
                        else {
                            print ("Not Now");
                        }
                        ?>
                        </td>
                        
                        <td scope="col">{{ $datalist -> regis_prefix}}{{ $datalist -> regis_name}}  {{ $datalist -> regis_surname}}</td>
                        <td scope="col">{{ $datalist -> regis_size}}</td>
                    
                         <td scope="col">
                            <?php
                            $birthday = date_create($datalist -> regis_date);
                            $date_bd = date_format($birthday,"d/m/");
                            $year_bd = date_format($birthday,"Y");
                            $year_bd = $year_bd + 543;
                            echo $date_bd . $year_bd;
                            ?>
                            </td> 
                        <td scope="col">{{ $datalist -> regis_peopleid}}</td>
                        <td scope="col">{{ $datalist -> regis_call}}</td>
                        <td scope="col">{{ $datalist -> regis_address}}</td>
                      
                        <!--ชำระเงิน-->
                        <td scope="col"><?php
                            $status = $datalist->regis_status;
                            if($status == "pending")
                                print("<i class='fas fa-times'></i>");
                            if($status == "success")
                                print("<i class='fas fa-check'></i>");
                                ?>
                        </td>
                      
                 
                        <!--เข้าร่วมการปั่นจักรยาน-->
                        <td scope="col">
                                <?php
                        
							    if($datalist->regis_joining == "join")
                                    print("<i class='fas fa-check'></i>"); 
                                if($datalist->regis_joining == "nojoin")
                                    print("<i class='fas fa-times'></i>");
                                
                                ?> 
                         </td> 

                        <!-- <td scope="col">
                        <?php
                        
							    // if($datalist->regis_shield == "YES")
                                // print("<i class='fas fa-times'></i>");
                                // else
                                // print("<i class='fas fa-check'></i>");
                                
                                ?> 
                        </td> -->
                        <!-- <td scope="col">
                        <?php
                        
                        // if($datalist->regis_medal == "YES")
                        // print("<i class='fas fa-times'></i>");
                        // else
                        // print("<i class='fas fa-check'></i>");
                        
                        ?> 
                        </td> -->
                        <td scope="col">
                        <?php 
                        if ($datalist -> regis_donation == "1000000") {
                             printf("VIP หนึ่งล้านบาท");
                            }
                            if ($datalist -> regis_donation == "5000") {
                            printf("VIP");
                            }
                            if ($datalist -> regis_donation == "500") {
                            printf("ทั่วไป");
                            } 
                            ?></td>
                        <td scope="col">{{ number_format($datalist->donate_value)}} </td>
                        <!-- <td scope="col"><?php
                            // if($datalist->regis_method == "Offline")
                            //     echo "ภายในฯ";
                            // else
                            //     echo "ThaiMTB";
                        ?> </td>  -->
                            
                    </tr>

                @endforeach
				 <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">รวมยอดเงินบริจาคทั้งหมด</th>

                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"> </th>
						<th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"> </th>
                       <th scope="col"></th>
                        
                        <th scope="col">{{number_format($allmoney)}}</th>
                        <th scope="col"> บาท </th>
                       
                    </tr>
                </tbody>
            </table>
           
            
             <br>
            
    </div>
      
   
</body>
</html>