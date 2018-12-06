<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Pengambilan Keputusan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bulma.min.css" /> 
</head>
<body>
	<div class="hero is-info has-text-centered is-medium is-bold">
		<div class="hero-body container">
			<h1 class="title is-1">Sistem Pengambilan Keputusan</h1>
			<h1 class="subtitle is-2">Metode Saw</div>
		</div>
	</div>
	<section class="section">
	<div class="container">
		
<?php
error_reporting(E_ERROR | E_PARSE);
		$data = array(
				array('5','5','7','7.5','7','4'),
				array('6','8','7','8.2','7','4.7'),
				array('7','8.3','8.7','7.5','8.2','6.5'),
				array('7','6.2','8.7','7.5','7','6.5'),
				array('6.8','7.3','7.5','8.7','8.8','8.5'),
		);

		$bobot= array(
				array('5','4','6','4','3','9'),
				array('5','4','6','4','3','9'),
				array('5','4','6','4','3','9'),
				array('5','4','6','4','3','9'),
				array('5','4','6','4','3','9'),
		);
		$maxmin=array(
				array('1','0','1','1','1','0'),
				array('1','0','1','1','1','0'),
				array('1','0','1','1','1','0'),
				array('1','0','1','1','1','0'),
				array('1','0','1','1','1','0'),
		);

		$jmldata=count($data);
		$jmlkriteria=count($data[0]);

		for ($i=0; $i < $jmlkriteria; $i++) { 
			for ($j=0; $j < $jmldata; $j++) {
			
				if (!isset($min[$i])) {
					$min[$i] = $data[$j][$i];
				}
				else {
					if ($min[$i] > $data[$j][$i]) {
						$min[$i] = $data[$j][$i];
					}
				}

				if (!isset($max[$i])) {
					$max[$i] = $data[$j][$i];
				}
				else {
					if ($max[$i] < $data[$j][$i]) {
						$max[$i] = $data[$j][$i];
					}
				}
				
			}

		}
		$sementara=0;
		for ($i=0; $i < $jmldata; $i++) { 
			echo '
			 <table class="table is-bordered is-fullwidth"> 
			 <tr>
			';
			for ($j=0; $j < $jmlkriteria; $j++) {
				if($maxmin[$i][$j]==0){
					$data[$i][$j]=$min[$j]/$data[$i][$j];

				}
				else{
					$data[$i][$j]=$data[$i][$j]/$max[$j]; 	
				}
				
			 	$data[$i][$j]=$data[$i][$j]*$bobot[$i][$j];
				 $total[$i]+=$data[$i][$j];
				 
				echo ' 
				 <td>
				 '.$data[$i][$j].'
				 </td>
				';
			
			}
			echo '
			</tr> 
			<tr>
			<td>Total</td>
			<td colspan="5"><b>'.$total[$i].'</b></td>
			</tr>
			 </table>
			';
			
			echo "<hr>";
		}

		for ($i=0; $i < $jmldata; $i++) {
			if($total[$i]>$sementara){
				$terbesar=$i+1;
				$sementara=$total[$i];
			}
		}

		echo '<h3 class="title is-3">Alternatif</h3>';
		echo '
		 <table class="table is-bordered is-fullwidth is-hoverable">  
		'; 
		ec+++++++ho '
		<thead> 
		<tr>
			<th>Index</th>
			<th>Value</th>
		</tr>
		</thead>
		<tr>
		<td colspan="2">
		Angka terbesar adalah <b>['.$terbesar.']</b>
		</td>
		</tr>
		';
		/*
		for($i = 0; $i < count($max); $i++){
			echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$max[$i].'</td>
			</tr>';
		}
		*/
		
		echo '
		 </table>
		';
?>
</div>
	</section>
</body>
</html>