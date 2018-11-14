<script type="text/javascript">
	$(document).ready(function(){
		// alert('Hello');
		@foreach(App\Babak::all() as $b)
		$("#babak{{$b->id}}").click(function(){
			var babak = '';
			babak = $("#babak{{$b->id}}").attr('at');
			// alert(babak);

			$.ajax({
				type: 'get',
				dataType: 'html',
				url: '{{url('/soal')}}',
				data: 'babak_id=' + babak,
				success:function(response){
					// console.log(response);
					$("#tampilSoal").html(response);
				}
			});
		});
		@endforeach
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
		// alert('Hello');
		$.ajax({
			type: 'PUT',
			url: 'soal/' + id,
			data: {
				'_token': $('input[name=_token]').val(),
				'id': $("#id_soal").val(),
				'view': $('#view_edit').val()
			},
			success: function(data){
				// $('.item' + data.id).replaceWith("<div class='item col-md-1' style='padding-top: 20px;'><button class='show-soal btn btn-light btn-lg' data-id="+ data.id + "'data-isi='" + data.isi + " 'data-view='" + data.view + " 'data-key='" + data.key+1 + "'disabled>'" + data.key+1 +"'</button></div>'");
				$("#buttonSoal" + data.id).removeClass("btn-light").addClass("btn-danger");
				$("#buttonSoal" + data.id).attr('disabled', true);
			}
		})
	});
</script>