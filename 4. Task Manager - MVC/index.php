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
  <title>Наворочений списоу завдань</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
  <div class="container">
   <h1 align="center">Список завдань</h1>
   
    <form method="post" id="to_do_form">
        <span id="message"></span>

        

        <div class="input-group">
            <input type="text" name="task_name" id="task_name" class="form-control input-lg" autocomplete="off" placeholder="Введіть ваше завдання..." />
            <div class="input-group-btn">
                <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
    </form>

   <div class="panel">
      <div class="panel-body">
       <div class="list-group">
       <?php
       foreach($result as $row)
       {
        $style = '';
        if($row["task_status"] == 'yes')
        {
         $style = 'text-decoration: line-through';
        }
        echo '<a href="#" style="'.$style.'" class="list-group-item" id="list-group-item-'.$row["task_list_id"].'" data-id="'.$row["task_list_id"].'">'.$row["task_details"].' <span class="badge" data-id="'.$row["task_list_id"].'">X</span></a>';
       }
       ?>
       </div>
      </div>
     </div>
  </div>
 </body>
 <script src="main.js"></script>
</html>