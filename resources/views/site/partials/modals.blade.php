<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Hướng dẫn mua hàng</h3>
            </div>
            <div class="modal-body">
                <?php $m = \App\Models\Page::where('slug', 'huong-dan-mua-hang')->select('content')->first(); ?>
                {!! $m->content !!}
            </div>
            <div class="modal-footer">
                <a href="{{ route('client.category', 'lien-he') }}" class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Liên hệ</a>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Thoát</button>
            </div>
        </div>
    </div>
</div>
