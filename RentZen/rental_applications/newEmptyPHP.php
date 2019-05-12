<!DOCTYPE html>
<html>

<head>
<meta charset ="UTF-8">
<style>
body {text-align: center; padding : 30px;}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<title>Google Streetview</title>

</head>

<body>

<form id= "addressForm">

<label>Street:</label>
<input type="text" id="street" value="">

<label>City:</label>
<input type="text" id="city" value="">

<button id="submit">Submit</button>

</form>

<div id="response"></div>

<script>

function loadImage(){

var $street = $('#street').val();
var $city = $('#city').val();
var $address = $street + ', ' + $city;

var $response = 'This is how ' + $address + 'looks like...';

$('#response').text($response);

var addressURL = 'https://maps.googleapis.com/maps/api/streetview?size=600x400&location='+$address;
$('#response').append('<img src="'+ addressURL+'">');


};

$("#addressForm").submit(function(){
loadImage();
}
);

</script>
</body>

</html>