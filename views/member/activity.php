<?php 
if (!is_array($data)) {
    echo $data;
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../views/member/css/pricing.css" rel="stylesheet">
    <link href="../../views/member/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../views/member/css/custom.css" rel="stylesheet">
    <script src="../../views/member/js/jquery.js"></script>
    
    <script >
        $(document).ready(init);
        
        function init() {
            refresh()    
            setInterval(function(){
                refresh() // this will run after every 5 seconds
            }, 500);
        }
        
        function refresh() {
            $("#nowLable").text(Date());
            $.get("../getActivityPersons/" + $("#activityID").val() , function(data){
                $("#aPersons").text("剩餘人數：" + data);
        	});
        }
    </script>
    
<head>

<body>
    <div class="col-lg-2"></div>
    <div class="columns col-lg-4">
      <ul class="price">
        <li class="header"><?php echo $data["name"];?></li>
        <li class="grey"><?php echo $data["content"];?></li>
        <li id="aPersons">剩餘人數：<?php echo $data["remain"];?></li>
        <li>可攜伴人數：<?php echo $data["bring"];?></li>
        <li>開始時間：<?php echo $data["start"];?></li>
        <li>截止時間：<?php echo $data["end"];?></li>
        <li>權限限制：<?php echo $data["competence"];?></li>
        <li>限制人員：</li><?php echo $data["limit"];?></li>
      </ul>
    </div>
     <div class="columns col-lg-4">
        <form method="POST">
          <ul class="price">
            <li>
                <div class="form-group">
                    <label id="nowLable">員工編號</label>
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label for="memberID" id="activityLable"></label>
                    <input type="text" class="form-control" id="memberID" name="memberID" placeholder="" required>
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label for="memberName" id="activityLable">員工名稱</label>
                    <input type="text" class="form-control" id="memberName" name="memberName" required>
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label for="memberBring" id="activityLable">攜伴人數</label>
                    <input type="number" min="0" class="form-control" id="memberBring" name="memberBring" value="0" required>
                </div>
            </li>
            <li class="grey">
            <input type="hidden" class="form-control" id="activityID" name="activityID" value="<?php echo $data["id"];?>">
            <button type="submit" class="button" id="submit" name="submit" >送出</button>
            </li>
          </ul>
        </form>
    </div>
</body>

</html>
