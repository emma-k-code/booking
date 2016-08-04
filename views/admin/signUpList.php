<table>
  <thead>
    <tr>
      <th colspan="4">報名員工清單</th>
    </tr>
    <tr>
      <th>活動名稱</th>
      <th>員工ID</th>
      <th>員工名稱</th>
      <th>參加人數</th>
    </tr>
  </thead>
  <tbody id="memberTbody" >
    <?php foreach ($data as $value) : ?>
    <tr>
      <td>
        <?php echo $value[0];?>
      </td>
      <td>
        <?php echo $value[1];?>
      </td>
      <td>
        <?php echo $value[2];?>
      </td>
      <td>
        <?php echo $value[3];?>
      </td>
    </tr>
    
    <?php endforeach ;?>
  </tbody>
</table>