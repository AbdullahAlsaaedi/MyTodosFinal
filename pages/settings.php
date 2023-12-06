<!-- 
    Abdullah Alsaaedi 1936031
    Khalid Alghamdi 2037040
    CS1
    2023/11/30
 -->

<!DOCTYPE html>
<html>

    <head>
        <title>MyTodos</title>
        <link rel="stylesheet" href="../global/styles.css">

    </head>

    <body>
        <!-- //////// navigation //////// -->

        <?php include 'header.php'; ?>



        <div class="settings-container">
            <div class="setting">
                <label class="label" for="theme">Theme:</label>
                <select id="theme">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                    
                </select>
            </div>

            

            <div class="setting">
                <button class="save-button">Save Settings</button>
            </div>


        </div>

        <?php include 'footer.php'; ?>


    <script src="../scripts/settings.js"></script>
    </body>

</html>