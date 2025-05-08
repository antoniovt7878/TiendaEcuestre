@extends('global.base')

@section('content')
<div class="container mt-5">
    @if(session('user_rol')=='admin')
    <div class="card p-4">
        <h2 class="mb-4">Crear Producto</h2>
        <form action="{{ route('producto.crear') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
            </div>

            <div class="form-group mb-3">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" step="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Crear</button>
        </form>
    </div>
    @endif
    <div class="container my-5">
        <h2 class="text-center mb-4">Productos</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($productos as $producto)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                        <p class="fw-bold text-success mb-2">${{ number_format($producto->precio, 2) }}</p>
                        <small class="text-muted mb-2">Stock: {{ $producto->stock }} | Marca: {{ $producto->marca }}</small>
                        <div class="d-flex gap-2">
                            <form action="{{ route('carrito.agregar', $producto->id) }}" class="mt-auto">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-cart-plus me-1"></i> Añadir al carrito
                                </button>
                            </form>
                            <form action="{{ route('producto.like', $producto->id) }}" class="mt-auto">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-heart"></i> Me gusta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">No hay productos disponibles en este momento.</div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection