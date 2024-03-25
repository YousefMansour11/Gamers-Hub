<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="globle.css">
</head>
<body>
    <div class="mainnav flex">
        <div class="logo">
            <h1><a href="/">Gamers<span>Hub</span></a></h1>
        </div>
        <div class="navRight">
            <div class="menu" onclick="toggle()">
                <span class="bar b1"></span>
                <span class="bar b2"></span>
                <span class="bar b3"></span>
            </div>
        </div>
    </div>
    <section id="mid">
        <div class="symbol" onclick="show()">
            <span class="cross c1"></span>
            <span class="cross c2"></span>
        </div>
        <div class="midLeft" id="work">
            <div class="list">
                <ul>
                    <li><img src="icons/dashboard.png" alt=""> <a href="admin.html"><span>DASHBOARD</span></a></li>
                    <li><img src="icons/game-design.png" alt=""> <a href="addgames.php"><span>Games</span></a></li>
                    <li><img src="icons/users-alt.png" alt=""><a href="user.html"><span>USERS</span></a></li>
                    <li><img src="icons/exit.png" alt=""><a href="index.php"><span>LOG OUT</span></a></li>
                </ul>
            </div>
        </div>
        <div class="midMid">
            <div class="midMid1">
                <div class="topHead">
                    <h1>New Game </h1>
                </div>
            </div>
            
            <div class="game-container">
                
                <div class="game-card">
                    <img src="path_to_image1.jpg" alt="Game 1">
                    <h3>Game 1</h3>
                </div>
                <div class="game-card">
                    <img src="path_to_image2.jpg" alt="Game 2">
                    <h3>Game 2</h3>
                </div>
            </div>
            
            <button class="add-game-btn" onclick="toggleForm()">Add New Game</button>
            <form  action="" method="post"  id="add-game-form" class="hidden" onsubmit="return false;">
                <h2>Add New Game</h2>
                <label for="game_name">Game Name:</label>
                <input type="text" id="game-name" name="game_name" required>
                <label for="game_image">Game Image URL:</label>
                <input type="text" id="game-image" name="game_image" required>
                <label for="game_price">Game Price:</label>
                <input type="text" id="game-price" name="game_price" required>
                <label for="game_genre">Game Genre:</label>
                <input type="text" id="game-genre" name="game_genre" required>
                <button  type="submit"  name="action" value="submit"  >Add Game</button>
            </form>
            
    </section>
    <script>
        function toggleForm() {
            var form = document.getElementById('add-game-form');
            form.classList.toggle('hidden');
            <?php
    include("connection.php");
    if (@$_POST['action']) {
      if ($_POST['action'] == 'submit') {
        $game_name = $_POST['game_name'];
        $game_image = $_POST['game_image'];
        $game_price = $_POST['game_price'];
        $game_genre = $_POST['game_genre'];

        $sql = "INSERT INTO games (Game_name,Game_image,Game_price,Game_genre) VALUES ('$Game_name', '$Game_image','$Game_price','$Game_genre')";
  
        if ($con->query($sql) === TRUE) {
    ?>
          
            alert("New Game has been added successfully");
            window.location.href = 'addgames.php';
          
    <?php
        } else {
          echo "Error: " . $sql . "<br>" . $con->error;
        }
      }
    }
    ?>
        }
    </script>
   
</body>


