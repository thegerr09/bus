<div class="modal fade" id="except" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Except Usergroup </h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Usergroup/delete') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <?php foreach ($this->AclAction->usergroup() as $exc) { ?>
            <label>
              <input type="checkbox" class="flat-blue" value="<?= $exc->id ?>"> <?= $exc->usergroup ?>
            </label>
            <?php } ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>