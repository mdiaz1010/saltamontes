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
    <button type="button"  name="btncalcular" id="btncalcular" class="btn btn-primary mb-2"><i class="fa fa-refresh"></i> Calcular</button>
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

    <input type="hidden" name="ruta" id="ruta" value="{{ url('consultar') }}">
</div>

<script>
        $("#btncalcular").click(function(){
            var id_moneda= $("#cripto").val();
            var ruta= $("#ruta").val();
            var cantidad= $("#cantidad").val();
            $.ajax({
                url:ruta,
                data:{id_moneda:id_moneda},
                type:'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType: "json",
                success: function(data){

                    if(parseInt((data.dolares)*cantidad)<50){
                    $("#soles").val("La cantidad ingresada es menor a la permitida");
                    $("#dolares").val("La cantidad ingresada es menor a la permitida");
                    return true;
                    }
                    $("#soles").val("S/."+(Math.round(data.soles*cantidad*100)/100));
                    $("#dolares").val("$ "+(Math.round(data.dolares*cantidad*100)/100));

                }


        });
        });



</script>
@endsection