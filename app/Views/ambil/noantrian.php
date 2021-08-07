<!-- Begin Page Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Ambil Antrian</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="print">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card text-center">
                                    <div class="card-header bg-primary">
                                        Nomer Antrian Anda
                                    </div>
                                    <div class="card-body">

                                        <h1 style=font-size:160px><?= $pelayanan['kode']; ?><?= $noantrian; ?></h1>

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a onclick="printDiv('print')" class="btn btn-primary btn-block">
                                                    <i class="fa fa-plus"></i> <span>Cetak</span>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="<?= base_url('ambil/ambilno'); ?>" class="btn btn-primary btn-block">
                                                    <i class="fa fa-plus"></i> <span>Ambil Antrian</span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>





</div>
<!-- End of Main Content -->