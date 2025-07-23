<?php

namespace App\Http\Controllers;

use App\Models\AdmissionProcess;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

class AdmissionProcessController extends Controller
{
    public function edit()
    {
        $admissionProcess = AdmissionProcess::first();
        return view('admin.admission-process.edit', compact('admissionProcess'));
    }

    /**
     * @throws JsonException
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $existingAdmissionProcess = AdmissionProcess::where('id', $request->admission_process_id)->first();

        $newFile = null;

        if ($request->hasFile('file')) {
            if (isset($existingAdmissionProcess->file)) {
                $oldFile = json_decode($existingAdmissionProcess->file, true, 512, JSON_THROW_ON_ERROR);
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

        $admissionProcess = AdmissionProcess::updateOrCreate(
            [
                'id' => $request->post('admission_process_id'),
            ],
            [
                'file' => json_encode($newFile, JSON_THROW_ON_ERROR),
            ]
        );

        if ($admissionProcess) {
            Session::flash('success', 'Admission Process saved successfully.');
            return redirect()->route('admin.admission-process.edit');
        }

        Session::flash('error', 'Admission Process saving error!');
        return redirect()->route('admin.admission-process.edit', $request->post('admission_process_id'));
    }
}
