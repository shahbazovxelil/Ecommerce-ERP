[["36", "38", "37", "37"],
["26.05.2022", "26.05.2022", "26.05.2022", "26.05.2022"],

["0", "0", "1", "1"],
["asasasasas", "zakir inkar coemmentu", "zamiq tesdiq commenti", "zamiq tesdiq commenti"]]


$tt = ["0", "0", "1", "1"];
$dd = ["asasasasas", "zakir inkar coemmentu", "zamiq tesdiq commenti", "zamiq tesdiq commenti"];

$result = array_map(null, $tt,$dd);

foreach ( $result as $key => $value )
{
echo "$key=$value<br />";
}

//echo $result[$i][$j]."<br>";
//for($i=0;$i<count($result);$i++){
//	for($j=0;$j<count($result);$j++){
    
  //  	echo "<pre>";
	//		print_r( $result[$i][$j]);
	//	echo "<pre>";
//	}

//}
//