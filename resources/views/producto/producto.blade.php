@extends('global.base')

@section('content')
<div class="container mt-5">
    @if(session('user_rol') == 'admin')
    <div class="card p-4">
        <h2 class="mb-4">{{ __('producto.create_title') }}</h2>
        <form action="{{ route('producto.crear') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nombre">{{ __('producto.name') }}</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">{{ __('producto.description') }}</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="precio">{{ __('producto.price') }}</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
            </div>

            <div class="form-group mb-3">
                <label for="stock">{{ __('producto.stock') }}</label>
                <input type="number" name="stock" id="stock" class="form-control" step="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="marca">{{ __('producto.brand') }}</label>
                <input type="text" name="marca" id="marca" class="form-control" required>
            </div>

            <label for="categorias">{{ __('producto.categories') }}</label>
            @foreach($categorias as $categoria)
            <div>
                <input type="checkbox" name="categorias[]" id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}">
                <label for="categoria_{{ $categoria->id }}">{{ $categoria->nombre }}</label>
            </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">{{ __('producto.create_button') }}</button>
        </form>
    </div>
    @endif

    <div class="container my-5">
        <h2 class="text-center mb-4">{{ __('producto.product_list') }}</h2>
        <div class="d-flex justify-content-between mb-4">
            <form action="{{ route('producto.filtrar') }}" method="GET" class="d-flex align-items-center flex-wrap gap-2">
                <label for="categoria">{{ __('producto.filter') }}</label>
                <select name="categoria" id="categoria" class="form-select me-2">
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">{{ __('producto.filter_boton') }}</button>
                <a href="{{ route('producto.ver') }}" class="btn btn-danger">{{ __('producto.clear_filter') }}</a>
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($productos as $producto)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                        <p class="fw-bold text-success mb-2">${{ number_format($producto->precio, 2) }}</p>
                        <small class="text-muted mb-2">{{ __('producto.stock') }}: {{ $producto->stock }} | {{ __('producto.brand') }}: {{ $producto->marca }}</small>
                        <div class="d-flex gap-2">
                            <form action="{{ route('carrito.agregar', $producto->id) }}" class="mt-auto">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-cart-plus me-1"></i> {{ __('producto.add_to_cart') }}
                                </button>
                            </form>
                            <form action="{{ route('deseo.like', $producto->id) }}" class="mt-auto">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-heart"></i> {{ __('producto.like') }}
                                </button>
                            </form>
                            @if(session('user_rol') == 'admin')
                            <form action="{{ route('producto.eliminar', $producto->id) }}" method="post" class="mt-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> {{ __('producto.delete') }}
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">{{ __('producto.no_products') }}</div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection