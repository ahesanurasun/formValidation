<?php 
  //  Country List array
  $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
  
  
  
  
  
  // Php Code Start
  if(isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $fatherName = $_POST['fatherName'];
    $userEmail = $_POST['userEmail'];
    $phoneNumber = $_POST['phoneNumber'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'] ?? null;
    $chooseYourSkills = $_POST['chooseYourSkills'] ?? [];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $privacyCheck = $_POST['privacyCheck'] ?? [];
    $tremsCheck = $_POST['tremsCheck'] ?? [];
  // File Upload
    $chooseYourPhoto = $_FILES['chooseYourPhoto'] ['name'] ?? null;
    $chooseYourPhotoTmp = $_FILES['chooseYourPhoto'] ['tmp_name'];
    $fileExtension = pathinfo($chooseYourPhoto, PATHINFO_EXTENSION);
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randdomString = substr(str_shuffle($letters), 0, 5);
    $newFileName = $randdomString ."_" . uniqid() . "." . $chooseYourPhoto;
    move_uploaded_file($chooseYourPhotoTmp, "uploads/$chooseYourPhoto");
    




// Full Name Field
    if (empty($fullName)) {
      $errName = "<span style='color:red'>Name is required</span>";
  } elseif (!preg_match("/^[A-Za-z. ]*$/", $fullName)) {
      $errName = "<span style='color:red'>Invalid Name Format</span>";
  }else {
      $crrName = $fullName;
  }
// Fathers Name Field
  if (empty($fatherName)){
      $errFatherName = "<span style='color:red'>Father's Name is required</span>";
  }elseif(!preg_match("/^[A-Za-z. ]*$/", $fatherName)){
      $errFatherName = "<span style='color:red'>Invalid Father's Name Format</span>";
  }else{
      $crrFatherName = $fatherName;
  }
  
// Email Field
  if (empty($userEmail)) {
      $errEmail = "<span style='color:red'>Email is required</span>";
  }elseif(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
      $errEmail = "<span style='color:red'>Invalid Email Format</span>";
  }else {
      $crrEmail = $userEmail;
  }
// Phone Number Field
  if (empty($phoneNumber)) {
      $errPhoneNumber = "<span style='color:red'>Phone Number is required</span>";
  } elseif (!preg_match("/^[0-9].{0,9}$/", $phoneNumber)) {
      $errPhoneNumber = "<span style='color:red'>Invalid Phone Number Format</span>";
  }else {
      $crrPhoneNumber = $phoneNumber;
  }
// Date of Birth Field
  if (empty($dateOfBirth)) {
      $errDateOfBirth = "<span style='color:red'>Date of Birth is required</span>";
  } else {
      $crrDateOfBirth = $dateOfBirth;
  }
// Gender Field
  if (empty($gender)) {
      $errGender = "<span style='color:red'>Please select your gender</span>";
  }else {
      $crrGender = $gender;
  }
// Choose Your Skills Field
  if (count($chooseYourSkills) == 0) {
      $errChooseYourSkills = "<span style='color:red'>Please select at least one skills</span>";
  }else {
      $crrSkills = $chooseYourSkills;
  }

// Address section
// Address Field
  if (empty($address)) {
      $errAddress = "<span style='color:red'>Address is required</span>";
  }else {
      $crrAddress = $address;
  }
// City Field
  if (empty($city)) {
      $errCity = "<span style='color:red'>City is required</span>";
  }elseif(!preg_match("/^[A-Za-z. ]*$/", $city)) {
      $errCity = "<span style='color:red'>Invalid City Format</span>";
  }else {
      $crrCity = $city;
}
// Country Field
  if (empty($country)) {
      $errCountry = "<span style='color:red'>Please select your country</span>";
  }else {
      $crrCountry = $country;
  }
// Zip Field


// Choose Your Photo Field


// Privacy Check Field 
  if (count($privacyCheck) == 0) {
      $errPrivacyCheck = "<span style='color:red'>Please accept our Privacy Policy</span>";
  }else {
      $crrPrivacyCheck = $privacyCheck;
  }
// Trams Check Field
  if (count($tremsCheck) == 0) {
      $errTermsCheck = "<span style='color:red'>Please accept our Terms and Conditions</span>";
  }else {
      $crrTermsCheck = $tremsCheck;
  }





  if (isset($crrName) && isset($crrFatherName) && isset ($crrEmail) && isset($crrPhoneNumber) && isset($crrDateOfBirth) && isset($crrGender) && isset($crrAddress) && isset($crrCity) && isset($crrCountry) && isset($crrSkills) && isset($crrPrivacyCheck) && isset($crrTermsCheck)) {
      $skillsStr = implode(", ", $crrSkills);
      $privacyCheck = implode(", ", $crrPrivacyCheck);
      $tremsCheck = implode(", ", $crrTermsCheck);
      $successMsg = " <span style='color:green'> Name : $crrName <br> Father's Name : $crrFatherName <br> Email : $crrEmail <br>Phone Number : $crrPhoneNumber <br> Date of Birth : $crrDateOfBirth <br> Gender : $crrGender <br> Address : $crrAddress <br> City : $crrCity <br> Country : $crrCountry  <br> Skills : $skillsStr <br> Privacy Policy : $crrPrivacyCheck <br> Terms and Conditions : $crrTermsCheck </span>";
      $crrName = $crrFatherName = $crrEmail= $crrPhoneNumber = $crrDateOfBirth = $crrGender = $crrAddress = $crrCity = $crrCountry = $crrZip = $crrSkills = $crrPrivacyCheck = $crrTermsCheck = null;
  }
}

  

// Php Code End
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Regitration Foem </title>
  </head>
  <body style="background-image: linear-gradient(to left, #33ffcc, #ccff99);">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container col-lg-8 mt-4">       
        <div class="card pb-5 pt-5">
          <div class="row">
            <h1 class="text-center">Registration Form</h1>
            <!-- Full Name Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="">Full Name</label>
              <input type="text" name="fullName" value="<?= $crrName ?? null ?>" placeholder="Enter Full Name" class="form-control">
              <?= $errName ?? null ?>
            </div>
            <!-- Fathers Name Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="">Father's Name</label>
              <input type="text" name="fatherName"  placeholder="Enter Father's Name" class="form-control" value="<?= $crrFatherName ?? null ?>">
              <?= $errFatherName ?? null ?>
            </div>
            <!-- Email Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="">Email</label>
              <input type="text" name="userEmail" placeholder="Enter Email" value="<?= $crrEmail ?? null ?>" class="form-control">
              <?= $errEmail ?? null ?>
            </div>
            <!-- Phone Number Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="phoneNumber">Phone Number</label>
              <input type="number" name="phoneNumber" value="<?= $crrPhoneNumber ?? null ?>" placeholder="Enter Phone Number" class="form-control">
              <?= $errPhoneNumber ?? null ?>
            </div>
            <!-- Date of Birth -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="dateOfBirth">Date of Birth</label>
              <input type="date" name="dateOfBirth" value="<?= $crrDateOfBirth ?? null ?>" class="form-control">
              <?= $errDateOfBirth ?? null ?>
            </div>
            <!-- Gender Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="gender">Gender</label>
              <div class="d-flex flex-row gap-3">
                <div class="">
                <label for="male">
                  <input type="radio" value="Male" name="gender" id="male" <?= isset($crrGender) && $crrGender == "Male" ? "checked": null ?>>
                  Male</label>
                </div>
                <div>
                <label for="female">
                  <input type="radio" value="female" name="gender" id="female" <?= isset($crrGender) && $crrGender == "female" ? "checked": null ?>>
                  Female</label>
                </div>
                <div>
                <label for="others">
                  <input type="radio" value="others" name="gender" id="others" <?= isset($crrGender) && $crrGender == "others" ? "checked": null ?>>
                  Others</label>
                </div>
              </div>
              <?= $errGender ?? null ?>
            </div>
            <!-- Address Section -->
             <!-- Address Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="Address" class="form-label">Address</label>
              <input type="text" name="address" value="<?= $crrAddress ?? null ?>" class="form-control" id="Address" placeholder="1234 Main St">
              <?= $errAddress ?? null ?>
            </div>
            <!-- City Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="City" class="form-label">City</label>
              <input type="text" name="city" value="<?= $crrCity ?? null ?>" class="form-control" id="city">
              <?= $errCity ?? null ?>
            </div>
            <!-- Country Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="inputState" class="form-label">Country</label>
              <select id="country" class="form-select" name = "country">
                <option selected>Choose Your Country...</option>
                <?php foreach ($countries as $ctr) { ?>
                  <option value="<?= $ctr ?>" <?= isset($crrCountry) && $crrCountry == $ctr ? "selected" : null ?>><?= $ctr ?></option>
                 <?php } ?>
              </select>
              <?= $errCountry ?? null ?>
            </div>
            <!-- Zip Field -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="Zip" class="form-label">Zip</label>
              <input type="text" name ="zip" value="" class="form-control" id="Zip">
            </div>
            <!-- Choose Your Skills Section -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for="">Choose Your Skills</label>
              <div class="d-flex flex-row gap-3">
                <div>
                <label for="html">
                  <input type="checkbox" name="chooseYourSkills[]" value="HTML" id="html" <?= isset($crrSkills) && in_array("HTML", $crrSkills) ? "checked": null ?>> HTML
                </label>
                </div>
                <div>
                <label for="css">
                  <input type="checkbox" name="chooseYourSkills[]" value="CSS" id="css"<?= isset($crrSkills) && in_array("CSS", $crrSkills) ? "checked": null ?>>
                  CSS</label>
                </div>
                <div>
                <label for="php">
                  <input type="checkbox" name="chooseYourSkills[]" value="PHP" id="php" <?= isset($crrSkills) && in_array("PHP", $crrSkills) ? "checked": null ?>>
                  PHP</label>
                </div>
                <div>
                <label for="javascript">
                  <input type="checkbox" name="chooseYourSkills[]" value="JAVACSCRIPT" id="javascript" <?= isset($crrSkills) && in_array("JAVACSCRIPT", $crrSkills) ? "checked": null ?>>
                  JAVACSCRIPT</label>
                </div>
              </div>
              <?= $errChooseYourSkills ?? null ?>
            </div>
            <!-- Choose Your Photo Section -->
            <div class="col-5 ms-5 mt-3 ps-3">
              <label for=" ">Choose Your Photo</label>
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="chooseYourPhoto" id="inputGroupFile02">
              </div>
            </div>
            <!-- Privacy Check -->
            <div class="col-12 ms-5 mt-3 ps-3">
              <div class="form-check">
              <label class="form-check-label"  for="privacyCheck">
                  I agree to the Privacy Policy
                </label>
                <input class="form-check-input" name="privacyCheck[]" value="accepted" <?= isset($crrPrivacyCheck) ? 'checked' : null ?> type="checkbox" id="privacyCheck">
                <?= $errPrivacyCheck ?? null ?>
              </div>
              <!-- Terms Check -->
              <div class="form-check mb-3">
              <label class="form-check-label"  for="tremsCheck">
                  I agree to the Terms and Conditions
                </label>
                <input class="form-check-input" name="tremsCheck[]" value="accepted" <?= isset($crrTermsCheck) && in_array("accepted", $crrTermsCheck) ? "checked": null ?> type="checkbox" id="tremsCheck">
                <?= $errTermsCheck ?? null ?>
              </div>
             <div class="d-grid  col-3 ">
                <button class="btn btn-primary" name="submit" type="submit" value="submit">Submit</button>
              </div>
            </div>
          </div>
        </div> 
        <div class="container card col-lg-8 mt-4 p-4">
        <?php 
          echo $successMsg ?? null;
        ?>
        </div>
      </div>
      
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    




  </body>
</html>
