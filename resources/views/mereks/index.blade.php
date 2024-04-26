@extends('layouts.template')
@section('content')
<div class="container">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Daftar Merek</h2>
</div>
<div class="pull-right">
<div class="pull-right">
</button>
<a class="btn btn-success" href="{{ route('mereks.create') }}"> <i class="fa fa-arrow-right-square">+ Merek</i>
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
<th>Nama Merek</th>
<th width="280px">Action</th>
</tr>
@foreach ($mereks as $merek)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $merek->nama}}</td>
<td>
<form action="{{ route('mereks.destroy',$merek->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('mereks.show',$merek->id) }}"><i class="fa-solid fa-eye"></i></i></a>
<a class="btn btn-primary" href="{{ route('mereks.edit',$merek->id) }}"><i class="fa fa-pencil-square"></i></a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus {{$merek->nama}}?')"><i class="fa fa-trash"></i></button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $mereks->links() !!}
</div>
@endsection
