<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Inicio', [
            'caracteristicas' => $this->featuresFor('home'),
        ]);
    }

    public function about(): Response
    {
        return Inertia::render('Nosotros', [
            'valores' => $this->featuresFor('about'),
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
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        //
    }

    private function featuresFor(string $section): array
    {
        return Feature::query()
            ->where('section', $section)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Feature $feature): array => [
                'icono' => $feature->icon,
                'titulo' => $feature->title,
                'descripcion' => $feature->description,
            ])
            ->all();
    }
}
