<?php 
include  __DIR__ .'/header.php';
?>


<div class="container my-5 h-100" style="background-color: #F5F5F5">
  <div class="row h-100 justify-content-center align-items-center" >
    <div class="col-5 text-center" action="register.php" method="post">
        
        <h2 class="blue-text my-4">Registration</h2>
        <div id="errors-container">
        <div id="success-container">
        </div>


        <div class="form-group my-3">
            <input type="name" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
         <div class="form-group my-3">
            <select class="form-control" id="region" name="region">
                <option value="0">Select region</option>
                <?php foreach ($regions as $region): ?>
                <option value="<?=$region['reg_id'] ?>"><?=$region['ter_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group my-3 hidden" id="citiesBlock">
            <select class="form-control" id="city" name="city">
            </select>
        </div>

         <div class="form-group my-3 hidden" id="areaBlock">
            <select class="form-control" id="territory" name="territory">
            </select>
        </div>
        <button class="btn btn-lg btn-outline-primary btn-block" id="btn" type="submit">Register</button>
        </div>
    </div>

</div>
</div>
    <script>
        $(document).ready(function(){

        function formValidate(name, email, selectedRegion, selectedCity, selectedTerritory){
         var errors = [];
        $("#errors-container").empty();

        if (name < 2) {
         errors.push('Введите не меньше 2 символов в поле имя');
         }

         var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(email)) {
            errors.push('Неверный формат поля емайл. Введите корректное значение');
        }

        if (selectedRegion == 0 || selectedRegion == null) {
             errors.push('Выберите область');
         }

         if (selectedRegion != 0 && (selectedCity == 0 || selectedCity == null)) {
            errors.push('Выберите город');
         }

        var territories = $("#territory > option").length;
         if (selectedRegion != 0 && selectedCity != 0 && territories != false && (selectedTerritory == 0 || selectedTerritory == null)) {
            errors.push('Выберите населенный пункт');
        }

        errors.forEach(function(error) {
            var errorDiv = '<div class="alert alert-danger" role="alert">' + error + '</div>';
            $("#errors-container").append(errorDiv);
        });

        return errors;
     }

    $('button#btn').on('click',function(){
         var nameValue = $('input#name').val();
         var emailValue = $('input#email').val();
         var regionValue = $('select#region').val();
         var cityValue = $('select#city').val();
         var cityAddress = $('select#city').children("option:selected").attr("data-value");
        var territoryValue = $('select#territory').val();
        var formValidated = formValidate(nameValue, emailValue, regionValue, cityValue, territoryValue);

        if (!formValidated.length) {
                // выполнить регистрацию
             if (!territoryValue){
                territoryValue = cityAddress;
             }
        
            $.ajax({
                url: "/registerUser",
                type: "POST",
                data: {name:nameValue, email:emailValue, territory:territoryValue},
                    cache: false,
                success: function(responce){
                 if (responce == "ok") {
               // location.href = '/profile';
               var success='Данные успешно отправлены,можете авторизоваться';
              var successDiv= '<div class="alert alert-success" role="alert">'+success+'</div>';
               $("#success-container").append(successDiv);
                 }
                }
            });
         }
     });

    $("#region").change(function() {
         var selectedRegion = $(this).children("option:selected").val();

         $('#areaBlock').addClass('hidden');
         if (selectedRegion != 0) {
             $('#citiesBlock').removeClass('hidden').find('option').remove();
                //вывести города
         $.ajax({
             url: "/getRegions",
             type: "POST",
             data: {selectedRegion : selectedRegion},
             cache: false,
             success: function(responce){
                   //console.log(responce);
                var cities = JSON.parse(responce);
                 $("#city").append('<option value="0">Select city</option>');
                 cities.forEach(function(city) {
                 var option = '<option value="' + city.ter_id + '" data-value="' + city.ter_address + '">' + city.ter_name + '</option>';
                $("#city").append(option);
                 });
                 $('#citiesBlock').removeClass('hidden');
            }
         });
     } 
     else {
         $('#city').find('option').remove();
         $('#citiesBlock').addClass('hidden');
    }
 });

 $("#city").change(function() {
     var selectedCity = $(this).children("option:selected").val();

     if (selectedCity != 0) {
         console.log(selectedCity);
          $.ajax({
              url: "/getAreas",
              type: "POST",
              data: {selectedCity : selectedCity},
             cache: false,
             success: function(responce){
             var areas = JSON.parse(responce);
            if (areas.length > 0) {
             $('#areaBlock').removeClass('hidden').find('option').remove();
             $("#territory").append('<option value="0">Select areas</option>');
            areas.forEach(function (area) {
             var option = '<option value="' + area.ter_address + '">' + area.ter_name + '</option>';
                      $("#territory").append(option);
             });
             }
             else {
             $('#areaBlock').addClass('hidden').find('option').remove();
             }
         }
     });

          }
        else {
            $('#areaBlock').addClass('hidden').find('option').remove();
        }
     });
 })
</script>
</body>
</html>