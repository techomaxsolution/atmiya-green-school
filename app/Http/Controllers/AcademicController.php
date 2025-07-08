<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academics = Academic::latest()->get();
        return view('admin.academics.index', compact('academics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academics.create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws JsonException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'files.*' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $files = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $nameWithoutSpaces = strtolower(str_replace(' ', '_', pathinfo($originalName, PATHINFO_FILENAME)));
                $fileName = $nameWithoutSpaces . '_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/uploads', $fileName);
                $files[] = Storage::url($path);
            }
        }

        $academics = Academic::create([
            'description' => $request->description,
            'files' => json_encode($files, JSON_THROW_ON_ERROR),
        ]);

        if ($academics) {
            Session::flash('success', 'Academic created successfully.');
            return redirect()->route('admin.academics.index');
        }

        Session::flash('error', 'Academic creation error!');
        return redirect()->route('admin.academics.create');
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
        $academic = Academic::where('id', $id)->first();
        return view('admin.academics.edit', compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     * @throws JsonException
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'description' => 'nullable',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $existingAcademic = Academic::where('id', $id)->firstOrFail();

        $newFiles = [];

        if ($request->hasFile('files')) {
            if ($existingAcademic->files) {
                $oldFiles = json_decode($existingAcademic->files, true, 512, JSON_THROW_ON_ERROR);
                foreach ($oldFiles as $file) {
                    $filePath = str_replace('/storage/', 'public/', $file);
                    Storage::delete($filePath);
                }
            }

            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $nameWithoutSpaces = strtolower(str_replace(' ', '_', pathinfo($originalName, PATHINFO_FILENAME)));
                $fileName = $nameWithoutSpaces . '_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/uploads', $fileName);
                $newFiles[] = Storage::url($path);
            }
        }

        $academics = Academic::where('id', $id)->update([
            'description' => $request->description,
            'files' => json_encode($newFiles, JSON_THROW_ON_ERROR),
        ]);

        if ($academics) {
            Session::flash('success', 'Academic updated successfully.');
            return redirect()->route('admin.academics.index');
        }

        Session::flash('error', 'Academic update error!');
        return redirect()->route('admin.academics.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     * @throws JsonException
     */
    public function destroy(string $id): JsonResponse
    {
        $academics = Academic::where('id', $id)->firstOrFail();

        if ($academics->files) {
            $oldFiles = json_decode($academics->files, true, 512, JSON_THROW_ON_ERROR);
            foreach ($oldFiles as $file) {
                $filePath = str_replace('/storage/', 'public/', $file);
                Storage::delete($filePath);
            }
        }

        $academics->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Academic deleted successfully.',
        ]);
    }
}
