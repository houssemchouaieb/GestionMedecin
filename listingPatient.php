<?php
$dsn = 'mysql:host=localhost;dbname=medecin';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
$sql = 'SELECT * FROM client';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


    
    <div class="card-body">
      <table class="table table-bordered" style="background:rgba(18, 21, 31,0.06);">
        <tr>
          <th style="color:rgb(30,30,30);";>Name</th>
          <th style="color:rgb(30,30,30);";>Email</th>
          <th style="color:rgb(30,30,30);";>Adress</th>
          <th style="color:rgb(30,30,30);";>Phone</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->nom." ".$person->prenom; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->adresse; ?></td>
            <td><?= $person->telephone; ?></td>
            <td>
              <a href="editPatient.php?id=<?= $person->id ?>"  >Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="detail.php?id=<?= $person->id ?>&type=patient"  >Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a onclick="return confirm('Are you sure you want to delete this patient?')" href="delete.php?id=<?= $person->id ?>&type=patient" >Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

