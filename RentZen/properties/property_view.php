<?php include '../view/header.php';?>

    <style>
      #map, #pano {
        float: left;
        height: 100%;
        width: 45%;
      }
    </style>
    
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBkYy3QdqyYgHr8_jUiX8WEePPE5DGIQy8"></script>

<script>
    
        "use strict";
        
        // transfer php values to javascript
        var street = "<?php Print($property_info['street']); ?>";
        var city = "<?php Print($property_info['city']); ?>";
        var zip = "<?php Print($property_info['zip']); ?>";
        
        var address = street + ", " + city + ", " + zip;
        //get lat long values
        var geocoder = new google.maps.Geocoder();

        var get_the_lat_long_function = function(){
            
            
            geocoder.geocode( { 'address': address}, function(fred, status) {
                //callback logic here
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = fred[0].geometry.location.lat();
                    var longitude = fred[0].geometry.location.lng();
                    console.log(latitude, longitude);
                    initialize(latitude,longitude);
                    } 
            }); // end geocode callback

        }; // end geocode function
       function initialize(latitude, longitude) {
       var fenway = {lat: latitude, lng: longitude};
       var map = new google.maps.Map(document.getElementById('map'), {
        center: fenway,
        zoom: 14
        });
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
                position: fenway,
                pov: {
                heading: 34,
                pitch: 10
                }
            });
        map.setStreetView(panorama);
        }
      //when the document is ready, define what the button should do
      $(document).ready(function(){
        get_the_lat_long_function();
        // initialize();
      });
    
    </script>
<div></div>

<div class ="container" id="mycontainer">
    <div class="row">
        <h2>Property on <?php echo ucwords($property_info['street']);?><br></h2>
    </div>
    <div class='row'>
            <div class='col-md-12'>
        <img class='img-fluid rounded' src='<?php echo $property_info['picture'];?>' alt='home' style='width: 100%'>
            </div>
        </div>
    <br>
<div class='row '>
    <div class='my-2 col-12 d-flex justify-content-around'>
        <div style='height: 200px; width: 400px;' id="map"></div>
        <div style='height: 200px; width: 400px;' id="pano"></div>
    </div>
</div>
    <br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        
        <input type="hidden" name="address" id="address">
            
        <div class="row">
            <div class="col-md-3">
            <b>Description:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['description'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>City:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['city'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Beds:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['beds'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Baths:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['baths'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Square Feet:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['sqft'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Monthly Rent:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['rental_fee'];?></p>
            </div>
        </div>

    </div>
</div>
 
<form action="../rental_applications/index.php" method="post">
    <div class="row">
        <div class=" col-md-4 text-center"></div>
        <div class=" col-md-4 text-center">
                <div id="buttons">
                <input class="btn btn-primary btn-block" type="submit" value="Apply" name="APPLY"> 
                <input type="hidden" value="<?php echo $selected_property_id;?>" name="property_id">
                <br>
                </div>
        </div>
    </div>
</form>
    </div>    
       
        <div class="col"></div>
        
    <div class='row'>
        <div class='col-md-4'>

        </div>
        <div class='col-md-4'>
            

            
        </div>
        <div class='col-md-4'>
            
        </div>   
    </div>
    

<br>

<?php include '../view/footer.php'?>
