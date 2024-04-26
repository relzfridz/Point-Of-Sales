@extends('layouts.template')
@section('title')
  {{ 'Dashboard | Pos' }}
@endsection
    @section('content')
    <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <div class="d-block text-center mt-3">
          <p>Selamat Datang : <b>{{ Auth::user()->name }}</b></p>
          <link rel="stylesheet" href="styles.css">
        </head>
        <body>
          <div class="container">
          </div>
        </body>
        </html>
@endsection