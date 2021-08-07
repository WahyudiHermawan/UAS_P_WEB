<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $judul; ?> berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo  "<div class='alert alert-danger p-0 pt-2' role='alert'>" . session()->get('err') . "</div>";
                session()->remove('err');
            }
            ?>
        </div>
    </div>

    <div class=card>
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah Data</i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Kode</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelayanan->getResultArray() as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['keterangan']; ?></td>
                            <td><?= $row['kode']; ?></td>
                            
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit-pelayanan" class="btn btn-sm btn-warning" data-id="<?= $row['id']; ?>" data-nama="<?= $row['nama']; ?>" data-keterangan="<?= $row['keterangan']; ?>" data-kode="<?= $row['kode']; ?>"><i class="fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal Box Tambah Data -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelayanan/tambah'); ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="nama"></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama pelayanan">
                    </div>
                    <div class="form-group mb-0">
                        <label for="keterangan"></label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan keterangan">
                    </div>
                    <div class="form-group mb-0">
                        <label for="kode"></label>
                        <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukan kode">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Box Ubah Data -->
<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelayanan/ubah'); ?>" method="post">
                    <input type="hidden" name="id" id="id-pelayanan">
                    <div class="form-group mb-0">
                        <label for="nama"></label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama pelayanan]" value="<?= $row['nama']; ?>">
                    </div>
                    <div class="form-group mb-0">
                        <label for="keterangan"></label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan keterangan" value="<?= $row['keterangan']; ?>">
                    </div>
                    <div class="form-group mb-0">
                        <label for="pelayanan"></label>
                        <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukan kode" value="<?= $row['kode']; ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Box Hapus Data -->
<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apkah anda yakin ingin menghapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/pelayanan/hapus/<?= $row['id']; ?>" class="btn btn-primary">Yakin</a>
            </div>
            </form>
        </div>
    </div>
</div>