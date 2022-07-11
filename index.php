<?php
session_start();
    require_once('database/connection.php');

    $data = $db->prepare('SELECT * FROM articles');
    $data->execute();
    $articles = $data->fetchAll(PDO::FETCH_ASSOC);



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Document</title>
  </head>
  <body>
          <div class="container">
            <div class="row">
              <section class="mt-5 mb-5">
                <?php
                      if($_SESSION['message']){
                         ?>
                         <div class="alert">
                           <p class="alert alert-success">
                              <?php echo $_SESSION['message'];
                                    echo $_SESSION['message']='';    ?>
                           </p>
                         </div>
                 <?php  }?>


                <h1>Liste des Articles</h1>
                <a href="create.php" class="btn btn-primary  mt-4">Ajouter un Article</a>
                <table class="table mt-4">
                  <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>


                      <?php foreach ($articles  as $article) { ?>
                      <tr>
                          <td> <?= $article['id'] ?> </td>
                          <td> <?= $article['name'] ?> </td>
                          <td> <?= $article['price'] ?> </td>
                          <td> <?= $article['stock'] ?> </td>
                          <td>
                            <a href="show.php?id=<?= $article['id']?>" class=" btn btn-outline-primary">Voir</a>
                            <a href="edit.php?id=<?= $article['id']?>" class=" btn btn-outline-success">Edit</a>
                            <a href="delete.php?id=<?= $article['id']?>" class=" btn btn-outline-danger">Delete</a>

                          </td>

                      </tr>

                     <?php  } ?>


                  </tbody>
                </table>
              </section>

            </div>

          </div>
  </body>
</html>
