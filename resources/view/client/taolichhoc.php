<?php
$body = [
    'title' => 'Tạo lịch học'
];
require_once(__DIR__ . '/header.php');
$sql = "SELECT * FROM monhoc";
$dachsach_mon = $BB->getList($sql);

?>
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chọn Môn:
                    <select class="custom-select rounded-0" name="" id="chon-mon">
                        <?php
                            foreach ($dachsach_mon as $mon) {
                                echo '
                                    <option value="'.$mon['tenmon'].'">'.$mon['tenmon'].'</option>
                                ';
                            }
                        ?>
                    </select>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Ngày học: </label>
                        <select name="" class="custom-select rounded-0" id="select-thu">
                            <option value="2">Thứ 2</option>
                            <option value="3">Thứ 3</option>
                            <option value="4">Thứ 4</option>
                            <option value="5">Thứ 5</option>
                            <option value="6">Thứ 6</option>
                            <option value="7">Thứ 7</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Phòng học</label>
                        <input type="text" class="form-control phong-hoc">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Tiết bắt đầu: </label>
                        <input type="text" class="form-control tiet-bd" placeholder="">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Số tiết</label>
                        <input type="text" class="form-control so-tiet" placeholder="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <button onclick="addLH()" class="btn btn-success btn-add-lh">Thêm</button>
                    </div>
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
    function addLH() {
        let tenmon = $("#chon-mon option:selected").text();
        let thu = $("#select-thu option:selected").val();
        let phonghoc = $(".phong-hoc").val();
        let tietbd = $(".tiet-bd").val();
        let sotiet = $(".so-tiet").val();
        let user_id = <?=$user_id?>;
        console.log(user_id);
        $.ajax({
            type: "POST",
            url: "<?=base_url('ajax/handleNN.php')?>",
            data: {
                action: 'addLH',
                tenmon: tenmon,
                thu: thu,
                phonghoc: phonghoc,
                tietbd: tietbd,
                sotiet: sotiet,
                user_id: user_id

            },
            dataType: "json",
            success: function (res) {
                if (res.status == 'success') {
                    toastr.success("Tạo lịch học thành công !", 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                }
            }
        });
    }
</script>