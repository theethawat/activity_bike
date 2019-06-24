@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                    if($id <= 5){
                        echo "<div class='alert alert-success' role='alert'>You have Administrator Permission you can add user to the site <a href='register'> Add User </a></div>";
                    }
                   ?>

                    <div class="row justify-content-around">
                        <div class="col-sm-4" >
                                <a href="{{url('/home/register')}}">
                                    <button class="btn btn-secondary"  style="padding:1em;margin:1em;width:240px;">
                                        <h3> <i class="fas fa-user-edit"></i> <br> ลงทะเบียนรับสมัคร </h3>
                                    </button>
                                </a>

                        </div>
                        <div class="col-sm-4">
                                <a href="{{url('/home/view')}}">
                                    <button class="btn btn-secondary"  style="padding:1em;margin:1em;width:240px;">
                                        <h3> <i class="fas fa-poll-h"></i> <br> ดูสถานะผู้สมัครทั้งหมด</h3>
                                    </button>
                                </a>
                        </div>
                    </div>

                    <br>
                    <div class="row justify-content-around">
                            <div class="col-sm-3">
                                    <a href="{{url('/home/view/specific/million')}}">
                                        <button class="btn btn-primary" style="margin:1em;width:180px;height:200px;">
                                            <h4> <i class="fas fa-poll-h"></i> <br> ดูสถานะผู้สมัครสำหรับ 1,000,000 บาท</h4>
                                        </button>
                                    </a>

                            </div>
                            <div class="col-sm-3">
                                    <a href="{{url('/home/view/specific/thousand')}}">
                                        <button class="btn btn-success" style="margin:1em;width:180px;height:200px;">
                                            <h4> <i class="fas fa-poll-h"></i> <br> ดูสถานะผู้สมัครสำหรับ 5,000 บาท</h4>
                                        </button>
                                    </a>
                            </div>
                            <div class="col-sm-3">
                                    <a href="{{url('/home/view/specific/hundred')}}">
                                        <button class="btn btn-warning" style="margin:1em;width:180px;height:200px;">
                                            <h4> <i class="fas fa-poll-h"></i> <br> ดูสถานะผู้สมัครสำหรับ 500 บาท</h4>
                                        </button>
                                    </a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
