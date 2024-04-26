@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar Barang</h2>
                </div>
                <div class="pull-right">
                    <div class="pull-right">
                        <button onclick="window.print();" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                              </svg>
                        </button>
                        <a class="btn btn-success" href="{{ route('barangs.create') }}"> <i class="fa fa-arrow-right-square">+ Barang</i>
                    </a>      
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th width="120px">Nama Barang</th>
                <th width="120px">Nama Merek</th>
                <th width="120px">Nama Distributor</th>
                <th width="120px">Harga Barang</th>
                <th width="120px">Harga Beli</th>
                <th width="120px">Jumlah Stok</th>
                <th width="120px">Nama Petugas</th>
                <th width="120px">Waktu Masuk</th>
                <th width="310px">Action</th>
            </tr>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $barang->nama_bar }}</td>
                    <td>{{ $barang->merek }}</td>
                    <td>{{ $barang->nama_dis }}</td>
                    <td>{{ $barang->harga_bar }}</td>
                    <td>{{ $barang->harga_bel }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->nama_pet }}</td>
                    <td>{{ $barang->waktu }}</td>
                    <td>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('barangs.show', $barang->id) }}"><i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('barangs.edit', $barang->id) }}"><i class="fa fa-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $barang->nama_bar }}?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $barangs->links() !!}
    </div>
@endsection
