<?php

$conn = mysqli_connect("localhost", "root", "", "mc_db");

$affectedRow = 0;


session_start();
 
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('xml');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploads/';
      $dest_path = $uploadFileDir . $newFileName;
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}


$dom = new DOMDocument();

$dom->load($dest_path);

 

$org = $dom->getElementsByTagName("DataItem_Customer");

 

foreach($org as $child) {

 

$customer_id = $child->getElementsByTagName("customer_id")->item(0)->nodeValue;

$Customer_Type = $child->getElementsByTagName("Customer_Type")->item(0)->nodeValue;

$Date_Of_Birth = $child->getElementsByTagName("Date_Of_Birth")->item(0)->nodeValue;

$Date_Incorp = $child->getElementsByTagName("Date_Incorp")->item(0)->nodeValue;

//$Registration_No = $child->getElementsByTagName("Registration_No")->item(0)->nodeValue;

$Address_Line1 = $child->getElementsByTagName("Address_Line1")->item(0)->nodeValue;

$Address_Line2 = $child->getElementsByTagName("Address_Line2")->item(0)->nodeValue;

$Town_City = $child->getElementsByTagName("Town_City")->item(0)->nodeValue;               

$Country = $child->getElementsByTagName("Country")->item(0)->nodeValue;
 
$Contact_Name = $child->getElementsByTagName("Contact_Name")->item(0)->nodeValue;

$Contact_Number = $child->getElementsByTagName("Contact_Number")->item(0)->nodeValue;
               
$Num_Shares = $child->getElementsByTagName("Num_Shares")->item(0)->nodeValue;

$Share_Price = $child->getElementsByTagName("Share_Price")->item(0)->nodeValue;

$year = date("Y");
if ($Date_Of_Birth !='' ){
$input_date_arr = explode("/", $Date_Of_Birth);
$val = $input_date_arr[0];
$val1 = $input_date_arr[1];
$val2 = $input_date_arr[2];

$year_age = $year - $val2;

//echo $year_age;

}else {
	
$year_age = '0';	
}

if($year_age < 18 && $Customer_Type == 'Individual'){
	
	$message = "Customer must be at least 18 years old";
	
}else {
	
}

/*$sql = ($conn, "Insert into tbl_customerdetails ('customer_id','Customer_Type','Date_Of_Birth','Date_Incorp','Address_Line1','Address_Line2','Town_City'
,'Country','Contact_Name','Contact_Number','Num_Shares','Share_Price')values('$customer_id,'$Customer_Type','$Date_Of_Birth'
,'$Date_Incorp','$Address_Line1','$Address_Line2','$Town_City','$Country','$Contact_Name','$Num_Shares','$Share_Price')");
*/
}

$_SESSION['message'] = $message;
header("Location: index.php");

 

?>