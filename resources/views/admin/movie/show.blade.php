@extends('layouts.hello')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Show Data
                        <a href="{{ route('movie.index') }}" class="btn btn-sm btn-outline-primary" style="float: right">
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Judul Movie</label>
                            <input type="text" name="tahun" value="{{ $movie->judul }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Sinopsis</label>
                            <textarea name="" id="sinopsis" cols="30" rows="10"  class="form-control" readonly>{{ $movie->sinopsis }} </textarea>
                            {{-- <input type="" name="tahun" value="{{ $movie->sinopsis }}" class="form-control" readonly> --}}
                        </div>
                        <div class="form-group">
                            <label for="">Durasi Film</label>
                            <input type="text" name="tahun" value="{{ $movie->durasi }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Genre</label>
                            <input type="text" name="tahun" value="{{ $movie->genre->kategori }}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Rilis</label>
                            <input type="text" name="tahun" value="{{ $movie->tahun_rilis->tahun }}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Cover</label>
                            <p>
                                <img src="{{ asset('images/movies/' . $movie->cover) }}" class="img-rounded img-responsive"
                                    style="width: 175px; height:175px;" alt="">
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="">Background</label>
                            <p>
                                <img src="{{ asset('images/movies/' . $movie->background) }}"
                                    class="img-rounded img-responsive" style="width: 175px; height:175px;" alt="">
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="">Cast Film</label>
                            <ol>
                                @foreach ($movie->casting as $item)
                                    <li> {{ $item->nama }}</li>
                                    <p>
                                        <img src="{{ asset('images/casting/' . $movie->foto) }}"
                                            class="img-rounded img-responsive" style="width: 175px; height:175px;" alt="">
                                    </p>
                                @endforeach
                            </ol>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection