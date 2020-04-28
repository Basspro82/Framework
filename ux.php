<?php

function GetPagination($url, $results, $nb ,$p)
{	

if (empty($p)){$p=1;};
$nbresults = mysqli_num_rows($results);
$html = '';

$j = 1;

	$nbPages = $nbresults / $nb;
	$prec = $p -1;
	$suiv = $p + 1;
	$fin = (int)$nbPages + 1;

	$html .= '<ul class="pagination">
	<li class="page-item"><a class="page-link" href="' . $url . "?page=" . $prec . '"><span aria-hidden="true">&laquo;</span><span class="sr-only">Précédent</span></a></li>';
	
	while($j <= $nbPages + 1) 
     { 
		   if (($j < $p - 4)||($j > $p + 4)){
		   }else if ($p == $j){
				$class="selected";
				$html .= '<li class="page-item active"><a class="page-link" href="' . $url . "?page=" . $j . '">' . $j . '</a></li>';
		   }else{
				$html .= '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $j . '">' . $j . '</a></li>';
		   }
      
           $j++; 
     }
	 $html .= '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $suiv . '"><span aria-hidden="true">&raquo;</span><span class="sr-only">Suivant</span></a></li></ul>';

    return $html; 		

}

?>