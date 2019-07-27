 <div class="modal-dialog <?= isset($modal_s) ? $modal_s : 'modal-lg'; ?>" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= isset($modal_title) ? $modal_title : 'Modal Title'; ?></h4>
      </div>
      <div class="modal-body">
        <?= $content_view; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?= isset($modal_footer) ? $modal_footer : ''; ?>
      </div>
    </div>
  </div>