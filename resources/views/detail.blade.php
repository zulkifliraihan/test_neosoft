@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Konten - {{ $post['title'] }}</div>

                <div class="card-body">
                    {{ $post['body'] }}
                </div>
            </div>
        </div>
    </div>

    <h1 class="mb-2 mt-2">List Comment</h1>
    <div class="row">
        @foreach ($postComments as $item)
        <div class="col-md-3 col-12 d-flex align-items-stretch mb-2 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $item['name'] }}</h5>
                    <h5 class="card-title">Email : {{ $item['email'] }}</h5>
                    <p class="card-text">{{ $item['body'] }}</p>
                </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
@endsection



