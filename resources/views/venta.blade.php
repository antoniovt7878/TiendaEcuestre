@extends('global.base')

@section('content')
<div class="container mt-5">
    <div class="card mt-4 p-4">
        <h2 class="mb-4">{{ __('venta.title') }}</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>{{ __('venta.order_number') }}</th>
                        <th>{{ __('venta.amount') }}</th>
                        <th>{{ __('venta.status') }}</th>
                        <th>{{ __('venta.address') }}</th>
                        <th>{{ __('venta.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>${{ number_format($venta->importeTotal, 2) }}</td>
                        <td>
                            {{ $venta->estado }}
                            @if(session('user_rol')=='admin')
                            <form action="{{ route('venta.modificar', $venta->id) }}">
                                <select name="estado" class="form-select">
                                    <option value="Notificado">{{ __('venta.notified') }}</option>
                                    <option value="Enviado">{{ __('venta.shipped') }}</option>
                                    <option value="Entregado">{{ __('venta.delivered') }}</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    {{ __('venta.save') }}
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>{{ $venta->direccion->calle }}, {{ $venta->direccion->ciudad }}</td>
                        <td>
                            <form action="{{ route('venta.consultar', $venta->id) }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    {{ __('venta.more_info') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-muted">{{ __('venta.no_orders') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('tienda.index') }}" class="btn btn-primary">{{ __('venta.back_to_store') }}</a>
        </div>
    </div>
</div>
@endsection
