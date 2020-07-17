<div class="modal" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalpengiriman" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="modalpengiriman">Tambah</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="tambah_pengiriman_all.php">

				<!-- pengiriman -->
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Tanggal Pengiriman</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="tanggal" value="<?php echo date('d / m / yy');?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Asal Pengiriman</label>
					</div>
					<div class="col-sm-8">
						<select name="kota_asal" class="form-control">
							<option value="" disabled selected>Pilih kota asal</option>
							<?php include 'daftarkota.php' ?>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Tujuan Pengiriman</label>
					</div>
					<div class="col-sm-8">
						<select name="kota_tujuan" class="form-control">
							<option value="" disabled selected>Pilih kota tujuan</option>
							<?php include 'daftarkota.php' ?>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nama Penerima</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nama_penerima">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Alamat Penerima</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="alamat_penerima">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nomor Telepon Penerima</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="nomor_telepon_penerima">
					</div>
				</div>

				<!-- customer -->
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nama Pengirim</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nama_pengirim">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Alamat Pengirim</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="alamat_pengirim">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nomor Telepon Pengirim</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="nomor_telepon_pengirim">
					</div>
				</div>


				<!-- Biaya -->
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Berat Barang</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="berat_barang">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Panjang Barang</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="panjang_barang">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Lebar Barang</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="lebar_barang">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Tinggi Barang</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="tinggi_barang">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Jenis Layanan</label>
					</div>
					<div class="col-sm-8">
						<select name="jenis_layanan">
							<option value="reguler">Reguler</option>
							<option value="express">Express</option>
						</select>
						<!-- <input type="text" class="form-control" name="jenis_layanan"> -->
					</div>
				</div>
				<!-- Tracking -->
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Keterangan Pengiriman</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="keterangan_pengiriman">
					</div>
				</div>

				<!-- Pembayaran -->
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Metode Pembayaran</label>
					</div>
					<div class="col-sm-8">
						<select name="metode_pembayaran">
							<option value="reguler">Cash</option>
							<option value="express">Cashless</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Status Pembayaran</label>
					</div>
					<div class="col-sm-8">
						<select name="status_pembayaran">
							<option value="reguler">Reguler</option>
							<option value="express">Express</option>
						</select>
					</div>
				</div>

			
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                <button type="submit" name="tambahbaru" class="btn btn-outline-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
            </form>
            </div>
        </div>
    </div>
</div>