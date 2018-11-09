<?php

/* @var $this yii\web\View */

$this->title = 'Stok Tersedia';
?>

<div class="row">
    <div class="col-md-12 ml-auto mr-auto">
        <div class="card">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card-header card-header-rose text-center">
                    <h4 class="card-title">Ketersediaan Stok</h4>
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
                                <table id="stok" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%"
                                    style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 25%;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 40%;">Nama Item</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 25%;">Kategori</th>
                                            <th class="disabled-sorting text-center sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Nama Item</th>
                                            <th rowspan="1" colspan="1">Kategori</th>
                                            <th class="text-right" rowspan="1" colspan="1">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <span class="badge badge-pill badge-success">Tersedia</span>
                                            </td>
                                            <td>Capucinno</td>
                                            <td>Coffe</td>
                                            <td class="text-right">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked="">
                                                        <span class="form-check-sign" style="top: 0px;">
                                                            <span class="check"></span>
                                                        </span>
                                                        Tersedia
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <span class="badge badge-pill badge-danger">Stok Habis</span>
                                            </td>
                                            <td>Moccacino</td>
                                            <td>Coffe</td>
                                            <td class="text-right">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign" style="top: 0px;">
                                                            <span class="check"></span>
                                                        </span>
                                                        Tersedia
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <span class="badge badge-pill badge-success">Tersedia</span>
                                            </td>
                                            <td>Nasi Goreng</td>
                                            <td>Makanan</td>
                                            <td class="text-right">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked="">
                                                        <span class="form-check-sign" style="top: 0px;">
                                                            <span class="check"></span>
                                                        </span>
                                                        Tersedia
                                                    </label>
                                                </div>
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
