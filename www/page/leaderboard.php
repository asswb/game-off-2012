<h2>Leaderboard</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Rank</th>
      <th>User Name</th>
      <th>Repo Name</th>
      <th>Score</th>
    </tr>
  </thead>
<?php
$q = $db->query('SELECT `username`,`repo_name`,(com*cbq) AS score FROM users WHERE (com*cbq) > \'0\' ORDER BY score DESC');
$rank = 0;
while($row = $q->fetch(PDO::FETCH_ASSOC)){
  $rank++;
?>
  <tbody>
    <tr>
      <td>#<?php echo $rank; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['repo_name']; ?></td>
      <td><?php echo $row['score']; ?></td>
    </tr>
  </tbody>
<?php
}
if($rank == 0){
?>
  <tbody>
    <tr>
      <td>No players yet.</td>
    </tr>
  </tbody>
<?php
}
?>
</table>
