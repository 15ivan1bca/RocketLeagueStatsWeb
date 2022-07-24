<?php    

$apikeys = ['x', 'y'];

if(empty($_GET['apikey'])) die("No API key provided");
    if(!in_array($_GET['apikey'], $apikeys)) die("Invalid API key");
    
echo ("Test1");
$urls = array('api-url-1',
'api-url-2',
'api-url-3',
'api-url-4');

$rangos = array('Sin rango','Bronce I', 'Bronce II', 'Bronce III', 'Plata I','Plata II', 'Plata III', 'Oro I', 'Oro II','Oro III', 'Platino I', 'Platino II', 'Platino III','Diamante I', 'Diamante II', 'Diamante III', 'Campeón I','Campeón II', 'Campeón III', 'Gran Campeón I', 'Gran Campeón II','Gran Campeón III','Leyenda Supersonica');
$divisiones = array('Division 1','Division 2','Division 3','Division 4');
$imgs = array('https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-0.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-1.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-2.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-3.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-4.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-5.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-6.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-7.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-8.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-9.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-10.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-11.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-12.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-13.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-14.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-15.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-16.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-17.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s4-18.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s15rank19.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s15rank20.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s15rank21.png','https://trackercdn.com/cdn/tracker.gg/rocket-league/ranks/s15rank22.png');

    $servername = "a";
    $username = "b";
    $password = "c";
    $dbname = "d";

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        echo("Test2");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


 foreach($urls as $url) {
	$json = file_get_contents($url);
	$jsondecode = json_decode($json, true);
	echo "Test3";
    usleep(5000000);
    
    $updaterank = "UPDATE rlstatsusers SET avatar = '".$jsondecode["Avatar"]."', rango = '".$rangos[$jsondecode["RankedSeasons"][20][13]["Tier"]]."', imagenRango = '".$imgs[$jsondecode["RankedSeasons"][20][13]["Tier"]]. "', division = '".$divisiones[$jsondecode["RankedSeasons"][20][13]["Division"]]."', mmr = '".$jsondecode["RankedSeasons"][20][13]["SkillRating"]."', racha = '".$jsondecode["RankedSeasons"][20][13]["WinStreak"]."', jugados = '".$jsondecode["RankedSeasons"][20][13]["MatchesPlayed"]."' WHERE name = '".$jsondecode["DisplayName"]."'";   
    $conn->query($updaterank);     
    echo("Test4");
    }
    $conn->close();
  }    
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}

?>