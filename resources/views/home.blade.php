@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">Semua Kontak <span class="badge">10</span></a>
                <a href="#" class="list-group-item">Keluarga <span class="badge">4</span></a>
                <a href="#" class="list-group-item">Teman <span class="badge">3</span></a>
                <a href="#" class="list-group-item">Lain lain <span class="badge">3</span></a>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table">
                <tr>
                    <td>Kontak 1</td>
                    <td>
                       <div>
                           <a href="" class="btn btn-default btn-xs" title="edit"><i class="fa fa-fw fa-edit"></i></a>
                           <a href="" class="btn btn-danger btn-xs" title="edit"><i class="fa fa-fw fa-remove"></i></a>
                       </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
