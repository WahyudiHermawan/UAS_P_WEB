<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class=card>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-a">
                        Menu Antrian
                    </div>
                    <?php foreach ($pelayanan->getResultArray() as $row) : ?>
                        <div class="col-b">
                            <a role="button" href="/ambil/noantrian/<?= $row['id']; ?>"> <?= $row['nama']; ?></a>
                        </div>
                    <?php endforeach; ?>



                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->