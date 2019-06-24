@extends('layouts.app')
@section('content')


@auth


<div class="container">
    <div class="card">
        <div class="card-body">
        <h3 class="kanit">ข้อมูลการสมัครร่วมกิจกรรม </h3>
        <hr>
        <h6><span class="kanit">เลขที่บิบการสมัคร</span> </h6>
        <h3>
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
        </h3>
        <h5>{{$data->regis_prefix}}{{$data->regis_name}}  {{$data->regis_surname}} </h5>
        <li>ที่อยู่ - {{$data->regis_address}} จังหวัด{{$data->regis_province}} ประเทศ {{$data->regis_country}} (สัญชาติ{{$data->regis_nationality}})</li>
        <li>วัน/เดือน/ปีเกิด -
            <?php
                $birthday = date_create($data -> regis_date);
                echo date_format($birthday,"d/m/Y");
            ?>
        </li>
        <li>เลขประจำตัวประชาชน หรือ หมายเลขหนังสือเดินทาง - {{$data->regis_peopleid}} </li>
        <li>หมายเลขโทรศัพท์ - {{$data->regis_call}} </li>
        <li>Email - {{$data->regis_email}} </li>
        <hr>
        <li>ทีม - {{$data->regis_team}} </li>
        <li>ชื่อผู้ติดต่อยามฉุกเฉิน - {{$data->regis_contact}} </li>
        <li>หมายเลขโทรศัพท์ผู้ติดต่อฉุกเฉิน - {{$data->regis_contactcall}} </li>
        <hr>
        <li>รูปแบบการสมัคร/การบริจาค - {{$data->regis_donation}} บาท </li>
        <li>จำนวนเงินที่บริจาคทั้งหมด - {{$data->donate_value }} บาท </li>
        <li>ไซส์เสื้อ - {{$data->regis_size }}  </li>
        <li> สถานะการชำระเงิน - {{$data->regis_status }}  </li>
        <hr>
        <li> สมัครเมื่อ - {{$data->created_at }}  </li>
        <li> ข้อมูลอัพเดทล่าสุดเมื่อ - {{$data->updated_at }}  </li>
        <li> อัพเดทข้อมูลล่าสุดโดย - {{$data->input_user }}  </li>
        </div>
    </div>
</div>

@endauth
@endsection