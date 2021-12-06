<?php

    ini_set("allow_url_fopen", 1);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if (!isset($_POST['valor-busca'])) {
            echo "Invalid connection.";
        } else{
            $resultado = "";
            $json = file_get_contents('https://opentdb.com/api_category.php');

            $obj = json_decode($json);
            foreach ($obj->trivia_categories as $item) {
                if ($item->name == $_POST['valor-busca']) {
                    $resultado = $item->name;
                }
            }
            
            if ($resultado != ""){
                echo "Categoria encontrada!";
            } else{
                echo "No questions found.";
            }
        }
    } else{
        echo "Invalid connection.";
    }

?>