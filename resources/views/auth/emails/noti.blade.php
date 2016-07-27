<body>
	<div class="row col-md-12 cart-item">
	    <div class="table-responsive cart_info">
	    	<p>Xin chào {{ $data->name }}!</p>
	    	@if($flag == 3)
		        <p>Vì một số xác nhận không chứng thực, đơn hàng của bạn đã bị hủy.</p>
		        <p>Xin vui lòng trả lời email này nếu bạn có bất kỳ câu hỏi nào.</p>
		        <p>Hoặc liên hệ với chúng tôi qua thông tin:
              E-mail: hsvnglobal@gmail.com.
              Số điện thoại: 04.39999336 - 04.22.111159 - 097.2222.958
            </p>
		        <p>Cảm ơn bạn đã ghé thăm sử dụng dịch vụ của chúng tôi.</p>
			@elseif($flag == 1)
		        <p>Đơn hàng của bạn đã được xác nhận. Chúng tôi sẽ thực hiện giao hàng đến bạn trong thời gian sớm nhất. </p>
		        <p>Cảm ơn bạn đã ghé thăm sử dụng dịch vụ của chúng tôi.</p>
			@endif
	    </div>
	</div>
</body>
