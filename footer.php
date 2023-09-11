

<div class="footer">
        <div class="row">
            <div class="grid_row-footer">
                <div class="grid_column-2-4">
                    <h3 class="footer_heading">Chăm sóc khách hàng</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="" class="footer-item_link">Hotline</a>
                        </li>
                        <li class="footer-item">
                            <a href="" class="footer-item_link">Trung Tâm Trợ Giúp</a>
                        </li>
                        <li class="footer-item">
                            <a href="" class="footer-item_link">Shop Email</a>
                        </li>
                        <li class="footer-item">
                            <a href="" class="footer-item_link">Hướng dẫn mua hàng</a>
                        </li>
                    </ul>
                </div>
                <div class="grid_column-2-4">
                    <h3 class="footer_heading">Theo dõi shop chúng tôi trên</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="" class="footer-item_link">
                                <i class="footer-item_item fa-brands fa-facebook"></i>Facebook</a>
                        </li>
                        <li class="footer-item">
                            <a href="" class="footer-item_link">
                                <img src="assets/img/zalo1.png" alt="" class="footer-item-img"> Zalo
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="" class="footer-item_link">
                                <img src="assets/img/Mess1.jfif" alt="" class="footer-item-img">Messenger
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="grid_column-2-4">
                    <h3 class="footer_heading">CÔNG TY CP THỜI TRANG 36FULLZ </h3>
                    <div class="footer_dowload">
                        <img src="assets/img/MaQR.png" alt="" class="footer_dowload-qr">
                        <div class="footer_download-apps">
                            <img src="assets/img/app Store.png" alt="" class="footer_download-app-img">
                            <img src="assets/img/Google play.png" alt="" class="footer_download-app-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="grid">
                <p class="footer_text">Địa chỉ: Số Nhà 68, Ngõ 235 Yên Hòa Cầu Giấy</p>
            </div>
        </div>
    </div>

    <script src="assets/js/slider.js"></script>
    <script src="assets/js/form.js"></script>
    <script>
      $(document).ready(function(){
        $("#tinh_tp").change(function(){
            var x = $(this).val()
            $.get ("ajax/deliveryqh_ajax.php", {tinh_id:x}, function(data) {
                $("#quan_huyen").html(data);
            })
        })
        $("#quan_huyen").change(function(){
            var x = $(this).val()
            $.get ("ajax/deliverypx_ajax.php", {quan_huyen_id:x}, function(data) {
                $("#phuong_xa").html(data);
            })

        })
    })
    </script>
    <script>
				 function remove_background(sanpham_id)
					{
						for(var count = 1; count <= 5; count++)
						{
						$('#'+sanpham_id+'-'+count).css('color', '#ccc'); 
						}
					}
					$(document).on('mouseenter', '.rating', function(){
							var index = $(this).data("index"); 
							var sanpham_id = $(this).data('sanpham_id'); 
						
							remove_background(sanpham_id);
							for(var count = 1; count<=index; count++)
							{
							$('#'+sanpham_id+'-'+count).css('color', '#ffcc00');
							}
					});
					  
						$(document).on('mouseleave', '.rating', function(){
							var index = $(this).data("index");
							var sanpham_id = $(this).data('sanpham_id');
							var rating = $(this).data("rating");
							remove_background(sanpham_id);
							
							for(var count = 1; count<=rating; count++)
							{
							$('#'+sanpham_id+'-'+count).css('color', '#ffcc00');
							}
							});

				</script>
				<script>
					 $('.rating').click(function(){
						var index = $(this).data("index");
						var sanpham_id = $(this).data('sanpham_id');
						var register_id = $(this).data('register_id');
						$.ajax(
								{ url: 'ajax/rating.php',
									data: {index:index, sanpham_id:sanpham_id, register_id:register_id},
									type: 'POST',
									success: function(data) {
										
											alert('Đánh giá '+index+' sao thành công');
										
											

											}
							});
					})
                        $('.rating_login').click(function(){
						alert('Làm ơn đăng nhập để đánh giá sao.');
					})
	</script>
</body>

</html>