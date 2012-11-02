<h2>Issues</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Issue id</th>
    </tr>
  </thead>
<?php
$q = $db->query('select * from user_issue_table');
$count = 0;
while($row = $q->fetch(PDO::FETCH_ASSOC)){
  $count++;
?>
  <tbody>
    <tr>
      <td><?php echo print_r($row,1); ?></td>
    </tr>
  </tbody>
<?php
}
if($count == 0){
?>
  <tbody>
    <tr>
      <td>No issues yet.</td>
    </tr>
  </tbody>
<?php
}
?>
</table>
