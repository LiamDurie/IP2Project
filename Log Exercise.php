<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Happy Health Fitness Health</title>
</head>
<body>
<div class="container">
    <header>
        <a href=Physical_Form.php><img class="logo" src="images/logo.png" width="200" height="120" title="Homepage" alt="Happy Health Logo"></a>
        <div class="icon">

            <img src="images/profile.png" width="50" height="50" alt="profile icon"><br>
            <img src="images/setting.png" width="50" height="50" alt="setting icon"><br>
            <a href=fitness.html><img src="images/backarrow.png" width="50" height="50" alt="backarrow icon"></a><br>
        </div>
    </header>

    <br><br><br>
    <nav>
        <ul>
            <li><a href="Physical_Form.php" >Physical Health</a></li>
            <li><a href="mental.html">Mental Wellbeing</a></li>
            <li><a href="fitness.html" class="active">Fitness</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h3>Log Exercise</h3>
            <form action="logExercise.php" method="post" id="logExercise">
                <fieldset>

                    <div class="form_input-group">
                        <label for="title">Exercise Title:</label>
                        <input type="text" name="title" id="title" pattern="^[a-zA-Z0-9]+$" class="form_input" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="num_hrs">Hours:</label>
                        <input type="number" id="num_hrs" name="num_hrs" min="0" max="12" class="form_input" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="num_mins">Minutes:</label>
                        <input type="number" id="num_mins" name="num_mins" min="1" max="60" class="form_input" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="num_calories">Calories burnt:</label>
                        <input type="number" id="num_calories" name="num_calories" min="1" class="form_input" autofocus>
                    </div>

                </fieldset>

                <button class="form_button2" type="reset">Reset</button>
                <button class="form_button3" type="submit">Submit</button>

                <h3>Completed Exercises</h3>
                <?php
                $conn = new mysqli('localhost','root','','users');
                if($conn->connect_error){
                    echo "$conn->connect_error";
                    die("Connection Failed : ". $conn->connect_error);
                }else {
                $result = mysqli_query($conn,"SELECT * FROM exercise");
                ?>

                <table  style= "background-color: white; color: black; margin: 0 auto;" >
                    <thead>
                    <tr>
                        <th>Exercise Title</th>
                        <th>Hours</th>
                        <th>Minutes</th>
                        <th>Calories Burnt</th>
                        <th>Completed</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    while( $row = mysqli_fetch_assoc( $result ) )
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['exerciseTitle'] ?></td>
                            <td><?php echo $row['hours'] ?></td>
                            <td><?php echo $row['minutes'] ?></td>
                            <td><?php echo $row['caloriesBurnt'] ?></td>
                            <td><?php echo $row['completed'] ?></td>
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

    <footer>
        <a href="fitnessChallenges.html">
            <button class="form_button5" type="submit">Continue to next activity</button>
        </a>
    </footer>
</div>
</body>
</html>