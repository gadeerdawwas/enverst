<?php

// ======================================
// WorkController - using Cloudinary PHP SDK
// for image storage instead of local
// ======================================

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cloudinary\Cloudinary;

class WorkController extends Controller
{
    // تهيئة Cloudinary
    private function getCloudinary()
    {
        return new Cloudinary(env('CLOUDINARY_URL'));
    }

    public function dashboard()
    {
        $work_count = Work::count();
        return view('back.bashboard', compact('work_count'));
    }

    public function index()
    {
        $works = Work::latest()->get();
        return view('back.work.index', compact('works'));
    }

    public function create()
    {
        return view('back.work.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'category'    => 'required',
            'info'        => 'nullable',
            'results'     => 'nullable',
            'tags'        => 'nullable',
            'cover_image' => 'nullable|image',
            'images.*'    => 'nullable|image'
        ]);

        // تحويل التاغز من مصفوفة لنص
        $tagsArray = $request->input('tags');
        $tags = implode(' ', $tagsArray ?? []);

        // رفع صورة الغلاف على Cloudinary
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $cloudinary = $this->getCloudinary();
            $result = $cloudinary->uploadApi()->upload(
                $request->file('cover_image')->getRealPath()
            );
            $coverImagePath = $result['secure_url'];
        }

        // إنشاء العمل
        $work = Work::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'info'        => $request->info,
            'results'     => $request->results,
            'cover_image' => $coverImagePath,
            'tags'        => $tags,
        ]);

        // رفع الصور المتعددة على Cloudinary
        if ($request->hasFile('images')) {
            $cloudinary = $this->getCloudinary();
            foreach ($request->file('images') as $image) {
                $result = $cloudinary->uploadApi()->upload($image->getRealPath());
                WorkImage::create([
                    'work_id'    => $work->id,
                    'image_path' => $result['secure_url']
                ]);
            }
        }

        return redirect()->route('works.index');
    }

    public function edit($id)
    {
        $work = Work::with('images')->findOrFail($id);
        return view('back.work.edit', compact('work'));
    }

    public function show($id)
    {
        $work = Work::with('images')->findOrFail($id);
        return view('back.work.show', compact('work'));
    }

    public function update(Request $request, $id)
    {
        $work = Work::findOrFail($id);

        $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'category'    => 'required',
            'info'        => 'nullable',
            'results'     => 'nullable',
            'tags'        => 'nullable',
            'cover_image' => 'nullable|image',
            'images.*'    => 'nullable|image'
        ]);

        $data = $request->only(['title', 'description', 'category', 'info', 'results']);

        // تحديث صورة الغلاف على Cloudinary
        if ($request->hasFile('cover_image')) {
            $cloudinary = $this->getCloudinary();
            $result = $cloudinary->uploadApi()->upload(
                $request->file('cover_image')->getRealPath()
            );
            $data['cover_image'] = $result['secure_url'];
        }

        // تحديث التاغز
        if ($request->has('tags')) {
            $data['tags'] = implode(' ', $request->input('tags') ?? []);
        }

        $work->update($data);

        // إضافة صور جديدة على Cloudinary
        if ($request->hasFile('images')) {
            $cloudinary = $this->getCloudinary();
            foreach ($request->file('images') as $image) {
                $result = $cloudinary->uploadApi()->upload($image->getRealPath());
                WorkImage::create([
                    'work_id'    => $work->id,
                    'image_path' => $result['secure_url']
                ]);
            }
        }

        return redirect()->route('works.index');
    }

    public function deleteImage($id)
    {
        $image = WorkImage::findOrFail($id);
        $image->delete();
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->images()->delete();
        $work->delete();
        return redirect()->route('works.index');
    }
}
