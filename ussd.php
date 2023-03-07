<?php
header("Content-type:text/plain");
// $service_code=$_REQUEST['serviceCode']; //eg of service code *144#
// $session_id=$_REQUEST['sessionId'];
$number=$_REQUEST['phoneNumber'];
$text=$_REQUEST['text'];

if ($text=="")
{
	$message="Welcome to FBP System\n1.Register with us.\n2.Login.";
	ussd_proceed($message);
}
else
if (strlen($text)>0) 
{
	$data = explode("*", $text);
	$lastpos = count($data)-1;
	if (count($data)==1) {
		if ($data[0]=="1") {
			$message="Enter your Name.";
			ussd_proceed($message);
		}else
		if ($data[0]=="2") {
			$message="Welcome ".$number." to FBP System\n1.Sensitivity.\n2.Weekly Costs.\n3.Inqury.\n4.Report a Disease.\n5.Get your Business Plan.";
			ussd_proceed($message);
		}
		else
		{
			$message="Operation Canceled.";
			ussd_end($message);
		}
	}
	if (count($data)==2) {
		if ($data[0]=="1") {
			$message="Enter your Location.";
			ussd_proceed($message);
		}else
		if ($data[0]=="2") {
			if($data[1]=="1"){
				$message="Enter Product Name.";
				ussd_proceed($message);
			}else
			if($data[1]=="2"){
				$message="Enter Costs Amount.";
				ussd_proceed($message);
			}else
			if($data[1]=="3"){
				$message="1.Weather.\n2.Seeds.\n3.Fertilizers.\n4.Prices.\n5.Pesticides.\n6.Diseases.";
				ussd_proceed($message);
			}else
			if($data[1]=="4"){
				$message="Enter name of infected Animal or Plant.";
				ussd_proceed($message);
			}else
			if($data[1]=="5"){
				$message="Go to www.fbp.com to download document.";
				ussd_end($message);
			}else{
				$message="Operation Canceled.";
				ussd_end($message);
			}
		}
		else
		{
			$message="Operation Canceled.";
			ussd_end($message);
		}
	}
	if (count($data)==3) {
		if ($data[0]=="1") {
			$message="You have successfully joined FBP";
			ussd_end($message);
		}else
		if ($data[0]=="2") {
			if($data[1]=="1"){
				$message="Enter your Land Size in Hectares (ha).";
				ussd_proceed($message);
			}else
			if($data[1]=="2"){
				$message="Weekly cost updated successfully.";
				ussd_end($message);
			}else
			if($data[1]=="3"){
				if($data[2]=="1"){
					$message = "You have successfully subscribed to weather alerts.";
				}else
				if($data[2]=="2"){
					$message = "You have successfully subscribed to seeds alerts.";
				}else
				if($data[2]=="3"){
					$message = "You have successfully subscribed to fertilizers alerts.";
				}else
				if($data[2]=="4"){
					$message = "You have successfully subscribed to prices alerts.";
				}else
				if($data[2]=="5"){
					$message = "You have successfully subscribed to pesticides alerts.";
				}else
				if($data[2]=="6"){
					$message = "You have successfully subscribed to diseases alerts.";
				}else{
					$message = "Invalid Choice.";
				}
				ussd_end($message);
			}else
			if($data[1]=="4"){
				$message="Enter visible symptoms separated by a comma (,).";
				ussd_proceed($message);
			}else{
				$message="Operation Canceled.";
				ussd_end($message);
			}
		}else
		{
			$message="Operation Canceled.";
			ussd_end($message);
		}
	}
	if (count($data)==4) {
		if ($data[0]=="2") {
			if($data[1]=="1"){
				$message="Enter seed cost in shillings.";
				ussd_proceed($message);
			}else
			if($data[1]=="4"){
				$message="Successfully reported a disease. You will get feedback in a few hours.";
				ussd_end($message);
			}else{
				$message="Operation Canceled.";
				ussd_end($message);
			}
		}else{
			$message="Operation Canceled.";
			ussd_end($message);
		}
	}
	if (count($data)==5) {
		if ($data[0]=="2") {
			if($data[1]=="1"){
				$message="Enter Labour Costs.";
				ussd_proceed($message);
			}else{
				$message="Operation Canceled.";
				ussd_end($message);
			}
		}
			else
			{
				$message="Operation Canceled.";
				ussd_end($message);
			}
	}
	if (count($data)==6) {
		if ($data[0]=="1") {
				$message="Details saved successfully.";
				ussd_end($message);
		}else{
			$message="Operation Canceled.";
			ussd_end($message);
		}
	}
}



function ussd_proceed($message){
	echo "CON ".$message;
}

function ussd_end($message){
	echo "END ".$message;
}

?>