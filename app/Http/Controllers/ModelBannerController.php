<?php

namespace App\Http\Controllers;

use App\Models\ModelBanner;
use Illuminate\Http\Request;

class ModelBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelBanner $modelBanner)
    {
        $data = ModelBanner::first();
        return view('admin.model_banner.index', compact('data'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'image' => [
    //                 $request->id ? 'nullable' : 'required',
    //                 'image',
    //                 'mimes:jpeg,png,jpg,gif,svg',
    //                 'max:2048'
    //             ],
    //             'status' => 'required|in:0,1'
    //         ],
    //         [
    //             'image.required' => 'Please upload an image file.',
    //             'image.image' => 'The uploaded file must be an image.',
    //             'image.mimes' => 'Only JPEG, PNG, JPG, GIF, and SVG files are allowed.',
    //             'image.max' => 'The image size must not exceed 2MB.',
    //             'status.required' => 'Please select status.',
    //             'status.in' => 'Invalid status selected.'
    //         ]
    //     );

    //     $modelBanner = ModelBanner::findOrFail('id', $request->id);
    //     // If new image uploaded
    //     if ($request->hasFile('image')) {

    //         if ($modelBanner->image && file_exists(public_path('uploads/model_banner/' . $modelBanner->image))) {
    //             unlink(public_path('uploads/model_banner/' . $modelBanner->image));
    //         }

    //         $imageName = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('uploads/model_banner'), $imageName);

    //         $modelBanner->image = $imageName;
    //     }

    //     // Update status
    //     $modelBanner->status = $request->status;

    //     $modelBanner->save();

    //     return redirect()
    //         ->route('admin.model-banner.edit', $modelBanner->id)
    //         ->with('success', 'Banner updated successfully.');
    // }
    public function update(Request $request)
    {
        $request->validate([
            'image' => [
                $request->id ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048'
            ],
            'status' => 'required|in:0,1'
        ]);

        // Update or Create
        $modelBanner = ModelBanner::updateOrCreate(
            ['id' => $request->id], // condition
            [
                'status' => $request->status
            ]
        );

        // Handle image separately
        if ($request->hasFile('image')) {

            // Delete old image if record already existed
            if ($modelBanner->wasRecentlyCreated === false &&
                $modelBanner->image &&
                file_exists(public_path('uploads/model_banner/' . $modelBanner->image))) {

                unlink(public_path('uploads/model_banner/' . $modelBanner->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/model_banner'), $imageName);

            $modelBanner->update(['image' => $imageName]);
        }

        return redirect()
            ->route('admin.model-banner.edit', $modelBanner->id)
            ->with('success', 'Banner saved successfully.');
    }


}
