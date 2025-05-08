@extends('global.base')

@section('content')

<div class="container-fluid p-0">
    <div class="position-relative text-white" style="background-image: url('/images/hero-caballo.jpg'); background-size: cover; background-position: center; height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="position-relative z-1 d-flex flex-column justify-content-center align-items-center h-100 text-center">
            <h1 class="display-4 fw-bold">Bienvenido a la Tienda Ecuestre</h1>
            <p class="lead">Todo lo que necesitas para el cuidado de tu caballo y más</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Nuestros Productos</h2>
    
    @php
        $imagenes = [
            'silla inglesa' => 'silla_inglesa.jpg',
            'silla vaquera' => 'silla_vaquera.jpg',
        ];
    @endphp

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($productos as $producto)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('img/' . ($imagenes[strtolower($producto->nombre)] ?? 'default.jpg')) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                    <p class="fw-bold text-success mb-2">${{ number_format($producto->precio, 2) }}</p>
                    <small class="text-muted mb-2">Stock: {{ $producto->stock }} | Marca: {{ $producto->marca }}</small>
                    <form action="{{ route('carrito.agregar', $producto->id) }}" class="mt-auto">
                        <button type="submit" class="btn btn-warning w-100">
                            <i class="bi bi-cart-plus me-1"></i> Añadir al carrito
                        </button>
                    </form>
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

@endsection
