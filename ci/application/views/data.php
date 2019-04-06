<div class="row">
	<div class="col">
		<a href="<?=base_url('home/add')?>" class="btn btn-primary">Tambah</a>	
	</div>
</div>
<div class="row">
	<div class="col">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($data as $dt) { ?>
				<tr>
					<td scope="row"><?=$dt->id?></td>
					<td><?=$dt->nama?></td>
					<td><?=$dt->alamat?></td>
					<td>
						<a href="<?=base_url("home/edit/$dt->id")?>" class="btn btn-warning" >Edit</a>
						<a href="<?=base_url("home/delete/$dt->id")?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
</div>