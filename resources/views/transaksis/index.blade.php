@extends('layouts.template')
@section ('Transaksi', 'Pos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar transaksi</h2>
                </div>
                <div class="pull-right">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('transaksis.create') }}"> <i class="fa fa-arrow-right-square">+ Transaksi</i>
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
                <th width="120px">Harga Barang</th>
                <th width="120px">Total Barang</th>
                <th width="120px">Total Harga</th>
                <th width="120px">Total Bayar</th>
                <th width="120px">Kembalian</th>
                <th width="120px">Tanggal Beli</th>
                <th width="310px">Action</th>
            </tr>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transaksi->nama_bar }}</td>
                    <td>{{ $transaksi->harga_bar }}</td>
                    <td>{{ $transaksi->total_bar }}</td>
                    <td>{{ $transaksi->total_har }}</td>
                    <td>{{ $transaksi->total_bay }}</td>
                    <td>{{ $transaksi->kembalian }}</td>
                    <td>{{ $transaksi->tanggal_bel }}</td>
                    <td>
                        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('transaksis.show',$transaksi->id) }}"><i class="fa-solid fa-eye"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus {{$transaksi->nama_bar}}?')"><i class="fa fa-trash"></i></button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $transaksis->links() !!}
    </div>
@endsection
