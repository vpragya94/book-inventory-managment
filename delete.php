<?php
    include("connect.php");
    
    try {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM books WHERE id=?";
        $result = $db->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    } catch (Exception $e) {
        echo "Unable to delete book, error in db. </br>";
        echo "Error: ".$e->getMessage()."</br>";
        exit;
    }

    header("Location:index.php");
?>
