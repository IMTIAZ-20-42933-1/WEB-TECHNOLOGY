  <?php

require_once '../model/model.php';
  
        if (isset($_POST['submit']))
        {
          $data['name'] = $_POST['name'];
          $data['email'] = $_POST['email'];
          $data['user_name'] = $_POST['user_name'];
          $data["password"]   = $_POST["password"];
          //$data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);
          $data['gender'] = $_POST['gender'];
          $data['date'] = $_POST['date'];

          $data['image'] = basename($_FILES["image"]["name"]);

          $target_dir = "../uploads/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded. <br>";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
   
          if (addDriver($data)) {
            echo 'Registration Completed Successfully';
          }
         
        else 
        {
          echo 'For Accessing The Next Page Please Register Yourself First';
        }
      }
        
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
