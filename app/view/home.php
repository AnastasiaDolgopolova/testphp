<?php 
include  __DIR__ .'/header.php';
?>


<div class="container my-5 h-100" style="background-color: #F5F5F5">
  <div class="row h-100 justify-content-center align-items-center" >
    <div class="col-5 text-center" action="register.php" method="post">
        
        <h2 class="blue-text my-4">Registration</h2>

        <div class="form-group my-3">
            <input type="name" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
         <div class="form-group my-3">
          <label class="text-left" for="">Region</label>
            <select class="form-control" id="region" name="region">
                <?php foreach ($regions as $region): ?>
                <option value="<?=$region['ter_type_id'] ?>"><?=$region['ter_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!--<div class="form-group my-3">
          <label for="">City</label>
            <select class="form-control" id="city" name="city">
                <?php foreach ($cityes as $city): ?>
                <option value="<?=$city['ter_id'] ?>"><?=$city['ter_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
         <div class="form-group my-3">
          <label for="">Country</label>
            <select class="form-control" id="territory" name="territory">
                <?php foreach ($countryes as $country): ?>
                <option value="<?=$country['ter_address'] ?>"><?=$country['ter_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>-->
        <button class="btn btn-lg btn-outline-primary btn-block" id="btn" type="submit">Register</button>
        </div>
    </div>
    <!--</form>-->
</div>
</div>
    <script>
        $(document).ready(function(){
            $('button#btn').on('click',function(){
                var nameValue = $('input#name').val();
                var emailValue = $('input#email').val();
                var regionValue = $('input#region').val();
                console.log(nameValue, emailValue,regionValue);
            })
        })
    </script>
    </body>
</html>