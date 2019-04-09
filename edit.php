<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('datamhs.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('datamhs.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["nim"] = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $post["nama"] = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $post["fakultas"] = isset($_POST["fakultas"]) ? $_POST["fakultas"] : "";
    $post["progdi"] = isset($_POST["progdi"]) ? $_POST["progdi"] : "";



    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("datamhs.json", json_encode($all));
    }
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="tutorial-boostrap-merubaha-warna">
	<title>Edit Data Mahasiswa</title>
	<style>
		* {
            box-sizing: border-box;
        }
	
		body{
			text-align: center;
			background-image: url("image.jpg");
		}
		
		h1 {
			text-align: center;
			font-family: algerian;
		}
		
		input[type=text] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}
		
		input[type=text]:focus {
            background-color: lightblue;
            border: 3px solid #555;
        }
		
		.ubah {
			width: 10%;
			background-color: #ff0000;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			float: left;
		}

		.ubah :hover {
			background-color: #45a049;
		}
		
		.kembali {
			width: 10%;
			background-color: #ff0000;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			float: right;
		}

		.kembali :hover {
			background-color: #45a049;
		}

		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			float : left;
		}
		
		.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 40px;
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
	</style>
</head>
<body>

<div class="container">
	<h1><b> Edit Data </b></h1>
	&nbsp;
    <?php if (isset($_GET["id"])): ?>
		<form method="POST" action="edit.php">
			<input type="hidden" value="<?php echo $id ?>" name="id"/>
			<div class="row">
				<div class="col-25">
					<label for="nim"><b> NIM </b></label>
				</div>
				<div class="col-75">
					<input type="text" class="form-control" required="required" id="nim" value="<?php echo $jsonfile["nim"] ?>" name="nim" placeholder="nim">
				</div>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label for="nama"><b> NAMA </b></label>
				</div>
				<div class="col-75">
					<input type="text" class="form-control" required="required" id="nama" value="<?php echo $jsonfile["nama"] ?>" name="nama" placeholder="nama lengkap">
				</div>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label for="fakultas"><b> FAKULTAS </b></label>
				</div>
				<div class="col-75">
					<input type="text" required="required" class="form-control" id="fakultas" value="<?php echo $jsonfile["fakultas"] ?>" name="fakultas" placeholder="fakultas">
				</div>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label for="progdi"><b> PROGDI </b></label>
				</div>
				<div class="col-75">
					<input type="text" required="required" class="form-control" id="progdi" value="<?php echo $jsonfile["progdi"] ?>" name="progdi" placeholder="program studi">
				</div>
			</div>
    
			<div class="form-actions">
				<input type="submit" class="ubah" name="Edit" value="Edit"/>
				<input type="submit" class="kembali" href="index.php" name="Back" value="Back"/>
			</div>
		</form>
		<?php endif; ?>
</div>

</body>
</html>
