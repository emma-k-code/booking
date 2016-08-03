<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<table>
  <thead>
    <tr>
      <th colspan="7">活動清單</th>
    </tr>
    <tr>
      <th>活動名稱</th>
      <th>人數限制</th>
      <th>攜伴</th>
      <th>開始時間</th>
      <th>截止時間</th>
      <th colspan="2">網址</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data[1] as $value) : ?>
    <tr>
      <td>
        <?php echo $value["name"];?>
      </td>
      <td>
        <?php echo $value["persons"];?>
      </td>
      <td>
        <?php echo $value["bring"];?>
      </td>
      <td>
        <?php echo $value["start"];?>
      </td>
      <td>
        <?php echo $value["end"];?>
      </td>
      <td>
        <a href="<?php echo "https://booking-emma02.c9users.io/BookingWeb/Member/activity/".$value["id"];?>" target="_blank">
          <i class="glyphicon glyphicon-share button alterar"></i>
        </a>
      </td>
      <td>
        <i id="<?php echo $value["id"];?>" class="glyphicon glyphicon-pencil button alterar" data-toggle="modal" data-target="#myModal"></i>
        <i class="glyphicon glyphicon-trash button excluir"></i>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="title" class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
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
      </div>
    </div>
    
  </div>
</div>

<script>
  $("td").on("click","i",showData);
  
  function showData() {
    // alert($(this).prop("id"))
  }
  
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