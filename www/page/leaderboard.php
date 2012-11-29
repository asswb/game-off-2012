<h2>Leaderboard</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Rank</th>
      <th>User Name</th>
      <th>Repo Name</th>
      <th>Community</th>
      <th>Code Base Quality</th>
      <th>Score</th>
    </tr>
  </thead>
<?php
$q = $db->query('SELECT username,repo_name,com,cbq,(com*cbq) AS score FROM users WHERE com > \'0\' or cbq > \'0\' ORDER BY score DESC');
$rank = 0;
while($row = $q->fetch(PDO::FETCH_ASSOC)){
  $rank++;
?>
  <tbody>
    <tr<?php echo ($row['username'] == $user->data['username']?' class="info"':''); ?>>
      <td>#<?php echo $rank; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['repo_name']; ?></td>
      <td><?php echo $row['com']; ?> <?php echo (abs($row['com'])==1?"person":"people"); ?></td>
      <td>
        <div class="progress progress-success">
          <div class="bar" style="width: <?php echo $row['cbq']*100; ?>%;"><?php echo $row['cbq']*100; ?>%</div>
        </div>
      </td>
      <td><?php echo round($row['score'],2); ?></td>
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
