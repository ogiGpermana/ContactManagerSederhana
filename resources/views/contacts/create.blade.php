@extends('layouts.app')

@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    <strong>Tambah Kontak</strong>
</div>
{!! Form::open(['route' => 'contacts.store']) !!}
@include('contacts.form')
{!! Form::close() !!}
</div>
@endsection
