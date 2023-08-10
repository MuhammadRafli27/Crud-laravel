@extends('layouts.main')
@section('container')
  <div class="row justify-content-center">
    <h1 class="text-center mt-2">Edit Product</h1>
    <div class="col col-7">
      <form method="post" action="/product/{{ $produk->id }}">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="nama_produk">Nama Produk</label>
          <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" placeholder="Masukan Nama Produk!!!" autocomplete="off" value="{{ old('nama_produk', $produk->nama_produk)}}">
          @error('nama_produk')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="text" class="form-control  @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Masukan stok!!!" autocomplete="off" value="{{ old('stok', $produk->stok)}}">
          @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="text" class="form-control  @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukan Harga!!!" autocomplete="off" value="{{ old('harga', $produk->harga)}}">
          @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="mt-3 btn btn-primary submit">Edit Data</button>
      </form>
      <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </div>
  </div>
  <script>
    $('.submit').click(function(){
      swal("Berhasil", "You clicked the button!", "success");
    });
  </script>
@endsection
