<?php
$dsn = 'mysql:host=localhost;dbname=medecin';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
$sql = 'SELECT * FROM rdv';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


    
    <div class="card-body">
      <table class="table table-bordered" style="background:rgba(18, 21, 31,0.06);">
        <tr>
          <th style="color:rgb(30,30,30);";>Patient Name</th>
          <th style="color:rgb(30,30,30);";>Patient Email</th>
          <th style="color:rgb(30,30,30);";>Date</th>
      
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->name ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->date; ?></td>
      
            <td>
              <a href="editRdv.php?id=<?= $person->id ?>" >Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <a href="detail.php?id=<?= $person->id ?>&type=rdv"  >Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a onclick="return confirm('Are you sure you want to delete this patient?')" href="delete.php?id=<?= $person->id ?>&type=rdv" >Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

