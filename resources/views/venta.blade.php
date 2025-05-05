@extends('global.base')

@section('content')
<div class="container mt-5">
    <div class="card mt-4 p-4">
        <h2 class="mb-4">Pedidos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Numero de pedido</th>
                        <th>Importe</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>${{ number_format($venta->importeTotal, 2) }}</td>
                        <td>{{ $venta->estado }}
                            @if(session('user_rol')=='admin')
                            <form action="{{ route('venta.modificar', $venta->id) }}">
                                <select name="estado" class="form-select">
                                    <option value="Notificado">Notifiado</option>
                                    <option value="Enviado">Enviado</option>
                                    <option value="Entregado">Entregado</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Guardar
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('venta.consultar', $venta->id) }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Mas informacion
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-muted">No hay pedidos actualmente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('tienda.index') }}" class="btn btn-primary">Volver a la tienda</a>
        </div>
    </div>
</div>
@endsection