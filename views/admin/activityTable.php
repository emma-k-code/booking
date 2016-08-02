<table>
  <thead>
    <tr>
      <th colspan="8">活動清單</th>
    </tr>
    <tr>
      <th>ID</th>
      <th>活動名稱</th>
      <th>人數限制</th>
      <th>攜伴</th>
      <th>開始時間</th>
      <th>截止時間</th>
      <th colspan="2">權限</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data[1] as $value) : ?>
    <tr>
      <td>
        <?php echo $value["id"];?>
      </td>
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
        <?php echo $value["competence"];?>
      </td>
      <td>
        <i class="glyphicon glyphicon-pencil button alterar"></i>
        <i class="glyphicon glyphicon-trash button excluir"></i>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>