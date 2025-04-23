<h1>¡Gracias por tu pedido!</h1>
<p>Tu número de pedido es <strong>{{ $venta->id }}</strong></p>
<p>Importe total: <strong>${{ number_format($venta->importeTotal, 2) }}</strong></p>
<p>Estado: <strong>{{ $venta->estado }}</strong></p>
