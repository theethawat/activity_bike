@extends('layouts.app')
@section('content')


@auth


<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="kanit">รายชื่อผู้สมัครเข้าร่วมกิจกรรม </h3>
            <h5>
                <?php
                if($describe != NULL)
                {
                    echo $describe;
                }
                ?>
            </h5>
            <div class="table-responsive">
            <table class="table table-hover">
                <thead class="kanit">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">BIB</th>
                        <th scope="col">Status</th>
                        <th scope="col">-</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">ไซส์</th>
                        <th scope="col">เพศ</th>
                        <!-- <th scope="col">Birthday</th> -->
                        <th scope="col">ID/Passport</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                        <!-- <th scope="col">ที่อยู่ (Address)</th> -->
                        <!-- <th scope="col">จังหวัด</th>
                        <th scope="col">สัญชาติ</th>
                        <th scope="col">ประเทศ</th> -->
                        <th scope="col">ทีม</th>
                        <!-- <th scope="col">ผู้ติดต่อฉุกเฉิน</th>
                        <th scope="col">เบอร์โทรผู้ติดต่อฉุกเฉิน</th> -->
                        <th scope="col">รับโล่</th>
                        <th scope="col">รับเหรียญ</th>
                        <th scope="col">เงินบริจาค</th>
                        <th scope="col">แก้ไข หรือ ลบ</th>
                        <th scope="col">อัพเดทข้อมูลเมื่อ</th>
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
                        <td scope="col"><?php
                            $status = $datalist->regis_status;
                            if($status == "pending")
                                print("<span class='badge badge-danger'><h6>รอการชำระ</h6></span>");
                            if($status == "success")
                                print("<span class='badge badge-success'><h6>ชำระเงินเรียบร้อย</h6></span>");
                        ?> </td>
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
                        <!-- <td scope="col">{{ $datalist -> regis_address}}</td> -->
                        <!-- <td scope="col">{{ $datalist -> regis_province}}</td>
                        <td scope="col">{{ $datalist -> regis_nationality}}</td>
                        <td scope="col">{{ $datalist -> regis_country}}</td> -->
                        <td scope="col">{{ $datalist -> regis_team}}</td>
                        <!-- <td scope="col">{{ $datalist -> regis_contact}}</td>
                        <td scope="col">{{ $datalist -> regis_contactcall}}</td> -->
                        <td scope="col">{{ $datalist -> regis_shield}}</td>
                        <td scope="col">{{ $datalist -> regis_medal}}</td>
                        <td scope="col">{{$datalist -> regis_donation}} / {{ $datalist -> donate_value}}</td>
                        
                        <td scope="col">
                            <div class="d-flex flex-row justify-content-center">
                                <a href={{url('/home/edit/'.$datalist->id)}} ><button class="btn btn-warning"> แก้ไข </button> </a>
                                <a onclick="return confirm('ยินยันการลบข้อมูล')" href={{url('/home/delete/'.$datalist->id)}}  ><button class="btn btn-danger"> ลบ </button> </a>
                                <?php if($datalist->regis_status == "success"): ?>
                                    <a href={{url('/home/print/'.$datalist->id)}} target="_blank" ><button class="btn btn-primary">พิมพ์</button> </a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td scope="col">{{ $datalist -> updated_at}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

@else
<p>กรุณาลงชื่อเข้าใช้ก่อน</p>
@endauth


@endsection
