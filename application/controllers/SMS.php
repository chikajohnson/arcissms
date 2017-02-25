<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SMS extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		// $request = array_merge($_GET, $_POST);
		// if (!isset($request['results'])) {
			// 	$item = "No request recieved";
		// } else {
			// 	$item = $request['results'];
		// }
		
		// $data_item  = array('text' => $item);
		// $this->core_model->insert_sms($data_item);
		// echo "It is working ";
		$url = "help";
		$this->process_sms_request($url);
	}
	public function process_sms_request($url_request)
	{
		$input_array = 	explode(",", $url_request);
		$keyword = $input_array[0];
		$phonenumber = "55555";
		$system_number = "08178376272";
		//var_dump($input_array); die();
		switch (strtolower(trim($keyword))){
			case 'result':
				if (count($input_array) == 5) {
					
					$matric = trim($input_array[1]);
					$password = trim($input_array[2]);
					$semester = strtolower(trim($input_array[3]));
					$session = strtolower(trim($input_array[4]));
					//var_dump($input_array) ; die();
					if($this->confirm_password($matric, $password) == true && $this->matric_exist($matric)){
						$all_results = $this->check_all_results($matric, $semester, $session);
						$this->send_message($phonenumber, $all_results);
												return true;
					}
					else{
						$error_messaage = "An error has occured. Check message format/content and send again.";
						$this->send_message($phonenumber, $error_messaage);
						return false;
					}
				} else if (count($input_array) == 4) {
					$matric = $input_array[1];
					$password = $input_array[2];
					$course_code = $input_array[3];
					if($this->confirm_password($matric, $password) == true && $this->matric_exist($matric) && $this->course_exist($course_code)){
						$single_result = $this->check_single_result($matric, $course_code);
							$this->send_message($phonenumber, $single_result);
											return true;
					}
					else{
						$error_messaage = "An error has occured. Check message format/content and send again.";
						$this->send_message($phonenumber, $error_messaage);
						return false;
						}
				}
				else{
					$error_messaage = "An error has occured. Check message format and send again.";
					$this->send_message($phonenumber, $error_messaage);
					return false;
				}
				
				break;
			case 'password':
				if (count($input_array) == 4) {
					$matric = $input_array[1];
					$old_password = $input_array[2];
					$new_password = $input_array[3];
					$password_changed = "Password change successfully";
					
					if($this->confirm_password($matric, $old_password) == true && (strlen($new_password) <= 6) && is_numeric($new_password)){
						$this->change_user_password($matric, $new_password);
						$this->send_message($phonenumber, $password_changed);
						return true;
					}
					else{
						$error_messaage = "password do not match or message not in correct format";
						$this->send_message($phonenumber, $error_messaage);
						return false;
					}
				}
				else{
					$error_messaage = "An error occured. Check message format and send again.";
					$this->send_message($phonenumber, $error_messaage);
					return false;
				}
				break;
			case 'help':
				if (count($input_array) == 2 && $input_array[1] == 'result') {
					$message = "Send text in thre format - 'result,matric,password,coursecode' to ". $system_number;
					$this->send_message($phonenumber, $message);
					return false;
					
				}
				else if (count($input_array) == 3 && strtolower(trim($input_array[1])) == 'result' && strtolower(trim($input_array[2])) == 'all') {
									
					$message = "Send text in thre format - 'result,matric,password,semester,session' to ". $system_number;
					$this->send_message($phonenumber, $message);
					return false;
					
				}
				else if (count($input_array) == 2 && $input_array[1] == 'password') {
									
					$message = "Send text in thre format - 'result,matric,old_password,new_password' to ". $system_number;
					$this->send_message($phonenumber, $message);
					return false;
					
				} else {
					$error_message = "An error occured. Check message format and send again.";
					$this->send_message($phonenumber, $error_message);
					return false;
				}
				break;
			default:
				$error_messaage = "An error occured. Check message format and send again.";
				$this->send_message($phonenumber, $error_messaage);
				return false;
				break;
		}
		
	}
	
	
	
	public function confirm_password($matric, $password)
	{
		return $this->sms_model->confirm_password_match($matric, $password);
	}
	public function change_user_password($matric, $new_password)
	{
		return $this->sms_model->change_password($matric, $new_password);
	}
	
	public function check_single_result($matric, $course)
	{
		$item = $this->sms_model->get_single_result($matric, $course);
		if ($item) {
			$item = 'Matric'. ' : '.$item->matric . ' -  Score '.' : ' .$item->course_code. ' ('. $item->score . ')';
			return $item;
		} else {
			return "No result found";
				}
		
	}
	public function check_all_results($matric, $semester, $session)
	{
		
	$items = $this->sms_model->get_all_results($matric, $semester, $session);
	//var_dump($items); die();
	if ($items) {
			$matric = "";
		$results = "";
		foreach ($items as $item) {
			//var_dump($item); die();
				$matric = $item->matric;
				$results .= $item->course_code.'('. $item->score. ')'.', ';
		}
		return $matric. ' : ' .$results;
		} else {
			return "No result found, check your message and resend.";
		}
	
	}

	public function matric_exist($matric)
	{
		return $this->sms_model->matric_exist($matric);
	}

	public function course_exist($code)
	{
		return $this->sms_model->course_exist($code);
	}

	public function send_message($to, $text)
	{
		//var_dump($to. "====== ". $text); die();
		// $curl = curl_init();
		// $header = array("Content-Type:application/json", "Accept:application/json", "authorization: Basic VGFyYkluYzpUZXN0MTIzNA==");
		// $postUrl = "https://api.infobip.com/sms/1/text/single";
		// $from = "ARCISSMS";
		// $post_fields = "{ \"from\":\"$from \", \"to\":[ \"$to\"], \"text\":\"$text\" }";
		// curl_setopt($curl, CURLOPT_URL, $postUrl);
		// curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		// curl_setopt($curl, CURLOPT_MAXREDIRS, 2);
		// curl_setopt($curl, CURLOPT_POST, 1);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		// $response = curl_exec($curl);
		// $err = curl_error($curl);
		// curl_close($curl);
			// if ($err) {
					// 	var_dump($err)	; die();
			// 	return "error";
		// }
		echo $text;
		
	}
}