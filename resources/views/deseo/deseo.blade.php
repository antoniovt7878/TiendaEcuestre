@extends('global.base')

@section('content')
<div class="container mt-5">
    <h1>Lista de deseos</h1>
    <div>
        <h3>El producto mas deseado es:</h3>
        <div class="col">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $deseoMax->nombre }}</h5>
                    <p class="card-text text-muted">{{ $deseoMax->descripcion }}</p>
                    <p class="fw-bold text-success mb-2">${{ number_format($deseoMax->precio, 2) }}</p>
                    <small class="text-muted mb-2">Stock: {{ $deseoMax->stock }} | Marca: {{ $deseoMax->marca }}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ number_format($producto['precio'], 2) }}</td>
                    <td>
                        <form action="{{ route('deseo.like', $producto['id']) }}">
                            <button type="submit" class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted">No hay productos en la lista de deseos actualmente.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('tienda.index') }}" class="btn btn-primary">Volver a la tienda</a>
    </div>
</div>
@endsection