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
    <div class="card mt-4 p-4">
        <h2 class="mb-4">Productos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Marca</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                    @if(session('user_rol')=='admin')
                    <tr>
                        <form action="{{ route('producto.guardar', $producto->id) }}" method="POST">
                            @csrf
                            <td>
                                <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="descripcion" value="{{ $producto->descripcion }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="number" step="1" name="stock" value="{{ $producto->stock }}" class="form-control" required>
                            </td>
                            <td>
                                <input type="text" name="marca" value="{{ $producto->marca }}" class="form-control" required>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">Guardar</button>
                            </td>
                        </form>

                        <td>
                            <form action="{{ route('producto.eliminar', $producto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @else
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
                    @endif
                    @empty
                    <tr>
                        <td colspan="6" class="text-muted">No hay productos actualmente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection