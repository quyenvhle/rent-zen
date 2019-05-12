<?php include '../view/header.php';?>

<script>
    "use strict";
    
           
    var validate = function(event){
        // default values
    $("#street").next().html("");
    $("#city").next().html("");
    $("#state").next().html("");
    $("#zip").next().html("");
    $("#bed").next().html("");
    $("#bath").next().html("");
    $("#sqft").next().html("");
    $("#property_type").next().html("");
    $("#occ").next().html("");
    $("#income").next().html("");
    $("#credit").next().html("");
    $("#rent").next().html("");
    $("#description").next().html("");
    
    //Error messages
        var street = $("#street").val();
                if (street === "")
			{
			$("#street").next().html("Street Address must be provided.");
			event.preventDefault();
			}
        
        var city = $("#city").val();
                if (city === "")
			{
			$("#city").next().html("City must be provided.");
			event.preventDefault();
			}
        
        var state = $("#state").val();
                if (state === "")
			{
			$("#state").next().html("State must be provided.");
			event.preventDefault();
			} 
        
        var zip = $("#zip").val();
                if (zip === "" || zip.length < 5 || zip.length > 10)
			{
			$("#zip").next().html("Zip must be between 5 and 10 characters.");
			event.preventDefault();
			}
        
        var bed = $("#bed").val();
		if (bed === "" || isNaN(bed) || (bed <= 1))
			{
			$("#bed").next().html("Bedrooms must be a number greater than 1.");
			event.preventDefault();
			}
            
        var bath = $("#bath").val();
		if (bath === "" || isNaN(bath) || (bath <= 1))
			{
			$("#bath").next().html("Baths must be a number greater than 1. ");
			event.preventDefault();
			}
       
        var sqft = $("#sqft").val();
		if (sqft === "" || isNaN(sqft) || (sqft < 100))
			{
			$("#sqft").next().html("Square Footage must be a number greater than 100");
			event.preventDefault();
			}          
        
        var property_type = $("#property_type").val();
                if (property_type === "")
                        {
                        $("#property_type").next().html("Type of property must be provided.");
                        event.preventDefault();
                        }
        
        var occ = $("#occ").val();
                if (occ === "")
                        {
                        $("#occ").next().html("Occupancy must be provided.");
                        event.preventDefault();
                        }    
        
        var income = $("#income").val();
                if (income === "" || isNan(income) || income <= 0) 
                        {
                        $("#income").next().html("Income Requirement must be a positive number.");
                        event.preventDefault();
                        }    
        
        var credit = $("#credit").val();
                if (credit === "" || isNan(credit) || credit < 300 || credit > 850)
                        {
                        $("#credit").next().html("Credit Score Requirement should be between 300 and 850.");
                        event.preventDefault();
                        }
        
        var rent = $("#rent").val();
                if (rent === "" || isNan(rent) || rent <= 0)
                        {
                        $("#rent").next().html("Rental Fee should be a positive number.");
                        event.preventDefault();
                        }   
        
        var description = $("#description").val();
                if (description === "")
                        {
                        $("#description").next().html("Please describe your property.");
                        event.preventDefault();
                        }         
    };
     
    
    //When form is ready
    $(document).ready(function(){
        
        $("#editproperty").submit(function(event){
            validate(event);    
        });

    });
 
</script>
        
<div class ="container-fluid">
    <!row for Page Title-->
    <div class ="row">
    <div class="col-md-auto" align="left"><h2>Edit a Property</h2></div>
    </div>
    <br>

<form class='form-control' action="index.php" method="post" id="editproperty">
 <!row for Street Address--> 
 <div class="form-group row" align='left'>
    <div class="col-md-5">
        <label for="street">Street Address:</label>
        <input type="text" class="form-control" id="street" name="street" value='<?php echo $property_record['street'];?>'>
        <span class ="error">&nbsp;</span>
    </div>
    <div class="col-md-3">
    <label for="city">City:</label>
    <input type="text" class="form-control" id="city" name="city" value='<?php echo $property_record['city'];?>'>
    <span class ="error">&nbsp;</span>
    </div>
    <div class="col-md-2">
        <label for="state">State:</label>
        <select class="form-control" id="state" name='state'>
            <option value=''>Please choose</option>
            <?php foreach($states as $s){ 
                $state = $s['state_name'];
                $state_id = $s['state_id'];
                $selected = is_selected($state_id, $property_record['state_id']);
                echo "<option $selected value='$state_id'>$state</option>";
                } 
            ?>
        </select>
        <span class ="error">&nbsp;</span>
    </div>
    <div class="col-md-2">
        <label for="zip">Zip:</label>
        <input type="text" class="form-control" id="zip" name="zip" value='<?php echo $property_record['zip'];?>'>
        <span class ="error">&nbsp;</span>
    </div>
 </div>
 <br>
 
 <!column for Attributes-->
