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
        <?php echo $value["id"];?>
      </td>
      <td>
        <?php echo $value["name"];?>
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