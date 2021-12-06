<?php

    ini_set("allow_url_fopen", 1);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if (!isset($_POST['valor-busca'])) {
            echo "Invalid connection.";
        } else{
            $resultado = "";
            $json = file_get_contents('https://opentdb.com/api.php?amount=50');

            $obj = json_decode($json);
            foreach ($obj->results as $item) {
                if ($item->question == $_POST['valor-busca']) {
                    $resultado = $item->question;
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