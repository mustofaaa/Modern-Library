@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard buku</div>

                <div class="card-body ">
                    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-2">Add New data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>isbn</th>
                                <th>Judul</th>
                                <th>Sinopsis</th>
                                <th>penerbit</th>
                                <th>Cover</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->isbn }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->sinopsis }}</td>
                                <td>{{ $d->penerbit }}</td>
                                <td><img src="{{ asset('storage/'.$d->cover) }}" style="height: 100px; width: 150px;"></td>
                                <td>{{ $d->kategori->nama }}</td>
                                <td>{{ $d->status }}</td>
                                <td>
                                    <a href="{{ route('buku.edit', $d->id ) }}"
                                        class="btn btn-sm btn-primary mb-1">Edit</a>
                                    <form action="{{ route('buku.destroy', $d->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
