<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Input Acl</h4>
      </div>

      <form name="group" action="<?= $this->url->get('Acl/input') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Controller</label>
            <input type="text" name="usergroup" class="form-control" placeholder="Usergroup">
          </div>
          <div class="form-group">
            <label>Action</label>
            <input type="text" name="action" class="form-control" placeholder="Action"> 
          </div>
          <div class="form-group">
            <label>Usergroup</label><br>
            <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
            <td align="center">
              <label class="usergroup">
                <input type="checkbox" name="usergroup[]" class="flat-blue" value="<?= $ug->id ?>"> <?= $ug->usergroup ?>
              </label><br>
            </td>
            <?php } ?>
          </div>
          <div class="form-group">
            <label>Except</label>
            <textarea name="except" class="form-control" placeholder="Except usergroup ..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>