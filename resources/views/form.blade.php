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
            <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Tambah Kontak</strong>
            </div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3">Nama :</label>
                                <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company" class="control-label col-md-3">Perusahaan :</label>
                                <div class="col-md-8">
                                <input type="text" name="company" id="company" class="form-control">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-md-3">Email :</label>
                                <div class="col-md-8">
                                <input type="email" name="email" id="email" class="form-control">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label col-md-3">Telpon :</label>
                                <div class="col-md-8">
                                <input type="text" name="phone" id="phone" class="form-control">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="control-label col-md-3">Alamat :</label>
                                <div class="col-md-8">
                                <textarea class="form-control" name="address" id="address" rows="3" cols="5"></textarea>                                    
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="group" class="control-label col-md-3">Grup :</label>
                                <div class="col-md-3">
                                    <select name="group" id="group" class="form-control">
                                        <option value="">Pilih Grup</option>
                                        <option value="1">Keluarga</option>
                                        <option value="2">Teman</option>
                                        <option value="3">Lain lain</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <a href="" id="add-group-btn" class="btn btn-default btn-block">Tambah Grup</a>
                                </div>
                            </div>
                            <div class="form-group" id="add-new-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="new_group" id="new-group" class="form-control" placeholder="Tambah grup baru">
                                        <span class="input-group-btn">
                                            <a href="#" class="btn btn-default">
                                                <i class="fa fa-fw fa-check"></i>
                                            </a>
                                        </span>
                                    </div>    
                                </div>    
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                    <img src="http://placehold.it/150x150" alt="Photo">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                <div class="text-center">
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span><span class="fileinput-exists">Ganti</span><input type="file" name="..."></span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Buang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{('/home')}}" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
