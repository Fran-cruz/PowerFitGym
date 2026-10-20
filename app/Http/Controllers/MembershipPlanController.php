<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MembershipPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Membresias', [
            'planes' => MembershipPlan::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->map(fn (MembershipPlan $plan): array => [
                    'nombre' => $plan->name,
                    'precio' => 'L'.number_format((float) $plan->price, 0),
                    'periodo' => $plan->billing_period,
                    'badge' => $plan->badge,
                    'badgeType' => $plan->badge_type,
                    'ahorro' => $plan->savings_text,
                    'boton' => $plan->button_text,
                    'beneficios' => json_decode($plan->benefits, true) ?? [],
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
    public function show(MembershipPlan $membershipPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembershipPlan $membershipPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MembershipPlan $membershipPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipPlan $membershipPlan)
    {
        //
    }
}
