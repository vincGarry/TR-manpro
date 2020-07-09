<div class="modal fade" id="hapus_<?php echo $row->id_pengiriman; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Hapus pengiriman</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Hapus pengirimane</p>
				<h2 class="text-center"><?php echo $row->nama; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                <a href="delete_pengiriman.php?id_pengiriman=<?php echo $row->id_pengiriman; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </div>
        </div>
    </div>
</div>