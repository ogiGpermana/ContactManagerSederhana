@extends('layouts.app')

@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    <strong>Edit Kontak</strong>
</div>
{!! Form::model($contact, ['files' => true, 'method' => 'PATCH', 'route' => ['contacts.update', $contact->id]]) !!}
 @include('contacts.form')
{!! Form::close() !!}
</div>
@endsection
