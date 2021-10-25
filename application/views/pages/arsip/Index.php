    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Arsip Surat</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body p-0">
                                    <form method="POST">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" placeholder="cari" class="form-control"
                                                value="<?= $searchVal ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                    <span>Cari</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <table class="table table-sm table-bordered table-hover" id="arsipTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Arsip</th>
                                            <th style="width:25%;">Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                              foreach ($dataSurat as $data) : ?>
                                            <tr id="<?= $data->id; ?>">
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->nomor_surat ?></td>
                                                <td><?= $data->kategori ?></td>
                                                <td><?= $data->judul ?></td>
                                                <td><?= $data->waktu ?></td>
                                                <td>
                                                    <a href="#modalDelete" data-toggle="modal"
                                                        onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('menu/delete/' . $data->id) ?>')"
                                                        class='btn btn-danger btn-circle btn-sm'>
                                                        <i class="fa fa-trash" aria-hidden="true"></i><span>Hapus</span>
                                                    </a>

                                                    <a href="<?= base_url("menu/download/" . $data->id) ?>"
                                                        class="btn btn-warning download btn-sm">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                        <span>Unduh</span>
                                                    </a>
                                                    <a href="<?= base_url("menu/detail/$data->id"); ?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                        <span>Lihat</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <a href="<?= base_url("menu/add") ?>" class="btn btn-primary">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        &nbsp;&nbsp;
                                        <span>Arsipkan Surat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <form id="formDelete" action="" method="post">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>