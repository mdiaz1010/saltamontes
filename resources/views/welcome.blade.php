@extends('layouts.app') @section('title','Comprar') @section('content')

<div class='form-group'>
    {!! Form::label('type','Tipo:') !!}
    <div class='form-group'>
        <select name="cripto" id="cripto" class="form-control">
                <option selected disabled="true" value="">Seleccione una criptomoneda</option>
            @foreach($cripto as $key =>$value)
                <option value="{{ $value->id }}">{{$value->name_coin}}</option>
            @endforeach
        </select>
    </div>
    <div class='form-group'>
    {!! Form::label('cantidad','Ingresar cantidad a comprar:') !!}
        <input type='text' class="form-control" name="cantidad" id='cantidad'>
    </div>
    <div class='form-group'>
    <button type="button" onclick="btncalcular()" name="btncalcular" id="btncalcular" class="btn btn-primary mb-2"><i class="fa fa-refresh"></i> Calcular</button>
    </div>
    <div id="actualizar">
        <div class='form-group'>
        {!! Form::label('soles','Depositar en soles:') !!}
            <input type='text' class="form-control" name="soles" id='soles' readonly>
        </div>
        <div class='form-group'>
        {!! Form::label('dolares','Depositar dólares:') !!}
            <input type='text' class="form-control" name="dolares" id='dolares' readonly>
        </div>
    </div>
    <input type="text" name="dolarbd" id="dolarbd">
    <input type="text" name="solesbd" id="solesbd">
    <input type="text" name="ruta" id="ruta" value="{{ url('consultar') }}">
</div>

<script>
        $("#cripto").change(function(){
            var id_moneda= $(this).val();
            var ruta= $("#ruta").val();
            $.ajax({
                url:ruta,
                data:{id_moneda:id_moneda},
                type:'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: "json",
                success: function(data){
                    $("#solesbd").val(data.soles);
                    $("#dolarbd").val(data.dolares);

                }


        });
        });
        $("#btncalcular").click(function(){
            var soles= $("#solesbd"+$(this).val());
            alert(soles); return true;
        });


</script>
@endsection