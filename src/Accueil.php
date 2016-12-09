<!DOCTYPE html>
<html>
<head>
    <title>Site de paris sportifs</title>

    <link href="CSS/home.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="divWrapper">
    <div id="divHeader"><a href="logout.php?logout=true">Quitter</a></div>
    <div id="divLine">
        <div id="divLinks">
            <div id="divNav">
                <ul>

                    <li><a href="#">Ligue 1</a></li>
                    <li><a href="#" class="current">Premier League</a></li>
                    <li><a href="#">Serie A</a></li>
                    <li><a href="#">Liga</a></li>
                    <li><a href="#">Bundesliga</a></li>
                </ul>
            </div>
        </div>
        <div id="divLine"></div>
        <div id="divAbout">
            <div id="divContent"><h5>Premier League</h5>
                <?php
                include('simple_html_dom.php');
                $html = new simple_html_dom();
                $serieA = "http://www.predictz.com/predictions/italy/serie-a/";
                $ligue1 = "http://www.predictz.com/predictions/france/ligue-1/";
                $liga = "http://www.predictz.com/predictions/spain/primera-liga/";
                $premierLeague = "http://www.predictz.com/predictions/england/premier-league/";
                $bundesliga = "http://www.predictz.com/predictions/germany/bundesliga/";
                $html->load_file($premierLeague);
                $i = 1;
                $j = 0;
                echo '<table> <th></th> <th align="center"> 1 </th> <th align="center"> N </th> <th align="center"> 2 </th>';
                foreach ($html->find('.mtb10') as $data) {

                    foreach ($html->find('.mtb10 tr .talc') as $element) {
                        $x = $html->find('.mtb10 tr .odds', $j);
                        $y = $html->find('.mtb10 tr .odds', $j + 1);
                        $z = $html->find('.mtb10 tr .odds', $j + 2);
                        if ($i < 11) {
                            echo '
                         <tr>
                                 <td>' . strip_tags($element) . '</td>
                                 <td style="text-align:center;"> <button align="center" style="width: 50px;" id="cote1-match' . $i . '"> ' . strip_tags($x) . '</button></td>
                                 <td style="text-align:center;"><button style="width: 50px;" id="coteN-match' . $i . '"> ' . strip_tags($y) . '</button></td>
                                <td style="text-align:center;"><button style="width: 50px;" id="cote2-match' . $i . '"> ' . strip_tags($z) . '</button></td>
                         </tr>';

                            $i = $i + 1;
                            $j = $j + 3;
                        } else {
                            break;
                        }

                    }
                }
                echo '</table>';


                ?>
            </div>
        </div>

    </div>
</div>


</body>
</html>