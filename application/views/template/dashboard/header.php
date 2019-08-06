
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=strtoupper($pengaturan['nama_web']) ?> - <?=$judul ?></title>
  <link rel="shortcut icon" href="<?=base_url('assets/admin/img/').$pengaturan['icon'] ?>">

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/admin/vendor') ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/admin/css') ?>/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/admin/vendor') ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script type="text/javascript">
    function startTime()
    {
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    // add a zero in front of numbers<10
    h=checkTime(h);
    m=checkTime(m);
    s=checkTime(s);
    document.getElementById('txt').innerHTML=h+":"+m+":"+s;
    t=setTimeout('startTime()',500);
    }
    function checkTime(i)
    {
    if (i<10)
    {
    i="0" + i;
    }
    return i;
    }
  </script>

</head>