@extends('global.base')

@section('content')
<div>
    <div>
        <h1 class="text-center mt-5">{{ __('homeAdmin.welcome') }}</h1>

        <p class="text-center">{{ __('homeAdmin.description') }}</p>
        <a href="{{ route('producto.ver') }}" class="btn btn-primary">{{ __('homeAdmin.view_products') }}</a>
        <a href="{{ route('verVentas') }}" class="btn btn-secondary">{{ __('homeAdmin.view_sales') }}</a>
    </div>
</div>
@endsection
