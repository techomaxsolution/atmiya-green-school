<?php

namespace App\Http\Controllers;

use App\Models\DocumentInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

class DocumentInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentInformation = DocumentInformation::latest()->get();
        return view('admin.document-information.index', compact('documentInformation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.document-information.create');
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

        $documentInformation = DocumentInformation::create([
            'description' => $request->description,
            'file' => json_encode($files, JSON_THROW_ON_ERROR),
        ]);

        if ($documentInformation) {
            Session::flash('success', 'Document Information created successfully.');
            return redirect()->route('admin.document-information.index');
        }

        Session::flash('error', 'Document Information creation error!');
        return redirect()->route('admin.document-information.create');
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
        $documentInformation = DocumentInformation::where('id', $id)->first();
        return view('admin.document-information.edit', compact('documentInformation'));
    }

    /**
     * Update the specified resource in storage.
     * @throws JsonException
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'description' => 'nullable',
            'file.*' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $existingDocumentInformation = DocumentInformation::where('id', $id)->firstOrFail();

        $newFiles = [];

        if ($request->hasFile('file')) {
            if ($existingDocumentInformation->file) {
                $oldFiles = json_decode($existingDocumentInformation->file, true, 512, JSON_THROW_ON_ERROR);
                foreach ($oldFiles as $file) {
                    $filePath = str_replace('/storage/', 'public/', $file);
                    Storage::delete($filePath);
                }
            }

            foreach ($request->file('file') as $file) {
                $originalName = $file->getClientOriginalName();
                $nameWithoutSpaces = strtolower(str_replace(' ', '_', pathinfo($originalName, PATHINFO_FILENAME)));
                $fileName = $nameWithoutSpaces . '_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/uploads', $fileName);
                $newFiles[] = Storage::url($path);
            }
        }

        $documentInformation = DocumentInformation::where('id', $id)->update([
            'description' => $request->description,
            'file' => json_encode($newFiles, JSON_THROW_ON_ERROR),
        ]);

        if ($documentInformation) {
            Session::flash('success', 'Document Information updated successfully.');
            return redirect()->route('admin.document-information.index');
        }

        Session::flash('error', 'Document Information update error!');
        return redirect()->route('admin.document-information.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     * @throws JsonException
     */
    public function destroy(string $id): JsonResponse
    {
        $documentInformation = DocumentInformation::where('id', $id)->firstOrFail();

        if ($documentInformation->file) {
            $oldFiles = json_decode($documentInformation->file, true, 512, JSON_THROW_ON_ERROR);
            foreach ($oldFiles as $file) {
                $filePath = str_replace('/storage/', 'public/', $file);
                Storage::delete($filePath);
            }
        }

        $documentInformation->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Document Information deleted successfully.',
        ]);
    }
}
