@extends('global.base')

@section('content')
<div class="container mt-5">
    @if(session('user_rol')=='cliente')
    <div class="card p-4">
        <h2 class="mb-4">Crear Direccion</h2>
        <form action="{{ route('direccion.crear') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="calle">Calle</label>
                <input type="text" name="calle" id="calle" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="codigo_postal">Codigo postal</label>
                <input type="number" name="codigo_postal" id="codigo_postal" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Crear</button>
        </form>
    </div>
    @endif
    <div class="table-responsive">
        <h1>Mis Direcciones</h1>
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Calle</th>
                    <th>Ciudad</th>
                    <th>Codigo Postal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($direcciones as $direccion)
                <tr>
                    <td>{{ $direccion->calle }}</td>
                    <td>{{ $direccion->ciudad }}</td>
                    <td>{{ $direccion->codigo_postal }}</td>
                    <td>
                        <form action="{{ route('direccion.eliminar', $direccion->id) }}">
                            <button type="submit" class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-muted">No hay direcciones actualmente.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection