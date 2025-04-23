@extends('global.base')

@section('content')

< class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>
                        <!--<form action="{{ route('agregarProductoAlCarrito', $producto) }}">-->
                        <form action="{{ route('tienda.index', $producto) }}" method="GET">
                            <button type="submit" class="btn btn-sm btn-danger">
                                 Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-muted">No hay productos actualmente.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('tienda.index') }}" class="btn btn-primary">Volver a la tienda</a>
        <a href="{{ route('checkout') }}" class="btn btn-success">Terminar pedido</a>
    </div>
</div>      
@endsection