@extends('layouts.app')
@section('content')


@auth
<?php
 $user = Auth::user()->security;
 if($user == "Admin"){
     $permission = true;
 }
else{
    $permission = false;
}
?>

<div class="container">
    <div class="card col-md-10">
        <div class="card-body">

        <?php if($permission == true): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">User since</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $datalist): ?>
                    <tr> 
                        <th scope="row">{{$datalist->id}}</th>
                        <td>{{$datalist->name}}</td>
                        <td>{{$datalist->email}}</td>
                        <td>{{$datalist->created_at}} </td>  
                        <td>{{$datalist->security}}</td> 
                    </tr> 
                    <?php endforeach;?>
                </tbody>
            </table>
        <?php  endif; ?>

        </div>
    </div>
</div>
@endauth
@endsection