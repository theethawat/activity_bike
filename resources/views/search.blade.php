@extends('layouts.app')
@section('content')


@auth


<div class="container">
    <div class="card">
        <div class="card-body">
        <h3 class="kanit">ค้นหา</h3>
        <form action="{{url('/home/search/active')}}" method="POST">
            <label>ใส่สิ่งที่ต้องการค้นหา</label>
            <input type="text" name="search_item" placeholder="ใส่ชื่อ หรือ หมายเลขบัตรประจำตัวประชาชนอย่างใดอย่างหนึ่ง" required class="form-control col-sm-9">
            <label>เลือกวิธีการค้นหา </label>
            <select name="search_method" class="form-control col-sm-9" required>
                <option value="name">จากชื่อ</option>
                <option value="idcard">จากเลขบัตรประชาชน หรือ หนังสือเดินทาง</option>
				<option value="ref_id">จากเลขที่ใบเสร็จ(พิมพ์เฉพาะตัวเลขเท่านั้น)  </option>
            </select>
            <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        </div>
    </div>
</div>

@endauth
@endsection