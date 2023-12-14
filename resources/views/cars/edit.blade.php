@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit car') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)
                        <form action="{{ route('car.update', ['id' => $car->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="model">Model: <br /></label>
                            <input value="{{$car->model}}" type="text" name="model" id="model">

                            <br>

                            <label for="max_speed">Max speed: <br /></label>
                            <input value="{{$car->max_speed}}" type="text" name="max_speed" id="max_speed">

                            <br>

                            <label for="horse_power">Horse power: <br /></label>
                            <input value="{{$car->horse_power}}" type="text" name="horse_power" id="horse_power">

                            <br>

                            <label for="engine_volume">Engine volime: <br /></label>
                            <input value="{{$car->engine_volume}}" type="text" name="engine_volume" id="engine_volume">

                            <br>

                            <label for="year_of_manufacture">Year of manufacture: <br /></label>
                            <input value="{{$car->year_of_manufacture}}" type="number" name="year_of_manufacture" id="year_of_manufacture">

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

                        <button onclick="window.location='{{ route('car.index') }}'">Cancel</button>
                    @else
                    <h2>You logged in!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
