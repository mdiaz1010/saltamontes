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

        <button type="button" class="btn btn-danger pull-right" name="btnCalcularBitcoin" id="btnCalcularBitcoin">
        <span class="fa fa-bitcoin"></span> Calcular Bitcoin
        </button>
    </div>

    {!! Form::close() !!}

<script>
    $("#btnCalcularBitcoin").click(function(){
        $("#name_coin").val('Bitcoin');
        $.ajax({
            url: "https://api.coinbase.com/v2/prices/spot?currency=USD",
            success: function (data) {
            $("#dolares").val(data.data.amount);
            alert(amounts)
            },
            error: function(){
            alert("Problemas con los servicios de coinbase");
            }
        });
        $.ajax({
            url: "https://api.coinbase.com/v2/prices/spot?currency=PEN",
            success: function (data) {
            $("#soles").val(data.data.amount);
            },
            error: function(){
            alert("Problemas con los servicios de coinbase");
            }
        });


    });

</script>
@endsection