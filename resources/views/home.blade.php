@extends('global.base')

@section('content')
<div class="container mt-5">
    <div>
        <h1 class="text-center">Bienvenido a la Tienda Ecuestre</h1>
        <p class="text-center">Explora nuestros productos y realiza tus compras de manera fácil y rápida.</p>
    </div>
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
                        <form action="{{ route('carrito.agregar', $producto->id) }}">
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