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
            <?php foreach($posts as $post):?>
               <tr>
              <th scope="row"><?php echo $post['id'];?></th>
              <td><a href="/show?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></td>
              <td>
                  <img src="/../uploads/<?=$post['image'] ?>" alt="" width="100" >        
              </td>
              <td><?php echo $post['date'];?></td>
              <td>
                <a href="/edit?id=<?php echo $post['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="/delete?id=<?php echo $post['id'] ?>&image=<?php echo $post['image'] ?>" 
                 class="btn btn-danger" onclick="return confirm('are you shure?')">Delete</a>
              </td>
              
            </tr>
            <?php endforeach;?>
           
          </tbody>
        </table>
</body>
</html>