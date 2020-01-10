<?php
    //index.php
    include('database_connection.php');
    $query = "SELECT * FROM task_list WHERE user_id = '".$_SESSION["user_id"]."' ORDER BY task_list_id DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Наворочений список завдань</title>  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
  <div class="container">
   <h1 align="center">Список завдань</h1>
   
    <form method="post" id="to_do_form">
        <span id="message"></span>

        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Ваше ім'я">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ваш email">
        </div>

        <div class="form-group">
            <input type="text" name="task_name" id="task_name" class="form-control"placeholder="Введіть ваше завдання..." />
        </div>

        <button type="submit" class="btn btn-outline-secondary" name="submit" id="submit">Додати завдання в список</button>
    </form>

   <div class="card mt-3">
       <div class="list-group">
       <?php
       foreach($result as $row)
       {
        $style = '';
        if($row["task_status"] == 'yes')
        {
         $style = 'text-decoration: line-through';
        }
        echo '<a href="#" style="'.$style.'" class="list-group-item" id="list-group-item-'.$row["task_list_id"].'" data-id="'.$row["task_list_id"].'">'.$row["task_details"].' <span class="badge badge-secondary" data-id="'.$row["task_list_id"].'">X</span></a>';
       }
       ?>
    
      </div>
     </div>
  </div>
 </body>
 
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="main.js"></script>
</html>