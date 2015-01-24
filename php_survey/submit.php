<?php
    session_start();
    if (isset($_POST))
    {
        $resort = array('targhee', 'jackson', 'kelly', 'park_city', 'deer_valley', 'vail');
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
            
            if (isset($_POST[$i]))
            {
                $newavg = (($average[0] * $average[1]) + $_POST[$i]) / ($average[1] + 1);
                $content .= $newavg . '->' . ++$average[1];
                setcookie($resort[$i], 'taken', time() + 86400);
            }
            else
                $content .= $average[0] . '->' . $average[1];
        }
        
        $file = fopen('results.txt', 'w+');
        fwrite($file, $content);
        fclose($file);
        
        if(count($_POST) == 6)
            setcookie('ski_survey', 'taken', time() + 86400, '/');
        
        $_SESSION['message'] = "Thanks for that! Here are the results!";
        header("Location: /php_survey/results");
    }
    else
    {
        $_SESSION['error'] = "You must take the survey before you can submit!";
        header("Location: /php_survey");
    }
?>