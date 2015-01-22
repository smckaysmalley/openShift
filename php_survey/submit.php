<?php
    session_start();
    if (isset($_POST))
    {
        $file = fopen('results.txt', 'r+');
        $records = explode('|', file_get_contents('results.txt'));
        fclose($file);
        unlink('results.txt');
        $content = "";
        for($i = 0; $i < count($records); ++$i)
        {
            if ($i > 0)
                $content .= '|';
            $average = explode('->', $records[$i]);
            $newavg = (($average[0] * $average[1]) + $_POST[$i]) / ($average[1] + 1);
            $weight = $average[1] + 1;
            
            $content .= $newavg. '->' . $weight;
        }
        
        $file = fopen('results.txt', 'w+');
        fwrite($file, $content);
        fclose($file);
        setcookie('ski_survey', 'taken', time() + 86400, '/');
        $_SESSION['message'] = "Thanks for that! Here are the results!";
        header("Location: /php_survey/results");
    }
?>