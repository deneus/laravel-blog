@extends('includes.html')

@section('content')

    <h1 class="text-center py-3">Articles</h1>

    @include('includes.partials.flash_messages')

    <div class="d-flex justify-content-left">
        <a href="{{ route('article.create') }}" class="btn btn-info m-3 ms-0 mt-0">Create article</a>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Creation date</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <th>{{ $article->id }}</th>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->formattedDate() }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('article.edit' , ['article' => $article]) }}" class="btn btn-dark px-3 mx-2">Edit</a>
                            <form method="POST" action="{{ route('article.destroy', ['article' => $article]) }}">
                                @method('DELETE')
                                @csrf
                                <input type="button" class="btn btn-warning px-3 mx-2" value="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$article->id}}">

                                <div class="modal" id="deleteModal-{{$article->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete article id {{$article->id}}?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center pb-5">{{ $articles->links('vendor.pagination') }}</div>

@endsection
