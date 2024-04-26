@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar Distributor</h2>
                </div>
                <div class="pull-right">
                <div class="pull-right">
                </button>
                <a class="btn btn-success" href="{{ route('distributors.create') }}"> <i class="fa fa-arrow-right-square">+ Distributor</i>
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
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($dists as $distributors)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $distributors->nama_dis }}</td>
                    <td>{{ $distributors->alamat }}</td>
                    <td>{{ $distributors->no_telp }}</td>
                    <td>
                        <form action="{{ route('distributors.destroy', $distributors->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('distributors.show', $distributors->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{ route('distributors.edit', $distributors->id) }}"><i class="fa fa-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $distributors->nama_dis }}?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $dists->links() !!}
    </div>
@endsection
