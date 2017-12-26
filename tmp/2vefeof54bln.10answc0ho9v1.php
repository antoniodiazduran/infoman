
<?php if ($SESSION['roles']=='Admin'): ?>
 <form action="<?= $BASE.'/users/update' ?>" method="post" class="form-horizontal">
    
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="username">Username:</label>
    <div class="col-xs-5 col-sm-3">
        <input readonly type="text" id="username" name="username" value="<?= $POST['username'] ?>" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="roles">User role:</label>
    <div class="col-xs-5 col-sm-3">
        <select id="roles" name="roles" class="form-control">
                <option>
                <option <?= $POST['roles']=='User'?' selected':'' ?>>User
                <option <?= $POST['roles']=='Admin'?' selected':'' ?>>Admin
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="bp_id">Buisness Partner:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="text" id="bp_id" name="bp_id" value="<?= $POST['bp_id'] ?>" class="form-control"/>
    </div>
  </div>
  <input type="hidden" name="update" id="update" value="update" />
  <input type="hidden" name="id" id="id" value="<?= $POST['id'] ?>" />
  <div class="form-group"> 
    <div class="col-xs-offset-3 col-xs-10 col-sm-offset-2 col-sm-5">
      <button type="submit" name="update" id="update" class="btn btn-primary">update</button>
    </div>
  </div>

 </form>
<?php endif; ?>
