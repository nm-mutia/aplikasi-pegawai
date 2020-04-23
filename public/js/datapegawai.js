$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$('#pegawai-table').DataTable({
    ajax: '/pegawai',
    columns: [
        {data: 'id', name: 'id'},
        {data: 'nama', name: 'necktag'},
        {data: 'jenis_kelamin', name: 'pemilik_id'},
        {data: 'departemen', name: 'ras_id'},
        {data: 'level', name: 'kematian_id'},
        {data: 'agama', name: 'jenis_kelamin'},
        {data: 'kontak', name: 'tgl_lahir'},
        {data: 'email', name: 'bobot_lahir'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
});

$('#tambah_data').click(function(){
	$('.modal-title').text('Tambah Data Pegawai');

	$('#action_button').val('Tambah');
	$('#action').val('Add');
	$('#action_button').addClass('btn-success');
	$('#action_button').removeClass('btn-warning');

	$('#form_result').html('');
    $('#tambah_data_form')[0].reset();
});

$('#tambah_data_form').on('submit', function(event){
	event.preventDefault();
	var action_url = '';
	var method_form = '';

	//tambah
	if($('#action').val() == 'Add'){
		action_url = "/pegawai";
		method_form = "POST";
	}

	//edit
	if($('#action').val() == 'Edit'){
		var updateId = $('#hidden_id').val();
		action_url = "/pegawai/"+updateId;
		method_form = "PUT";
	}

	$.ajax({
		url: action_url,
		method: method_form,
		data: $(this).serialize(),
		datatype: "json",
		success: function(data){
			var html = '';
			if (data.errors) {
				html = '<div class="alert alert-danger">';
				html += '<button class="close" type="button" data-dismiss="alert" aria-label="Close">×</button>';
				for (var count = 0; count < data.errors.length; count++) {
					html += '<p>' + data.errors[count] + '</p>';
				}
				html += '</div>';
			}
			if (data.success) {
				html = '<div class="alert alert-success">' + data.success;
				html += '<button class="close" type="button" data-dismiss="alert" aria-label="Close">×</button>';
				html += '</div>';
				$('#tambah_data_form')[0].reset();
				$('#pegawai-table').DataTable().ajax.reload();
			}
			$('#form_result').html(html);
		},
		error: function (jqXHR, textStatus, errorThrown) { 
			console.log(jqXHR); 
		}
	});
});

//view
$(document).on('click', '.view', function(){
	var id = $(this).attr('id');
	$.ajax({
		url: "/pegawai/"+id, //show
		datatype: "json",
		success: function(data){
			$('#vnama').val(data.result.nama);
            $('#vjenis_kelamin').val(data.result.jenis_kelamin);
			$('#vdepartemen').val(data.result.departemen);
			$('#vlevel').val(data.result.level);
			$('#vagama').val(data.result.agama);
			$('#vkontak').val(data.result.kontak);
			$('#vemail').val(data.result.email);
			$('#vcreated_at').val(data.result.created_at);
			$('#vupdated_at').val(data.result.updated_at);

			$('.modal-title').text('Data Pegawai - '+id);
		},
        error: function (jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR); 
        }
	});
});

//edit
$(document).on('click', '.edit', function(){
	var id = $(this).attr('id');
	$('#form_result').html('');
	$.ajax({
		url: "/pegawai/"+id+"/edit",
		datatype: "json",
		success: function(data){
			$('#nama').val(data.result.nama);
			$('#jenis_kelamin').val(data.result.jenis_kelamin);
			$('#departemen').val(data.result.departemen);
			$('#level').val(data.result.level);
			$('#agama').val(data.result.agama);
			$('#kontak').val(data.result.kontak);
			$('#email').val(data.result.email);
			
			$('#hidden_id').val(id);

	    	$('#action').val('Edit');
			$('#action_button').val('Ubah');
			$('#action_button').addClass('btn-warning');
			$('#action_button').removeClass('btn-success');
			$('.modal-title').text('Edit Data - Pegawai');

	    	// $('#formModal').modal('show');
		}
	});
});

//delete
$(document).on('click', '.delete', function(){
	var pgw_id = $(this).attr('id');

	console.log(pgw_id);
	
    swal({
        title: "Anda yakin ingin menghapus data pegawai ini?",
        text: "Data tidak dapat dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        closeOnConfirm: false
    }, function(){
        $.ajax({
            url:"/pegawai/"+pgw_id,
            method: "DELETE",
            success: function(data){
                $('#pegawai-table').DataTable().ajax.reload();
                swal("Terhapus!", "Data pegawai id "+pgw_id+" telah terhapus.", "success");
            },
            error : function(data){
                swal({
                    title: 'Opps...',
                    text : data.message,
                    type : 'error',
                    timer : '1500'
                })
            }
        });
    });

});