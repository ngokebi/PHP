<?php

ob_start();
        $stmt->debugDumpParams();
        $r = ob_get_contents();
        ob_end_clean();
        $r = substr(strstr($r, 'Sent SQL:'), 0, strpos(strstr($r, 'Sent SQL:'), 'Params:'));