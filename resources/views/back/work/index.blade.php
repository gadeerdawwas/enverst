@extends('back.layout.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        {{--  <h1> الاعمال

                        </h1>  --}}
                         <h1> <a href="{{ route('works.create') }}" class="btn btn-primary">
                           أضافة عمل
                        </a>
                        </h1>
                    </div>


                </div>
            </div>
        </section>


        <section class="content">

            <div class="container-fluid">

                <div class="card">

                    <div class="card-body">

                        <table id="worksTable" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>العنوان</th>
                                    <th>القسم</th>
                                    <th>الدور</th>
                                    <th>الكلمة المفتاحية</th>
                                    <th>تاريخ الانشاء</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($works as $work)
                                    <tr>
                                        <td>{{ $work->id }}</td>
                                        <td>{{ $work->title }}</td>
                                        <td>{{ $work->category }}</td>
                                        <td>{{ $work->info }}</td>
                                        <td>   @foreach (explode(' ', $work->tags) as $tag)
                                 <span class="badge bg-primary me-1">   {{ trim($tag) }} </span>
                                @endforeach</td>
                                        <td>{{ $work->created_at }}</td>

                                        <td>
                                            <a href="{{ route('works.show', $work->id) }}"
                                                class="btn btn-success btn-sm">مشاهدة</a>
                                            <a href="{{ route('works.edit', $work->id) }}" class="btn btn-info btn-sm">
                                                تعديل
                                            </a>

                                            <form action="{{ route('works.destroy', $work->id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm">
                                                    حذف
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection
