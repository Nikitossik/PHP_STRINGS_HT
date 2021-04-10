<?php 
$text = "Уважаемый Мы будем рады видеть Вашего сына на нашем мероприятии. Ждем его 25 октября. Оргкомитет.";
$phrases = explode('.', $text);
$phrases[0] = str_replace('Уважаемый', 'Пётр!', $phrases[0]);
$phrases[2] = str_replace('Оргкомитет', 'Администрация', $phrases[2]);
$phrases[0] = str_replace('Вашего сына', 'Вашу дочь', $phrases[0]);
$phrases[1] = str_replace('его', 'её', $phrases[1]);

$text = implode('.', $phrases);

echo $text;

?>