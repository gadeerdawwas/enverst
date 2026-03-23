<?php

namespace App\Http\Controllers;

use \Storage;
use App\Models\Work;
use App\Models\WorkImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function dashboard(){
        $work_count=Work::count();

        return view('back.bashboard',compact('work_count'));
    }
    public function index()
    {
        $works = Work::latest()->get();
        return view('back.work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'info' => 'nullable',
            'results' => 'nullable',
            'tags' => 'nullable',
            'cover_image' => 'nullable|image',
            'images.*' => 'nullable|image'
        ]);
        // $tags = explode(',', $request->tags);
        $tagsArray = $request->input('tags'); // ["JavaScript","Bootstrap","Vue","React"]

    // تحويل المصفوفة إلى نص مفصول بمسافة
        $tags = implode(' ', $tagsArray); // "JavaScript Bootstrap Vue React"
        // حفظ صورة الغلاف
         if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('works', 'public');
            $data['cover_image'] = $path;
        }


        $work =Work::create([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'info' => $request->info,
        'results' => $request->results,
        'cover_image' => $path,
        'tags' => $tags,

        ]);
        // $work = Work::create($data);

        // حفظ الصور المتعددة
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('works/gallery', 'public');
                WorkImage::create([
                    'work_id' => $work->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('works.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $work = Work::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'info' => 'nullable',
            'results' => 'nullable',
            'tags' => 'nullable',
            'cover_image' => 'nullable|image',
            'images.*' => 'nullable|image'
        ]);


        // تحديث صورة الغلاف
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('works', 'public');
            $data['cover_image'] = $path;
        }

        $work->update($data);

        // إضافة صور جديدة
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('works/gallery', 'public');
                WorkImage::create([
                    'work_id' => $work->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('works.index');
    }

    /**
     * Delete a work image.
     */
// public function deleteImage($id)
// {
//     $image = WorkImage::find($id);
//      $image->delete();
//      return back();
//     if(!$image) {
//         return response()->json([
//             'success' => false,
//             'message' => 'الصورة غير موجودة'
//         ], 404);
//     }

//     try {
//         // نسخ بيانات الصورة قبل الحذف
//         $imageData = [
//             'id' => $image->id,
//             'image_path' => $image->image_path,
//             'created_at' => $image->created_at,
//         ];

//         // حذف الصورة من التخزين
//         if (\Storage::disk('public')->exists($image->image_path)) {
//             \Storage::disk('public')->delete($image->image_path);
//         }

//         // حذف السجل من قاعدة البيانات
//         $image->delete();

//         return response()->json([
//             'success' => true,
//             'image' => $imageData
//         ]);
//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => 'حدث خطأ أثناء الحذف'
//         ], 500);
//     }
// }
    public function deleteImage($id)
    {

        $image = WorkImage::findOrFail($id);

    

         $filePath = storage_path('app/public/' . $image->image_path);
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // حذف السجل من قاعدة البيانات
    $image->delete();

    return response()->json(['success' => true]);
    }

    /**
     * Remove the specified work.
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        // حذف جميع الصور المرتبطة أولاً
        foreach ($work->images as $image) {
            if (\Storage::disk('public')->exists($image->image_path)) {
                \Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }

        // حذف صورة الغلاف إذا وجدت
        if ($work->cover_image && \Storage::disk('public')->exists($work->cover_image)) {
            Storage::disk('public')->delete($work->cover_image);
        }

        $work->delete();

        return redirect()->route('works.index');
    }
}
