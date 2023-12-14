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

                    <button onclick="window.location='{{ route('slider.create') }}'">Add new photo</button>

                    <ul>
                        @foreach ($sliders as $slider)
                            <li>
                                <a href="{{ route('slider.edit', ['id' => $slider->id]) }}">{{ $slider->id }}</a>
                                @php
                                    $arr = $slider->toArray();

                                    foreach ($arr as $key => $value) {
                                        echo "<pre>";
                                        echo "$key = $value";
                                        echo "</pre>";
                                    }
                                @endphp

                                <form action="{{ route('slider.delete', ['id' => $slider->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button>Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection














