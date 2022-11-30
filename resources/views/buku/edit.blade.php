@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit buku Page</div>

                <div class="card-body">
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">isbn</label>
                            <input type="text" class="form-control" name="isbn" placeholder="Insert post Title" required
                                value="{{ $buku->isbn }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Insert post Content"
                                required value="{{ $buku->judul }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">sinopsis</label>
                            <input type="text" class="form-control" name="sinosis" placeholder="Insert post Content"
                                required value="{{ $buku->sinopsis }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Insert post Content"
                                required value="{{ $buku->penerbit }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">cover</label>
                            <img src="{{ asset('storage/'.$buku->cover) }}" alt="" width="100px" class="mb-3">
                            <input type="file" class="form-control" name="cover" placeholder="Choose Image File">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori_id">
                                <option selected>Open this select menu</option>
                                @foreach ($data as $kt)
                                <option value="{{ $kt->id }}" @selected($kt->kategori_id==$kt->id)>{{ $kt->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                            </select>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
