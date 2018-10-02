@extends('layouts.app') @section('title','Listar Criptomonedas') @section('content')


<a href="{{ route('coins_types.create') }}" class="btn btn-info">Registrar nueva Criptomoneda</a>
<hr>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Criptomoneda</th>
            <th scope="col">Valor Soles</th>
            <th scope="col">Valor Dólares</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coins_types as $key =>$coin)
        <tr>
            <td>{{$coin->id}}</td>
            <td>{{$coin->name_coin}}</td>
            <td>{{$coin->soles}}</td>
            <td>{{$coin->dolares}}</td>

            <td>
                <a href="{{ route('coins_types.edit',$coin->id) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                </a>
                <a href="{{ route('coins_types.destroy',$coin->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    {!! $coins_types->render() !!}
</div>


@endsection