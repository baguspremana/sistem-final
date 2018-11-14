@extends('layout.template')

@section('title')
	Soal {{$babak->name}}
@endsection

@section('navbar')
<li><a href="/">Beranda</a></li>
@foreach($babaks as $b)
	<li><a href="{{ route('babak', $b->slug) }}">Soal {{$b->name}}</a></li>
@endforeach
@endsection

@section('content')
<div id="bg-login">
	<div class="container">
		
		<div class="row" style="margin-top: 150px;">
			<div class="col-md-12">
				<h2 style="color: white; text-align: center;">Soal {{$babak->name}}</h2>
			</div>
		</div>

		<div class="row" id="tableSoal" style="visibility: hidden;">
			{{ csrf_field() }}

			@foreach($soal as $key => $s)
			@if($s->view==0)
			<div class="col-md-1" style="padding-top: 20px;">
				<button id="buttonSoal{{$s->id}}" class="show-soal btn btn-light btn-lg" data-id="{{$s->id}}" data-isi="{{$s->isi_soal}}" data-view="{{$s->view}}" data-key={{$key+1}}>{{$key+1}}</button>
			</div>
			@elseif($s->view==1)
			<div class="col-md-1" style="padding-top: 20px;">
				<button id="buttonSoal{{$s->id}}" class="show-soal btn btn-danger btn-lg" data-id="{{$s->id}}" data-isi="{{$s->isi_soal}}" data-view="{{$s->view}}" data-key={{$key+1}} disabled="true">{{$key+1}}</button>
			</div>
			@endif
			@endforeach

		</div>

		<div class="modal fade" id="showModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
				    <div class="modal-header">
				        <h4 class="modal-title" id="nomor_soal"></h4>
				        <form>
				        	<input type="hidden" name="id_soal" id="id_soal">
				        	<input type="hidden" name="view" id="view_edit" value="{{1}}">
				        </form>
				        	<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          		<span aria-hidden="true">&times;</span>
				        	</button> -->
				    </div>
				    <div class="modal-body">
				       	<p style="padding-left: 30px;" id="isi_soal"></p>
				       	<!-- <textarea id="isi_soal" class="form-control"></textarea> -->
				    </div>
				    <div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px; padding-right: 10px;">
				        	<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i></button> -->
				        <button type="button" class="edit btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
				    </div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(window).on('load', function(){
		$('#tableSoal').removeAttr('style');
	});
</script>
<script type="text/javascript">
	$(document).on('click', '.show-soal', function(){
		$('.modal-title').text('No. ' +$(this).data('key') );
		$('#id_soal').val($(this).data('id'));
		$('#isi_soal').text($(this).data('isi'));
		id = $('#id_soal').val();
		$('#showModal').modal('show');
	});
	$('.modal-footer').on('click', '.edit', function(){
		$.ajax({
			type: 'put',
			url: 'soal/' + id,
			data: {
				'_token': $('input[name=_token]').val(),
				'id': $("#id_soal").val(),
				'view': $("#view_edit").val()
			},
			success: function(data) {
				// alert(item);
				// $('.item' + data.id).replaceWith("<div class='item col-md-1' style='padding-top: 20px;'><button class='show-soal btn btn-danger btn-lg' disabled>" + data.key+1 + "</button></div>");
				// $(this).removeClass("btn-light").addClass("btn-danger");
				// var id = $("#buttonSoal" + data.id).attr('id');
				// alert(id);

				$("#buttonSoal" + data.id).removeClass("btn-light").addClass("btn-danger");
				$("#buttonSoal" + data.id).attr('disabled', true);
			}
		});
	});
</script>
@endsection