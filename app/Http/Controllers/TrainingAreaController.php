<?php

namespace App\Http\Controllers;

use App\Models\GroupClass;
use App\Models\TrainingArea;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TrainingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $days = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'];

        $horario = GroupClass::query()
            ->where('is_active', true)
            ->orderBy('start_time')
            ->get()
            ->groupBy('start_time')
            ->map(function ($classes, string $startTime) use ($days): array {
                $row = array_fill_keys($days, '-');
                $row['hora'] = substr($startTime, 0, 5);

                foreach ($classes as $class) {
                    $day = str_replace(['miércoles', 'sábado'], ['miercoles', 'sabado'], $class->day_of_week);

                    if (array_key_exists($day, $row)) {
                        $row[$day] = $class->name;
                    }
                }

                return $row;
            })
            ->values()
            ->all();

        return Inertia::render('Entrenamiento', [
            'areas' => TrainingArea::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn (TrainingArea $area): array => [
                    'titulo' => $area->name,
                    'descripcion' => $area->description,
                    'imagen' => $area->image_url,
                    'equipamiento' => json_decode($area->equipment, true) ?? [],
                ])
                ->all(),
            'horario' => $horario,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingArea $trainingArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingArea $trainingArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingArea $trainingArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingArea $trainingArea)
    {
        //
    }
}
