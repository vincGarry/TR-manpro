<div class="modal fade" id="lunas_<?php echo $row->id_pembayaran; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Lunas</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Apakah Transaksi ini lunas ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button> &nbsp;
                <a href="lunas.php?id_pembayaran=<?php echo $row->id_pembayaran; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Ya</a>
            </div>
        </div>
    </div>
</div>