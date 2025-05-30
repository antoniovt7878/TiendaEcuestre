@extends('global.base')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="text-center">
        <h1 class="display-4 fw-bold mb-4">{{ __('homeAdmin.welcome') }}</h1>

        <p class="lead mb-5">{{ __('homeAdmin.description') }}</p>

        <div class="d-grid gap-3 col-12 col-md-6 mx-auto">
            <a href="{{ route('producto.ver') }}" class="btn btn-primary btn-lg shadow">
                {{ __('homeAdmin.view_products') }}
            </a>
            <a href="{{ route('verVentas') }}" class="btn btn-secondary btn-lg shadow">
                {{ __('homeAdmin.view_sales') }}
            </a>
        </div>
    </div>
</div>
@endsection
