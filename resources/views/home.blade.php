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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($posts as $item)
            <div class="col-md-3 col-12 d-flex align-items-stretch mb-2 mt-2">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item['title'] }}</h5>
                      <p class="card-text">{{ $item['body'] }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('detail', $item['id']) }}" class="btn btn-primary">Go somewhere</a>
                        <p>
                            Total Comment : {{ APIURL::countComment($item['id']) }}
                        </p>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection



