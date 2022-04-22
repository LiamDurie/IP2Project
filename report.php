<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>


    <title>Happy Health Physical Health</title>
</head>
<body>
<div class="container">
    <header>
        <a href=Physical_Form.php><img class="logo" src="images/Logo.png" width="200" height="120" title="Homepage" alt="Happy Health Logo"></a>
        <div class="icon">
            <img src="images/profile.png" width="50" height="50" alt="profile icon"><br>
            <img src="images/setting.png" width="50" height="50" alt="setting icon"><br>
            <img src="images/backarrow.png" width="50" height="50" alt="backarrow icon"><br>
        </div>
    </header>

    <br><br><br>
    <nav>
        <ul>
            <li><a href="Physical_Form.php">Physical Health</a></li>
            <li><a href="mental.html">Mental Wellbeing</a></li>
            <li><a href="fitness.html">Fitness</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Report</h2>
            <?php
            $conn = new mysqli('localhost','root','','users');
            if($conn->connect_error){
                echo "$conn->connect_error";
                die("Connection Failed : ". $conn->connect_error);
            }else {
            $result = mysqli_query($conn,"SELECT * FROM physiologicaldata, nutrition");
                while( $row = mysqli_fetch_assoc( $result ) )
                {
                    $heartRate = $row['heartRate'];
                    $bloodPressure = $row['bloodPressure'];
                    $bloodTemperature = $row['bloodTemperature'];
                    $bloodOxygen = $row['bloodOxygen'];
                    $respirationRate = $row['respirationRate'];
                    $glassesOfWater = $row['glassesofWater'];
                    $fruit = $row['fruit'];
                    $veg = $row['veg'];
                }
            ?>
                <form id="formReport">
                    Heart Rate:  <b><?php echo $heartRate ?></b> bpm <br>
                    Blood Pressure:  <b><?php echo $bloodPressure ?></b> sys<br>
                    Blood Temperature:  <b><?php echo $bloodTemperature ?></b> °C<br>
                    Blood Oxygen:  <b><?php echo $bloodOxygen ?></b> %Sp02<br>
                    Respiration Rate:  <b><?php echo $respirationRate ?></b> bpm<br>
                    Glasses of Water:  <b><?php echo $glassesOfWater ?></b> glasses<br>
                    Fruit:  <b><?php echo $fruit ?></b> fruit<br>
                    Vegetables:  <b><?php echo $veg ?></b> vegetables<br>

                    <br>

                    <table  style= "background-color: white; color: black; margin: 0 auto;" >
                        <thead>
                        <tr>
                            <th>Diary Title</th>
                            <th>Diary Date</th>
                            <th>Diary Entry</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = mysqli_query($conn,"SELECT * FROM diaryentries");
                        while( $row = mysqli_fetch_assoc( $result ) )
                        {
                            ?>
                            <tr>
                                <td><?php echo $row['diaryTitle'] ?></td>
                                <td><?php echo $row['diaryDate'] ?></td>
                                <td><?php echo $row['diaryEntry'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <br>

                    <table  style= "background-color: white; color: black; margin: 0 auto;" >
                        <thead>
                        <tr>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = mysqli_query($conn,"SELECT * FROM fooddiary");
                        while( $row = mysqli_fetch_assoc( $result ) )
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['breakfast'] ?></td>
                            <td><?php echo $row['lunch'] ?></td>
                            <td><?php echo $row['Dinner'] ?></td>
                        </tr>
                        <?php
                        }
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php mysqli_close($conn); ?>

                </form>
        </section>
    </main>
