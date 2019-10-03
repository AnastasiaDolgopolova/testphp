<?php 
include  __DIR__ .'/header.php';
?>

<div class="container" >
     <br>
     <h1 class="text-center pt-5">My profile</h1>
     <br>
       <div class="row ">
         <div class="col-md-auto">
             <img src="/../img/default_user_photo.jpg" alt="..." class="rounded-circle img-thumbnail" width="200px">
         </div>
      <div class="col-sm"> 
           <div class="input-group mb-3">
               <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1"> Name &nbsp;&nbsp;&nbsp;</span>
                  </div>
                 <input name="name" class="form-control" value="<?php echo $user['name'];?>" readonly>
                </div>
                 <div class="input-group mb-3" >
                 <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  </div>
                  <input name="email" class="form-control" value="<?php echo $user['email'];?>" readonly>
                 </div>
                  <div class="input-group">
                  <div class="input-group-prepend">
                 <span class="input-group-text">Territory</span> 
                 </div>
                 <input class="form-control" value="<?php echo $user['territory'];?>" readonly>
                 </div>
                 <br>
                
                    </form>
                    <hr>
                </div>           
            </div>
        </div>