@extends('layouts.app')
@section('title','Registrar Criptomoneda')
@section('content')

    {!! Form::open(['route'=>'coins_types.store','method'=>'POST']) !!}

    <div class='form-group'>
        {!! Form::label('name_coin','Criptomoneda') !!} {!! Form::text('name_coin',null,['class'=>'form-control','placeholder'=>'Criptomoneda','required'])
        !!}
    </div>

    <div class='form-group'>
        {!! Form::label('soles','S/. Soles') !!} {!! Form::text('soles',null,['class'=>'form-control','placeholder'=>'Soles','required'])
        !!}
    </div>

    <div class='form-group'>
        {!! Form::label('dolares','$. Dólares') !!} {!! Form::text('dolares',null,['class'=>'form-control','placeholder'=>'Dólares','required'])
        !!}
    </div>


    <div class='form-group'>
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection