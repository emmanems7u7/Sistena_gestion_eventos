@extends('layouts.argon')

@section('content')


    <div class="card shadow-lg  card-profile-bottom">
        <div class="card-body">
            <div class="row">


                <h5 class="mb-4 border-bottom pb-2">Datos del Cliente</h5>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombre</label>
                    <p class="form-control-plaintext">{{ $cliente->nombre ?? '-' }}</p>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Apellido Paterno</label>
                    <p class="form-control-plaintext">{{ $cliente->ape_pat ?? '-' }}</p>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Apellido Materno</label>
                    <p class="form-control-plaintext">{{ $cliente->ape_mat ?? '-' }}</p>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Correo Electrónico</label>
                    <p class="form-control-plaintext">{{ $cliente->email ?? '-' }}</p>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Teléfono</label>
                    <p class="form-control-plaintext">{{ $cliente->telefono ?? '-' }}</p>
                </div>
            </div>
            <h5 class="mt-4 mb-3 border-bottom pb-2">Datos del evento</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <p id="titulo" class="form-control-plaintext">{{ $evento->titulo ?? '' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <p id="fecha" class="form-control-plaintext">{{ $evento->fecha ?? '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <p id="descripcion" class="form-control-plaintext">{{ $evento->descripcion ?? '' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="hora_inicio" class="form-label">Hora de inicio:</label>
                    <p id="hora_inicio" class="form-control-plaintext">{{ $evento->hora_inicio ?? '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="hora_fin" class="form-label">Hora de finalización:</label>
                    <p id="hora_fin" class="form-control-plaintext">{{ $evento->hora_fin ?? '' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="ubicacion" class="form-label">Ubicación:</label>
                    <p id="ubicacion" class="form-control-plaintext">{{ $evento->ubicacion ?? '' }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="geolocalizacion" class="form-label">Geolocalización:</label>
                    <p id="geolocalizacion" class="form-control-plaintext">{{ $evento->geolocalizacion ?? '' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="mapa" class="form-label">Ubicación en el mapa:</label>
                    <div id="map" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-lg card-profile-bottom">
        <div class="card-body">

            @if($tipo_servicios->isNotEmpty())
                <div class="">
                    <div class="mb-3">
                        <h6>Servicios Solicitados</h6>
                        @foreach($tipo_servicios as $servicio)
                            <div class="mb-3">
                                <label for="servicio_{{ $servicio['servicio_id'] }}"
                                    class="form-label">{{ $servicio['nombre_servicio'] }}
                                    ({{ $servicio['nombre_tipo_servicio'] }})</label>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $servicio['nombre_servicio'] }}</h5>
                                        <p class="card-text">{{ $servicio['caracteristicas_tipo_servicio'] }}</p>
                                        <p class="card-text"><strong>Precio:</strong> Bs.{{ $servicio['precio_tipo_Servicio'] }}
                                            (Por hora)</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h6>Personal En el evento</h6>
            <div class="row mt-3">
                @foreach ($personal as $rol => $usuarios)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-dark text-white py-2">
                                <h5 class="mb-0 text-white">{{ $rol }}</h5>
                                <small class="text-white-50">{{ count($usuarios) }}
                                    {{ count($usuarios) > 1 ? 'usuarios' : 'usuario' }}</small>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($usuarios as $usuario)
                                        <li class="mb-2 border-bottom pb-1">
                                            {{ $usuario['usuario_nombres'] }}
                                            {{ $usuario['usuario_app'] }} {{ $usuario['usuario_apm'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="card shadow-lg  card-profile-bottom">

        <div class="card-body text-center">
            <strong>Costo Total del Evento</strong>
            <p class="mb-2">Basado en los servicios seleccionados y la duración del evento:</p>
            <h4 class="text-success fw-bold">Bs. {{ number_format($total, 2) }}</h4>
        </div>
    </div>

    <div class="card shadow-lg  card-profile-bottom">

        <div class="card-body text-center">
            <a href="{{ route('eventos.email', ['evento' => $evento, 'cliente' => $cliente]) }}"
                class="btn btn-success w-50">Enviar notificacion Email</a>

            <a href="{{ route('eventos.recibo', $evento) }}" class="btn btn-success w-50">Generar Recibo</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const geolocalizacion = "{{ $evento->geolocalizacion ?? '' }}"; // Aquí se obtiene la geolocalización de la solicitud

            if (geolocalizacion) {
                const coords = geolocalizacion.split(',');
                const lat = parseFloat(coords[0]);
                const lng = parseFloat(coords[1]);

                // Inicializamos el mapa en el centro de la geolocalización
                const map = L.map('map').setView([lat, lng], 13); // Establecemos el centro y el zoom

                // Cargar el mapa de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                // Añadimos un marcador en la ubicación
                L.marker([lat, lng]).addTo(map);

                // Desactivar interacciones del mapa (solo lectura)
                map.dragging.disable(); // Desactivar arrastrar
                map.touchZoom.disable(); // Desactivar zoom táctil
                map.doubleClickZoom.disable(); // Desactivar zoom al hacer doble clic
                map.scrollWheelZoom.disable(); // Desactivar zoom con la rueda del ratón
                map.boxZoom.disable(); // Desactivar el zoom por caja
                map.keyboard.disable(); // Desactivar navegación con el teclado
            }
        });
    </script>
@endsection