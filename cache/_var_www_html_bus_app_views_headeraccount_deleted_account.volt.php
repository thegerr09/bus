<div class="modal fade" id="DeleteAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Account </h4>
      </div>

      <form name="deleteAccount" action="<?= $this->url->get('HeaderAccount/delete/account') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete_account" value="">
          <p>Apakah anda yakin akan menghapus Account "<span id="account_label" class="text-red"></span>" ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>