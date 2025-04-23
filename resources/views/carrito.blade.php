@extends('global.base')

@section('content')
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ number_format($producto['precio'], 2) }}</td>
                    <td>{{ $producto['cantidad'] }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $producto['id']) }}">
                            <button type="submit" class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted">No hay productos actualmente.</td>
                </tr>
                @endforelse
                <tr>
                    <td>Importe total:</td>
                    <td colspan="3">${{ number_format($importeTotal, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('tienda.index') }}" class="btn btn-primary">Volver a la tienda</a>
        <a href="{{ route('carrito.terminar') }}" class="btn btn-success">Terminar pedido</a>
    </div>
</div>      
@endsection