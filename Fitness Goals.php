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
            <a href=fitnessChallenges.html><img src="images/backarrow.png" width="50" height="50" alt="backarrow icon"></a><br>
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
            <h3>Fitness Goals</h3>
            <form action="fitnessGoals.php" method="post" id="goals">
                <fieldset>
                    <div class="form_input-group">
                        <label for="title">Goal:</label>
                        <input type="text" name="title" id="title" pattern="^[a-zA-Z0-9]+$" class="form_input" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="date">Achieve by:</label>
                        <input type="date" id="date" name="date" class="form_input" autofocus>
                    </div>

                    <div class="form_input-group">
                        <label for="note">Note:</label>
                        <input type="text" name="note" id="note" class="form_input" autofocus>
                    </div>

                </fieldset>

                <button class="form_button2" type="reset">Reset</button>
                <button class="form_button3" type="submit">Submit</button>

                <h3>Goals</h3>
                <?php
                $conn = new mysqli('localhost','root','','users');
                if($conn->connect_error){
                    echo "$conn->connect_error";
                    die("Connection Failed : ". $conn->connect_error);
                }else {
                $result = mysqli_query($conn,"SELECT * FROM goals");
                ?>

                <table  style= "background-color: white; color: black; margin: 0 auto;" >
                    <thead>
                    <tr>
                        <th>Goal</th>
                        <th>Due Date</th>
                        <th>Note</th>
                        <th>Completed</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while( $row = mysqli_fetch_assoc( $result ) )
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['goal'] ?></td>
                            <td><?php echo $row['dueDate'] ?></td>
                            <td><?php echo $row['note'] ?></td>
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
        <a href="Physical_Form.php">
            <button class="form_button5" type="submit">Back to Physical Health Section</button>
        </a>
    </footer>
</div>
</body>
</html>