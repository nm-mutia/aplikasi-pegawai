@extends('layouts.app')

@push('link')
	<link href="{{ asset('/template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/sweetalert/sweetalert.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
</div>

<!-- table -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
  		<h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>
    </div>
    <div class="card-body">
    	<button class="btn btn-success" id="tambah_data" data-toggle="modal" data-target="#formModal">Tambah Data</button>
    	<br>
    	<br>
  		<div class="table-responsive">
	        <table class="table table-bordered" id="pegawai-table" width="100%" cellspacing="0">
                <thead>
                	<th>ID</th>
                	<th>Nama</th>
                	<th>Jenis Kelamin</th>
                	<th>Departemen</th>
                	<th>Level</th>
                	<th>Agama</th>
                	<th>Kontak</th>
                	<th>Email</th>
                	<th>Aksi</th>
                </thead>
                
            </table>
     	</div>
     </div>
 </div>

<!-- form modal tambah dan edit data -->
<div id="formModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data - Pegawai</h5>
          		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
            		<span aria-hidden="true">×</span>
          		</button>
			</div>
			<div class="modal-body">
				<span id="form_result"></span>
				<form method="post" id="tambah_data_form">
					@csrf

					<div class="form-group">
						<label class="control-label">Nama</label>
						<div class="form-line">
							<input type="text" name="nama" id="nama" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Jenis Kelamin</label>
						<div class="form-line">
							<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" class="form-control">
								<option value="Laki - Laki">Laki - Laki</option>
							    <option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Departemen</label>
						<div class="form-line">
							<input type="text" name="departemen" id="departemen" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Level</label>
						<div class="form-line">
							<input type="text" name="level" id="level" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Agama</label>
						<div class="form-line">
							<input type="text" name="agama" id="agama" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Kontak</label>
						<div class="form-line">
							<input type="text" name="kontak" id="kontak" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">E-mail</label>
						<div class="form-line">
							<input type="text" name="email" id="email" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group" align="center">
						<input type="hidden" name="action" id="action" value="Add">
						<input type="hidden" name="hidden_id" id="hidden_id">
						<input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="{{ asset('/template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('/js/datapegawai.js') }}"></script>
@endpush