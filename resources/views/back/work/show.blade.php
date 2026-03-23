@extends('back.layout.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <h1>عرض العمل</h1>
            </div>
        </section>

        <section class="content">

            <div class="container-fluid">

                <div class="card card-primary">

                    <div class="card-header">
                        <label>{{ $work->title }}</label>
                    </div>

                    <div class="card-body">

                        {{-- القسم --}}
                        <div class="form-group">
                            <label>القسم:</label>
                            <p>{{ $work->category }}</p>
                        </div>

                        {{-- وصف العمل --}}
                        @if ($work->description)
                            <div class="form-group">
                                <label>وصف العمل:</label>
                                <p>{!! $work->description !!}</p>
                            </div>
                        @endif

                        {{-- الدور في المشروع --}}
                        @if ($work->info)
                            <div class="form-group">
                                <label>الدور في المشروع:</label>
                                <p>{{ $work->info }}</p>
                            </div>
                        @endif

                        {{-- نتائج المشروع --}}
                        @if ($work->results)
                            <div class="form-group">
                                <label>نتائج المشروع:</label>
                                <p>{{ $work->results }}</p>
                            </div>
                        @endif

                        {{-- الكلمات المفتاحية --}}
                        @if ($work->tags)
                            <div class="form-group">
                                <label>الكلمات المفتاحية:</label>
                                <br>

                                @foreach (explode(' ', $work->tags) as $tag)
                                 <span class="badge bg-primary me-1">   {{ trim($tag) }} </span>
                                @endforeach

                            </div>
                        @endif



                        {{-- صورة الغلاف --}}
                        @if ($work->cover_image)
                            <div class="form-group">
                                <label>صورة الغلاف:</label>
                                <br>
                                <img src="{{ asset('storage/' . $work->cover_image) }}" width="400"
                                    class="img-fluid rounded">
                            </div>
                        @endif

                        {{-- صور المعرض --}}
                        @if ($work->images->count())
                            <div class="form-group">
                                <label>صور المعرض:</label>
                                <div class="row">
                                    @foreach ($work->images as $image)
                                        <div class="col-md-3 mb-3 text-center">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('works.index') }}" class="btn btn-secondary">رجوع</a>
                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection
