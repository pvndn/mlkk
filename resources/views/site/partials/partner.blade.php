<div class="section-partner">
    <div class="layout-header">
        <h3>
            <span>Đối tác</span>
        </h3>
    </div>
    <div class="layout-content partner">
        <ul>
          @foreach(\App\Models\Partner::all() as $p)
            <li><img src="{{ asset($p->logo) }}" alt="{{ $p->name }}" title="{{ $p->name }}"></li>
          @endforeach
        </ul>
    </div>
</div>
