<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Primeira resposta da prova tecnica
 * 
 * LAUS DEO
 */
// verifica se ha registro dos indices loggedin e Loggedin nas SUPER GLOBAIS 
// $_SESSION e $_COOKIE
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || filter_input(INPUT_COOKIE, 'Loggedin') == true) {

    // redireciona o cliente
    header("Location: http://www.google.com");
    exit();
}
