@extends('global.base')

@section('content')
<div class="container mt-5">
    <h1>{{ __('carrito.title') }}</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>{{ __('carrito.name') }}</th>
                    <th>{{ __('carrito.price') }}</th>
                    <th>{{ __('carrito.quantity') }}</th>
                    <th>{{ __('carrito.actions') }}</th>
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
                                {{ __('carrito.remove') }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted">{{ __('carrito.no_products') }}</td>
                </tr>
                @endforelse
                <tr>
                    <td>{{ __('carrito.total_amount') }}</td>
                    <td colspan="3">${{ number_format($importeTotal, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('tienda.index') }}" class="btn btn-primary">{{ __('carrito.back_to_store') }}</a>
        <form action="{{ route('carrito.terminar') }}" method="POST">
            @csrf
            <select name="direccion" id="direccion">
                @forelse($direcciones as $direccion)
                <option value="{{ $direccion->id }}">{{ $direccion->calle }}, {{ $direccion->ciudad }}</option>
                @empty
                <option value="">{{ __('carrito.no_addresses') }}</option>
                @endforelse
            </select>
            <a href="{{ route('direccion.ver') }}" class="btn btn-warning">{{ __('carrito.new_address') }}</a>
            <button type="submit" class="btn btn-success">{{ __('carrito.finish_order') }}</button>
        </form>
    </div>
</div>
@endsection
