<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>


    <title>Happy Health Physical Health</title>
</head>
<body>
<div class="container">
    <header>
        <a href=Physical_Form.php><img class="logo" src="images/logo.png" width="200" height="120" title="Homepage" alt="Happy Health Logo"></a>
        <div class="icon">

            <img src="images/profile.png" width="50" height="50" alt="profile icon"><br>
            <img src="images/setting.png" width="50" height="50" alt="setting icon"><br>
            <a href=Physical_Form.php><img src="images/backarrow.png" width="50" height="50" alt="backarrow icon"></a><br>
        </div>
    </header>

    <br><br><br>
    <nav>
        <ul>
            <li><a href="Physical_Form.php"  class="active">Physical Health</a></li>
            <li><a href="mental.html">Mental Wellbeing</a></li>
            <li><a href="fitness.html">Fitness</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Physiological Data</h2>
            <form action="Add%20Reminder.php" method="post" id="health">
                <?php
                $conn = new mysqli('localhost','root','','users');
                if($conn->connect_error){
                    echo "$conn->connect_error";
                    die("Connection Failed : ". $conn->connect_error);
                }else {
                $result = mysqli_query($conn,"SELECT * FROM physiologicaldata");

                while( $row = mysqli_fetch_assoc( $result ) )
                {
                    $heartRate = $row['heartRate'];
                    $bloodPressure = $row['bloodPressure'];
                    $bloodTemperature = $row['bloodTemperature'];
                    $bloodOxygen = $row['bloodOxygen'];
                    $respirationRate = $row['respirationRate'];
                }
                ?>

                <fieldset>
                    <div class="form_input-group">
                        <label for="heart">Heart Rate: (bpm)</label>
                        <input type="text" name="heart" id="heart" pattern="^[0-9]{3}$" class="form_input" value="<?php echo $heartRate ?>" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="blood_pressure">Blood pressure: (sys)</label>
                        <input type="text" name="sys" id="blood_pressure" pattern="^[0-9]{3}$" class="form_input" value="<?php echo $bloodPressure ?>" autofocus> <br>
                    </div>

                    <div class="form_input-group">
                        <label for="blood_temperature">Blood temperature: (??C)</label>
                        <input type="text" name="temperature" id="blood_temperature" pattern="^[0-9]{3}$" class="form_input" value="<?php echo $bloodTemperature ?>" autofocus>
                    </div>

                    <div class="form_input-group" >
                        <label for="blood_oxygen">Blood oxygen: (%Sp02)</label>
                        <input type="text" name="oxygen" id="blood_oxygen" pattern="^[0-9]{3}$" class="form_input" value="<?php echo $bloodOxygen ?>" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="respiration_rate">Respiration rate: (bpm)</label>
                        <input type="text" name="respiration" id="respiration_rate" pattern="^[0-9]{3}$" class="form_input" value="<?php echo $respirationRate ?>" autofocus>
                    </div>
                </fieldset>
                <button class="form_button" type="submit">Submit</button>
            </form>
        </section>
        <?php
        }
        ?>

        <section>
            <h2>Report</h2>
            <a href="report.php">
                <button class="report_button" type="submit">Summary</button> <br>
            </a>
        </section>

        <section>
            <h2>Reminders</h2>

            <a href="addReminder.php">
                <button class="form_button4" type="submit">Add Reminder</button>
            </a>
            <a href="Reminder%20History.php">
                <button class="form_button4" type="submit">Reminder History</button><br>
            </a>

            <form action="" method="get" id="addReminder">
                <fieldset>
                    <div class="form_input-group">
                        <label for="title">Reminder Title:</label>
                        <input type="text" name="reminder" id="title" pattern="^[a-zA-Z0-9]+$" class="form_input" autofocus required>
                    </div>

                    <div class="form_input-group">
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" class="form_input" autofocus required>
                    </div>

                    <div class="form_input-group">
                        <label for="date">Date:</label>
                        <input type="date" name="reminder" id="date" class="form_input" autofocus>
                    </div>
                </fieldset>
                <button class="form_button" type="submit">Submit</button>
            </form>


        </section>
    </main>
</div>
</body>
</html>