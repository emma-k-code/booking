<?php echo "<br>".$data[1];?>
<form method="POST">
  <div class="form-group">
    <label for="activityName" id="activityLable">活動名稱</label>
    <input type="text" class="form-control" id="activityName" name="activityName" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="activityContent" id="activityLable">活動內容</label>
    <textarea class="form-control" id="activityContent" name="activityContent" rows="3" required></textarea>
  </div>
  <div class="col-lg-12 from-left">
    <div class="form-group col-lg-2 from-left">
      <label for="activityPersons">人數限制</label>
      <input type="text" class="form-control" id="activityPersons" name="activityPersons" value="1" required>
    </div>
    <div class="form-group col-lg-2 from-left">
      <label for="activityBring">可攜伴人數</label>
      <input type="text" class="form-control" id="activityBring" name="activityBring" value="0" required>
    </div>
  </div>
  <div class="col-lg-12 from-left">
    <div class="form-group col-lg-3 from-left">
      <label for="activityStart">開始時間</label>
      <input type="text" class="form-control some_class" id="activityStart" name="activityStart" placeholder="" required>
    </div>
    <div class="form-group col-lg-3 from-left">
      <label for="activityEnd">截止時間</label>
      <input type="text" class="form-control some_class" id="activityEnd" name="activityEnd" placeholder="" required>
    </div>
  </div>
  <div class="form-group">
    <label for="activityCompetence">參與權限</label>
    <input type="text" class="form-control" id="activityCompetence" name="activityCompetence" value="1" required>
  </div>
  <div class="form-group">
    <label for="activityLimit">參與條件 (可輸入限制可參加的員工編號)</label>
    <input type="text" class="form-control" id="activityLimit" name="activityLimit" placeholder="">
  </div>
  <button type="submit" class="btn btn-primary" id="submit" name="submit" >送出</button>
</form>
<script>
  $.datetimepicker.setLocale('zh');
  $('#activityStart').datetimepicker({
    onShow:function(){
     this.setOptions({
      maxDate:jQuery('#activityEnd').val().split(" ")[0]?jQuery('#activityEnd').val().split(" ")[0]:false
     })
    }
   });
   
   $('#activityEnd').datetimepicker({
    mask:jQuery('#activityStart').val().split(" ")[0],
    onShow:function(){
     this.setOptions({
      minDate:jQuery('#activityStart').val().split(" ")[0]?jQuery('#activityStart').val().split(" ")[0]:false,
     })
    }
   });
</script>
