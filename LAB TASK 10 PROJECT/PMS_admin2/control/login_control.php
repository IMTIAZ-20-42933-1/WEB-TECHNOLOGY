<?php/*
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once "../model/model.php";

        $data["name"]       = $_POST["name"];
        $data["password"]   = $_POST["password"];

        login_user($data);
            
        if (login_user($data) == true) {
            session_start();
            $_SESSION['login_status'] = true;
            $_SESSION['name'] = $_POST['name'];

            $admininfo = showAdminfetch();
            $_SESSION['gender'] = $admininfo['gender'];
            $_SESSION['dob'] = $admininfo['dob'];
            $_SESSION['image'] = $admininfo['image'];
            header("Location: view_profile.php");
        }
        else {
            echo "Credentials do not match";
        }
    }*/
?>

<?php

//session_start();

		/*$userName = $pass = "";
		$userName_Err = $pass_Err = "";
		$matchError = false;

		$errorFlag = false;*/

		require_once '../model/model.php';
		//require_once '../view/login.php';
		

		/*if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
				
			if (empty($_POST['name']))
            {
				$userName_Err = "User Name is required";
				$errorFlag = true; 
			}
            else
            {
				$userName = $_POST['name'];
			}
				
			if (empty($_POST['password']))
            {
				$pass_Err = "Password is required";
				$errorFlag = true;
			}
            else
            {
				$pass = $_POST['password'];
			}*/


				if (isset($_POST["submit"])) {

					//require_once "../model/model.php";
					
			
					$data["name"]  = $_POST["name"];
					$data["password"]   = $_POST["password"];
			
					login_user($data);
						
					if (login_user($data) == true) {
						session_start();
						$_SESSION['login_status'] = true;
						$_SESSION['name'] = $_POST['name'];

						//$id = getStaffId($data);
						
			
						$admininfo = showStafffetch();
						$_SESSION['gender'] = $admininfo['gender'];
						$_SESSION['dob'] = $admininfo['dob'];
						$_SESSION['image'] = $admininfo['image'];
						header("Location: ../view/view_profile.php");
					}
					else {
						echo "Credentials do not match";
					}
				}

		?>