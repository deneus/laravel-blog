@extends('includes.html')

@section('content')

    <h1 class="text-center py-3">Article Creation</h1>

    @include('includes.partials.form_error_messages')

    <form action="{{ route('article.store') }}" method="POST">
        @csrf
        <div class="col-12">
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" placeholder="Article title" class='form-control @error('title')) is-invalid @enderror' value="{{ old('title') }}">

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="subtitle">Subtitle: </label>
                <input type="text" name="subtitle" placeholder="Article subtitle" class='form-control @error('subtitle')) is-invalid @enderror' value="{{ old('subtitle') }}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control w-100">{{ old('content') }}</textarea>
            </div>
        </div>


        <div class="col-12">
            <div class="form-group">
                <label for="subtitle">Category: </label> {{old('category_id')}}
                <select class="form-control @error('subtitle')) is-invalid @enderror" name="category_id" >
                    <option>-Choose One-</option>
                    @foreach(\App\Models\Category::orderBy('label')->get() as $category)
                        <option @if((int) old('category_id') === $category->id) selected="selected" @endif value="{{ $category->id  }}">{{ $category->label }}</option>
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

