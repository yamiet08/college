<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="regcss/style.css">
    <title>Cronus Registration Page</title>
</head>
<body>
    <!--************************************************* Navigation ****************************************************--> 
    <p style="text-align: center; font-size: 60px;"><a herf="index.html">Cronus Home Page</a></p>
    <!--******************************************** End Navigation ****************************************************--> 

    
    <!--************************************************* Form ****************************************************--> 
<form action="registrationprocess.php" method="post" enctype="multipart/form-data">
    <div class="form1">
    <h1>Registration</h1>
        <!--************************************************* Errors ****************************************************--> 
        <p><?
            if (isset($_GET['message8'])) {
                echo "File is not an image.";
                }
        ?></p>
        <p><?
            if (isset($_GET['message7'])) {
                echo "Sorry, your file is too large.";
                }
        ?></p>
        <p><?
            if (isset($_GET['message6'])) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
        ?></p>
        <p><?
            if (isset($_GET['message5'])) {
                echo "Sorry, your file was not uploaded.";
                }
        ?></p>
        <p><?
            if (isset($_GET['message4'])) {
                echo "Sorry, there was an error uploading your file.";
                }
        ?></p>
        <p style="text-align: center; font-size: 60px; color: red;"><?
            if (isset($_GET['message3'])) {
                echo 'Email already exists!';
                }
        ?></p>
        <p style="text-align: center; font-size: 60px;"><?
            if (isset($_GET['message2'])) {
                echo "You have registered!";
                }
        ?></p>
        <p style="text-align: center; font-size: 60px;"><?php 
            if (isset($_GET['message1'])) {
            echo 'Check Your E-mail For Verification.';
            }?></p>
        <!--********************************************* End Errors ****************************************************--> 

        <div class="form2">
            <!--************************************************* First Name *************************************************-->
            <label for="firstName">First Name</label><br>
            <input type="text" name="firstName" id="firstName" placeholder="First Name" class="ts2" required><br>
            <!--*************************************************** E-mail ***************************************************-->
            <label for="email">E-mail</label><br>
            <input type="email" name="email" id="email" placeholder="E-mail" class="ts2" required><br>
        </div>
        <div class="form3">
            <!--************************************************* Last Name *************************************************-->
            <label for="lastName">Last Name</label><br>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name" class="ts1" required><br>
            <!--***************************************************** Phone **************************************************-->            
            <label for="phone">Phone</label><br>
            <input type="text" name="phone" id="phone" placeholder="Phone" class="ts1" required><br>
        </div>
        <!--************************************************** Address1 ***************************************************-->
        <label for="address1">Address 1</label><br>
        <input type="text" name="address1" id="address1" placeholder="Street" class="ts1" required><br>
        <!--************************************************** Address2 ***************************************************-->
        <label for="adress2">Address 2</label><br>
        <input type="text" name="address2" id="address2" class="ts1" required><br>
        <div class="form4">
            <!--***************************************************** city ****************************************************-->
            <label for="city">City</label><br>
            <input type="text" name="city" id="city" placeholder="City" class="ts3" required><br> 
        </div>
        <div class="form5">
            <!--***************************************************** state ***************************************************-->
            <label for="state">State</label><br>
            <input type="text" name="state" id="state" list="states" class="ts3" placeholder="State" required><br> 
            <datalist id="states">
                <?
                $states = [ 'State', 'AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU',
                    'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO',
                    'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 
                    'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY' ];
                foreach ($states as $state) {
                    echo "<option value='$state'>$state</option>";
                }
                ?>
            </datalist> 
        </div>
        <div class="form6">
        <!--************************************************** zip ******************************************************--> 
            <label for="zip">Zip</label><br>
            <input type="text" name="zip" id="zip" placeholder="Zip" class="ts1" required><br>
        </div>
        <!--************************************************* Gender ****************************************************--> 
        <label for="gender">Gender</label><br>
        <input type="text" name="gender" id="gender" list="genders" class="ts1" placeholder="Gender" required><br>
        <datalist id="genders">
            <option value="Gender">
            <option value="Male">
            <option value="Female">
        </datalist>
        <!--************************************************* Upload ****************************************************--> 
        <label for="fileToUpload">Select image to upload:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" class="ts1">
        <!--************************************************* Notes ****************************************************--> 
        <label for="message">Notes and Special needs</label><br>
        <textarea name="message"  id="message" rows="10" cols="30" class="ts1"></textarea><br>
        <!--************************************************* Agree ****************************************************--> 
        <div class="form2">
            <input type="radio" name="agree" value="I Agree">
            <label for="agree"> I Agree To The <a href="#openModal-about">Terms & Services</a></label>
            
            <!--modals-->
            <div id="openModal-about" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2>Terms & Services</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div> 
        </div> 
        <!--************************************************* Register ****************************************************--> 
        <div class="form3">
            <label for="register"></label>
            <input type="submit" name="register" id="register" value="Register">
        </div>

        <p>Already Have An Account ? <a href="login.php" target="_blank">Log In</a></p>
    </div> 
</form>
</body>
</html>