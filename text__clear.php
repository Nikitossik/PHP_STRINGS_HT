<?php

    $text = "        <p><b> < Lorem > </b> <em>ipsum</em> <span>&dolor& \"sit\" amet consectetur</span> adipisicing elit</span>     ";

    echo htmlspecialchars(strip_tags(trim($text)));
?>