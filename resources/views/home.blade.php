@extends('layouts.adminlte')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Produk</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(isset($products) && $products->count())
                            <ul>
                                @foreach($products as $product)
                                    <li>{{$product['nama_produk']}}</li>
                                @endforeach
                            </ul>
                        @else
                            Produk Belum ada
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
