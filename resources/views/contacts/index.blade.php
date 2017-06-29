@extends('layouts.app')

@section('content')
<div class="addcontact">
    <a href="{{ route('contacts.create') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Tambah Kontak</a>
</div><br>
<div class="panel panel-default">
<table class="table">
    @foreach ($contacts as $contact)
    <tr>
        <td>
            <div class="media">
                <div class="media-left">
                    <a href=""><img src="{{ Avatar::create($contact->name)->toBase64() }}" class="media-object"/></a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $contact->name }}</h4>
                    <address>
                    <strong>{{ $contact->company }}</strong><br>
                    {{ $contact->email }}
                    </address>
                </div>
            </div>
        </td>
        <td width="100" class="middle">
            <div>
            {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'DELETE']) !!}
                <a href="{{route('contacts.edit', ['id' => $contact->id])}}" class="btn btn-circle btn-default btn-xs" title="edit"><i class="fa fa-fw fa-edit"></i></a>
                <button type="submit" class="btn btn-circle btn-danger btn-xs" title="delete" onclick="return confirm('Anda yakin ingin hapus kontak?')">
                    <i class="fa fa-fw fa-trash"></i>
                </button>
            {!! Form::close() !!}
            </div>
        </td>
    </tr>
    @endforeach
</table>
</div>
<div class="text-center">
    <nav aria-label="Page navigation">
      {!! $contacts->appends(Request::query())->render() !!}
    </nav>
</div>
@endsection
