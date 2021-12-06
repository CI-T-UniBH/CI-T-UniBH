<?php

    require_once("connect.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if (!isset($_POST['tarefa'])) {
            echo "Invalid connection.";
        } else{
            $tarefa = $_POST['tarefa'];
            $insert = "INSERT INTO informacoes(nome_tarefa, finalizou) VALUES ('$tarefa', 0)";
            if(mysqli_query($conn, $insert)){
                echo "Tarefa inserida com sucesso!";
            } else{
                echo "Houve um erro a inserir a tarefa, tente novamente.";
            }
        }
    } else{
        echo "Invalid connection.";
    }   

    mysqli_close($conn);
?>