<?php
    include 'koneksi.php';
    
    $no = 1;
    $data = mysqli_query($kon,"SELECT nama_ayah, nama_ibu, a.alamat, b.nama as posyandu, c.nama as anak, tempat_lahir, tanggal_lahir FROM orang_tua a left join posyandu b on a.posyandu_id=b.id left join anak c on a.id=c.orang_tua_id");

    $arr = array();
	while ($d = mysqli_fetch_array($data)) {
	    $temp = array(
	    "nama_ayah"     => $d["nama_ayah"],
	    "nama_ibu"      => $d["nama_ibu"], 
        "alamat"        => $d["alamat"],
        "posyandu"      => $d["posyandu"],
        "nama_anak"     => $d["anak"],
        "tempat_lahir"  => $d["tempat_lahir"],
        "tanggal_lahir" => $d["tanggal_lahir"]
    );
        $arr[] = $temp;
	}
    
    if ($arr) {
        $data = json_encode(array("DATA POSYANDU" => $arr));
    } else {
        $data = json_encode(array("message" => "gagal"));
    }
	
	 
	echo $data;
?>