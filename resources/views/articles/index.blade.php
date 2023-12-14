@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('home') }}">Go back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)
                        <button onclick="window.location='{{ route('article.create') }}'">Add new article</button>

                        <ul>
                            @foreach ($articles as $article)
                                <li>
                                    <a href="{{ route('article.edit', ['id' => $article->id]) }}">{{ $article->title }}</a>

                                    <br>

                                    @php
                                        $arr = $article->toArray();

                                        foreach ($arr as $key => $value) {
                                            echo "<pre>";
                                            echo "$key = $value";
                                            echo "</pre>";
                                        }
                                    @endphp

                                    <form action="{{ route('article.delete', ['id' => $article->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button>Delete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                    <h2>You logged in!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
