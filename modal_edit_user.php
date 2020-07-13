<div class="modal fade" id="editu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Profil</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
				<?php 
                $tbuser = simplexml_load_file('data/tbuser.xml');
                for($i = 0; $i < count($tbuser); $i++){
                  $id = (string)$tbuser->user[$i]->id_user;
                  if ($id == $_SESSION["id"]) {?>
			<form method="POST" action="edit_user.php">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Username:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="username" value="<?php echo (string)$tbuser->user[$i]->username; ?>" readonly>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nama:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nama" value="<?php echo (string)$tbuser->user[$i]->nama; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Alamat:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="alamat" value="<?php echo (string)$tbuser->user[$i]->alamat; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Email:</label>
					</div>
					<div class="col-sm-8">
						<input type="email" class="form-control" name="email" value="<?php echo (string)$tbuser->user[$i]->email; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nomor Telepon:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nomor_telepon" value="<?php echo (string)$tbuser->user[$i]->nomor_telepon; ?>">
					</div>
				</div>
            </div> 
			</div>
			<?php }
                }

                ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>