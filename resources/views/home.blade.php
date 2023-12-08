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

                    <ul>
                        <li><a href="{{ route('car.index') }}">Cars</a></li>
                        <li><a href="{{ route('champion.index') }}">Champions</a></li>
                        <li><a href="{{ route('news.index') }}">News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection