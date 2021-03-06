<div class="panel-body">
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-8">
                @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="name" class="control-label col-md-3">Nama :</label>
                    <div class="col-md-8">
                    {!! Form::text("name", null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="control-label col-md-3">Perusahaan :</label>
                    <div class="col-md-8">
                    {!! Form::text("company", null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-3">Email :</label>
                    <div class="col-md-8">
                    {!! Form::email("email", null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label col-md-3">Telpon :</label>
                    <div class="col-md-8">
                    {!! Form::text("phone", null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label col-md-3">Alamat :</label>
                    <div class="col-md-8">
                    {!! Form::textarea("address", null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                    <div class="form-group">
                    <label for="group" class="control-label col-md-3">Grup :</label>
                    <div class="col-md-3">
                        {!! Form::select("group_id", $groups, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-3">
                        <a href="#" id="add-group-btn" class="btn btn-default btn-block">Tambah Grup</a>
                    </div>
                </div>
                <div class="form-group" id="add-new-group">
                    <div class="col-md-offset-3 col-md-8">
                        <div class="input-group">
                            <input type="text" name="new_group" id="new-group" class="form-control" placeholder="Tambah grup baru">
                            <span class="input-group-btn">
                                <a href="#" class="btn btn-default" id="add-new-btn">
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
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"></div>
                    <div class="text-center">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span><span class="fileinput-exists">Ganti{!! Form::file('photo') !!}</span>{!! Form::file('photo') !!}</span>
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
                    <a href="{{url('/contacts')}}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('form-script')
<script>
    $('#add-new-group').hide();
    $('#add-group-btn').click(function(){
        $('#add-new-group').slideToggle(function(){
            $('#new-group').focus();
        });
        return false;
    });

    $('#add-new-btn').click(function () {
      var newGroup = $('#new-group');
      $.ajax({
        url: "{{ route('groups.store') }}",
        method: 'post',
        data: {
          name: $("#new-group").val(),
          _token: $("input[name=_token]").val()
        },
        success: function(response){
          if (response.success == true) {
            // Hapus pesan error
            var inputGroup = newGroup.closest('.input-group');
            inputGroup.removeClass('has-error');
            inputGroup.next('.text-danger').remove();

            // Tambah grup baru ke dalam daftar pilihan
            $("select[name=group_id]")
            .append($("<option></option>")
            .attr("value", response.group.id)
            .attr("selected", true)
            .text(response.group.name));

            // Hapus teks
            newGroup.val("");
          }
        },
        error: function(xhr){
          var errors = xhr.responseJSON;
          var error = errors.name[0];

          if (error) {
            var inputGroup = newGroup
                              .closest('.input-group');

            inputGroup.next('.text-danger').remove();

            inputGroup.addClass('has-error')
            .after('<p class="text-danger">' + error + '</p>');
          }
        }
      });
    });
</script>
@endsection
