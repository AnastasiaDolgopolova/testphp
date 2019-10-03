<?php 
include  __DIR__ .'/header.php';
?>


<div class="container">
    <div class="row">
      <div class="col-md-8 offest-md-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">territory</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $user):?>
              <tr>
                <th scope="row"><?php echo $user['id'];?></th>
                <td><?php echo $user['name'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['territory'];?></td>  
             </tr>
            <?php endforeach;?>
           
          </tbody>
        </table>
</body>
</html>