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
            if ($request->has('hero_url')) {
                GalleryModel::updateOrCreate(
                    ['category' => 'youtube', 'type' => 'video'],
                    ['link' => $request->hero_url]
                );
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan link video',
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

    public function upload(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = Str::uuid().'.webp';
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $encoded = $image->toWebp(60);
                Storage::disk('public')->put('gallery/'.$filename, $encoded);

                $model = GalleryModel::create([
                    'category' => $request->category,
                    'type' => 'image',
                    'link' => 'gallery/'.$filename,
                    'sort_order' => 999,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil upload gambar',
                    'data' => $model,
                ]);
            }

            return response()->json(['status' => 'failed', 'message' => 'File tidak ditemukan']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => $th->getMessage(),
                'data' => [],
            ]);
        }
    }

    public function sort(Request $request)
    {
        try {
            $order = $request->order;
            if (is_array($order)) {
                foreach ($order as $index => $id) {
                    GalleryModel::where('id', $id)->update(['sort_order' => $index]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengurutkan',
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

    public function delete(Request $request)
    {
        try {
            $model = GalleryModel::find($request->id);
            if ($model) {
                if ($model->type === 'image' && Storage::disk('public')->exists($model->link)) {
                    Storage::disk('public')->delete($model->link);
                }
                $model->delete();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus gambar',
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
