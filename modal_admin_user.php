<div class="modal fade" id="admin_<?php echo $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Appoint Admin</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Jadikan Karyawan ini Admin ?</p>
                <h2 class="text-center"><?php echo $row->nama; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button> &nbsp;
                <a href="admin_user.php?id_user=<?php echo $row->id_user; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Apply</a>
            </div>
        </div>
    </div>
</div>