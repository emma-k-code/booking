<?php echo "<br>".$data[1];?>
<form method="POST">
  <div class="form-group">
    <label for="memberID" id="activityLable">員工編號</label>
    <input type="text" class="form-control" id="memberID" name="memberID" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="memberName" id="activityLable">員工名稱</label>
    <input type="text" class="form-control" id="memberName" name="memberName" required></textarea>
  </div>
  <div class="form-group">
    <label for="memberCompetence" id="activityLable">員工權限</label>
    <input type="text" class="form-control" id="memberCompetence" name="memberCompetence" value="1" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary" id="submit" name="submit" >送出</button>
</form>