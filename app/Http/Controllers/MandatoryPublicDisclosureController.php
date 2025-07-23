<?php

namespace App\Http\Controllers;

use App\Models\MandatoryPublicDisclosure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

class MandatoryPublicDisclosureController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $mandatoryPublicDisclosure = MandatoryPublicDisclosure::first();
        return view('admin.mandatory-public-disclosure.edit', compact('mandatoryPublicDisclosure'));
    }

    /**
     * Update the specified resource in storage.
     * @throws JsonException
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $existingMandatoryPublicDisclosure = MandatoryPublicDisclosure::where('id', $request->mandatory_public_disclosure_id)->first();

        $newFile = null;

        if ($request->hasFile('file')) {
            if (isset($existingMandatoryPublicDisclosure->file)) {
                $oldFile = json_decode($existingMandatoryPublicDisclosure->file, true, 512, JSON_THROW_ON_ERROR);
                $filePath = str_replace('/storage/', 'public/', $oldFile);
                Storage::delete($filePath);
            }

            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $nameWithoutSpaces = strtolower(str_replace(' ', '_', pathinfo($originalName, PATHINFO_FILENAME)));
            $fileName = $nameWithoutSpaces . '_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/uploads', $fileName);
            $newFile = Storage::url($path);
        }

        $mandatoryPublicDisclosure = MandatoryPublicDisclosure::updateOrCreate(
            [
                'id' => $request->mandatory_public_disclosure_id
            ],
            [
                'file' => json_encode($newFile, JSON_THROW_ON_ERROR),
            ]
        );

        if ($mandatoryPublicDisclosure) {
            Session::flash('success', 'Mandatory Public Disclosure saved successfully.');
            return redirect()->route('admin.mandatory-public-disclosure.edit');
        }

        Session::flash('error', 'Mandatory Public Disclosure saving error!');
        return redirect()->route('admin.mandatory-public-disclosure.edit', $request->mandatory_public_disclosure_id);
    }
}
