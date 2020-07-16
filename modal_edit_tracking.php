<div class="modal fade" id="edit_<?php echo $row->id_tracking; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit tracking</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_tracking.php">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">ID tracking</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="id_tracking" value="<?php echo $row->id_tracking; ?>" readonly>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">ID Pengiriman</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="id_tracking" value="<?php echo $row->id_pengiriman; ?>" readonly>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Keterangan</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="keterangan_pengiriman" value="<?php echo $row->keterangan_pengiriman; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Status Penerimaan</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="status_penerimaan" value="<?php echo $row->status_penerimaan; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Tanggal Penerimaan</label>
					</div>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="tanggal_penerimaan" value="<?php echo $row->tanggal_penerimaan; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>