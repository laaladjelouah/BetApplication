<!DOCTYPE html>
<html>
<body>


<a href="logout.php?logout=true" >Quitter</a>



    <?php
    include('simple_html_dom.php');
    $html = new simple_html_dom();
    $serieA = "http://www.predictz.com/predictions/italy/serie-a/";
    $ligue1 = "http://www.predictz.com/predictions/france/ligue-1/";
    $liga = "http://www.predictz.com/predictions/spain/primera-liga/";
    $premierLeague = "http://www.predictz.com/predictions/england/premier-league/";
    $bundesliga = "http://www.predictz.com/predictions/germany/bundesliga/";
    $html->load_file($premierLeague);
    $i = 0;
    $j = 0;
    foreach ($html->find('.mtb10') as $data) {

        foreach ($html->find('.mtb10 tr .talc') as $element) {
                    $x =$html->find('.mtb10 tr .odds',$j);
                    $y =$html->find('.mtb10 tr .odds',$j+1);
                    $z = $html->find('.mtb10 tr .odds',$j+2);
            if ($i < 10) {
                echo '<table>
                    <tr>
                            <td>' . strip_tags($element) . '</td>
                            <td> ' . strip_tags($x) . '</td>
                            <td> ' . strip_tags($y) . '</td>
                            <td> ' . strip_tags($z) . '</td>
                    </tr>
                   </table>';
                $i = $i + 1;
                $j = $j+3;
            } else {
                break;
            }

        }
    }




    ?>

</body>
</html>