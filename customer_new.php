<?php 
	include_once('header.php'); 
?>
<script type="text/javascript">
	var number1 = Math.floor(Math.random() * 4);
	var number2 = Math.floor(Math.random() * 16);
	var valid = number1 + number2;
	$(document).ready(function(e) {			
		$("#contact_form").submit(function(){
			var v = $("#Verification").val();
			if (v != valid) {
				$('.return').html('<div class="alert alert-danger"><strong>Please verify you are a human</strong></div>');
				return false;
			} else {
				$('#loader').show();
				var data = {
					"action": "test"
				};
				data = $(this).serialize() + "&" + $.param(data);
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "send.php", 
					data: data,
					success: function(data) {
						$('#loader').hide();
						$(".return").html(
							data["json"]
						);
						$("#contact_form").get(0).reset();
					},
					error: function(){
						$('#loader').hide();
						$('.return').html('<div class="alert alert-warning"><strong>Something went wrong!</strong></div>');
					}
				});
				return false;	
			}
		});
		$("#number1").html(number1);
		$("#number2").html(number2);
	});
</script>
<section class="main-content container">
<div class="col-sm-12">
<!-- Main Contents Starts -->

	<h1>Order Parts: Contact Information</h1>
	
	<section class="col-sm-12">
	<div class="row">
	<!-- Form Section Starts -->
	
		<div class="return"></div>
		<form action="#" method="Post" id="contact_form">
			<ul>
				<li class="col-sm-6">
					Company name: <span>*</span>
					<input type="text" name="CompanyName" class="form-control" required/>
				</li>
				<li class="col-sm-6">
					Contact first name: <span>*</span>
					<input type="text" name="FirstName" class="form-control" required/>
				</li>
				<li class="col-sm-6">
					Contact last name: <span>*</span>
					<input type="text" name="LastName" class="form-control" required/>
				</li>
				<li class="col-sm-6">
					E-mail address: 
					<input type="email" name="Email" class="form-control" />
				</li>
				<li class="col-sm-6">
					Address line 1: 
					<input type="text" name="Address" class="form-control" />
				</li>
				<li class="col-sm-6">
					Address line 2: 
					<input type="text" name="Address2" class="form-control" />
				</li>
				<li class="col-sm-6">
					City: 
					<input type="text" name="City" class="form-control" />
				</li>
				<li class="col-sm-6">
					State: 
					<select name="State" class="form-control">
<option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AS">American Samoa</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FM">Federated States Of Micronesia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="GU">Guam</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MH">Marshall Islands</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="MP">Northern Mariana Islands</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PW">Palau</option><option value="PA">Pennsylvania</option><option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX" selected="">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VI">Virgin Islands</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>    </select>
				</li>
				<li class="col-sm-6">
					Zip: 
					<input type="text" name="Zip" class="form-control" />
				</li>
				<li class="col-sm-6">
					Phone: <span>*</span>
					<input type="text" name="Phone" class="form-control" required/>
				</li>
				<li class="col-sm-6">
					Alt. Phone:
					<input type="text" name="AlternatePhone" class="form-control" />
				</li>
				<li class="col-sm-6">
					Fax:
					<input type="text" name="Fax" class="form-control" />
				</li>
				<li class="col-sm-6">
					Enter your question(s) here:
					<textarea name="Message" class="form-control"></textarea>
				</li>
				<li class="col-sm-6">
					What is <span id="number1"></span> + <span id="number2"></span> 
					<input type="text" id="Verification" class="form-control" />
				</li>
				<li class="col-sm-12">
					<input type="hidden" name="number1" value="<?php echo $random_number1; ?>" />
					<input type="hidden" name="number2" value="<?php echo $random_number2; ?>" />
					<input type="submit" value="Submit" class="btn btn-danger" />
				</li>
			</ul>
		</form>
	
	<!-- Form Section Ends -->
	</div>
	</section>

<!-- Main Contents Ends -->
</div>
</section>


<?php include_once('footer.php'); ?>
