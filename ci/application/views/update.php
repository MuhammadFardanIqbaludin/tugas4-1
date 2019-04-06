<form method="POST">
	<input type="hidden" name="id" value="<?=$data->id?>">
	<div class="form-group">
	    <label>Nama Posyandu</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Posyandu" value="<?=$data->nama?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat Posyandu" value="<?=$data->alamat?>">
	</div>
	<button type="submit" class="btn btn-primary" name="submit" value="1!1">Simpan</button>
</form>