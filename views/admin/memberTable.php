<table>
  <thead>
    <tr>
      <th colspan="4">員工清單</th>
    </tr>
    <tr>
      <th>ID</th>
      <th>員工名稱</th>
      <th colspan="2">員工權限</th>
    </tr>
  </thead>
  <tbody id="memberTbody" >
    <?php foreach ($data[1] as $value) : ?>
    <tr>
      <td>
        <?php echo $value["mID"];?>
      </td>
      <td>
        <?php echo $value["mName"];?>
      </td>
      <td>
        <?php echo $value["mCompetence"];?>
      </td>
      <td>
        <i id="member-<?php echo $value["mID"];?>" class="glyphicon glyphicon-pencil button alterar" data-toggle="modal" data-target="#myModal"> </i>
        <i id="delete-<?php echo $value["mID"];?>" class="glyphicon glyphicon-trash button excluir"></i>
      </td>
    </tr>
    
    <?php endforeach ;?>
  </tbody>
</table>
<?php echo $data[2];?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="title" class="modal-title">修改員工資料</h4>
      </div>
      <div class="modal-body myModal-body">
        
      </div>
    </div>
    
  </div>
</div>

<script>
  $("td").on("click","i",showData);
  
  function showData() {
    var toWhere = $(this).prop("id").split("-");
    if (toWhere[0] == "member") {
      $(".myModal-body").html("Loading...");
      $.get("getMember/" + toWhere[1], function(data){
          $(".myModal-body").html(data);
  	  });
    }
    
    if(toWhere[0] == "delete") {
      var r = confirm("確認刪除員工編號"+toWhere[1]+"的資料?");
      if (r == true) {
          $.get("deleteMember/" + toWhere[1], function(data){
            location.reload();
      	  });
      }
    }
    
  }
</script>