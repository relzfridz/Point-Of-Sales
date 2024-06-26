@extends('layouts.template')

@section('title', 'Transaksi')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize text-center">Barang</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Barang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Merek</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Distributor</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Harga Barang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Stok</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($barangs->count() == 0)
                                            <tr>
                                                <td class="align-middle text-center" colspan="7">
                                                    <p class="text-xl font-weight-bold mb-0">Belum ada barang yang dibuat. Silahkan <a href="{{ route('barangs.create') }}" class="btn btn-success mb-0 px-2 py-2">Membuat</a> terlebih dahulu.</p>
                                                </td>
                                            </tr>
                                        @else
                                        @foreach ($barangs as $b)
                                            @if ($b->stok == 0)
                                                
                                            @else
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ ++$i }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->nama_bar }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->merek }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->nama_dis }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Rp. {{ $b->harga_bar }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->stok }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        @csrf

                                                        <input type="hidden" value="{{ $b->id }}" name="id">
                                                        <input type="hidden" value="{{ $b->nama_bar }}" name="name">
                                                        <input type="hidden" value="{{ $b->harga_bar }}" name="price">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <button class="btn btn-info" type="submit">Add to Cart</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                        {{-- {{ dd($b) }} --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize text-center">Keranjang</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama Barang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Jumlah Barang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Harga</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($cartItems->count() == 0)
                                        <tr>
                                            <td class="align-middle text-center" colspan="4">
                                                <p class="text-xl font-weight-bold mb-0">Belum ada barang di keranjang.</p>
                                            </td>
                                        </tr>
                                        @else
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            <div class="col-9">
                                                                <input type="number" min="1" name="quantity" value="{{ $item->quantity }}"
                                                                class="text-center form-control">
                                                            </div>
                                                            <button type="submit" class="btn btn-info px-2 py-1 mb-0 col-3">Update</button>
                                                        </div>
                                                    </form>
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Rp. {{ $item->price }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button class="btn btn-warning px-2 py-1 mb-0">Hapus</button>
                                                    </form>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary mt-1 mb-0" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1">
                                    Beli
                                </button>
                                </div>
                                <div class="col-6 d-flex flex-row-reverse">
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger mt-1 mb-0">Hapus Semua Barang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel1">Keranjang</h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <div class="d-flex row">
                    <th>
                        <div class="col-4 mb-3">
                            <td class="align-middle text-center">
                                <p class="text-md font-weight-bold mb-0"><strong>Nama Barang</strong></p>
                            </td>
                        </div>
                        <div class="col-4 mb-3">
                            <td class="align-middle text-center">
                                <p class="text-md font-weight-bold mb-0"><strong>Total</strong></p>
                            </td>
                        </div>
                        <div class="col-4 mb-3">
                            <td class="align-middle text-center">
                                <p class="text-md font-weight-bold mb-0"><strong>Harga</strong></p>
                            </td>
                        </div>
                    </th>
                        @foreach ($cartItems as $item)
                        <tr>
                            <div class="col-4 mb-3">
                                <td class="align-middle text-center">
                                    <p class="text-md font-weight-bold mb-0">{{ $item->name }}</p>
                                </td>
                            </div>
                            <div class="col-4 mb-3">
                                <td class="align-middle text-center">
                                    <p class="text-md font-weight-bold mb-0">x{{ $item->quantity }}</p>
                                </td>
                            </div>
                            <div class="col-4 mb-3">
                                <td class="align-middle text-center">
                                    <p class="text-md font-weight-bold mb-0">Rp. {{ $item->quantity * $item->price }}</p>
                                </td>
                            </div>
                        </tr>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <h6>Total Harga: <strong>Rp. {{ Cart::getTotal() }}</strong></h6>
                        <h6>Total Barang: <strong>{{ Cart::getTotalQuantity()}}</strong></h6>
                    </div>
                    <form action="{{ route('cart.pay') }}" method="POST">
                        @csrf

                        <div class="form-group mt-4">
                            <input type="number" min="0" class="form-control" id="total_bayar" name="total_bay"
                                placeholder="Total Bayar" autofocus onsubmit="setId()">
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Bayar</button>
                                <button type="button" class="btn btn-danger mt-2 mb-0" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection