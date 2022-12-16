<?php
$body = [
  'title' => 'Trang chủ'
];
$sql = "SELECT *
        FROM nhacnho nn JOIN ghichu gc ON nn.ghichu_id = gc.id ORDER BY id_nn DESC";
$getnn = $BB->getList($sql);

$date_time_current = new DateTime();
$w = (int)$date_time_current->format('w') + 2;


$sql = "SELECT *
        FROM lichhoc WHERE user_id = $user_id AND thu = $w";
$lichhoc = $BB->getList($sql);

require_once(__DIR__ . '/header.php');
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-exclamation-triangle"></i>
                Deadline Tớiiiiiii
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
                  entire
                  soul, like these sweet mornings of spring which I enjoy with my whole heart.
                </div> -->
              <?php
              foreach ($getnn as $nn) {
                echo '
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-info"></i> Alert!</h5>
                      <p>' . $nn['noidung'] . '</p>
                      <div class="row" style="justify-content: space-between;align-items: baseline;">
                        <p style="color: red;">Đến hạn: <span id="denhan" style="color: blue;">' . $nn['end'] . '</span></p>
                        <button style="height: 30px;" onclick="deleteNN(' . $nn['id_nn'] . ')" type="button" class="btn btn-danger btn-sm">Xóa</button>
                      </div>
                      
                    </div>
                    ';
              }
              ?>
              <!-- <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                  Warning alert preview. This alert is dismissable.
                </div>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Success alert preview. This alert is dismissable.
                </div> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                Lịch học
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php
              $arrColor = ['callout callout-danger', 'callout callout-info', 'callout callout-warning', 'callout callout-success'];
              $i = 0;
              foreach ($lichhoc as $item) {
                echo '
                  <div class="' . $arrColor[$i] . '">
                    <div class="lichhoc" style="display:flex;">
                      <h5>' . $item['tenmon'] . '</h5>
                      <span style="margin-left: 10px; color: blue">Ngày mai</span>
                    </div>
    
                    <p>Phòng học: <span style="color: orange" class="phonghoc">' . $item['phonghoc'] . '</span> Tiết bắt đầu: <span class="tiet_bd">' . $item['tiet_bd'] . '</span></p>
                  </div>';
                $i++;
                if ($i == 4) {
                  $i = 0;
                }
              }

              ?>

              <!-- <div class="callout callout-info">
                <h5>I am an info callout!</h5>

                <p>Follow the steps to continue to payment.</p>
              </div>
              <div class="callout callout-warning">
                <h5>I am a warning callout!</h5>

                <p>This is a yellow callout.</p>
              </div>
              <div class="callout callout-success">
                <h5>I am a success callout!</h5>

                <p>This is a green callout.</p>
              </div> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
require_once(__DIR__ . '/footer.php');

?>
<script>
  var endElement = document.querySelectorAll("#denhan");
  endElement.forEach(ele => {
    var endDate = moment(ele.innerText).countdown().toString();
    ele.innerText = endDate;
  });

  function deleteNN(id) {
    $.ajax({
      type: "POST",
      url: "<?= base_url('ajax/handleNN.php') ?>",
      data: {
        action: 'delete',
        id: id
      },
      dataType: "json",
      success: function(res) {
        if (res.status == 'success') {
          toastr.success('Xóa thành công !', 'success')
          setTimeout(() => {
            location.reload();
          }, 1500);
        }
      }
    });
  }
</script>