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
			for ($j=0; $j < $jmlkriteria; $j++) {
				if($maxmin[$i][$j]==0){
					$data[$i][$j]=$min[$j]/$data[$i][$j];

				}
				else{
					$data[$i][$j]=$data[$i][$j]/$max[$j]; 	
				}
				echo "<br>";
			 	$data[$i][$j]=$data[$i][$j]*$bobot[$i][$j];
			 	$total[$i]+=$data[$i][$j];
			 	print_r($data[$i][$j]);
			}
			echo "total";
			print_r($total[$i]);
			echo "<br>";
			echo "<br>";
		}

		for ($i=0; $i < $jmldata; $i++) {
			if($total[$i]>$sementara){
				$terbesar=$i+1;
				$sementara=$total[$i];
			}
		}


		print_r("alternatif  ");
		print_r($terbesar);
		echo "<br>";
		print_r($max);

				
?>