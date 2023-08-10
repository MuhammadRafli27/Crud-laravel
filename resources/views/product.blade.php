<!doctype html>
<html lang="en">

<head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">XI PPLG 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="/product">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('report') ? 'active' : '' }}" href="/report">Report
                                Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <thead>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Web | PBO</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <h1 class="mt-2" align="center">Daftar Product XI PPLG 2</h1>
        <a href="/product/create" class="btn btn-primary mb-2">Add Data</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $prd)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $prd->nama_produk }}</td>
                        <td>{{ $prd->stok }}</td>
                        <td>{{ $prd->harga }}</td>
                        <td>
                            <a href="/product/{{ $prd->id }}/edit" class="btn btn-primary"
                                data-id="{{ $prd->id }}"
                                onclick="return confirm('Apakah Kamu Yakin Ingin Mengubah Data Ini???')">Edit</a>
                            <form action="/product/{{ $prd->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" data-id="{{ $prd->id }}"
                                    onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Data Ini???')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </div>
</body>

</html>
