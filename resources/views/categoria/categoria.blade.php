@extends('global.base')

@section('content')
<div class="container mt-5">
    @if(session('user_rol') == 'admin')
    <div class="card p-4">
        <h2 class="mb-4">{{ __('categoria.create_title') }}</h2>
        <form action="{{ route('categoria.crear') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nombre">{{ __('producto.name') }}</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{ __('categoria.create_button') }}</button>
        </form>
    </div>
    <div class="container my-5">
        <h2 class="text-center mb-4">{{ __('categoria.categoria_list') }}</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($categorias as $categoria)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $categoria->nombre }}</h5>
                        <div class="d-flex gap-2">
                            <form action="{{ route('categoria.eliminar', $categoria->id) }}" method="POST" class="mt-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> {{ __('categoria.delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">{{ __('categoria.no_categories') }}</div>
            </div>
            @endforelse
        </div>
    </div>
    @else
    <div>
        <h1>{{ __('home.noDisponible') }}</h1>
    </div>
    @endif
</div>
@endsection