<?php
/* @var $this yii\web\View */
$this->title = 'Validasi Pembayaran';
?>
<div class="row">
    <div class="col-md-12 ml-auto mr-auto">
        <div class="card">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card-header card-header-rose text-center">
                    <h4 class="card-title">Validasi Pembayaran</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                            </div>
                            <div class="col-sm-12 col-md-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tb_validasi_pembayaran" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%"
                                    style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 20%;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 20%;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 20%;">Nama Item</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 10%;">Kuantitas</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 10%;">Harga</th>
                                            <th class="disabled-sorting text-center sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 20%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Tanggal</th>
                                            <th rowspan="1" colspan="1">Nama Item</th>
                                            <th rowspan="1" colspan="1">Kuantitas</th>
                                            <th rowspan="1" colspan="1">Harga</th>
                                            <th class="text-right" rowspan="1" colspan="1">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <span class="badge badge-pill badge-success">Terbayar</span>
                                            </td>
                                            <td>2018/11/28</td>
                                            <td>Capucinno</td>
                                            <td>3</td>
                                            <td>Rp.30.000</td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-link btn-success btn-just-icon like">
                                                    <i class="material-icons">check_circle_outline</i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger btn-just-icon remove">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <span class="badge badge-pill badge-warning">Pending</span>
                                            </td>
                                            <td>2018/11/2</td>
                                            <td>Nasi Goreng</td>
                                            <td>1</td>
                                            <td>Rp.15.000</td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-link btn-success btn-just-icon like">
                                                    <i class="material-icons">check_circle_outline</i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger btn-just-icon remove">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <span class="badge badge-pill badge-danger">Canceled</span>
                                            </td>
                                            <td>2018/11/8</td>
                                            <td>Mocaccino</td>
                                            <td>2</td>
                                            <td>Rp.35.000</td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-link btn-success btn-just-icon like">
                                                    <i class="material-icons">check_circle_outline</i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger btn-just-icon remove">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
