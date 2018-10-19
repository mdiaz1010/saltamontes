@extends('layouts.app') @section('title','Editar Usuario') @section('content')
{!! Form::open(['route'=>['payment.update',$users],'method'=>'PUT'])!!}


<div class='form-group'>
    {!! Form::label('name','Nombre') !!} {!! Form::hidden('id',$users->id,['class'=>'form-control','placeholder'=>'Nombre Completo','required'])
    !!} {!! Form::text('name',$users->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('email','Correo electronico') !!} {!! Form::text('email',$users->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required'])
    !!}
</div>

<div class='form-group'>
    <label>Contraseña</label>
    <input type="password" class="form-control" name="password" id="password" value="{{$users->password}}">
</div>

<div class='form-group'>
    <label>Repetir contraseña</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{$users->password}}">
</div>
<div class='form-group'>
    {!! Form::label('wallet','Wallet') !!} {!! Form::hidden('wallet',$users->wallet,['class'=>'form-control','placeholder'=>'Wallet','required'])
    !!} {!! Form::text('wallet',$users->wallet,['class'=>'form-control','placeholder'=>'Wallet','required']) !!}
</div>


<div class='form-group'>
    {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!} @endsection