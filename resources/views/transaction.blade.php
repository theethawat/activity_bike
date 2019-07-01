<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายการข้อมูล</title>
    <script src="https://kit.fontawesome.com/942c2b45e2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body{
        font-family:'Sarabun',sans-serif;
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
        font-family:'Sarabun',sans-serif;
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
                        <th scope="col">เพศ</th>
                        <th scope="col">หมายเลขบัตรประชาชน</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
   
                        <th scope="col">ทีม</th>

                        <th scope="col">ชำระเงิน</th>
                        <th scope="col">รับเสื้อ</th>
                        <th scope="col">ร่วมปั่น</th>
                        <!-- <th scope="col">รับโล่</th>
                        <th scope="col">รับเหรียญ</th> -->
                        <th scope="col">ประเภท</th>
                        <th scope="col">เงินบริจาค (บาท)</th>
                       
                    </tr>
                </thead>
                <tbody>

                <?php
                $count = 0;
                ?>

                @foreach ($data as $datalist)

                     <tr>
                        <td scope="col"><?php $count++;?> {{$count}} </td>
                        <td scope="col">
                       <?php
                        if($datalist->bib_id != NULL){
                             if ($datalist -> regis_donation == "1000000") {
                             printf("SC%04d",$datalist->bib_id);
                            }
                            if ($datalist -> regis_donation == "5000") {
                            printf("VC%04d",$datalist->bib_id);
                            }
                            if ($datalist -> regis_donation == "500") {
                            printf("GC%04d",$datalist->bib_id);
                            }
                        }
                        else {
                            print ("Not Now");
                        }
                        ?>
                        </td>
                        
                        <td scope="col">{{ $datalist -> regis_prefix}}{{ $datalist -> regis_name}}  {{ $datalist -> regis_surname}}</td>
                        <td scope="col">{{ $datalist -> regis_size}}</td>
                        <td scope="col">{{ $datalist -> regis_sex}}</td>
                        <!-- <td scope="col">
                            <?php
                            $birthday = date_create($datalist -> regis_date);
                            echo date_format($birthday,"d/m/Y");
                            ?>
                            </td> -->
                        <td scope="col">{{ $datalist -> regis_peopleid}}</td>
                        <td scope="col">{{ $datalist -> regis_call}}</td>

                        <td scope="col">{{ $datalist -> regis_team}}</td>
                        <!--ชำระเงิน-->
                        <td scope="col"><?php
                            $status = $datalist->regis_status;
                            if($status == "pending")
                                print("<i class='fas fa-times'></i>");
                            if($status == "success")
                                print("<i class='fas fa-check'></i>");
                                ?>
                        </td>
                      
                        <!--รับเสื้อ-->
                        <td scope="col">
                        <?php
                            if($datalist->cloth_recieve == true)
                                    print("<i class='fas fa-times'></i>");
                                if($datalist->cloth_recieve == false)
                                    print("<i class='fas fa-check'></i>");
                        ?>
                        
                        </td>
                        <!--เข้าร่วมการปั่นจักรยาน-->
                        <td scope="col">
                                <?php
                        
							    if($datalist->regis_joining == "join")
                                print("<i class='fas fa-times'></i>");
                                if($datalist->regis_joining == "nojoin")
                                print("<i class='fas fa-check'></i>");
                                
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
                        
    
                    </tr>

                @endforeach
                </tbody>
            </table>
            
            
            
    </div>
      
    <script>
    setTimeout(function(){
        window.print()
    }, 3000);
    </script>
</body>
</html>