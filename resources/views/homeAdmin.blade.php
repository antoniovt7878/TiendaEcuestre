@extends('global.base')

@section('content')
<div>
    <div>
        <h1 class="text-center mt-5">Bienvenido al panel de administrador</h1>

        <p class="text-center">Administra tus productos y gestiona las órdenes desde aquí.</p>
        <a href="{{ route('producto.ver') }}" class="btn btn-primary">Ver Productos</a>
        <a href="{{ route('verVentas') }}" class="btn btn-secondary">Ver Ventas</a>
        
    </div>
</div>
@endsection