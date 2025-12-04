<?php

namespace App\Http\Controllers\Dashboard\Facility;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Facility\FacilityModel;
use App\Models\Dashboard\Facility\FacilitySpecificationModel;
use App\Models\Dashboard\Facility\FacilityThumbnailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FacilityController extends Controller
{
    public function show(Request $request)
    {
        $model = FacilityModel::when(! empty($request->category), function ($q) use ($request) {
            $q->where('category', $request->category);
        })
            ->when(! empty($request->specs), function ($q) use ($request) {
                $specs = $request->specs;
                $q->whereHas('specification', function ($query) use ($specs) {
                    $query->whereIn('value_md', $specs);
                });
                if (count($specs) > 1) {
                    // AND: harus match semua
                    $q->withCount(['specification as match_count' => function ($query) use ($specs) {
                        $query->whereIn('value_md', $specs);
                    }])->having('match_count', '=', count($specs));
                }
            })->with(['thumbnails' => function ($q) {
                $q->orderBy('sort_order', 'asc');
            }, 'specification'])->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil fasilitas',
            'data' => $model,
        ]);
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            $model = new FacilityModel();
            $model->fill($request->except('spesification', 'files'));
            $model->save();

            if (count(json_decode($request->spesification)) > 0) {
                FacilitySpecificationModel::where('facility_id', $model->id)->delete();
                foreach (json_decode($request->spesification) as $val) {
                    $spec = new FacilitySpecificationModel();
                    $spec->facility_id = $model->id;
                    $spec->icon = $val->icon;
                    $spec->value = $val->value;
                    $spec->value_md = $val->value;
                    $spec->save();
                }
            }

            if (count($request->file('files')) > 0) {
                FacilityThumbnailModel::where('facility_id', $model->id)->delete();
                foreach ($request->file('files') as $file) {
                    $filename = Str::uuid() . '.webp';
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $encoded = $image->toWebp(60);
                    Storage::disk('public')->put('fasility/' . $filename, $encoded);
                    $spec = new FacilityThumbnailModel();
                    $spec->facility_id = $model->id;
                    $spec->path = 'fasility/' . $filename;
                    $spec->save();
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil membuat fasilitas',
                'data' => $model,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => 'failed',
                'message' => $th,
                'data' => [],
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $model = FacilityModel::find($request->id);
            if (! $model) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Fasilitas tidak ditemukan',
                    'data' => [],
                ]);
            }

            $model->fill($request->except('spesification', 'files', 'id'));
            $model->save();

            if ($request->has('spesification') && count(json_decode($request->spesification)) > 0) {
                FacilitySpecificationModel::where('facility_id', $model->id)->delete();
                foreach (json_decode($request->spesification) as $val) {
                    $spec = new FacilitySpecificationModel();
                    $spec->facility_id = $model->id;
                    $spec->icon = $val->icon;
                    $spec->value = $val->value;
                    $spec->value_md = $val->value;
                    $spec->save();
                }
            }

            if ($request->hasFile('files') && count($request->file('files')) > 0) {
                foreach ($request->file('files') as $file) {
                    $filename = Str::uuid() . '.webp';
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
                    $encoded = $image->toWebp(60);
                    Storage::disk('public')->put('fasility/' . $filename, $encoded);
                    $spec = new FacilityThumbnailModel();
                    $spec->facility_id = $model->id;
                    $spec->path = 'fasility/' . $filename;
                    $spec->save();
                }
            }

            if ($request->has('thumbnail_order')) {
                $order = json_decode($request->thumbnail_order);
                if (is_array($order)) {
                    foreach ($order as $index => $thumbnailId) {
                        FacilityThumbnailModel::where('id', $thumbnailId)->update(['sort_order' => $index]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengubah fasilitas',
                'data' => $model,
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
        $model = FacilityModel::find($request->id);
        $model->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus fasilitas',
            'data' => $model,
        ]);
    }
}
