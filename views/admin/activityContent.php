<form method="POST">
  <div class="form-group">
    <label for="activityName" id="activityLable">活動名稱</label>
    <input type="text" class="form-control" id="activityName" name="activityName" placeholder="" value="<?php echo $data["name"]; ?>" required>
  </div>
  <div class="form-group">
    <label for="activityContent" id="activityLable">活動內容</label>
    <textarea class="form-control" id="activityContent" name="activityContent" rows="3" value="<?php echo $data["content"]; ?>" required></textarea>
  </div>
  <div class="col-lg-12 from-left">
    <div class="form-group col-lg-2 from-left">
      <label for="activityPersons">人數限制</label>
      <input type="text" class="form-control" id="activityPersons" name="activityPersons" value="<?php echo $data["persons"]; ?>" required>
    </div>
    <div class="form-group col-lg-2 from-left">
      <label for="activityBring">可攜伴人數</label>
      <input type="text" class="form-control" id="activityBring" name="activityBring" value="<?php echo $data["bring"]; ?>" required>
    </div>
  </div>
  <div class="col-lg-12 from-left">
    <div class="form-group col-lg-6 from-left">
      <label for="activityStart">開始時間</label>
      <input type="text" class="form-control some_class" id="activityStart" name="activityStart" placeholder="" value="<?php echo $data["start"]; ?>" required>
    </div>
    <div class="form-group col-lg-6 from-left">
      <label for="activityEnd">截止時間</label>
      <input type="text" class="form-control some_class" id="activityEnd" name="activityEnd" placeholder="" value="<?php echo $data["end"]; ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="activityCompetence">參與權限</label>
    <input type="text" class="form-control" id="activityCompetence" name="activityCompetence" value="<?php echo $data["competence"]; ?>" required>
  </div>
  <div class="form-group">
    <label for="activityLimit">參與條件 (可輸入限制可參加的員工編號)</label>
    <input type="text" class="form-control" id="activityLimit" name="activityLimit" placeholder="" value="<?php echo $data["limit"]; ?>" >
  </div>
  <button type="submit" class="btn btn-primary" id="submit" name="submit" value="<?php echo $data["id"]; ?>" >修改</button>
</form>