<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    
    <title>Оформление заказа на PHP</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}
.contractnumber {

}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}



.block-contractnumber{
  display: none;
}
</style>
</head>

<body>
<h1>Оформление заказа</h1>
<div class="row">
  <div class="col-75">
  
    <div class="container">
      <form id="orderform" method="post" onsubmit="return false">
        <div class="row">
          <div class="col-50">
            <h3>Лицо и адрес</h3>
            <label for="lname"><i class="fa fa-user"></i> Фамилия</label>
            <input type="text" id="lname" required name="userlastname" placeholder="Фамилия">
			<label for="fname"><i class="fa fa-user"></i> Имя</label>
            <input type="text" id="fname" required name="userfirstname" placeholder="Имя">
			<label for="mname"><i class="fa fa-user"></i> Отчество</label>
            <input type="text" id="mname" name="usermiddlename" placeholder="Отчество">
            <label for="email"><i class="fa fa-envelope"></i> E-mail</label>
            <input type="text" id="email" required name="email" placeholder="email@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Адрес доставки</label>
            <input type="text" id="adr" name="address" placeholder="город, улица, № дома, № квартиры/офиса">
            <label for="zip">Индекс</label>
            <input type="text" id="zip" name="zip" maxlength="6" placeholder="180000">
			
			<div class="container">
				<div class="row">
					<p><input name="addressee" type="radio" id="addressee_individual" value="individual" checked>Физ. лицо</p>
					<p><input name="addressee" type="radio" id="addressee_entity" value="entity">Юр. лицо</p>
				</div>
				<div class="block-contractnumber" id="block-entity">
				<label for="contractnumber">Номер договора для юр. лица</label>
				<input type="text" id="contractnumber" name="contractnumber" maxlength="10" placeholder="0123456789">
				</div>
				<script>
				$('input[name="addressee"]').click(function(){
				var target = $('#block-' + $(this).val());
				$('.block-contractnumber').not(target).hide(0);
				target.fadeIn(500);
				if (document.getElementById('addressee_individual').checked) {
				document.getElementById("contractnumber").value = "";
				}
				if (document.getElementById('addressee_entity').checked) {
				$("#block-entity").show();
				}
				});
				</script>
			</div>
          </div>

          <div class="col-50">
            <h3>Оплата</h3>
            <label for="cname">Имя на карте</label>
            <input type="text" id="cname" name="cardname" placeholder="Фамилия Имя">
            <label for="ccnum">Номер карты</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Действ. до (месяц)</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Сентябрь">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Действ. до (год)</label>
                <input type="text" id="expyear" name="expyear" maxlength="4" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>

        <input type="submit" value="Продолжить оформление заказа" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">

  </div>
</div>

<script>
 $("document").ready (function () {
	$("#orderform").on ("submit", function () {
		var userlastname = $('.userlastname').val();
		var userfirstname = $('.userfirstname').val();
		var usermiddlename = $('.usermiddlename').val();
		var email = $('.email').val();
		var address = $('.address').val();
		var zip = $('.zip').val();
		var addressee = $('.addressee').val();
		var contractnumber = $('.contractnumber').val();
		var cardname = $('.cardname').val();
		var cardnumber = $('.cardnumber').val();
		var expmonth = $('.expmonth').val();
		var expyear = $('.expyear').val();
		var cvv = $('.cvv').val();
		

		
		$.ajax({
			url: '/action_page.php',         /* Куда отправить запрос */
			method: 'post',             /* Метод запроса (post или get) */
			dataType: 'html',          	/* Тип данных в ответе (xml, json, script, html). */
			data: 
				{userlastname : userlastname,
				userfirstname : userfirstname,
				usermiddlename : usermiddlename,
				email : email,
				address : address,
				zip : zip,
				addressee : addressee,
				contractnumber: contractnumber,
				cardname : cardname,
				cardnumber : cardnumber,
				expmonth : expmonth,
				expyear : expyear,
				cvv : cvv
				},     		/* Данные передаваемые в массиве */
			success: function(data){   	/* функция которая будет выполнена после успешного запроса.  */
			console.log(data);         	/* В переменной data содержится ответ от index.php. */
			alert ("Заказ оформлен!")
			}
		});
	
	})
})
</script>

</body>

</html>

