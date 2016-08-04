<div class="content">
<table>
  <thead>
    <tr>
      <th colspan="7">活動清單</th>
    </tr>
    <tr>
      <th>活動名稱</th>
      <th>人數限制</th>
      <th>已報名</th>
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
        <?php echo $value["join"];?>
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
        <i id="<?php echo $value["id"];?>" class="glyphicon glyphicon-list-alt button alterar" data-toggle="modal" data-target="#myModal"></i>
        <i class="glyphicon glyphicon-trash button excluir"></i>
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
      <div class="modal-body">
        
      </div>
    </div>
    
  </div>
</div>

<script>
  $("td").on("click","i",showData);
  
  function showData() {
    $(".modal-body").html("Loading...");
    $.get("getActivity/" +$(this).prop("id"), function(data){
        $(".modal-body").html(data);
	  });
  }
</script>