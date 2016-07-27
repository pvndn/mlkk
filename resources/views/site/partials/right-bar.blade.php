<div class="col-md-3 col-right pull-right">
  <div class="bx-contact">
    <div class="contact-form">
      <h3>
        Tư vấn sản phẩm
      </h3>
      <div class="dialog-form">
        <div class="hotline">Gọi trực tiếp:
          <span>097.2222.958</span>
          <span>043.9999.336</span>
        </div>
        <p class="required-form">Hãy điền thông tin chúng tôi sẽ liên hệ</p>
        <form action="{{ route('post.contact') }}" method="POST" id="contactForm">
          <input type="text" name="name" placeholder="Họ tên" autocomplete="off" required>
          <input type="email" name="email" placeholder="E-mail" autocomplete="off" required>
          <input type="tel" pattern="^(0|\+[0-9]{1,5})([1-9][0-9]{8}?([0-9]{0,1}))$" name="phone" placeholder="Số điện thoại">
          <input type="text" name="product" placeholder="Sản phẩm cần tư vấn" id="product" autocomplete="off" >
          <button class="btn-gr">Gởi yêu cầu</button>
        </form>
      </div>
    </div>
  </div>

  @if(isset($cataProducts))
    @include('site.partials.cata_product')
  @endif

  @if(isset($hl_products))
    @include('site.partials.hot_product')
  @endif

@if(isset($news))
  <div class="cate-news catalog">
    <h3>Tin tức-sự kiện</h3>
    <ul>
      @foreach($news as $n)
      <li>
        <h2><a href="">{{ $n->name }}</a></h2>
        <p>
          <?php mb_internal_encoding("UTF-8");?>
          {!! mb_substr($n->content, 0, 150) !!}...
        </p>
      </li>
      @endforeach
    </ul>
  </div>
@endif
</div>

@push('js')
<script type="text/javascript">
  var options = {
      url: _url,

      getValue: "name",

      template: {
        type: "iconRight",
        fields: {
					iconSrc: "image"
				},
      }
  };
  $("#product").easyAutocomplete(options);
</script>
@endpush
