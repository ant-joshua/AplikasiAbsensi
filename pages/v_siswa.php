    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>nis</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th colspan="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query ="SELECT * FROM siswa INNER JOIN jurusan ON siswa.kd_jurusan = jurusan.kd_jurusan";
                                    foreach($conn->show_data($query) as $row)
                                    {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['nis'];?></td>
                                            <td><?php echo $row['nama_siswa'];?></td>
                                            <td><?php echo $row['tgl_lahir'];?></td>
                                            <td><?php echo $row['kelas'];?></td>
                                            <td><?php echo $row['nama_jurusan'];?></td>
                                            <td>
                                                <a href="?page=edit&id=<?php echo $row['nis']; ?>">Edit |
                                                <a href="?page=hapus&id=<?php echo $row['nis']; ?>">Hapus
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


