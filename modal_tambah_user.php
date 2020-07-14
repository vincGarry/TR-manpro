<div class="modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center><h4 class="modal-title" id="myModalLabel">Buat Akun Karyawan</h4></center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="tambah_user.php">
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:7px;">Username:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="username" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:7px;">Password:</label>
							</div>
							<div class="col-sm-8">
								<input type="Password" class="form-control" name="password" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:7px;">Nama:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:7px;">Alamat:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="alamat" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:7px;">Email:</label>
							</div>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" required="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:7px;">Nomor Telepon:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nomor_telepon" required="">
							</div>
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> batal</button>
					<button type="submit" name="tambahbaru" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
