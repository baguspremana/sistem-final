<header class="section-header">
	<h3>Soal {{$babak_name->name}}</h3>
</header>		

<div class="row">
	{{ csrf_field() }}

	@foreach($data as $key => $s)
	@if($s->view==0)
	<div class="col-md-1" style="padding-top: 20px;">
		<button id="buttonSoal{{$s->id}}" class="show-soal btn btn-primary btn-lg" data-id="{{$s->id}}" data-isi="{{$s->isi_soal}}" data-view="{{$s->view}}" data-key={{$key+1}}>{{$key+1}}</button>
	</div>
	@elseif($s->view==1)
	<div class="col-md-1" style="padding-top: 20px;">
		<button id="buttonSoal{{$s->id}}" class="show-soal btn btn-danger btn-lg" data-id="{{$s->id}}" data-isi="{{$s->isi_soal}}" data-view="{{$s->view}}" data-key={{$key+1}} disabled="true">{{$key+1}}</button>
	</div>
	@endif
	@endforeach
</div>

{{-- <div class="modal fade" id="showModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}