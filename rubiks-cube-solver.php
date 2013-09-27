<?php

/*
   Program Created by Paul Schimmelpfenning and is licensed under the 
   GNU Affero General Public License version 3 or later License.
   See the COPYRIGHT file.
   My website is at http://www.pjschim.com
 */

$colourcheck = 0;
$uniquecheck = 0;
$permutationcheck = 0;
$cornercheck = 0;
$edgecheck = 0;
//orinial positions
$basememory = array();
//side labels
$sides = array("U","L","F","R","B","D");
//centre pieces
$centres = array();
// Ask for data input and figure out centres
foreach ($sides as $side) {
	for ($p = 1; $p < 10; $p++) {
		echo $side . $p . ": ";
		$basememory[$side . $p] = trim(fgets(STDIN));
		if ($p == 5)
			$centres[$side . $p] = $basememory[$side . $p];
	}
}
//making sure only 6 colours appear, there are 9 of each colour, and the centres are all different
$centres = array_unique($centres);
$colours = array_unique($basememory);
$checksum = 0;
if (count($colours) == 6 && count($centres) == 6) {
	foreach ($colours as $colour) {
		$ninecolours = array_count_values($basememory);
		if ($ninecolours[$colour] == 9)
			$checksum ++;
		if ($checksum == 6)
			$colourcheck = 1;
	}
}
//setup of corners and edges
$corners = array(
	array($basememory["U1"], $basememory["L1"], $basememory["B3"]),
	array($basememory["U3"], $basememory["B1"], $basememory["R3"]),
	array($basememory["U9"], $basememory["R1"], $basememory["F3"]),
	array($basememory["U7"], $basememory["F1"], $basememory["L3"]),
	array($basememory["D1"], $basememory["L9"], $basememory["F7"]),
	array($basememory["D3"], $basememory["F9"], $basememory["R7"]),
	array($basememory["D9"], $basememory["R9"], $basememory["B7"]),
	array($basememory["D7"], $basememory["B9"], $basememory["L7"])
);
$cornersfinish = array(
	array(
		array($basememory["U5"], $basememory["L5"], $basememory["B5"]),
		array($basememory["L5"], $basememory["B5"], $basememory["U5"]),
		array($basememory["B5"], $basememory["U5"], $basememory["L5"])
	),
	array(
		array($basememory["U5"], $basememory["B5"], $basememory["R5"]),
		array($basememory["B5"], $basememory["R5"], $basememory["U5"]),
		array($basememory["R5"], $basememory["U5"], $basememory["B5"])
	),
	array(
		array($basememory["U5"], $basememory["R5"], $basememory["F5"]),
		array($basememory["R5"], $basememory["F5"], $basememory["U5"]),
		array($basememory["F5"], $basememory["U5"], $basememory["R5"])
	),
	array(
		array($basememory["U5"], $basememory["F5"], $basememory["L5"]),
		array($basememory["F5"], $basememory["L5"], $basememory["U5"]),
		array($basememory["L5"], $basememory["U5"], $basememory["F5"])
	),
	array(
		array($basememory["D5"], $basememory["L5"], $basememory["F5"]),
		array($basememory["L5"], $basememory["F5"], $basememory["D5"]),
		array($basememory["F5"], $basememory["D5"], $basememory["L5"])
	),
	array(
		array($basememory["D5"], $basememory["F5"], $basememory["R5"]),
		array($basememory["F5"], $basememory["R5"], $basememory["D5"]),
		array($basememory["R5"], $basememory["D5"], $basememory["F5"])
	),
	array(
		array($basememory["D5"], $basememory["R5"], $basememory["B5"]),
		array($basememory["R5"], $basememory["B5"], $basememory["D5"]),
		array($basememory["B5"], $basememory["D5"], $basememory["R5"])
	),
	array(
		array($basememory["D5"], $basememory["B5"], $basememory["L5"]),
		array($basememory["B5"], $basememory["L5"], $basememory["D5"]),
		array($basememory["L5"], $basememory["D5"], $basememory["B5"])
	)
);
$edges = array(
	array($basememory["U2"], $basememory["B2"]),
	array($basememory["U6"], $basememory["R2"]),
	array($basememory["U8"], $basememory["F2"]),
	array($basememory["U4"], $basememory["L2"]),
	array($basememory["B6"], $basememory["L4"]),
	array($basememory["B4"], $basememory["R6"]),
	array($basememory["F6"], $basememory["R4"]),
	array($basememory["F4"], $basememory["L6"]),
	array($basememory["D2"], $basememory["F8"]),
	array($basememory["D6"], $basememory["R8"]),
	array($basememory["D8"], $basememory["B8"]),
	array($basememory["D4"], $basememory["L8"])
);
$edgesfinish = array(
	array(
		array($basememory["U5"], $basememory["B5"]),
		array($basememory["B5"], $basememory["U5"])
	),
	array(
		array($basememory["U5"], $basememory["R5"]),
		array($basememory["R5"], $basememory["U5"])
	),
	array(
		array($basememory["U5"], $basememory["F5"]),
		array($basememory["F5"], $basememory["U5"])
	),
	array(
		array($basememory["U5"], $basememory["L5"]),
		array($basememory["L5"], $basememory["U5"])
	),
	array(
		array($basememory["B5"], $basememory["L5"]),
		array($basememory["L5"], $basememory["B5"])
	),
	array(
		array($basememory["B5"], $basememory["R5"]),
		array($basememory["R5"], $basememory["B5"])
	),
	array(
		array($basememory["F5"], $basememory["R5"]),
		array($basememory["R5"], $basememory["F5"])
	),
	array(
		array($basememory["F5"], $basememory["L5"]),
		array($basememory["L5"], $basememory["F5"])
	),
	array(
		array($basememory["D5"], $basememory["F5"]),
		array($basememory["F5"], $basememory["D5"])
	),
	array(
		array($basememory["D5"], $basememory["R5"]),
		array($basememory["R5"], $basememory["D5"])
	),
	array(
		array($basememory["D5"], $basememory["B5"]),
		array($basememory["B5"], $basememory["D5"])
	),
	array(
		array($basememory["D5"], $basememory["L5"]),
		array($basememory["L5"], $basememory["D5"])
	)
);
//unique edges and corners test
if ($colourcheck) {
	$uniquecorners = array();
	$uniqueedges = array();
	foreach ($corners as $i) {
		for ($j = 0; $j < 8; $j++) {
			if (in_array($i, $cornersfinish[$j]))
				$uniquecorners[] = $j;
		}
	}
	foreach ($edges as $i) {
		for ($j = 0; $j < 12; $j++) {
			if (in_array($i, $edgesfinish[$j]))
				$uniqueedges[] = $j;
		}
	}
	$uniquecorners = array_unique($uniquecorners);
	$uniqueedges = array_unique($uniqueedges);
	if ((count($uniquecorners) == 8) && (count($uniqueedges) == 12))
		$uniquecheck = 1;
}
//permutation parity test
if ($uniquecheck) {
	$ccheck = 0;
	$echeck = 0;
	$clist = array();
	$elist = array();
	$error = 0;
	foreach ($corners as $corner) {
		if (!$error) {
			$error = 1;
			for ($i = 0; $i < 8; $i++) {
				if (in_array($corner, $cornersfinish[$i])) {
					$error = 0;
					$clist[] = $i;
				}
			}
		}
	}
	foreach ($edges as $edge) {
		if (!$error) {
			$error = 1;
			for ($j = 0; $j < 12; $j++) {
				if (in_array($edge, $edgesfinish[$j])) {
					$error = 0;
					$elist[] = $j;
				}
			}
		}
	}
	if (!$error){
		function swap($list, $left, $right) {
			$rightbackup = $list[$right];
			$list[$right] = $list[$left];
			$list[$left] = $rightbackup;
			return $list;
		}
		$newclist = $clist;
		$newelist = $elist;
		for ($i = 0; $i < count($newclist) - 1; $i++) {
			$min = $i;
			for ($j = $i + 1; $j < count($newclist); $j++) {
				if ($newclist[$j] < $newclist[$min])
					$min = $j;
			}
			if ($i != $min) {
				$newclist = swap($newclist, $i, $min);
				$ccheck++;
			}
		}
		for ($i = 0; $i < count($newelist) - 1; $i++) {
			$min = $i;
			for ($j = $i + 1; $j < count($newelist); $j++) {
				if ($newelist[$j] < $newelist[$min])
					$min = $j;
			}
			if ($i != $min) {
				$newelist = swap($newelist, $i, $min);
				$echeck++;
			}
		}
	}
	if (($ccheck + $echeck) % 2 == 0)
		$permutationcheck = 1;
}
//corner parity test
if ($permutationcheck) {
	$cornerb = 0;
	$cornerc = 0;
	foreach ($corners as $corner) {
		for ($i = 0; $i < 8; $i++) {
			if (in_array($corner, $cornersfinish[$i])) {
				if (array_search($corner, $cornersfinish[$i]) == 1)
					$cornerb++;
				elseif (array_search($corner, $cornersfinish[$i]) == 2)
					$cornerc++;
			}
		}
	}
	if (($cornerb + (2 * $cornerc)) % 3 == 0)
		$cornercheck = 1;
}
//making sure edges are legal
if ($cornercheck) {
	$checksum = 0;
	if ($basememory["U2"] == $basememory["U5"] || $basememory["U2"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["B2"] != $basememory["U5"] && $basememory["B2"] != $basememory["D5"] && ($basememory["U2"] == $basememory["F5"] || $basememory["U2"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["U4"] == $basememory["U5"] || $basememory["U4"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["L2"] != $basememory["U5"] && $basememory["L2"] != $basememory["D5"] && ($basememory["U4"] == $basememory["F5"] || $basememory["U4"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["U6"] == $basememory["U5"] || $basememory["U6"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["R2"] != $basememory["U5"] && $basememory["R2"] != $basememory["D5"] && ($basememory["U6"] == $basememory["F5"] || $basememory["U6"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["U8"] == $basememory["U5"] || $basememory["U8"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["F2"] != $basememory["U5"] && $basememory["F2"] != $basememory["D5"] && ($basememory["U8"] == $basememory["F5"] || $basememory["U8"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["D2"] == $basememory["U5"] || $basememory["D2"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["F8"] != $basememory["U5"] && $basememory["F8"] != $basememory["D5"] && ($basememory["D2"] == $basememory["F5"] || $basememory["D2"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["D4"] == $basememory["U5"] || $basememory["D4"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["L8"] != $basememory["U5"] && $basememory["L8"] != $basememory["D5"] && ($basememory["D4"] == $basememory["F5"] || $basememory["D4"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["D6"] == $basememory["U5"] || $basememory["D6"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["R8"] != $basememory["U5"] && $basememory["R8"] != $basememory["D5"] && ($basememory["D6"] == $basememory["F5"] || $basememory["D6"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["D8"] == $basememory["U5"] || $basememory["D8"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["B8"] != $basememory["U5"] && $basememory["B8"] != $basememory["D5"] && ($basememory["D8"] == $basememory["F5"] || $basememory["D8"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["F4"] == $basememory["U5"] || $basememory["F4"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["L6"] != $basememory["U5"] && $basememory["L6"] != $basememory["D5"] && ($basememory["F4"] == $basememory["F5"] || $basememory["F4"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["F6"] == $basememory["U5"] || $basememory["F6"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["R4"] != $basememory["U5"] && $basememory["R4"] != $basememory["D5"] && ($basememory["F6"] == $basememory["F5"] || $basememory["F6"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["B4"] == $basememory["U5"] || $basememory["B4"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["R6"] != $basememory["U5"] && $basememory["R6"] != $basememory["D5"] && ($basememory["B4"] == $basememory["F5"] || $basememory["B4"] == $basememory["B5"]))
		$checksum ++;
	if ($basememory["B6"] == $basememory["U5"] || $basememory["B6"] == $basememory["D5"])
		$checksum ++;
	elseif ($basememory["L4"] != $basememory["U5"] && $basememory["L4"] != $basememory["D5"] && ($basememory["B6"] == $basememory["F5"] || $basememory["B6"] == $basememory["B5"]))
		$checksum ++;
	if ($checksum % 2 == 0)
		$edgecheck = 1;
}
if ($edgecheck) {
	//edge solve
	$temp = -1;
	$temp2 = -2;
	$piece = $edges[8];
	$flip = 0;
	$i = -1;
	$solvededges = array();
	$counter = 0;
	$finishedsolve = "";
	$edgechart = array(
		array(0, 16), array(1, 12), array(2, 8), array(3, 4),
		array(17, 7), array(19, 13), array(9, 15), array(11, 5),
		array(20, 10), array(21, 14), array(22, 18), array(23, 6)
	);
	$move = array(
		"M2 ", "R' U R U' M2 U R' U' R ", "U2 M' U2 M' ", "L U' L' U M2 U' L U L' ",
		"B L' B' M2 B L B' ", "B L2 B' M2 B L2 B' ", "B L B' M2 B L' B' ",
		"L' B L B' M2 B L' B' L ", "D M' U R2 U' M U R2 U' D' M2 ", "U R U' M2 U R' U' ",
		"Set", "U' L' U M2 U' L U ", "B' R B M2 B' R' B ", "R B' R' B M2 B' R B R' ",
		"B' R' B M2 B' R B ", "B' R2 B M2 B' R2 B ", "B' R B U R2 U' M2 U R2 U' B' R' B ",
		"U' L U M2 U' L' U ", "M2 D U R2 U' M' U R2 U' M D' ", "U R' U' M2 U R U' ",
		"Set", "U R2 U' M2 U R2 U' ", "M U2 M U2 ", "U' L2 U M2 U' L2 U "
	);
	foreach ($edges as $x) {
		$i++;
		if (in_array($x, $edgesfinish[$i])) {
			if ($x != $edgesfinish[$i][0]) {
				if ($i == 2 || $i == 10) {
					if ($i == 2)
						$finishedsolve .= $move[$edgechart[$i][1]] . $move[$edgechart[10][0]];
					else
						$finishedsolve .= $move[$edgechart[$i][1]] . $move[$edgechart[2][0]];
				}
				elseif ($i != 8)
					$finishedsolve .= $move[$edgechart[$i][1]] . $move[$edgechart[$i][0]];
				if ($i != 8) {
					$flip++;
					$flip %= 2;
				}
			}
			if ($i != 8)
				$solvededges[] = $i;
		}
	}
	while (count($solvededges) != 11) {
		for ($i = 0; $i < 12; $i++) {
			if (in_array($piece, $edgesfinish[$i])) {
				if (($i != 8) && ($temp != $temp2)) {
					$temp2 = $i;
					$j = array_search($piece, $edgesfinish[$i]);
					if (($i == 2 || $i == 10) && $counter % 2 == 1) {
						if ($i == 2)
							$finishedsolve .= $move[$edgechart[10][($j + $flip) % 2]];
						else
							$finishedsolve .= $move[$edgechart[2][($j + $flip) % 2]];
					}
					else
						$finishedsolve .= $move[$edgechart[$i][($j + $flip) % 2]];
					$piece = $edges[$i];
					if (($j + $flip) % 2 == 0)
						$flip = 0;
					else
						$flip = 1;
					$solvededges[] = $i;
					$counter++;
					break;
				}
				else {
					for ($x = 0; $x < 12; $x++) {
						if (!in_array($x, $solvededges) && $x != 8) {
							if (($x == 2 || $x == 10) && $counter % 2 == 1) {
								if ($x == 2)
									$finishedsolve .= $move[$edgechart[10][0]];
								else
									$finishedsolve .= $move[$edgechart[2][0]];
							}
							else
								$finishedsolve .= $move[$edgechart[$x][0]];
							$piece = $edges[$x];
							$temp = $x;
							$flip = 0;
							$counter++;
							break 2;
						}
					}
				}
			}
		}
	}
	//parity fix
	if ($counter % 2 == 1)
		$finishedsolve .= "D' L2 D M2 D' L2 D ";
	//corner solve
	$temp = -1;
	$temp2 = -2;
	$piece = $corners[0];
	$flip = 0;
	$i = -1;
	$solvedcorners = array();
	$cornerchart = array(
		array(0, 4, 17), array(1, 16, 13), array(2, 12, 9), array(3, 8, 5),
		array(20, 6, 11), array(21, 10, 15), array(22, 14, 19), array(23, 18, 7)
	);
	$setup = array(
		"Set", "R D' ", "F ", "F R' ", "Set", "F2 ", "D2 R ", "D2 ", "F' D ", "F2 D ", "F D ", "D ",
		"R' ", "R2 ", "R ", "", "R' F ", "Set", "D' R ", "D' ", "F' ", "D' F' ", "D2 F' ", "D F' "
	);
	$reversesetup = array(	
		"Set", "D R' ", "F' ", "R F' ", "Set", "F2 ", "R' D2 ", "D2 ", "D' F ", "D' F2 ", "D' F' ", "D' ",
		"R ", "R2 ", "R' ", "", "F' R ", "Set", "R' D ", "D ", "F ", "F D ", "F D2 ", "F D' "
	);
	$modyperm = "R U' R' U' R U R' F' R U R' U' R' F R ";
	foreach ($corners as $x) {
		$i++;
		if (in_array($x, $cornersfinish[$i])) {
			if ($x != $cornersfinish[$i][0]) {
				if ($i != 0) {
					if ($x == $cornersfinish[$i][1]) {
						$finishedsolve .= $setup[$cornerchart[$i][1]] .
							$modyperm . $reversesetup[$cornerchart[$i][1]] .
							$setup[$cornerchart[$i][2]] . $modyperm .
							$reversesetup[$cornerchart[$i][2]];
						$flip ++;
						$flip %= 3;
					}
					elseif ($x == $cornersfinish[$i][2]) {
						$finishedsolve .= $setup[$cornerchart[$i][2]] .
							$modyperm . $reversesetup[$cornerchart[$i][2]] .
							$setup[$cornerchart[$i][1]] . $modyperm .
							$reversesetup[$cornerchart[$i][1]];
						$flip += 2;
						$flip %= 3;
					}
				}
			}
			if ($i != 0)
				$solvedcorners[] = $i;
		}
	}
	while (count($solvedcorners) != 7) {
		for ($i = 0; $i < 8; $i++) {
			if (in_array($piece, $cornersfinish[$i])) {
				if ($i != 0 && $temp != $temp2) {
					$temp2 = $i;
					$j = array_search($piece, $cornersfinish[$i]);
					$finishedsolve .= $setup[$cornerchart[$i][($j + $flip) % 3]] .
						$modyperm . $reversesetup[$cornerchart[$i][($j + $flip) % 3]];
					$piece = $corners[$i];
					if (($j + $flip) % 3 == 0)
						$flip = 0;
					elseif (($j + $flip) % 3 == 1)
						$flip = 1;
					else
						$flip = 2;
					$solvedcorners[] = $i;
					break;
				}
				else {
					for ($x = 0; $x < 8; $x++) {
						if (!in_array($x, $solvedcorners) && $x != 0){
							$finishedsolve .= $setup[$cornerchart[$x][0]] .
								$modyperm . $reversesetup[$cornerchart[$x][0]];
							$piece = $corners[$x];
							$temp = $x;
							$flip = 0;
							break 2;
						}
					}
				}
			}
		}
	}
	//answer optimization and answer print
	$allfaces = array("U", "L", "F", "R", "B", "D", "M");
	for($i = 0; $i < 4; $i++) {
		foreach ($allfaces as $z) {
			$finishedsolve = str_replace($z . "2 " . $z . "2 ", "", $finishedsolve);
			$finishedsolve = str_replace($z . "2 " . $z . "' ", $z . " ", $finishedsolve);
			$finishedsolve = str_replace($z . "' " . $z . "2 ", $z . " ", $finishedsolve);
			$finishedsolve = str_replace($z . "2 " . $z . " ", $z . "' ", $finishedsolve);
			$finishedsolve = str_replace($z . " " . $z . "2 ", $z . "' ", $finishedsolve);
			$finishedsolve = str_replace($z . "' " . $z . " ", "", $finishedsolve);
			$finishedsolve = str_replace($z . " " . $z . "' ", "", $finishedsolve);
			$finishedsolve = str_replace($z . "' " . $z . "' ", $z . "2 ", $finishedsolve);
			$finishedsolve = str_replace($z . " " . $z . " ", $z . "2 ", $finishedsolve);
		}
	}
	$finishedsolve = substr_replace($finishedsolve, "", -1);
	if ($finishedsolve == "")
		echo "This cube is already solved!\n";
	else
		echo $finishedsolve . "\n";
}
else
	echo "This cube is in an unsolvable state!\n";
?>
