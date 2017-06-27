@extends('layouts.app')

@section('content')
<div class="addcontact">
    <a href="{{ route('create') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Tambah Kontak</a>
</div><br>
<div class="panel panel-default">
<table class="table">
    @foreach ($contacts as $contact)
    <tr>
        <td>
            <div class="media">
                <div class="media-left">
                    <a href=""><img src="http://placehold.it/100x100" alt="" class="media-object"></a>
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
                <a href="" class="btn btn-circle btn-default btn-xs" title="edit"><i class="fa fa-fw fa-edit"></i></a>
                <a href="" class="btn btn-circle btn-danger btn-xs" title="edit"><i class="fa fa-fw fa-remove"></i></a>
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
