@extends('layout.template')

@section('title')
	Final LCC - ITCC 2018
@endsection

@section('navbar')
@foreach($babak as $b)
	<!-- <li><a href="{{ route('babak', $b->slug) }}">Soal {{$b->name}}</a></li> -->
	<li><a href="#soal-wajib" at="{{$b->id}}" id="babak{{$b->id}}">Soal {{$b->name}}</a></li>
@endforeach
@endsection

@section('intro')
<section id="hero">
    <div class="hero-container wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      	<h1>Final Cabang Lomba Cerdas Cermat ITCC 2018</h1>
      	<h2>Cerdas, Cepat, Tepat</h2>
      	<!-- <div class="actions">
      		<a href="#profile" class="btn-detail">Selengkapnya</a>
      		<a href="/daftar/cerdascermat" class="btn-daftar">Yuk Daftar!</a>
      	</div> -->
    </div>
</section><!-- #hero -->
@endsection

@section('content')
<div id="soal-wajib" class="wow fadeIn" style="padding-top: 150px; padding-bottom: 410px;">
	<div class="container">

		<div id="tampilSoal">
			
		</div>

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
@endsection

@section('scripts')
	@include('ourJs')
@endsection