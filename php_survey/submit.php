<?php
    session_start();
    if (isset($_POST))
    {
        $resort = array('targhee', 'jackson', 'kelly', 'park_city', 'deer_valley', 'vail');
        $taken = "";
        if (isset($_COOKIE['resorts']))
            $taken = $_COOKIE['resorts'];
        
        $records = explode('|', file_get_contents('results.txt'));
        unlink('results.txt');
        $content = "";
        $count = count($_POST);
        
        if (isset($_COOKIE['survey_completion']))
            setcookie('survey_completion', $_COOKIE['survey_completion']+$count, time() + 86400);
        else
            setcookie('survey_completion', $count, time() + 86400);
        
        for($i = 0; $i < count($records); ++$i)
        {
            if ($i > 0)
                $content .= '|';
            
            $average = explode('->', $records[$i]);
            
            if (isset($_POST[$i]))
            {
                $newavg = (($average[0] * $average[1]) + $_POST[$i]) / (++$average[1]);
                $content .= $newavg . '->' . $average[1];
                
                if ($taken != "")
                    $taken .= " ";
                
                $taken .= $resort[$i];
            }
            else
                $content .= $average[0] . '->' . $average[1];
        }
        
        setcookie('resorts', $taken, time() + 86400);
        
        $file = fopen('results.txt', 'w+');
        fwrite($file, $content);
        fclose($file);
        
        $_SESSION['message'] = "Thanks for that! Here are the results!";
        header("Location: /php_survey/results");
    }
    else
    {
        $_SESSION['error'] = "You must take the survey before you can submit!";
        header("Location: /php_survey");
    }
?>