@extends('includes.html')

@section('content')

    <h1 class="text-center py-3">Article Edition</h1>

    @include('includes.partials.form_error_messages')

    <form action="{{ route('article.update', ['article' => $article]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-12">
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" placeholder="Article title" class='form-control @error('title')) is-invalid @enderror' value="{{ $article->title }}">

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="subtitle">Subtitle: </label>
                <input type="text" name="subtitle" placeholder="Article subtitle" class='form-control @error('subtitle')) is-invalid @enderror' value="{{ $article->subtitle }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control w-100">{{ $article->content }}</textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="content">Current slug: </label>
                <input disabled="disabled" type="text" name="subtitle" placeholder="NULL" class='form-control disabled' value="{{ $article->slug }}">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="subtitle">Category: </label>
                <select class="form-control" name="category_id">
                    <option>-Choose One-</option>
                    @foreach(\App\Models\Category::orderBy('label')->get() as $category)
                        <option @if($article->category_id === $category->id) selected="selected" @endif value="{{ $category->id  }}">{{ $category->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="mt-3">
            <input type="submit" value="submit" class="btn btn-primary"/>
        </div>
    </form>

    <script>
        window.onload = function(){
            CKEDITOR.replace( 'content' );
        }

    </script>

@endsection

