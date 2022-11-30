@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Buku Page</div>

                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">isbn</label>
                            <input type="text" class="form-control" name="isbn" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sinopsis</label>
                            <textarea type="text" class="form-control" name="sinopsis" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">penerbit</label>
                            <input type="text" class="form-control" name="penerbit" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">cover</label>
                            <input type="file" class="form-control" name="cover" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" name="kategori_id">
                                <option selected disabled>Category Select Menu</option>
                                @foreach ($data as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (Auth::user()->role == 'admin')
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
