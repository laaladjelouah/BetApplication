<!DOCTYPE html>
<html>
<head>
    <title>Site de paris sportifs</title>

    <link href="CSS/home.css" rel="stylesheet" type="text/css">
    <script src = "https://code.jquery.com/jquery-3.1.1.js"></script>
</head>
<body>


<div id="divWrapper">
    <div id="divHeader"><a href="logout.php?logout=true">Quitter</a></div>
    <div id="divLine">
        <div id="divLinks">
            <div id="divNav">
                <ul>

                    <li><a id="Fra" href="#" class="current" onclick="changeToFrance();">Ligue 1</a></li>
                    <li><a id="Ang" href="#" onclick="changeToEngland();">Premier League</a></li>
                    <li><a id="Ita" href="#" onclick="changeToItaly();">Serie A</a></li>
                    <li><a id="Esp" href="#" onclick="changeToSpain();">Liga</a></li>
                    <li><a id="All" href="#" onclick="changeToGermany();">Bundesliga</a></li>
                </ul>
            </div>
        </div>
        <div id="divLine"></div>
        <div id="divAbout">
            <div id="divContent"><h5 id="country">Ligue 1</h5>
                <?php
                include('simple_html_dom.php');
                $html = new simple_html_dom();
                $serieA = "http://www.predictz.com/predictions/italy/serie-a/";
                $ligue1 = "http://www.predictz.com/predictions/france/ligue-1/";
                $liga = "http://www.predictz.com/predictions/spain/primera-liga/";
                $premierLeague = "http://www.predictz.com/predictions/england/premier-league/";
                $bundesliga = "http://www.predictz.com/predictions/germany/bundesliga/";
                if (isset($_POST['value']))
                {
                    $championnat = $_POST['value'];

                    header("Refresh:0");
                }
                else {
                    $championnat = $ligue1;

                }
                $html->load_file($championnat);
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

<script>
    function changeToEngland(){
        document.getElementById("Ang").className = "current";
        document.getElementById("Ita").className = "";
        document.getElementById("Fra").className = "";
        document.getElementById("Esp").className = "";
        document.getElementById("All").className = "";
        document.getElementById("country").innerHTML="Premier league";
        var varChampionnat = <?php echo json_encode($championnat);?>;
        var england = <?php echo json_encode($premierLeague);?>;
        varChampionnat = england;


        $.post(window.location, {value: varChampionnat});





    }

    function changeToFrance(){
        document.getElementById("Ang").className = "";
        document.getElementById("Ita").className = "";
        document.getElementById("Fra").className = "current";
        document.getElementById("Esp").className = "";
        document.getElementById("All").className = "";
        document.getElementById("country").innerHTML="Ligue 1";
        var varChampionnat = <?php echo json_encode($championnat);?>;
        var france = <?php echo json_encode($ligue1);?>;
        varChampionnat = france;




    }

    function changeToItaly(){
        document.getElementById("Ang").className = "";
        document.getElementById("Ita").className = "current";
        document.getElementById("Fra").className = "";
        document.getElementById("Esp").className = "";
        document.getElementById("All").className = "";
        document.getElementById("country").innerHTML="Serie A";
        var varChampionnat = <?php echo json_encode($championnat);?>;
        var italy = <?php echo json_encode($serieA);?>;
        varChampionnat = italy;




    }

    function changeToSpain(){
        document.getElementById("Ang").className = "";
        document.getElementById("Ita").className = "";
        document.getElementById("Fra").className = "";
        document.getElementById("Esp").className = "current";
        document.getElementById("All").className = "";
        document.getElementById("country").innerHTML="Liga";
        var varChampionnat = <?php echo json_encode($championnat);?>;
        var spain = <?php echo json_encode($liga);?>;
        varChampionnat = spain;




    }

    function changeToGermany(){
        document.getElementById("Ang").className = "";
        document.getElementById("Ita").className = "";
        document.getElementById("Fra").className = "";
        document.getElementById("Esp").className = "";
        document.getElementById("All").className = "current";
        document.getElementById("country").innerHTML="Bundesliga";
        var varChampionnat = <?php echo json_encode($championnat);?>;
        var germany = <?php echo json_encode($bundesliga);?>;
        varChampionnat = germany;




    }
</script>