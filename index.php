<?php 
    if ( !empty($_POST)) { 
        // post values
        $nim		= $_POST['nim'];
        $nama		= $_POST['nama'];
        $fakultas	= $_POST['fakultas'];
        $progdi		= $_POST['progdi'];
      
		$file = file_get_contents('datamhs.json');
		$data = json_decode($file, true);
		unset($_POST["add"]);
		$data["records"] = array_values($data["records"]);
		array_push($data["records"], $_POST);
		file_put_contents("datamhs.json", json_encode($data));
    }
?>

<?php
$getfile = file_get_contents('datamhs.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Project Description" />
    <meta name="keywords" content="Project Keywords" />
	<title>DATA MAHASISWA</title>
	<style>
	    * {
            box-sizing: border-box;
        }
	
		body{
			text-align: center;
			background-image: url("image.jpg");
		}
		
		input[type=text] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			float: left;
		}
		
		.container {
			border-radius: 5px;
			background-color: #00BFFF;
			padding: 20px;
		}

		.col-25 {
			float: left;
			width: 25%;
			margin-top: 3px;
		}

		.col-75 {
			float: left;
			width: 75%;
			margin-top: 3px;
		}
		
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
		
		@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
		}
		
		input[type=text]:focus {
            background-color: lightblue;
            border: 3px solid #555;
        }
		
		h1, h2 {
			text-align: center;
			font-family: algerian;
		}
	
		table {
			border-collapse: collapse;
			width: 100%;
		}

		td {
			text-align: center;
			padding: 8px;
			background-color: #f2f2f2
		}

		th {
			text-align: center;
			padding: 8px;
			background-color: #90EE90;
			color: white;
		}
		
		input[type=submit] {
			width: 10%;
			background-color: #ff0000;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}
		
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>

<!-- Input Data -->
<div class="container">
	<h1><b> Input  Data </b></h1>
	<form method="POST" action="">
		<div class="row">
			<div class="col-25">
				<label for="nim"><b>NIM </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="nim" name="nim" placeholder="nim">
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="nama"><b> NAMA </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="nama" name="nama" placeholder="nama lengkap">
			</div>
		</div>
	
		<div class="row">
			<div class="col-25">
				<label for="fakultas"><b> FAKULTAS </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="fakultas" name="fakultas" placeholder="fakultas">
			</div>
		</div>
	
		<div class="row">
			<div class="col-25">
				<label for="progdi"><b> PROGDI </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="progdi" name="progdi" placeholder="program studi">
			</div>
		</div>		
	
		<input type="submit" name="Simpan" value="Simpan"/>	
	</form>
</div>

&nbsp;

<!-- Tampil -->
<div class="container">
<h2><b> Tampilan  Data </b></h2>
	<table>
		<tr>
			<th>No.</th>
			<th>NIM</th>
			<th>Name</th>
			<th>Fakultas</th>
			<th>Progdi</th>
			<th>Action</th>
		</tr>		
				
		<?php $no=0;foreach ($jsonfile->records as $index => $obj): $no++;  ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $obj->nim; ?></td>
				<td><?php echo $obj->nama; ?></td>
				<td><?php echo $obj->fakultas; ?></td>
				<td><?php echo $obj->progdi; ?></td>
				<td>
					<a class="btn btn-xs btn-primary" href="edit.php?id=<?php echo $index; ?>">Edit</a>
					<a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $index; ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<br/>
    &nbsp;
<br/>

</body>
</html>
