@extends('layouts.app') @section('title','Comprar') @section('content')
<form name="form-pago" id="form-pago">
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
    <!--
    <div class='form-group'>
        <button type="button"  name="btncalcular" id="btncalcular" class="btn btn-primary mb-2"><i class="fa fa-refresh"></i> Calcular</button>
    </div>-->
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
    <div class='form-group text-right'>
        <button  type="button"  name="btncomprar" id="btncomprar" class="btn btn-danger  float-right"><i class="fa fa-dollar"></i> Comprar</button>
    </div>
</div>
<b><p id="respuesta"></p></b>
<div class='form-group' id="pasarela-pago" style="display: none;">
        <div class='form-group '>
        <div class='form-group'>
        {!! Form::label('cantidad','Ingresar wallet:') !!}
            <input type='text' class="form-control" name="wallet" placeholder="Wallet" id='wallet'>
        </div>
        <a  name="btnpaypal" href="{{ route('payment.paypal')}}" id="btnpaypal" class="btn btn-primary btn-lg btn-block"><i class="fa fa-paypal"></i> Paga con PayPal</a>
        <a  name="btnculqi"  id="btnculqi" class="btn btn-primary btn-lg btn-block"><i class="fa fa-dollar"></i> Paga con Culqi</a>
    </div>
</div>
</form>
<script>

        $("#cantidad").keyup(function(){
            $("#pasarela-pago").hide();
            var id_moneda= $("#cripto").val();
            var ruta= $("#ruta").val();
            var cantidad= $("#cantidad").val();

            if(cantidad==''){
                $("#soles").val("La cantidad ingresada es menor a la permitida");
                $("#dolares").val("La cantidad ingresada es menor a la permitida");
                $("#btncomprar").attr("disabled", true);return true;
            }
            $("#btncomprar").removeAttr("disabled");
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
                    $("#btncomprar").attr("disabled", true);
                    return true;
                    }
                    $("#soles").val("S/."+(Math.round(data.soles*cantidad*100)/100));
                    $("#dolares").val("$ "+(Math.round(data.dolares*cantidad*100)/100));

                    if(parseInt(Math.round(data.soles*cantidad*100)/100) == 0 || parseInt(Math.round(data.dolares*cantidad*100)/100)==0 || parseInt(Math.round(data.soles*cantidad*100)/100) == '' || parseInt(Math.round(data.dolares*cantidad*100)/100)==''){

                        $("#btncomprar").attr("disabled", true);
                        return true;

                    }
                }


        });
        });
        $("#btncalcular").click(function(){
            $("#pasarela-pago").hide();
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

                    if(parseInt(Math.round(data.soles*cantidad*100)/100) == 0 || parseInt(Math.round(data.dolares*cantidad*100)/100)==0 || parseInt(Math.round(data.soles*cantidad*100)/100) == '' || parseInt(Math.round(data.dolares*cantidad*100)/100)==''){

                        $("#btncomprar").attr("disabled", true);
                        return true;

                    }
                }


        });
        });

        $("#btncomprar").click(function(){


            $("#pasarela-pago").show();
        });


</script>
@endsection