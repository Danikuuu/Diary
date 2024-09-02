    <?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: profile.php");
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Error executing query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Megrim&display=swap');
    *{
        padding: 0;
        margin: 0;
    }
    .main { 
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        place-items: center;
        flex-direction: column;
        background-repeat: no-repeat;
        width: 30%;
        margin-top: 70px;
        background-repeat: cover;
        margin-left: 450px;
    }

    .container form {
        display: flex;
        justify-content: center;
        align-items: center;
        place-items: center;
        flex-direction: column;
    }
    .container h2 {
        font-family: Megrim;
        font-size: 50px;
        margin-bottom: 30px;
    }
    .container img {
        width: 40%;
        margin-bottom: 10px;
    }
    img {
        width: 80%;
        height:auto;
    }
    .image {
        width: 40%;
        height: 1vh;
        margin-top: 50px;
    }

    input[type=password] {
        margin-bottom: 20px;
    }
    input{
        width: 130%;
        height: 30px;
    }

    .button {
    background-color: #ffffff00;
    color: #fff;
    width: 8.5em;
    height: 2.9em;
    border: #3654ff 0.2em solid;
    border-radius: 11px;
    text-align: right;
    transition: all 0.6s ease;
    }

    .button:hover {
    background-color: #3654ff;
    cursor: pointer;
    }

    .button svg {
    width: 1.6em;
    margin: -0.2em 0.8em 1em;
    position: absolute;
    display: flex;
    transition: all 0.6s ease;
    }

    .button:hover svg {
    transform: translateX(5px);
    }

    .text {
    margin: 0 1.5em
    }
</style>
<body>


    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <center><div class="image">
        <center><img src="book.png" alt="" srcset=""></center>  
    </div></center>
    
<div class="container">
    <center><h2>Diary ng south 1</h2></center>
        <div class="main">
            <form action="login.php" method="post">

                <input type="text" name="username" required placeholder="Enter your name"><br>

                <input type="password" name="password" required placeholder="Enter password"><br>

                <center><img src="lock.png" alt="" srcset=""></center>

                <center><button class="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                </svg>

                
                <div class="text">
                    Open
                </div>

                </button></center>
            </form>
        </div>
    </div></center>

</body>
</html>
