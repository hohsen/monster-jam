@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create champion') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)
                        <form action="{{route('champion.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="car_id">Car id: <br /></label>
                            <input type="text" name="car_id" id="car_id">

                            <br>

                            <label for="name">Name: <br /></label>
                            <input type="text" name="name" id="name">

                            <br>

                            <label for="biography">Biography: <br /></label>
                            <input type="text" name="biography" id="biography">

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
