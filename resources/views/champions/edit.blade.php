@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit champion') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)
                        <form action="{{ route('champion.update', ['id' => $champion->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label for="car_id">Car id: <br /></label>
                            <input value="{{$champion->car_id}}" type="text" name="car_id" id="car_id">

                            <br>

                            <label for="name">Name: <br /></label>
                            <input value="{{$champion->name}}" type="text" name="name" id="name">

                            <br>

                            <label for="biography">Biography: <br /></label>
                            <input value="{{$champion->biography}}" type="text" name="biography" id="biography">

                            <br>

                            <label for="photo">Photo: <br /></label>
                            <input value="{{ $champion->photo }}" type="file" name="photo" id="photo">

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

                        <button onclick="window.location='{{ route('champion.index') }}'">Cancel</button>
                    @else
                    <h2>You logged in!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
