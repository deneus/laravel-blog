@extends('includes.html')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Articles</h1>
        </div>
    </div>

    <div class="p-5 mb-4 bg-light rounded-3 row">
        @livewire('filter-articles')

        @foreach($articles as $article)
            <div class="border bg-white w-50 p-5">
                <div class="fw-bold">{{ $article->title }}</div>
                <div class="">{{ $article->subtitle }}</div>
                <div><span class="badge bg-secondary">{{ $article->category->label }}</span></div>

                <div>
                    @foreach($article->tags as $tag)
                        <span class="badge bg-dark">{{ $tag->label }}</span>
                    @endforeach
                </div>
                <div class="mt-3"><a href="{{ route('article', ['article' => $article]) }}" class="btn btn-primary" type="button">Read more</a></div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center pb-5">{{ $articles->links('vendor.pagination') }}</div>

@endsection
