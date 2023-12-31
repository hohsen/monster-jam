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
                        <button onclick="window.location='{{ route('champion.create') }}'">Add new champion</button>

                        <ul>
                            @foreach ($champions as $champion)
                                <li>
                                    <a href="{{ route('champion.edit', ['id' => $champion->id]) }}">{{ $champion->name }}</a>
                                    @php
                                        $arr = $champion->toArray();

                                        foreach ($arr as $key => $value) {
                                            echo "<pre>";
                                            echo "$key = $value";
                                            echo "</pre>";
                                        }
                                    @endphp

                                    <form action="{{ route('champion.delete', ['id' => $champion->id]) }}" method="POST">
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














