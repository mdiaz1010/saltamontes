@extends('layouts.app') @section('title','Editar Criptomoneda') @section('content')
{!! Form::open(['route'=>['coins_types.update',$coins],'method'=>'PUT'])!!}




<div class='form-group'>
    {!! Form::label('id','id') !!} {!! Form::hidden('id',$coins->id,['class'=>'form-control','placeholder'=>'Nombre Completo','required'])!!}
    {!! Form::label('name_coin','Criptomoneda') !!} {!! Form::text('name_coin',$coins->name_coin,['class'=>'form-control','placeholder'=>'Criptomoneda','required'])
    !!}
</div>

<div class='form-group'>
    {!! Form::label('soles','S/. Soles') !!} {!! Form::text('soles',$coins->soles,['class'=>'form-control','placeholder'=>'Soles','required'])
    !!}
</div>

<div class='form-group'>
    {!! Form::label('dolares','$. Dólares') !!} {!! Form::text('dolares',$coins->dolares,['class'=>'form-control','placeholder'=>'Dólares','required'])
    !!}
</div>

<div class='form-group'>
    {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!} @endsection