<div class='form-group row'>
 <div class="form-group column col-md-12">
    <div class='form-group row'>
        <label for="bed" class='col-md-3 col-form-label'>Number of Bedrooms:</label>
        <div class ='col-md-5'>   
        <input type="text" class="form-control" id="bed" name="bed" value="<?php echo $property_record['beds'];?>">
        <span class ="error">&nbsp;</span>
        </div>
    </div>
    <div class='form-group row'>
     <label for="bath" class='col-md-3 col-form-label'>Number of Baths:</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="bath" name="bath" value="<?php echo $property_record['baths'];?>">
        <span class ="error">&nbsp;</span>
    </div>
    </div>
    <div class='form-group row'>
    <label for="sqft" class='col-md-3 col-form-label'>Square Footage:</label>
    <div class='col-md-5'>
        <input type="text" class="form-control" id="sqft" name="sqft" value="<?php echo $property_record['sqft'];?>">
        <span class ="error">&nbsp;</span>
    </div> 
    </div>
    <div class="form-group row"> 
        <label for="property_type" class='col-md-3 col-form-label'>Type of Property:</label>
        <div class='col-md-5'>   
        <select class="form-control" id="property_type" name="type">
            <option value=''>Please choose</option>
            <?php foreach($property_types as $pt){ 
                $typename = $pt['typename'];
                $pt_id = $pt['propertytype_id'];
                $selected = is_selected($pt_id, $property_record['type_id']);
                echo "<option $selected value='$pt_id'>$typename</option>";
                } 
            ?>
        </select>
        <span class ="error">&nbsp;</span>
       </div>
    </div>
     <div class="form-group row"> 
     <label for="occ" class='col-md-3 col-form-label'>Occupancy:</label>
     <div class='col-md-5'>
     <select class="form-control" id="occ" name='occ' <?php echo is_disabled(403, $property_record['propstat_id']); ?> >
            <option value=''>Please choose</option>
            <?php foreach($occupanciesall as $o){ 
                $propertystat = ucwords($o['propertystat']);
                $propstat_id = $o['propstat_id'];
                $selected = is_selected($propstat_id, $property_record['propstat_id']);
                echo "<option $selected value='$propstat_id'>$propertystat</option>";
                } 
            ?>
     </select>
     <span class ="error">&nbsp;</span>
    </div>
    </div>
    <div class="form-group row"> 
     <label for="income" class='col-md-3 col-form-label'>Income Requirement:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="income" name='income' value="<?php echo $property_record['income_requirement'];?>">
     <span class ="error">&nbsp;</span>
    </div>
    </div>
     <div class="form-group row"> 
     <label for="credit" class='col-md-3 col-form-label'>Credit Score Requirement:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="credit" name='credit' value="<?php echo $property_record['credit_requirement'];?>">
     <span class ="error">&nbsp;</span>
    </div>
    </div>
     <div class="form-group row"> 
     <label for="rent" class='col-md-3 col-form-label'>Rental Fee:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="rent" name='rent' value="<?php echo $property_record['rental_fee'];?>">
     <span class ="error">&nbsp;</span>
     
     <input type="hidden" name='property_id' value="<?php echo $propidfunction;?>">
     
    </div>
    </div>
    <div class="form-group row"> 
        <label for="description" class='col-md-3 col-form-label'>Description:</label>
        <div class='col-md-5'>   
            <textarea rows="5" class="form-control" id="description" name='description'><?php echo $property_record['description'];?></textarea>
        <span class ="error">&nbsp;</span>
        </div>
    </div>
 </div>

 
<!column-2 for features-->     
<!--<div class="col-md-3" id="features_list">Not in use</div>-->
 </div>


 
    <div class="text-center"><button type="submit" name= "editproperty" class="btn btn-primary">Continue</button>
    </div>
 </form>
    
 <div id="message"><?php echo $message;?></div>

    
    
</div>