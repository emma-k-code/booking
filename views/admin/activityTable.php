<div class="content">
<table>
  <thead>
    <tr>
      <th colspan="6">活動清單</th>
    </tr>
    <tr>
      <th>活動名稱</th>
      <th>人數限制</th>
      <th>剩餘人數</th>
      <th>開始時間</th>
      <th>截止時間</th>
      <th>網址/編輯/報名員工</th>
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
        <?php echo $value["remain"];?>
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
        <i id="activity-<?php echo $value["id"];?>" class="glyphicon glyphicon-pencil button alterar" data-toggle="modal" data-target="#myModal"></i>
        <i id="signUp-<?php echo $value["id"];?>" class="glyphicon glyphicon-list-alt button excluir"  data-toggle="modal" data-target="#signUpMembers"></i>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>

</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="title" class="modal-title">修改活動</h4>
      </div>
      <div class="modal-body myModal-body">
        
      </div>
    </div>
    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="signUpMembers" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="title" class="modal-title">顯示報名員工</h4>
      </div>
      <div class="modal-body signUpMembers-body">
        
      </div>
    </div>
    
  </div>
</div>

<script>
  $("td").on("click","i",showData);
  
  function showData() {
    var toWhere = $(this).prop("id").split("-");
    if (toWhere[0] == "activity") {
      $(".myModal-body").html("Loading...");
      $.get("getActivity/" + toWhere[1], function(data){
          $(".myModal-body").html(data);
  	  });
    }else {
      $(".signUpMembers-body").html("Loading...");
      $.get("getSignUpList/" + toWhere[1], function(data){
          $(".signUpMembers-body").html(data);
  	  });
    }
    
  }
</script>