<?php
    $title = $author = $year = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        $year = trim(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT));

        if(empty($title) || empty($author) || empty($year)){
            $message = "<p style='color:#FFC107;'>Please fill out all fields.</p>";
        } else {
            include("connect.php");
            $sql = 'INSERT into books(title, author, year) VALUES(?, ?, ?)';

            try {
                $results = $db->prepare($sql);
                $results->bindValue(1, $title, PDO::PARAM_STR);
                $results->bindValue(2, $author, PDO::PARAM_STR);
                $results->bindValue(3, $year, PDO::PARAM_INT);
                $results->execute();
                $message = "<p style='color:lime;'>Book added successfully!</p>";
                $title = $author = $year = '';
            } catch(Exception $e){
                $message = "<p style='color:#FFC107;'>Error: " . $e->getMessage() . "</p>";
                exit;
            }
        }
    } 
?>

<html>
    <head>
        <title>Add Book</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Book Inventory</h1>
        <div>
            <form method="post">
                <h2>Add New Book</h2>
                Title
                    </br>
                <input type="text" name="title" value="<?php echo $title; ?>"/>
                    </br>
                Author
                    </br>
                <input type="text" name="author" value="<?php echo $author; ?>"/>
                    </br>
                Year
                    </br>
                <input type="number" name="year" value="<?php echo $year; ?>"/>
                    </br>
                <button type="submit">Submit</button>
                <?php if(isset($message)){ echo "$message";} ?>
            </form>
        <p><a href="index.php">View Books</a></p>
        </div>
    </body>
</html>