<?php
include '../controller/main_function.php';
if (isset($_POST['for'])) {
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, "fr_FR");
    $now = date("Y-m-d H:i:s");
    $content = autolink($_POST['message']);
    $insertion = returnPDO()->prepare('INSERT INTO message VALUES("", :id_sender, :id_receiver, :date_time, :message)');
    $insertion->bindParam('message', $content, PDO::PARAM_STR);
    $insertion->bindParam('date_time', $now, PDO::PARAM_STR);
    $insertion->bindParam('id_sender', $_POST['user'], PDO::PARAM_INT);
    $insertion->bindParam('id_receiver', $_POST['for'], PDO::PARAM_INT);
    $insertion->execute();
    notif("Nouveau message de <strong>".idtoname($_POST['user'])."</strong>","".$_POST['for']."","profil.php?profil=".$_POST['user']);
}