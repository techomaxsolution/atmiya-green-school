<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalInformation = GeneralInformation::latest()->get();
        return view('admin.general-information.index', compact('generalInformation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.general-information.create');
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

        $generalInformation = GeneralInformation::create([
            'information' => $request->information,
            'details' => $request->details,
        ]);

        if ($generalInformation) {
            Session::flash('success', 'General Information created successfully.');
            return redirect()->route('admin.general-information.index');
        }

        Session::flash('error', 'General Information creation error!');
        return redirect()->route('admin.general-information.create');
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
        $generalInformation = GeneralInformation::where('id', $id)->first();
        return view('admin.general-information.edit', compact('generalInformation'));
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

        $generalInformation = GeneralInformation::where('id', $id)->update([
            'information' => $request->information,
            'details' => $request->details,
        ]);

        if ($generalInformation) {
            Session::flash('success', 'General Information updated successfully.');
            return redirect()->route('admin.general-information.index');
        }

        Session::flash('error', 'General Information update error!');
        return redirect()->route('admin.general-information.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        GeneralInformation::where('id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'General Information deleted successfully.',
        ]);
    }
}
