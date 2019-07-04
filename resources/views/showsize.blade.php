@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
        <h3 class="kanit"><i class="fas fa-tshirt"></i> จำนวนคนตามไซส์เสื้อ</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SS</th>
                    <th scope="col">S</th>
                    <th scope="col">M</th>
                    <th scope="col">L</th>
                    <th scope="col">XL</th>
                    <th scope="col">2XL</th>
                    <th scope="col">3XL</th>
                    <th scope="col">รวม</th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <td scope="col">{{$ss}}</td>
                <td scope="col">{{$s}}</td>
                <td scope="col">{{$m}}</td>
                <td scope="col">{{$l}}</td>
                <td scope="col">{{$xl}}</td>
                <td scope="col">{{$xl2}}</td>
                <td scope="col">{{$xl3}}</td>
                <th scope="col"><?php $all = $ss+$s+$m+$l+$xl+$xl2+$xl3; echo $all; ?></th>
            </tr>
        </tbody>
</table>
        </div>
    </div>
</div>
@auth
@endauth
@endsection