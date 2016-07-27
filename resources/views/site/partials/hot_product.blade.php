<div class="cate-product catalog">
  <h3>Sản phẩm nổi bật</h3>
  <ul>
    @foreach($hl_products->take(3) as $hl_product)
      <li class="grid-item" style="text-align: center;">
          <a href="{{ route('client.posts', [$hl_product->category->slug, $hl_product->slug]) }}">
            <img src="{{ $hl_product->image }}" title="{{ $hl_product->name }}" alt="{{ $hl_product->name }}">
          </a>

          <div class="title-name">
            <h2><a href="{{ route('client.posts', [$hl_product->category->slug, $hl_product->slug]) }}">{{ $hl_product->name }}</a></h2>
          </div>
      </li>
    @endforeach
  </ul>
</div>
