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
                        <button onclick="window.location='{{ route('car.create') }}'">Add new car</button>

                        <ul>
                            @foreach ($cars as $car)
                                <li>
                                    <a href="{{ route('car.edit', ['id' => $car->id]) }}">{{ $car->model }}</a>

                                    <br>

                                    @php
                                        $arr = $car->toArray();

                                        foreach ($arr as $key => $value) {
                                            echo "<pre>";
                                            echo "$key = $value";
                                            echo "</pre>";
                                        }
                                    @endphp

                                    <form action="{{ route('car.delete', ['id' => $car->id]) }}" method="POST">
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
