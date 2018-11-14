@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        @include('alert')
    </div>
</div>

<div class="container" style="margin-bottom: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Soal</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-bottom: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Soal Wajib</div>

                <div class="card-body">
                    @if(count($soal) == null)
                        {{'Belum ada data'}}
                    @else
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Soal</th>
                                <th>Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($soal as $key => $s)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$s->babak->name}}</td>
                                <td>{{$s->isi_soal}}</td>
                                <td>
                                    <button onclick="edit_soal(this)" data-id="{{$s->id}}" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit">Edit</button>
                                    <button onclick="del_soal(this)" data-post="{{ url('/deleteSoal', ['id' => $s->id]) }}" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Soal Lemparan</div>

                <div class="card-body">
                    @if(count($lemparan) == null)
                        {{'Belum ada data'}}
                    @elseif(count($lemparan) != null)
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Soal</th>
                                <th>Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($lemparan as $key => $l)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$l->babak->name}}</td>
                                <td>{{$l->isi_soal}}</td>
                                <td>
                                    <button onclick="edit_soal(this)" data-id="{{$l->id}}" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Start Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Soal</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form action="{{ route('simpan') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="babak_id" class="col-sm-4 col-form-label text-md-right">{{ __('Jenis Soal') }}</label>

                        <div class="col-md-6">
                            <select class="form-control {{ $errors->has('babak_id') ? ' is-invalid' : '' }}" id="babak_id" name="babak_id">
                                <option selected="true">Pilih Babak</option>
                                @foreach($babak as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('babak_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('babak_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isi_soal" class="col-sm-4 col-form-label text-md-right">{{ __('Soal') }}</label>

                        <div class="col-md-6">
                            <textarea id="isi_soal" class="form-control{{ $errors->has('isi_soal') ? ' is-invalid' : '' }}" name="isi_soal" required autofocus></textarea>

                            @if ($errors->has('isi_soal'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('isi_soal') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        
        </div>
    </div>
</div>
<!-- End Modal Tambah -->


<!-- Start Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Soal</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="formUpdate" class="form-horizontal" action="updateSoal/" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" id="soal_id">
                    <div class="form-group row">
                        <label for="babak_id" class="col-sm-4 col-form-label text-md-right">{{ __('Jenis Soal') }}</label>
                        <div class="col-md-6">
                            <select class="form-control {{ $errors->has('babak_id') ? ' is-invalid' : '' }}" id="babak_id" name="babak_id">
                                <option selected="true">Pilih Babak</option>
                                @foreach($babak as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('babak_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('babak_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isi_soal" class="col-sm-4 col-form-label text-md-right">{{ __('Soal') }}</label>
                        <div class="col-md-6">
                            <textarea id="isi" class="form-control{{ $errors->has('isi_soal') ? ' is-invalid' : '' }}" name="isi_soal" required autofocus></textarea>
                            @if ($errors->has('isi_soal'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('isi_soal') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<!-- Start Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Soal</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data?</p>
                <form id="formDelete" class="form-horizontal" action="#" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Delete -->
@endsection

@section('scripts')
<script type="text/javascript">
    function edit_soal(e) {
        id = $(e).attr('data-id');
        $('#formUpdate').attr('action', "updateSoal/"+id);
        $('#modalEdit').show();

        $("#soal_id").val(id);

        $.ajax({
            url: "{{url('lihat-soal')}}/"+id,
            method: "GET",
            dataType: "json"
        })
        .done(function(data){
            console.log(data);
            // var isi = data.isi_soal;
            // alert(isi);
            $('#babak_id').val(data.babak_id);
            $('#isi').text(data.isi_soal);
        })
        .fail(function(){
            alert("error");
        })
    }

    @if($errors->any())
        alert('Error')
    @endif

    function del_soal(e){
        post = $(e).attr('data-post');
        $('#formDelete').attr('action', post);
        $('#modalDelete').show();
    }
</script>
@endsection
