<?php

namespace App\Http\Controllers\Dashboard\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Gallery\GalleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class GalleryController extends Controller
{
    public function show()
    {
        $data = GalleryModel::orderBy('sort_order', 'asc')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil data galeri',
            'data' => $data,
        ]);
    }

    public function create() {}

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            // 1. Hero Video
            if ($request->has('hero_url')) {
                GalleryModel::updateOrCreate(
                    ['category' => 'hero', 'type' => 'video'],
                    ['link' => $request->hero_url]
                );
            }

            // 2. Slider Images
            // Handle new files
            if ($request->hasFile('slider_files')) {
                foreach ($request->file('slider_files') as $file) {
                    $filename = Str::uuid().'.webp';
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $encoded = $image->toWebp(60);
                    Storage::disk('public')->put('gallery/'.$filename, $encoded);

                    GalleryModel::create([
                        'category' => 'slider',
                        'type' => 'image',
                        'link' => 'gallery/'.$filename,
                        'sort_order' => 999,  // Append to end initially
                    ]);
                }
            }

            // Handle sorting
            if ($request->has('slider_order')) {
                $order = json_decode($request->slider_order);
                if (is_array($order)) {
                    foreach ($order as $index => $id) {
                        GalleryModel::where('id', $id)->update(['sort_order' => $index]);
                    }
                }
            }

            // 3. Gallery Images
            // Handle new files
            if ($request->hasFile('gallery_files')) {
                foreach ($request->file('gallery_files') as $file) {
                    $filename = Str::uuid().'.webp';
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $encoded = $image->toWebp(60);
                    Storage::disk('public')->put('gallery/'.$filename, $encoded);

                    GalleryModel::create([
                        'category' => 'gallery',
                        'type' => 'image',
                        'link' => 'gallery/'.$filename,
                        'sort_order' => 999,  // Append to end initially
                    ]);
                }
            }

            // Handle sorting
            if ($request->has('gallery_order')) {
                $order = json_decode($request->gallery_order);
                if (is_array($order)) {
                    foreach ($order as $index => $id) {
                        GalleryModel::where('id', $id)->update(['sort_order' => $index]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan perubahan',
                'data' => [],
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => 'failed',
                'message' => $th->getMessage(),
                'data' => [],
            ]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $model = GalleryModel::find($request->id);
            if ($model) {
                // Delete file from storage if it's an image
                if ($model->type === 'image' && Storage::disk('public')->exists($model->link)) {
                    Storage::disk('public')->delete($model->link);
                }
                $model->delete();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus data',
                'data' => [],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => $th->getMessage(),
                'data' => [],
            ]);
        }
    }
}
