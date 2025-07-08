<?php

namespace App\Http\Controllers;

use App\Models\TeachingStaff;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeachingStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachingStaff = TeachingStaff::latest()->get();
        return view('admin.teaching-staff.index', compact('teachingStaff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teaching-staff.create');
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

        $teachingStaff = TeachingStaff::create([
            'information' => $request->information,
            'details' => $request->details,
        ]);

        if ($teachingStaff) {
            Session::flash('success', 'Teaching Staff created successfully.');
            return redirect()->route('admin.teaching-staff.index');
        }

        Session::flash('error', 'Teaching Staff creation error!');
        return redirect()->route('admin.teaching-staff.create');
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
        $teachingStaff = TeachingStaff::where('id', $id)->first();
        return view('admin.teaching-staff.edit', compact('teachingStaff'));
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

        $teachingStaff = TeachingStaff::where('id', $id)->update([
            'information' => $request->information,
            'details' => $request->details,
        ]);

        if ($teachingStaff) {
            Session::flash('success', 'Teaching Staff updated successfully.');
            return redirect()->route('admin.teaching-staff.index');
        }

        Session::flash('error', 'Teaching Staff update error!');
        return redirect()->route('admin.teaching-staff.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        TeachingStaff::where('id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Teaching Staff deleted successfully.',
        ]);
    }
}
