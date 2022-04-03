@extends('includes.html')

@section('content')
    <h1>{{$article->title}}</h1>
    <h2>{{$article->subtitle}}</h2>
    <div><span class="badge bg-secondary">{{ $article->category->label }}</span></div>
    <div class="fst-italic"><br />slug: {{$article->slug}}<br /></div>
    <div>{!! $article->content !!}</div>
    <div>@include('includes.partials.link', [
  'label' => 'Back',
  'href' => route('articles'),
  ])</div>
@endsection
