<!doctype html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{ asset('plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Pedido Solcitado</title>
</head>
<body>
<div class="col-lg-12">
    <div class="col-lg-12">
        <p>Buen Dia</p>
        <p>Por favor proyectar el siguiente pedido del cliente <b></b>, asi:</p>
    </div>

    <div class="col-lg-8">
        <table class="table" border="1">
            <thead>
            <tr>
                <th>Genero</th>
                <th>Variedad</th>
                <th>Cantidad Solicitada</th>
                <th>Tipo Entrega</th>
                <th>Semana Entrega</th>
            </tr>
            </thead>
            <tbody>
           {{-- @foreach($detalles as $consultas)
                <tr>
                    <td> {{ $consultas->Variedad }}</td>
                    <td> {{ $consultas->TEntrega }}</td>
                    <td> {{ $consultas->TEntrega }}</td>
                    <td> {{ $consultas->TEntrega }}</td>
                    <td> {{ $consultas->TEntrega }}</td>
                </tr>
            @endforeach--}}
            </tbody>
        </table>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <label>Observaciones</label>
            <div>
                {{--<p> {{ $createCabeza->Observaciones }}</p>--}}
            </div>
        </div>
    </div>

    <div class="col-lg-12" style="margin-top: 20px">
        <div class="col-lg-4">

            <p>Quedo Atenta a Cualquier Inquietud o sugerencia</p>

            <ul class="list-unstyled">
                <li><label>Diana Gaviria</label></li>
                <li>Assistant to General Manager</li>
                <li>Darwin Colombia SAS</li>
                <li>M: +57 320 4478345</li>
                <li>P: +57 489 9777 Ext: 115</li>
                <li>E: dgaviria@darwinperennials.com</li>
                <li><img src="{{ asset('img/logodarwin(tc).png') }}" height="50" width="225"></li>
                <li>A division of Ball Horticultural Co.</li>
            </ul>
        </div>
    </div>

</div>
</body>
</html>
