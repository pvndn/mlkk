@if($news)
<div class="news">
  <div class="layout-80 layout-new">
    <div class="layout-new-header">
      <h3>
        <span>Tin tức-sự kiện</span>
      </h3>
    </div>
    <div class="layout-content" align="center">
      <ul>
        @foreach($news as $artcile)
        <li>
          <a href="{{ route('client.posts', [$artcile->category->slug, $artcile->slug]) }}"><img src="{{ $artcile->image }}"></a>
          <div>
            <h2><a href="{{ route('client.posts', [$artcile->category->slug, $artcile->slug]) }}">{{ $artcile->name }}</a></h2>
            <div class="desc">
              <?php $findspace = @strpos($artcile->content, ' ', 200) ? : 250; ?>
              {!! substr($artcile->content, 0, $findspace) !!}
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endif
