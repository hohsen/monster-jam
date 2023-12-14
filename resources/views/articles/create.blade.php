@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create article') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)
                        <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="title">Title: <br /></label>
                            <input type="text" name="title" id="title">

                            <br>

                            <label for="description">Description: <br /></label>
                            <textarea type="text" name="description" id="description"></textarea>

                            <br>

                            <label for="short_description">Short description: <br /></label>
                            <textarea type="text" name="short_description" id="short_description"></textarea>

                            <br>

                            <label for="photo">Photo: <br /></label>
                            <input type="file" name="photo" id="photo">

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
