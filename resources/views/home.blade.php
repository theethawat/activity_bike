@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <li><a href="{{url('/home/register')}}"> ลงทะเบียนผู้มาใช้สมัครปั่นจักรยาน  </a></li>
                    <br>
                    <li><a href="{{url('/home/view')}}">  ดูสถานะผู้สมัคร  </a></li>
                      <ul>
                            <li><a href="{{url('/home/view/specific/million')}}">  ดูสถานะผู้สมัครสำหรับ 1,000,000 บาท  </a></li>
                            <li><a href="{{url('/home/view/specific/thousand')}}">  ดูสถานะผู้สมัครสำหรับ 5,000 บาท  </a></li>
                            <li><a href="{{url('/home/view/specific/hundred')}}">  ดูสถานะผู้สมัครสำหรับ 500 บาท  </a></li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
