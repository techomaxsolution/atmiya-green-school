<?php

namespace App\Http\Controllers;

use App\Models\SchoolInfrastructure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SchoolInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolInfrastructure = SchoolInfrastructure::latest()->get();
        return view('admin.school-infrastructure.index', compact('schoolInfrastructure'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school-infrastructure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'information' => 'required',
            'details' => 'required',
        ]);

        $schoolInfrastructure = SchoolInfrastructure::create([
            'information' => $request->information,
            'details' => $request->details,
        ]);

        if ($schoolInfrastructure) {
            Session::flash('success', 'School Infrastructure created successfully.');
            return redirect()->route('admin.school-infrastructure.index');
        }

        Session::flash('error', 'School Infrastructure creation error!');
        return redirect()->route('admin.school-infrastructure.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schoolInfrastructure = SchoolInfrastructure::where('id', $id)->first();
        return view('admin.school-infrastructure.edit', compact('schoolInfrastructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'information' => 'required',
            'details' => 'required',
        ]);

        $schoolInfrastructure = SchoolInfrastructure::where('id', $id)->update([
            'information' => $request->information,
            'details' => $request->details,
        ]);

        if ($schoolInfrastructure) {
            Session::flash('success', 'School Infrastructure updated successfully.');
            return redirect()->route('admin.school-infrastructure.index');
        }

        Session::flash('error', 'School Infrastructure update error!');
        return redirect()->route('admin.school-infrastructure.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        SchoolInfrastructure::where('id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'School Infrastructure deleted successfully.',
        ]);
    }
}
