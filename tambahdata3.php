<?php
include 'dbconnect.php';
// include 'cek.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tabel Data Karywan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <style type="text/css">
        table, td, th {
          border: 1px solid black;
      }

      table {
          border-collapse: collapse;
          width: 100%;
      }

      td, tr {
          text-align: center;
      }
  </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index3.html">Data Overtime</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <br>
                        <a class="nav-link" href="index3.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Form
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="tambahdata3.php">Tambah Data Karyawan</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    HR/GA
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tabel Data Karyawan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index3.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
                    <div class="card mb-4">
                        <form method="post" enctype="multipart/form-data" action="proses_upload3.php">
                            Pilih File:
                            <input class="form-control" name="fileexcel" type="file" required="required">
                            <br>
                            <button class="btn btn-sm btn-info" style="margin-left:10px;" type="submit">Submit</button>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 1px;">No</th>
                                            <th>NPK</th>
                                            <th>Nama Karywan</th>
                                            <th>Departemen</th>
                                            <th>Section</th>
                                            <th>Instansi</th>
                                            <th>Tanggal</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Mulai Istirahat 1</th>
                                            <th>Selesai Istirahat 1</th>
                                            <th>Mulai Istirahat 2</th>
                                            <th>Selesai Istirahat 2</th>
                                            <th>Jam Lembur</th>
                                            <th>Hari Libur/Kerja</th>
                                            <th>Total Tuul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ovt = mysqli_query($conn,"SELECT * FROM dataovt order by nama ASC");
                                        $i = 1;
                                        while($o=mysqli_fetch_array($ovt)){
                                            $id =$o['id'];
                                            $npk = $o['npk'];
                                            $nama = $o['nama'];
                                            $dept = $o['dept'];
                                            $section = $o['section'];
                                            $instansi = $o['instansi'];
                                            $tgl = $o['tgl'];
                                            $jam_mulai = $o['jam_mulai'];
                                            $jam_selesai = $o['jam_selesai'];
                                            $m_istirahat_a = $o['m_istirahat_a'];
                                            $s_istirahat_a = $o['s_istirahat_a'];
                                            $m_istirahat_b = $o['m_istirahat_b'];
                                            $s_istirahat_b = $o['s_istirahat_b'];
                                            $jam_lembur = $o['jam_lembur'];
                                            $hari_lk = $o['hari_lk'];
                                            $total_tuul = $o['total_tuul'];

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$npk;?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$dept;?></td>
                                                <td><?=$section;?></td>
                                                <td><?=$instansi;?></td>
                                                <td><?=$tgl;?></td>
                                                <td><?=$jam_mulai;?></td>
                                                <td><?=$jam_selesai;?></td>
                                                <td><?=$m_istirahat_a;?></td>
                                                <td><?=$s_istirahat_a;?></td>
                                                <td><?=$m_istirahat_b;?></td>
                                                <td><?=$s_istirahat_b;?></td>
                                                <td><?=$jam_lembur;?></td>
                                                <td><?=$hari_lk;?></td>
                                                <td><?=$total_tuul;?></td>

                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?= $id; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="post">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Data Karyawan Dengan Nama <?php echo $o['nama'] ?> - <?php echo $o['npk'] ?> - <?php echo $o['dept'] ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">

                                                                    <label for="npk">NPK Karyawan</label>
                                                                    <input type="text" id="npk" name="npk" class="form-control" value="<?php echo $o['npk'] ?>">

                                                                    <label for="nama">Nama Karyawan</label>
                                                                    <input type="text" id="name" name="nama" class="form-control" value="<?php echo $o['nama'] ?>">

                                                                    <label for="dept">Departemen</label>
                                                                    <input type="text" id="dept" name="dept" class="form-control" value="<?php echo $o['dept'] ?>">

                                                                    
                                                                    <label for="section">Section</label>
                                                                    <input type="text" id="section" name="section" class="form-control" value="<?php echo $o['section'] ?>">

                                                                    <label for="instansi">Instansi</label>
                                                                    <input type="text" id="instansi" name="instansi" class="form-control" value="<?php echo $o['instansi'] ?>">

                                                                    <label for="tgl">Tanggal</label>
                                                                    <input type="date" id="tgl" name="tgl" class="form-control" value="<?php echo $o['tgl'] ?>">

                                                                    <label for="jam_mulai">Jam Mulai</label>
                                                                    <input type="time" id="jam_mulai" name="jam_mulai" class="form-control" value="<?php echo $o['jam_mulai'] ?>">

                                                                    <label for="jam_selesai">Jam Selesai</label>
                                                                    <input type="time" id="jam_selesai" name="jam_selesai" class="form-control" value="<?php echo $o['jam_selesai'] ?>">

                                                                    <label for="m_istirahat_a">Mulai Istirahat Pertama</label>
                                                                    <input type="time" id="m_istirahat_a" name="m_istirahat_a" class="form-control" value="<?php echo $o['m_istirahat_a'] ?>">

                                                                    <label for="s_istirahat_a">Selesai Istirahat Pertama</label>
                                                                    <input type="time" id="s_istirahat_a" name="s_istirahat_a" class="form-control" value="<?php echo $o['s_istirahat_a'] ?>">

                                                                    <label for="m_istirahat_b">Mulai Istirahat Kedua</label>
                                                                    <input type="time" id="m_istirahat_b" name="m_istirahat_b" class="form-control" value="<?php echo $o['m_istirahat_b'] ?>">

                                                                    <label for="s_istirahat_b">Selesai Istirahat Kedua</label>
                                                                    <input type="time" id="s_istirahat_b" name="s_istirahat_b" class="form-control" value="<?php echo $o['s_istirahat_b'] ?>">

                                                                    <label for="jam_lembur">Jam Lembur</label>
                                                                    <input type="text" id="jam_lembur" name="jam_lembur" class="form-control" value="<?php echo $o['jam_lembur'] ?>">

                                                                    <label for="hari_lk">Hari Libur/Kerja</label>
                                                                    <input type="text" id="hari_lk" name="hari_lk" class="form-control" value="<?php echo $o['hari_lk'] ?>">

                                                                    <label for="total_jam">Total Jam</label>
                                                                    <input type="text" id="total_jam" name="total_jam" class="form-control" value="<?php echo $o['total_jam'] ?>">
                                                                    <input type="hidden" name="id" value="<?= $id; ?>">


                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" name="update">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- The Modal -->
                                                <div class="modal fade" id="del<?= $id; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="post">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Hapus Data : <?php echo $o['nama'] ?> - <?php echo $o['npk'] ?> - <?php echo $o['dept'] ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    Apakah Anda Yakin Ingin Menghapus Data Karyawan Ini Dari Daftar ?
                                                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                                <?php
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

    <!-- modal input -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Input Data Karyawan</h4>
                </div>
                <div class="modal-body">
                    <form action="tambah_act2.php" method="post">
                        <div class="form-group">
                            <label>NPK</label>
                            <input name="npk" type="text" class="form-control" placeholder="NPK" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input name="nama" type="text" class="form-control" placeholder="Nama Karyawan">
                        </div>
                        <div class="form-group">
                            <label>Departemen</label>
                            <input name="dept" type="text" class="form-control" placeholder="Departemen">
                        </div>
                        <div class="form-group">
                        <label>Section</label>
                        <input name="sct" type="text" class="form-control" placeholder="Section">
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input name="instansi" type="text" class="form-control" placeholder="Instansi">
                    </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input name="tgl" type="date" class="form-control" placeholder="Tanggal">
                        </div>
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <input name="jam_mulai" type="time" min="0" class="form-control" placeholder="Jam Mulai">
                        </div>
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <input name="jam_selesai" type="time" class="form-control" placeholder="Jam Selesai">
                        </div>
                        <div class="form-group">
                            <label>Mulai Istirahat 1</label>
                            <input name="m_istirahat_a" type="time" class="form-control" placeholder="Mulai Istirahat 1">
                        </div>
                        <div class="form-group">
                            <label>Selesai Istirahat 1</label>
                            <input name="s_istirahat_a" type="time" min="0" class="form-control" placeholder="Selesai Istirahat 1">
                        </div>
                        <div class="form-group">
                            <label>Mulai Istirahat 2</label>
                            <input name="m_istirahat_b" type="time" class="form-control" placeholder="Mulai Istirahat 2">
                        </div>
                        <div class="form-group">
                            <label>Selesai Istirahat 2</label>
                            <input name="s_istirahat_b" type="time" class="form-control" placeholder="Selesai Istirahat 2">
                        </div>
                        <div class="form-group">
                            <label>Jam Lembur</label>
                            <input name="jam_lembur" type="text" min="0" class="form-control" placeholder="Jam Lembur">
                        </div>
                        <div class="form-group">
                            <label>Hari Libur/Kerja</label>
                            <input name="hari_lk" type="text" class="form-control" placeholder="Hari Libur / Kerja">
                        </div>
                        <div class="form-group">
                            <label>Total Tuul</label>
                            <input name="total_tuul" type="text" class="form-control" placeholder="Total Tuul">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </html>