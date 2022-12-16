<?php
$body = [
    'title' => 'Tạo lịch học'
];
require_once(__DIR__ . '/header.php');
$sql = "SELECT * FROM lichhoc";
$danhsach_lh = $BB->getList($sql);

?>
<div class="modal fade" id="modal-lichhoc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Môn: </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="create-nhacnho">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="end-date">Ngày kết thúc</label>
                            <input type="date" required class="form-control" id="end-date">
                        </div>


                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" onclick="addAlert()" class="btn btn-primary btn-add-nhacnho">Thêm</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $body['title'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row fl-direction-end mr-2">
            <div class="mb-3 ml-2">
                <a href="?action=lichhoc" class="btn btn-primary btn-icon-left m-b-10"><i class="fa-solid fa-list"></i>Danh Sách</a href="">
            </div>
            <div class="mb-3 ml-2">
                <a class="btn btn-warning btn-icon-left m-b-10 btn-center " href="javascript:history.go(-1)" type="button">
                    <ion-icon name="arrow-back-circle-outline"></ion-icon>Back
                </a>
            </div>

        </div>
        <!-- Default box -->
        <div class="card">
            <!-- <div class="card-header">
                <h3 class="card-title">Các môn hiện tại
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0 table-lichhoc">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Môn học</th>
                                            <th>Phòng</th>
                                            <th>Tiết bắt đầu</th>
                                            <th>Số tiết</th>
                                            <th>Thứ</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($danhsach_lh as $lh) {
                                            echo '
                                                <tr>
                                                    <td>' . $lh['id_lh'] . '</td>
                                                    <td>' . $lh['tenmon'] . '</td>
                                                    <td>' . $lh['phonghoc'] . '</td>
                                                    <td>' . $lh['tiet_bd'] . '</td>
                                                    <td>' . $lh['sotiet'] . '</td>
                                                    <td>' . $lh['thu'] . '</td>
                                                    <td>
                                                    <button onclick="viewLH('.$lh['id_lh'].')" aria-label="" style="color:white;" class="btn btn-info btn-sm btn-icon-left m-b-10" type="button">
                                                        <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
                                                    </button>
                                                    <button onclick="deleteLH('.$lh['id_lh'].')" style="color:white;" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                                                        <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
                                                    </button>

                                                </td>
                                                </tr>
                                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?php

require_once(__DIR__ . '/footer.php');
?>
<script>
    function viewLH(id_lh) {
        $.ajax({
            type: "POST",
            url: "<?=base_url('ajax/handleNN.php')?>",
            data: {
                action: 'getLH',
                id_lh: id_lh
            },
            dataType: "json",
            success: function (response) {
                
            }
        });
    }
</script>