@extends('back.layout.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <h1>تعديل العمل</h1>
            </div>
        </section>

        <section class="content">

            <div class="container-fluid">

                <div class="card card-primary">

                    <div class="card-header">
                        <label>تعديل معلومات العمل</label>
                    </div>

                    <form action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عنوان العمل</label>
                                        <input type="text" name="title" class="form-control" value="{{ $work->title }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>القسم</label>
                                        <select name="category" class="form-control">
                                            @foreach ($services as $slug => $service)
                                                <option
                                                    value="{{ Str::replaceFirst('خدمة ', '', $service['title']) }}"
                                                    {{ $work->category == Str::replaceFirst('خدمة ', '', $service['title']) ? 'selected' : '' }}>
                                                    {{ Str::replaceFirst('خدمة ', '', $service['title']) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>وصف العمل</label>
                                <textarea name="description" id="editor" class="form-control" rows="5">{{ $work->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>الدور في المشروع</label>
                                <input type="text" name="info" class="form-control" value="{{ $work->info }}">
                            </div>

                            <div class="form-group">
                                <label>نتائج المشروع</label>
                                <textarea name="results" class="form-control" rows="3">{{ $work->results }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>الكلمات المفتاحية</label>
                                <input name="tags" id="tagsInput" class="form-control" value="{{ $work->tags }}">
                            </div>

                            {{-- صورة الغلاف الحالية --}}
                            <div class="form-group">
                                <label>صورة الغلاف الحالية</label>
                                <br>
                                @if ($work->cover_image)
                                    <img src="{{ $work->cover_image }}" width="200" class="img-fluid rounded">
                                @endif
                            </div>

                            {{-- تغيير صورة الغلاف --}}
                            <div class="form-group">
                                <label>تغيير صورة الغلاف</label>
                                <input type="file" name="cover_image" class="form-control" onchange="previewImage(event)">
                                <br>
                                <img id="coverPreview" style="max-width:200px; display:none">
                            </div>

                            <hr>

                            <h5>صور المعرض</h5>

                            {{-- صور المعرض الحالية --}}
                            <div class="row">
                                @foreach ($work->images as $image)
                                    <div id="image-{{ $image->id }}" class="col-md-3 text-center mb-3">
                                        <img src="{{ $image->image_path }}" class="img-fluid mb-2 rounded">
                                        <button type="button" onclick="deleteImage({{ $image->id }})"
                                            class="btn btn-danger btn-sm">
                                            حذف
                                        </button>
                                    </div>
                                @endforeach
                            </div>

                            {{-- إضافة صور جديدة --}}
                            <div class="form-group">
                                <label>إضافة صور جديدة</label>
                                <input type="file" name="images[]" multiple class="form-control">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">تحديث العمل</button>
                            <a href="{{ route('works.index') }}" class="btn btn-secondary">رجوع</a>
                        </div>

                    </form>

                </div>

            </div>

        </section>

    </div>
@endsection

@section('scripts')
@endsection
