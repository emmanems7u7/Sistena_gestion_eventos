<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Solicitud;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventos = [
            'Fiesta de cumpleaños',
            'Boda civil',
            'Boda religiosa',
            'Fiesta de 15 años',
            'Aniversario de empresa',
            'Reunión familiar',
            'Cena de gala',
            'Evento benéfico',
            'Graduación universitaria',
            'Baby shower',
            'Despedida de soltero/a',
            'Festival cultural',
            'Evento corporativo',
            'Inauguración de local',
            'Concierto en vivo',
            'Exposición de arte',
            'Fiesta temática',
            'Noche de karaoke',
            'Picnic comunitario',
            'Brindis navideño'
        ];

        foreach ($eventos as $evento) {
            $fecha = Carbon::now()->addDays(rand(1, 60))->setTime(rand(10, 20), rand(0, 59));
            Solicitud::create([
                'titulo' => $evento,
                'descripcion' => $evento,
                'fecha' => $fecha->toDateString(),
                'hora_inicio' => $fecha->format('H:i'),
                'hora_fin' => $fecha->copy()->addHours(2)->format('H:i'),
                'ubicacion' => 'Salón ' . Str::random(5),
                'geolocalizacion' => '-16.' . rand(4900, 5100) . ',-68.' . rand(1400, 1600),
                'estado' => rand(0, 1),
                'estado_aprobacion' => rand(1, 3),
            ]);
        }
    }
}
