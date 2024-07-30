<?php
session_start();
require 'bd/dbcon.php'; // Assuming dbcon.php contains your database connection code

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
      $_SESSION['message'] = "Aluno Deletado Corretamente";
      header("Location: index.php");
      exit(0);
     }
     else
     {
      $_SESSION['message'] = "Aluno Não Deletado";
      header("Location: index.php");
      exit(0);
     }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
      $_SESSION['message'] = "Aluno Atualizado Corretamente";
      header("Location: index.php");
      exit(0);
     }
     else
     {
      $_SESSION['message'] = "Aluno Não Atualizado";
      header("Location: index.php");
      exit(0);
     }
}

if(isset($_POST['save_student']))
 {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // Prepare the query
    $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      $_SESSION['message'] = "Aluno Criado Corretamente";
      header("Location: marcos-create.php");
      exit(0);
    }
    else
    {
      $_SESSION['message'] = "Aluno Não Criado";
      header("Location: marcos-create.php");
      exit(0);
    }
  }
?>