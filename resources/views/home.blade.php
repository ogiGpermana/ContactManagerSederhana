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
            <div class="addcontact">
                <a href="{{ route('form') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Tambah Kontak</a>
            </div><br>
            <div class="panel panel-default">
            <table class="table">
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left">
                                <a href=""><img src="http://placehold.it/100x100" alt="" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Kontak 1</h4>
                                <address>
                                <strong>Pekerjaan</strong><br>
                                kontak1@contoh.com
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
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-left">
                                <a href=""><img src="http://placehold.it/100x100" alt="" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Kontak 2</h4>
                                <address>
                                <strong>Pekerjaan 2</strong><br>
                                kontak2@contoh.com
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
            </table>
            </div>
            <div class="text-center">
                <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>
            </div>
        </div>
    </div>
</div>
@endsection
