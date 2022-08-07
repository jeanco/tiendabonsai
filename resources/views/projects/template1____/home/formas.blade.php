<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">
      /*  */
      .custom {
  background: #ccc;
  width: auto;
  float: none;
  margin: 0 auto;
  padding: 10px;
  text-align: center;
}
input {
  width: auto;
  padding: 10px;
  border-radius: 5px;
}
    </style>
  </head>
  <body>
    <!--  -->
    <div class="custom">
<h2>Fill up all the Details</h2>
<input class="input-credit-card" placeholder="Enter Credit Card Number"/>
<br><br>
 <input class="input-phone" placeholder="Enter IN Phone Number" />
<br>
<br>
<input class="input-date" placeholder="Enter date: YYYY/MM/DD" />
  <br>
  <br>
  <input class="input-custom" placeholder="Custom Delimiter & Blocks" />
  <br>
  <br>
<input class="input-numeral" placeholder="Enter Numeral" />
  <br>
  <br>
  <input class="input-element" placeholder="Enter PREFIX" />
</div>
    <!--  -->
    <script type="text/css">
    var cleaveCreditCard = new Cleave('.input-credit-card', {
  creditCard: true
});

var cleavePhone = new Cleave('.input-phone', {
    phone: true,
  phoneRegionCode: 'IN'
});

var cleaveDate = new Cleave('.input-date', {
  date: true,
  datePattern: ['Y', 'm', 'd']
});

var cleaveCustom = new Cleave('.input-custom', {
  blocks: [3, 3, 3, 3],
  delimiter: '-',
});

var cleaveNumeral = new Cleave('.input-numeral', {
  numeral: true,
  numeralThousandsGroupStyle: 'thousand'
});

var cleave = new Cleave('.input-element', {
  prefix: 'TULUZZ',
  delimiter: '-',
  blocks: [6, 4, 3, 2],
  uppercase: true
});
    </script>
    <!--  -->
  </body>
</html>
