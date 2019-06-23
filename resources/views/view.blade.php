@extends('layouts.app')
@section('content')


@auth


<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>รายชื่อผู้สมัครเข้าร่วมปั่นจักรยาน </h3>
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
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">BIB</th>
                        <th scope="col">-</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">วัน เดือน ปี เกิด</th>
                        <th scope="col">ID Card/Passport</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">จังหวัด</th>
                        <th scope="col">สัญชาติ</th>
                        <th scope="col">ประเทศ</th>
                        <th scope="col">ทีม</th>
                        <th scope="col">ผู้ติดต่อฉุกเฉิน</th>
                        <th scope="col">เบอร์โทรผู้ติดต่อฉุกเฉิน</th>
                        <th scope="col">รับโล่</th>
                        <th scope="col">รับเหรียญ</th>
                        <th scope="col">เงินบริจาค</th>
                        <th scope="col">ไซต์เสื้อ</th>
                        <th scope="col">แก้ไข หรือ ลบ</th>
                        <th scope="col">กรอกข้อมูลเมื่อ</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $countMillion = 0;
                    $countThousand = 0;
                    $countHundred = 0;
                ?>

                @foreach ($data as $datalist)

                     <tr>
                        <td scope="col">{{ $datalist -> id}}</td>
                        <td scope="col">
                       @php
                        if ($datalist -> regis_donation == "1000000") {
                             $countMillion++;
                             printf("SC%04d",$countMillion);
                        }
                         if ($datalist -> regis_donation == "5000") {
                            $countThousand++;
                            printf("VC%04d",$countThousand);
                        }
                         if ($datalist -> regis_donation == "500") {
                            $countHundred++;
                            printf("GC%04d",$countHundred);
                        }
                        @endphp
                        </td>
                        <td scope="col">{{ $datalist -> regis_prefix}}</td>
                        <td scope="col">{{ $datalist -> regis_name}}</td>
                        <td scope="col">{{ $datalist -> regis_surname}}</td>
                        <td scope="col">{{ $datalist -> regis_sex}}</td>
                        <td scope="col">{{ $datalist -> regis_date}}</td>
                        <td scope="col">{{ $datalist -> regis_peopleid}}</td>
                        <td scope="col">{{ $datalist -> regis_call}}</td>
                        <td scope="col">{{ $datalist -> regis_address}}</td>
                        <td scope="col">{{ $datalist -> regis_province}}</td>
                        <td scope="col">{{ $datalist -> regis_nationality}}</td>
                        <td scope="col">{{ $datalist -> regis_country}}</td>
                        <td scope="col">{{ $datalist -> regis_team}}</td>
                        <td scope="col">{{ $datalist -> regis_contact}}</td>
                        <td scope="col">{{ $datalist -> regis_contactcall}}</td>
                        <td scope="col">{{ $datalist -> regis_shield}}</td>
                        <td scope="col">{{ $datalist -> regis_medal}}</td>
                        <td scope="col">{{ $datalist -> regis_donation}}</td>
                        <td scope="col">{{ $datalist -> regis_size}}</td>
                        <td scope="col">
                            <div class="d-flex flex-row justify-content-center">
                            <a href={{url('/home/edit/'.$datalist->id)}} ><button class="btn btn-warning"> แก้ไข </button> </a>
                            <a href={{url('/home/delete/'.$datalist->id)}}><button class="btn btn-danger"> ลบ </button> </a>
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
