@extends('global.base')

@section('content')
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
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
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>
                        <!--<form action="{{ route('agregarProductoAlCarrito', $producto) }}">-->
                        <form action="{{ route('tienda.index', $producto) }}" method="GET">
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="bi bi-cart-plus"></i> Añadir
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-muted">No hay productos actualmente.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
