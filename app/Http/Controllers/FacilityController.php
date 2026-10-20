<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Feature;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Instalaciones', [
            'instalaciones' => Facility::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn (Facility $facility): array => [
                    'titulo' => $facility->name,
                    'descripcion' => $facility->description,
                    'imagen' => $facility->image_url,
                ])
                ->all(),
            'caracteristicas' => Feature::query()
                ->where('section', 'facility')
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn (Feature $feature): array => [
                    'icono' => $feature->icon,
                    'titulo' => $feature->title,
                    'descripcion' => $feature->description,
                ])
                ->all(),
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
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
