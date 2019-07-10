@extends('layouts.app')
@section('content')


@auth



    <div >
            <h3 class="kanit acenter"><i class="fas fa-user-friends"></i> รายชื่อผู้สมัครเข้าร่วมกิจกรรม 
            <?php if($donate_money != NULL): ?>
                <a href="{{url('/home/transaction/'.$donate_money)}} "> <button class="btn btn-primary"><i class="fas fa-print"></i> พิมพ์</button> </a>
            <?php endif;?>
            </h3>
            <h5 class="kanit acenter">
                <?php
                if($describe != NULL): 
                    echo $describe;
                else:
                    echo " <a href='view/reverse'> <button class='btn btn-success'><i class='fas fa-reply-all'></i> ดูจากผู้ลงทะเบียนคนสุดท้ายก่อน</button> </a>";
                endif;
                ?>
            </h5>
            <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="kanit acenter ">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">BIB</th>
                        <th scope="col">Status</th>
                        <th scope="col">-</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">ไซส์</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">ID/Passport</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                       
                        <th scope="col">เงินบริจาค</th> 
                        <th scope="col">ได้รับเหรียญ</th>
                        <th scope="col">แก้ไข หรือ ลบ</th>
                         <th scope="col">ทีม</th>
                       
                        <th scope="col">แก้ไขล่าสุดโดย</th>
                        <th scope="col">อัพเดทเมื่อ</th>
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
                            //Offline Bib Generator
                             if ($datalist -> regis_donation == "1000000" && $datalist->regis_method == "Offline") {
                             printf("SC%04d",$datalist->bib_id); 
                             print("<br><span class='badge badge-success kanit piccenter'><i class='fas fa-trophy'></i> <h6>VIP</h6></span>");
                            }
                            if ($datalist -> regis_donation == "5000" && $datalist->regis_method == "Offline") {
                            printf("VC%04d",$datalist->bib_id);
                            print("<br><span class='badge badge-warning kanit piccenter'><i class='fas fa-trophy'></i> <h6>VIP</h6></span>");
                            }
                            if ($datalist -> regis_donation == "500" && $datalist->regis_method == "Offline") {
                            printf("GC%04d",$datalist->bib_id);
                           
                            }
                            //From ThaiMTB Bib Generator
                            if ($datalist -> regis_donation == "1000000" && $datalist->regis_method != "Offline") {
                                printf("SW%04d",$datalist->bib_id); 
                                print("<br><span class='badge badge-success kanit piccenter'><i class='fas fa-trophy'></i> <h6>VIP</h6></span>");
                               }
                               if ($datalist -> regis_donation == "5000" && $datalist->regis_method != "Offline") {
                               printf("VW%04d",$datalist->bib_id);
                               print("<br><span class='badge badge-warning kanit piccenter'><i class='fas fa-trophy'></i> <h6>VIP</h6></span>");
                               }
                               if ($datalist -> regis_donation == "500" && $datalist->regis_method != "Offline") {
                               printf("GW%04d",$datalist->bib_id);
                              
                               }
							
							$allmoney += $datalist->donate_value;
                        }
                        else {
                            print ("Not Now");
                            if ($datalist -> regis_donation == "5000"){
                                print("<br><span class='badge badge-warning kanit piccenter'><i class='fas fa-trophy'></i> <h6>VIP</h6></span>");
                            }
                            if ($datalist -> regis_donation == "1000000"){
                                print("<br><span class='badge badge-success kanit piccenter'><i class='fas fa-trophy'></i> <h6>VIP</h6></span>");
                            }
                                
                        }
                        ?>
                        </td>
                        <td scope="col "><?php
                            
                            $status = $datalist->regis_status;
                            if($status == "pending")
                                print("<span class='badge badge-danger kanit piccenter'><i class='fas fa-ban'></i> <h6>รอชำระ</h6></span>");
                            if($status == "success"){
                                print("<span class='badge badge-success kanit piccenter'><h6> <i class='fas fa-check-circle'></i> ชำระเรียบร้อย</h6></span>");
                            }
                            $method = $datalist->regis_method;
                            if($method != "Offline"){
                                print("<span class='badge badge-primary kanit piccenter'><h6> <i class='fas fa-globe-asia'></i> Online Reg.</h6></span>");
                            }
                            if($datalist->cloth_recieve == true)
                                print("<span class='badge badge-warning kanit piccenter'><h6><i class='fas fa-check-circle'></i> รับเสื้อแล้ว</h6></span>");
                            if($datalist->cloth_recieve == false)
                                print("<span class='badge badge-light kanit piccenter'><h6><i class='fas fa-tshirt'></i>  ยังไม่รับเสื้อ</h6></span>");
							if($datalist->regis_joining == "join")
                                print("<span class='badge badge-light kanit piccenter'><h6><i class='fas fa-biking'></i> ร่วมปั่น</h6></span>");
                            if($datalist->regis_joining == "nojoin")
                                print("<span class='badge badge-light kanit piccenter'><h6 class='text-danger'><i class='fas fa-biking'></i> ไม่ได้ร่วมปั่น</h6></span>");
                                
                        ?> 
                           
                        </td>
                        <td scope="col">{{ $datalist -> regis_prefix}}</td>
                        <td scope="col">{{ $datalist -> regis_name}}</td>
                        <td scope="col">{{ $datalist -> regis_surname}}</td>
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
                     
                     
                        <td scope="col">{{$datalist -> regis_donation}} / {{ $datalist -> donate_value}}</td>
                         <td scope="col"><?php 
                         if($datalist -> medal_recieve == true)
                            print("<i class='fas fa-check'></i>"); 
                         else
                            print("<i class='fas fa-times'></i>");
                            ?> </td>
                        <td scope="col">
                            <div class="d-flex flex-row justify-content-center kanit">
                                <a href={{url('/home/edit/'.$datalist->id)}} ><button style="width:60px; margin-right:0.3em;" class="btn btn-warning"> <i class="fas fa-user-edit"></i> <br> แก้ไข </button> </a>
                                <a onclick="return confirm('ยินยันการลบข้อมูล')" href={{url('/home/delete/'.$datalist->id)}}  ><button style="width:60px; margin-right:0.3em;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> <br> ลบ </button> </a>
                                
                                <?php if($datalist->regis_status == "success"): ?>
                                    <a href={{url('/home/print/'.$datalist->id)}} target="_blank" ><button style="width:60px; margin-right:0.3em;" class="btn btn-primary"><i class="fas fa-print"></i> <br> พิมพ์</button> </a>
                                <?php endif; ?>
                                <a href={{url('/home/detail/'.$datalist->id)}} target="_blank" ><button style="width:60px; margin-right:0.3em;" class="btn btn-info"><i class="fas fa-info-circle"></i><br> ข้อมูล</button> </a>
                            </div>
                        </td>   
                        <td scope="col">{{ $datalist -> regis_team}}</td>
   
                    
                       
                        <td scope="col">{{ $datalist -> input_user}}</td>
                        <td scope="col">{{ $datalist -> updated_at}}</td>
                    </tr>

                @endforeach
	
                </tbody>	
            </table>
        </div>
		<h4 style ="text-align:right; padding-right:1em;">จำนวนเงินทั้งหมด  {{number_format($allmoney)}}  บาท </h4>
    </div>


@else
<p>กรุณาลงชื่อเข้าใช้ก่อน</p>
@endauth


@endsection
