@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check() && Auth::user()->is_admin == true)    {{-- Checks, if logged in user is admin --}}
                        <ul>
                            <li><a href="{{ route('car.index') }}">Cars</a></li>
                            <li><a href="{{ route('champion.index') }}">Champions</a></li>
                            <li><a href="{{ route('article.index') }}">Articles</a></li>
                            <li><a href="{{ route('slider.index') }}">Sliders</a></li>
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
