<div class="modal fade" id="gantip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Ganti Password</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="ganti_pass.php">
				<input type="hidden" name="id_user" value="<?php echo $_SESSION["id"];  ?>">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Password Lama:</label>
					</div>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" required="">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Password Baru:</label>
					</div>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="passwordb" required="">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Konfirmasi Password Baru:</label>
					</div>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="passwordb2" required="">
					</div>
				</div>
				</div>
				</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                <button type="submit" name="gantip" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>