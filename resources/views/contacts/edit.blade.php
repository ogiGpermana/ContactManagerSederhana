@extends('layouts.app')

@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    <strong>Edit Kontak</strong>
</div>
{!! Form::model($contact, ['method' => 'PATCH', 'route' => ['contacts.update', $contact->id], 'files' => true]) !!}
 @include('contacts.form')
{!! Form::close() !!}
</div>
@endsection
