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
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"><b>ผู้สมัครทั้งหมด</b> 
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
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('home/viewfromsite')}} ">ผู้สมัครผ่านเว็บไซต์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home/viewoffline/')}} ">ผู้สมัครออฟไลน์</a>
                        </li>
                    </ul>
                    <h5>เมนูอื่น ๆ</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home/search/')}}">ระบบค้นหา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home/size')}}">จำนวนคนต่อไซส์เสื้อ</a>
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
                        echo "<div class='alert alert-secondary acenter' role='alert'>You have Administrator Permission you can add user to the site <a href='register'> Add User </a> and <a href='home/manager'> Manage User </a> </div>";
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

                    
            </div>
        </div>
    </div>
</div>
@endsection
