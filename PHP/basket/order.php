<?php

setcookie('basket','1',time() - 3600);
    header('Location: http://php.local/basket/index.php?route=success');

?>