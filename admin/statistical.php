<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();

require ('Carbon/autoload.php');
   use Carbon\Carbon;
   use carbon\CarbonInterval;
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Báo cáo thống kê doanh thu</b></a></li>
                <!-- <li class="breadcrumb-item active"><a href="binhluandone.php"><b>Đã kiểm tra</b></a></li>
                <li class="breadcrumb-item active"><a href="binhluanlist.php"><b>Chưa kiểm tra</b></a></li> -->
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Báo cáo thống kê doanh thu: <?php echo Carbon::now('Asia/Ho_Chi_Minh'); ?></h3>
                        </div>
                        <div class="admin-content-right">
                            <div class="product-add-content git">
                                    <!-- <div class="from-group col-md-3">
                                      <label class="control-label" for="">Từ ngày <span style="color: red;">*</span></label> <br>
                                      <input class="form-control" type="text"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                        <label class="control-label" for="">Tới ngày <span style="color: red;">*</span></label> <br>
                                        <input class="form-control" type="text"> <br>
                                      </div> -->
                                      <div class="from-group col-md-3">
                                        <label class="control-label" for="">Lọc theo<span id="text-date" style="color: red;">*</span></label> <br>
                                        <select class="form-control select-thongke">
                                        <option value="">--Chọn--</option>
                                        <option value="7ngay">-- Lọc theo 7 ngày ---</option>
                                        <option value="30ngay">-- Lọc theo 30 ngày ---</option>
                                        <option value="90ngay">-- Lọc theo 90 ngày ---</option>
                                        <option value="365ngay">-- Lọc theo 1 năm ---</option>
                                        </select>
                                      </div>
                            </div>
                        </div>
                        <div>
                        <div id="chart" style="height: 250px;"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        day365();
        // Bar
       var chars = new Morris.Bar({
                element: 'chart',
                  parseTime: false,
                xkey: 'date',
                ykeys: ['order', 'revenue', 'soluong'],
                        
            labels: ['Số đơn hàng', 'Doanh thu', 'Số lượng']
          });

          $('.select-thongke').change(function(){
            var from_date = $('.date_from').val();
            var from_to = $('.date_to').val();

            $.ajax({
            url:"ajax/thongke.php",
            type:"POST",
            dataType:"JSON",
            data:{from_date:from_date, from_to:from_to},
            success:function(data)
            {
                chars.setData(data);
                $('#text-date').text(text);
            }
        });
          })

          $('.select-thongke').change(function(){
            var thoigian = $(this).val();
            if(thoigian== '7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian== '30ngay'){
                var text = '30 ngày qua';
            }else if(thoigian== '90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }
            $('#text-date').text(text);
            $.ajax({
            url:"ajax/thongke.php",
            type:"POST",
            dataType:"JSON",
            cache: false,
            data:{thoigian:thoigian},
            success:function(data)
            {
                chars.setData(data);
            }
        });

          })

          function day365(){
        var text = '365 ngày qua';
        $('#text-date').text(text);
        $.ajax({
            url:"ajax/thongke.php",
            method:"POST",
            dataType:"JSON",
            cache: false,
            success:function(data)
            {
                chars.setData(data);
            }
        });
    }
    })

   
    
</script>
</body>
</html>