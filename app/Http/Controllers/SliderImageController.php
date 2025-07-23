<?php

namespace App\Http\Controllers;

use App\Models\SliderImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JsonException;

class SliderImageController extends Controller
{
    public function bannerImagesIndex()
    {
        $bannerSliderImages = SliderImage::where('image_type', 'banner')->latest()->get();
        return view('admin.slider-images.banner-images-index', compact('bannerSliderImages'));
    }

    public function schoolImagesIndex()
    {
        $schoolSliderImages = SliderImage::where('image_type', 'school')->latest()->get();
        return view('admin.slider-images.school-images-index', compact('schoolSliderImages'));
    }

    public function bannerImageCreate()
    {
        return view('admin.slider-images.banner-images-create');
    }

    public function schoolImageCreate()
    {
        return view('admin.slider-images.school-images-create');
    }

    public function bannerImageEdit($id)
    {
        $bannerSliderImage = SliderImage::where('id', $id)->first();
        return view('admin.slider-images.banner-images-edit', compact('bannerSliderImage'));
    }

    public function schoolImageEdit($id)
    {
        $schoolSliderImage = SliderImage::where('id', $id)->first();
        return view('admin.slider-images.school-images-edit', compact('schoolSliderImage'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function sliderImageStore(Request $request): RedirectResponse
    {
        $request->validate([
            'image_type' => 'required|in:banner,school',
            'image_url' => 'required|file|mimes:jpeg,png,jpg|max:51200',
        ]);

        if ($request->post('image_id')) {
            $existingBannerSliderImage = SliderImage::where('id', $request->post('image_id'))->first();
            $filePath = str_replace('/storage/', 'public/', $existingBannerSliderImage->image_url);
            Storage::delete($filePath);
        }

        $file = $request->file('image_url');
        $originalName = $file->getClientOriginalName();
        $fileName = strtolower(str_replace(' ', '_', pathinfo($originalName, PATHINFO_FILENAME)));
        $fileName .= '_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/uploads/sliderImages', $fileName);
        $fileUrl = Storage::url($path);

        SliderImage::updateOrCreate(
            [
                'id' => $request->post('image_id'),
            ],
            [
                'image_type' => $request->post('image_type'),
                'image_url' => $fileUrl,
                'image_slogan' => $request->post('image_slogan'),
                'image_title' => $request->post('image_title'),
                'image_offer' => $request->post('image_offer'),
            ]
        );

        $returnRedirectUrl = $request->post('image_type') === 'banner' ? 'admin.slider-images.banner-images' : 'admin.slider-images.school-images';

        return redirect()->route($returnRedirectUrl)->with('success', 'Slider Image saved successfully.');
    }

    /**
     * @param $id
     * @return JsonResponse
     * @throws JsonException
     */
    public function sliderImageDestroy($id): JsonResponse
    {
        $bannerSliderImage = SliderImage::where('id', $id)->first();
        $filePath = str_replace('/storage/', 'public/', $bannerSliderImage->image_url);
        Storage::delete($filePath);
        $bannerSliderImage->delete();

        Session::flash('success', 'Slider Image deleted successfully.');

        return response()->json([
            'status' => 'success',
            'message' => 'Slider Image deleted successfully.'
        ]);
    }
}
