@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Modern Library List</h1>
        @foreach ($data as $dt)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'. $dt->cover) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $dt->judul }}</h5>
                    <p class="card-text"> {{ Str::limit($dt->sinopsis, 120) }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $dt->penerbit }}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
