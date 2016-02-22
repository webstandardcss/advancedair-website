<?php	
	if (is_ajax()) {
		if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
			$action = $_POST["action"];
			switch($action) { //Switch case for value of action
				case "test": sendemail(); break;
			}
		}
	}
	
	//Function to check if the request is an AJAX request
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}		
	
	function sendemail(){
		$return = $_POST;  
		
		$to = "akifquddus@gmail.com"; 
		$from = $_REQUEST['Email']; 
		$name = $_REQUEST['Name'];  
		$headers = "From: $from"; 
		$subject = "New Message from Advanced Air Contact Form";
		
		$fields = array(); 
		$fields{"Name"} = "Name"; 
		$fields{"Email"} = "Email";
		$fields{"City"} = "City";
		$fields{"State"} = "State";
		$fields{"Phone"} = "Phone";
		$fields{"Message"} = "Message";
	
		$body = "Details:\n\n";
		foreach ($fields as $a => $b) {   
			$body .= sprintf("%s: %s\n\n", $b, $_REQUEST[$a]); 
		}

		$send = mail($to, $subject, $body, $headers);
		
		if ($send) {
			$return["json"] = "<div class='alert alert-success'><strong>Great, Your message has been sent successfully. We will contact you soon.</strong></div>";
			$return["result"] = "success";
			echo json_encode($return);
		} else {
			$return["json"] = "<div class='alert alert-danger'><strong>Your message has not been sent, Please try later.</strong></div>";
			$return["result"] = "danger";
			echo json_encode($return);
		}
	}

?>