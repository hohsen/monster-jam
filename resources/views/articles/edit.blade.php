@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit article') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)
                        <form action="{{ route('article.update', ['id' => $article->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label for="title">Title: <br /></label>
                            <input value="{{$article->title}}" type="text" name="title" id="title">

                            <br>

                            <label for="description">Description: <br /></label>
                            <textarea type="text" name="description" id="description">{{ $article->description }}</textarea>

                            <br>

                            <label for="short_description">Short description: <br /></label>
                            <textarea type="text" name="short_description" id="short_description">{{ $article->short_description }}</textarea>

                            <br>

                            <label for="photo">Photo: <br /></label>
                            <input value="{{$article->photo}}" type="file" name="photo" id="photo">

                            <br>
                            <br>

                            <button type="submit">save</button>

                            @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </form>

                        <button onclick="window.location='{{ route('article.index') }}'">Cancel</button>
                    @else
                    <h2>You logged in!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



