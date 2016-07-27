<div class="cate-product catalog">
  <h3>Danh mục sản phẩm</h3>
  <ul>
    @foreach($cataProducts as $item)
        {!! navication($item) !!}
    @endforeach
  </ul>
</div>
