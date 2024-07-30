<?php
session_start();
require 'bd/dbcon.php';
?>

<?php
include('includes/header.php')
?>

  <div class="container mt-4">

      <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Detalhes Aluno <a href="marcos-create.php" class="btn btn-primary float-end">Adicionar Aluno</a></h4>
          </div>
          <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telemovel</th>
                    <th>Curso</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $query = "SELECT * FROM students";
                  $query_run = mysqli_query($con, $query);
                 
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $students)
                    {
                      ?>
                        <tr>
                        <td><?= $students['id'];?></td>
                        <td><?= $students['name'];?></td>
                        <td><?= $students['email'];?></td>
                        <td><?= $students['phone'];?></td>
                        <td><?= $students['course'];?></td>
                        <td>
                          <a href="student-edit.php?id= <?= $students['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                          <a href="student-view.php?id= <?= $students['id']; ?>" class="btn btn-warning btn-sm">Ver</a>
                          <form action="code.php" method="POST" class="d-inline">
                          <button type="submit" name="delete_student" value="<?= $students['id']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                          </form>
                        </td>
                        </tr>
                      <?php
                    }
                  }
                  else
                  {
                    echo "<h5> Sem Ficheiro Existente </h5>";
                  }
                  ?>
        
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
     include('includes/footer.php')
     ?>  