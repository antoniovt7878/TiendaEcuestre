@extends('global.base')

@section('content')
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nombre del producto</th>
                    <th>Importe</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ number_format($producto['precioParcial'], 2) }}</td>
                    <td>{{ $producto['cantidad'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('verVentas') }}" class="btn btn-primary">Volver a los pedidos</a>
    </div>
</div>
@endsection