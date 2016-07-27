<ul id="navigation">
    <li class="{{ active('admin.dashboard') }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a></li>

    <li class="{{ active(['admin/category/*', 'admin/category']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-list"></i> <span>Danh mục</span></a>
        <ul {{ is_active('admin/category/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/category']) ? 'active' : '' }}">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-caret-right"></i> Danh sách danh mục
                </a>
            </li>
            <li class="{{ active(['admin/category/create']) ? 'active' :'' }}">
                <a href="{{ route('admin.category.create') }}">
                    <i class="fa fa-caret-right"></i> Thêm mới danh mục
                </a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/page/*', 'admin/page']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-file-o"></i> <span>Trang</span></a>
        <ul {{ is_active('admin/page/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/page']) ? 'active' :'' }}">
                <a href="{{ route('admin.page.index') }}"><i class="fa fa-caret-right"></i>Danh sách trang</a>
            </li>
            <li class="{{ active(['admin/page/create']) ? 'active' :'' }}">
                <a href="{{ route('admin.page.create') }}"><i class="fa fa-caret-right"></i>Thêm trang</a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/orders/*', 'admin/orders']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-money"></i> <span>Đơn hàng</span></a>
        <ul {{ is_active('admin/orders/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/orders']) ? 'active' : '' }}">
                <a href="{{ route('admin.orders.index') }}"><i class="fa fa-caret-right"></i> Danh sách các đơn hàng</a>
            </li>
        </ul>
    </li>
    </li>
    <li class="{{ active(['admin/product/*', 'admin/product']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-shopping-cart"></i> <span>Sản phẩm</span></a>
        <ul {{ is_active('admin/product/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/product']) ? 'active' : '' }}">
                <a href="{{ route('admin.product.index') }}"><i class="fa fa-caret-right"></i> Danh sách các sản phẩm</a>
            </li>
            <li class="{{ active(['admin/product/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.product.create') }}"><i class="fa fa-caret-right"></i> Thêm mới sản phẩm</a>
            </li>
        </ul>
    </li>

    <li class="{{ active(['admin/news/*', 'admin/news']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-pencil"></i> <span>Tin tức</span></a>
        <ul {{ is_active('admin/news/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/news']) ? 'active' : '' }}">
                <a href="{{ route('admin.news.index') }}">
                    <i class="fa fa-caret-right"></i>Danh sách các bài viết
                </a>
            </li>
            <li class="{{ active(['admin/news/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.news.create') }}">
                    <i class="fa fa-caret-right"></i> Thêm mới bài viết
                </a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/project/*', 'admin/project']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-building"></i> <span>Dự án</span></a>
        <ul {{ is_active('admin/project/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/project']) ? 'active' : '' }}">
                <a href="{{ route('admin.project.index') }}">
                    <i class="fa fa-caret-right"></i>Danh sách các dự án
                </a>
            </li>
            <li class="{{ active(['admin/project/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.project.create') }}">
                    <i class="fa fa-caret-right"></i> Thêm dự án
                </a>
            </li>
        </ul>
    </li>

    <li class="{{ active(['admin/partner/*', 'admin/partner']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-users"></i> <span>Đối tác-khách hàng</span></a>
        <ul {{ is_active('admin/partner/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/partner']) ? 'active' : '' }}">
                <a href="{{ route('admin.partner.index') }}">
                    <i class="fa fa-caret-right"></i>Các đối tác-khách hàng
                </a>
            </li>
            <li class="{{ active(['admin/partner/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.partner.create') }}">
                    <i class="fa fa-caret-right"></i> Thêm đối tác - khách hàng
                </a>
            </li>
        </ul>
    </li>

    <li class="{{ active(['admin/menu/*', 'admin/menu']) ? 'active' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-magic"></i> <span>Menu</span></a>
        <ul {{ is_active('admin/menu/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/menu']) ? 'active' : '' }}">
                <a href="{{ route('admin.menu.index') }}"><i class="fa fa-caret-right"></i> Danh sách menu</a>
            </li>
            <li class="{{ active(['admin/menu/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.menu.create') }}"><i class="fa fa-caret-right"></i> Thêm mới menu</a>
            </li>
        </ul>
    </li>

    <li class="{{ active(['admin/slider/*', 'admin/slider']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-delicious"></i> <span>Hình ảnh</span></a>
        <ul {{ is_active('admin/category/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/slider']) ? 'active' : '' }}">
                <a href="{{ route('admin.slider.index') }}">
                    <i class="fa fa-caret-right"></i>Danh sách ảnh
                </a>
            </li>
            <li class="{{ active(['admin/slider/create']) ? 'active' : '' }}">
                <a href="{{ route('admin.slider.create') }}">
                    <i class="fa fa-caret-right"></i> Thêm hình ảnh
                </a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/contact/*', 'admin/contact']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-envelope-o"></i> <span>Liên hệ</span> <span class="badge bg-lightred">{{ \App\Models\Contact::where('status', 0)->count() }}</span></a>
        <ul {{ is_active('admin/contact/*') ? 'style=display:block;' :'' }}>
            <li {{ active(['admin/contact']) ? 'active' : '' }}>
              <a href="{{ route('admin.contact.index') }}"><i class="fa fa-caret-right"></i> Hộp thư đến</a>
            </li>
        </ul>
    </li>
    <li class="{{ active(['admin/settings/*', 'admin/settings']) ? 'active open dropdown' :'' }}">
        <a role="button" tabindex="0"><i class="fa fa-cog"></i> <span>Cài đặt</span></a>
        <ul {{ is_active('admin/settings/*') ? 'style=display:block;' :'' }}>
            <li class="{{ active(['admin/settings']) ? 'active' : '' }}">
              <a href="{{ route('admin.settings.index') }}"><i class="fa fa-caret-right"></i> Index</a>
            </li>
        </ul>
    </li>

</ul>
