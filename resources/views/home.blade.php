@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Status</div>
                <div class="card-body">
                    <h5>รายชื่อ และ จำนวนผู้สมัคร</h5>
                    <div class="list-group list-group-flush">
                        <a href="{{url('/home/view')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"><b>ผู้สมัครทั้งหมด</b> 
                            <span class="badge badge-primary badge-pill">{{$all_number}} </span>
                        </a>
                        <a href="{{url('/home/view/specific/hundred')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">ประเภท 500 บาท
                            <span class="badge badge-primary badge-pill">{{$hundred_number}}</span>
                        </a>
                        <a href="{{url('/home/view/specific/thousand')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">ประเภท 5,000 บาท
                            <span class="badge badge-primary badge-pill">{{$thousand_number}}</span>
                        </a>
                        <a href="{{url('/home/view/specific/million')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">ประเภท 1,000,000 บาท
                            <span class="badge badge-primary badge-pill">{{$million_number}}</span>
                        </a>
                        <a href="{{url('/home/pending/')}} " class="list-group-item list-group-item-action text-danger d-flex justify-content-between align-items-center"><b>ผู้ที่ยังไม่ชำระเงิน</b>
                            <span class="badge badge-danger badge-pill">{{$pending_number}} </span>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                <h5>ประเภทผู้สมัคร</h5>
                <div class="list-group list-group-flush">
                        <a href="{{url('home/viewfromsite')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"> ผู้สมัครผ่านทาง ThaiMTB.com
                            <span class="badge badge-primary badge-pill">{{$online_number}} </span>
                        </a>
                        <a href="{{url('/home/viewoffline/')}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"> ผู้สมัครผ่านระบบภายใน
                            <span class="badge badge-primary badge-pill">{{$offline_number}}</span>
                        </a>
                        
                    </div>
                    <br>
                    <h5>เมนูอื่น ๆ</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home/search/')}}">ระบบค้นหา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home/size')}}">จำนวนคนต่อไซส์เสื้อ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home/printinfo')}}">พิมพ์หน้าข้อมูล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAN__hPRVCdUQVQ4NDNKRkdFSjBGWUUwM0g1WUVaWksyRS4u">แจ้งปัญหาเว็บไซต์</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <?php
                    $id = Auth::id();
                    if($id <= 8){
                        echo "<div class='alert alert-light acenter' role='alert'>You have Administrator Permission you can add user to the site <a href='register'> Add User </a> and <a href='home/manager'> Manage User </a> </div>";
                    }
                   ?>
                   
                    <div class="row justify-content-around">
                        <div class="col-sm-6" >
                                <a href="{{url('/home/register')}}" style="text-decoration:none;">
                                    <button class="btn btn-warning kanit piccenter"  style="padding:1em;width:250px;height:200px;">
                                       <h1><i class="fas fa-user-edit"></i> </h1>   <h3>ลงทะเบียนรับสมัคร </h3>
                                    </button>
                                </a>

                        </div>
                        <div class="col-sm-6">
                                <a href="{{url('/home/view')}}" style="text-decoration:none;">
                                    <button class="btn btn-success kanit piccenter"  style="padding:1em;width:250px;height:200px;">
                                       <h1><i class="fas fa-poll-h"></i></h1>  <h3>  ดูสถานะผู้สมัครทั้งหมด</h3>
                                    </button>
                                </a>
                        </div>
                    </div>
                    <br>
                    <h4>สถานะของผู้สมัคร</h4><hr>
                    <ul class="list-group list-group-horizontal-xl acenter">
                        <li class="list-group-item active">ประเภท <h4>ทั่วไป</h4></li>
                        <li class="list-group-item">สมัคร <h4>{{$hundred_number}}</h4></li>
                        <li class="list-group-item">ร่วมปั่น <h4>{{$normal_join_count}}</h4></li>
                        <li class="list-group-item">เว็บไซต์ <h4>{{$hundred_number - $normal_offline}}</h4></li>
                        <li class="list-group-item"> ออฟไลน์ <h4>{{$normal_offline}}</h4></li>
                        <li class="list-group-item"> รับเสื้อแล้ว <h4>{{$normal_cloth_recieve}}</h4></li>
                        <li class="list-group-item"> ยังไม่รับเสื้อ <h4>{{$hundred_number - $normal_cloth_recieve}}</h4></li>
                        
                    </ul>
                    <br>
                    <ul class="list-group list-group-horizontal-xl acenter">
                        <li class="list-group-item active">ประเภท <h4>VIP</h4></li>
                        <li class="list-group-item">สมัคร <h4>{{$thousand_number + $million_number}}</h4></li>
                        <li class="list-group-item">ร่วมปั่น <h4>{{$vip_join_count}}</h4></li>
                        <li class="list-group-item">เว็บไซต์ <h4>{{$vip_online}}</h4></li>
                        <li class="list-group-item"> ออฟไลน์ <h4>{{$vip_offline}}</h4></li>
                        <li class="list-group-item"> รับเสื้อแล้ว <h4>{{$vip_cloth_recieve}}</h4></li>
                        <li class="list-group-item"> ยังไม่รับเสื้อ <h4>{{$thousand_number + $million_number - $vip_cloth_recieve}}</h4></li>
                        
                    </ul>
                    <br>
                    <h4>จำนวนคนแต่ละไซส์เสื้อ</h4><hr>
                    <ul class="list-group list-group-horizontal-xl acenter">
                        
                        <li class="list-group-item ">SS <h4>{{$size[0]}} </h4></li>
                        <li class="list-group-item"> S <h4>{{$size[1]}}</h4></li>
                        <li class="list-group-item">M <h4>{{$size[2]}}</h4></li>
                        <li class="list-group-item">L  <h4>{{$size[3]}}</h4></li>
                        <li class="list-group-item"> XL  <h4>{{$size[4]}}</h4></li>
                        <li class="list-group-item"> 2XL <h4>{{$size[5]}}</h4></li>
                        <li class="list-group-item"> 3XL <h4>{{$size[6]}}</h4></li>
                        <li class="list-group-item "> รวม <h4>{{$size[0]+$size[1]+$size[2]+$size[3]+$size[4]+$size[5]+$size[6]}}</h4></li>
                       
                    </ul>
                    <hr>
                    <p>ข้อมูลจากในเว็บไซต์อัพเดทล่าสุดเมื่อวันที่ 6 กรกฏาคม 2562</p>
            </div>
        </div>
    </div>
</div>
@endsection
