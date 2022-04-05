@extends('layouts.app')
@section('content-body')
<div class="container">
    <div class="bg-white rounded mt-5 p-4">
        <h1 class="my-3 text-center text-secondary font-weight-bold">Lista de comics</h1>
        <div class="row">
            @foreach ($comics2  as $comic)
                @component('components.card-comic')
                    @slot('title', $comic['title'])
                    @slot('version', $comic['issueNumber'])
                    @slot('comic_id', $comic['id'])
                    @slot('img', $comic['thumbnail']['path'])
                    @slot('extension', $comic['thumbnail']['extension'])
                @endcomponent
            @endforeach
        </div>
    </div>
</div>
@endsection