<?php
/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Teste simples da primeira resposta
 * 
 * LAUS DEO
 */
// inicia uma sessao
session_start();
$_SESSION['loggedin'] = true;

// seta o Cookie para o Browser (sera destruido ao finalizar o browser)
setcookie('Loggedin', true);

// arquivo a ser testado
require_once 'FirstAnswer.php';
