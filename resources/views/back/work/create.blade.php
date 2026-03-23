@extends('back.layout.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <h1>إضافة عمل جديد</h1>
            </div>
        </section>

        <section class="content">

            <div class="container-fluid">

                <div class="card card-primary">

                    <div class="card-header">


                        <label>معلومات العمل </label>

                    </div>


                    <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>عنوان العمل</label>
                                        <input type="text" name="title" class="form-control" required
                                            placeholder="أدخل عنوان العمل">
                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>القسم</label>

                                        <select name="category" class="form-control">
  @foreach ($services as $slug => $service)
                                            <option value="{{ Str::replaceFirst('خدمة ', '', $service['title']) }}"> {{ Str::replaceFirst('خدمة ', '', $service['title']) }}</option>



                  @endforeach


                                        </select>

                                    </div>

                                </div>

                            </div>


                            <div class="form-group">

                                <label>وصف العمل</label>

                                <textarea name="description" id="editor" class="form-control" rows="5"></textarea>

                            </div>


                            <div class="form-group">

                                <label>الدور في المشروع</label>

                                <input type="text" name="info" class="form-control"
                                    placeholder="مثال: مطور Full Stack">

                            </div>


                            <div class="form-group">

                                <label>نتائج المشروع</label>

                                <textarea name="results" class="form-control" rows="3"></textarea>

                            </div>

                            <div class="form-group">
                                <label>الكلمات المفتاحية</label>
                                <br>
                                <select name="tags[]" class="form-control select2" multiple="multiple"
                                    style="width: 100%;">
                                    @php
                                        $options = [
                                            'HTML',
                                            'CSS',
                                            'JavaScript',
                                            'Bootstrap',
                                            'Vue',
                                            'React',
                                            'Laravel',
                                        ];
                                        $selectedTags = old('tags', $work->tags ?? []); // قيم موجودة سابقًا أو من الفورم
                                    @endphp

                                    @foreach ($options as $option)
                                        <option value="{{ $option }}"
                                            @if (in_array($option, $selectedTags)) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">

                                <label>صورة الغلاف</label>

                                <input type="file" name="cover_image" class="form-control"
                                    onchange="previewImage(event)">

                                <br>

                                <img id="coverPreview" style="max-width:200px; display:none">

                            </div>


                            <div class="form-group">

                                <label>صور المعرض</label>

                                <input type="file" name="images[]" multiple class="form-control">

                                <small class="text-muted">يمكن اختيار عدة صور</small>

                            </div>


                        </div>


                        <div class="card-footer">

                            <button type="submit" class="btn btn-success">
                                حفظ العمل
                            </button>

                            <a href="{{ route('works.index') }}" class="btn btn-secondary">
                                رجوع
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </div>
@endsection



@section('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>


    <script>
        CKEDITOR.replace('editor');


        var input = document.querySelector('#tagsInput');
        new Tagify(input);


        function previewImage(event) {

            let reader = new FileReader();

            reader.onload = function() {

                let output = document.getElementById('coverPreview');

                output.src = reader.result;
                output.style.display = 'block';

            }

            reader.readAsDataURL(event.target.files[0]);

        }
    </script>
@endsection
