<?php 
include("../../phantrangfrontend/connect.php");

if (isset($_POST['them'])) {

  $tennl=$_POST['tennl'];
  $sluong=$_POST['sluong'];
  $dgia=$_POST['dgia'];
  $dvt=$_POST['dvt'];
  $ncc=$_POST['ncc'];
  $thanhtien = $sluong * $dgia;
  $idnv = 4;


   

  $sql="INSERT INTO donnhaphang(id_ncc, id_nvien, thanhtien) VALUES('$ncc', '$idnv', '$thanhtien')";
  $connect->query($sql);

  $sql1 = "SELECT id_donnhap FROM donnhaphang order by id_donnhap DESC limit 1";
  $ketqua1 = $connect->query($sql1);
  $kq1 = $ketqua1->fetch_assoc();
  $iddn = $kq1['id_donnhap'];
  
  $sql4="SELECT * FROM nguyenlieu WHERE (ten_nl LIKE '$tennl') ORDER BY id_nl DESC";
  $results=$connect->query($sql4);
	$kq4=$results->fetch_assoc();

  if(isset($kq4)) {
    $sl = $kq4['sl'] + $sluong;
    $idnglieu = $kq4['id_nl'];
    // $sql1="INSERT INTO nguyenlieu(ten_nl, dgia, dvt) VALUES('$tennl', '$dgia', '$dvt')";
		$sql5="UPDATE nguyenlieu SET sl = '$sl' WHERE id_nl = '$idnglieu'";
    $connect->query($sql5);
    $sql3="INSERT INTO chitietdonnhap(id_donnhap, id_nglieu, sluong, dgia, dvt) VALUES('$iddn', '$idnglieu', '$sluong', '$dgia', '$dvt')";
    $connect->query($sql3);
  } else {
    $sql6="INSERT INTO nguyenlieu(ten_nl, dvt, sl) VALUES('$tennl', '$dvt', '$sluong')";
    $connect->query($sql6);
    $sql2 = "SELECT id_nl FROM nguyenlieu order by id_nl DESC limit 1";
        $ketqua2 = $connect->query($sql2);
        $kq2 = $ketqua2->fetch_assoc();
        $idnl = $kq2['id_nl'];

    $sql3="INSERT INTO chitietdonnhap(id_donnhap, id_nglieu, sluong, dgia, dvt) VALUES('$iddn', '$idnl', '$sluong', '$dgia', '$dvt')";
    $connect->query($sql3);
  }
	 


    echo "<script>alert('Đã tạo đơn hàng mới.');
                history.back();
        </script>";
        }
?>