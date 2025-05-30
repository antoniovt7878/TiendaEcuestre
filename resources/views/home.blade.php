@extends('global.base')

@section('content')

<div class="container-fluid p-0">
    <div class="position-relative text-white" style="background-image: url('/images/hero-caballo.jpg'); background-size: cover; background-position: center; height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-gradient"></div>
        <div class="position-relative z-1 d-flex flex-column justify-content-center align-items-center h-100 text-center">
            <h1 class="display-4 fw-bold">{{ __('home.welcome_title') }} Tienda Ecuestre</h1>
            <p class="lead">{{ __('home.welcome_subtitle') }}</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">{{ __('home.featured_products') }}</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($productos as $producto)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                    <p class="fw-bold text-success mb-2">${{ number_format($producto->precio, 2) }}</p>
                    <small class="text-muted mb-2">
                        {{ __('home.stock') }}: {{ $producto->stock }} | {{ __('home.brand') }}: {{ $producto->marca }}
                    </small>
                    <div class="d-flex gap-2">
                        <form action="{{ route('carrito.agregar', $producto->id) }}" class="mt-auto">
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-cart-plus me-1"></i> {{ __('home.add_to_cart') }}
                            </button>
                        </form>
                        <form action="{{ route('deseo.like', $producto->id) }}" class="mt-auto">
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-heart"></i> {{ __('home.like') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">{{ __('home.no_products') }}</div>
        </div>
        @endforelse
    </div>
</div>

@endsection
