<!-- 
    Abdullah Alsaaedi 1936031
    Khalid Alghamdi 2037040
    CS1
    2023/11/30
 -->

 <?php 
 
 $dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$db = "myTodosDB"; // Replace with your database name

// Create the connection
$con=mysqli_connect("$dbhost", "$dbusername", "$dbpassword", "$db");





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $referrer = htmlspecialchars($_POST['referrer']);
    $features = isset($_POST['features']) ? implode(', ', $_POST['features']) : '';
    $feedback = htmlspecialchars($_POST['feedback']);
    $category = htmlspecialchars($_POST['category']);
    
   

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $stmt = "SELECT * FROM feedbacks WHERE email = '$email'";
    $myquery = mysqli_query($con, $stmt);

    if (mysqli_num_rows($myquery) > 0) {
        // Email exists
        echo "Email already in use.";
        
    } else {
        // Email does not exist
        // Insert the new feedback
        $sql = "INSERT INTO feedbacks (name, email, referrer, features, feedback, category) VALUES ('$name', '$email', '$referrer', '$features', '$feedback', '$category')";
        $query = mysqli_query($con, $sql);
        

       
    }

        header('Location: feedback.php');
        exit();
   
    
} 


?> 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../global/styles.css">

</head>
<body>

    <!-- //////// navigation //////// -->

    <?php include 'header.php'; ?>





    <form onsubmit="return validateForm()" method="POST" class="feedback-form">
        <h1>Feedback Form</h1>

        <fieldset class="form-section">
            <legend class="section-title">Contact Information</legend>
            <div class="form-field">
                <label for="name" class="label">Name:</label>
                <input type="text" id="name" name="name" class="input-text" >
            </div>
            <div class="form-field">
                <label for="email" class="label">Email ID:</label>
                <input type="email" id="email" name="email" class="input-text" >
            </div>
        </fieldset>

        <fieldset class="form-section">
            <legend class="section-title">Feedback</legend>
            <div class="form-field">
                <label class="label">How did you hear about us?</label><br>
                <input type="radio" id="search" name="referrer" value="search" class="radio-input">
                <label for="search" class="option-label">Search Engine</label><br>
                <input type="radio" id="social" name="referrer" value="social" class="radio-input">
                <label for="social" class="option-label">Social Media</label><br>
                <input type="radio" id="friend" name="referrer" value="friend" class="radio-input">
                <label for="friend" class="option-label">Friend/Family</label><br>
            </div>
            <div class="form-field">
                <label class="label">What features do you like?</label><br>
                <input type="checkbox" id="feature1" name="features[]" value="feature1" class="checkbox-input">
                <label for="feature1" class="option-label">Adding Todos</label><br>
                <input type="checkbox" id="feature2" name="features[]" value="feature2" class="checkbox-input">
                <label for "feature2" class="option-label">Taking notes</label><br>

                <input type="checkbox" id="feature3" name="features[]" value="feature3" class="checkbox-input">
                <label for "feature3" class="option-label">grouping todos into lists </label><br>

                <input type="checkbox" id="feature2" name="features[]" value="feature2" class="checkbox-input">
                <label for "feature2" class="option-label">projects</label><br>
            </div>
            <div class="form-field">
                <label for="feedback" class="label">Additional Comments:</label><br>
                <textarea id="feedback" name="feedback" class="textarea" ></textarea>
            </div>
            <div class="form-field">
                <label for="category" class="label">Select a Category:</label>
                <select id="category" name="category" class="select">
                    <option value="general">General</option>
                    <option value="bug">Bug Report</option>
                    <option value="suggestion">Suggestion</option>
                    <option value="compliment">Compliment</option>
                </select>
            </div>
        </fieldset>

        <input type="submit" value="Submit" class="submit-button">
    </form>


    <?php include 'footer.php'; ?>

    <script src="../scripts/settings.js"></script>

    <script src="../scripts/validation.js"></script>
</body>
</html>
