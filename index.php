<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">

    <input name="checkeddiv" type="text" placeholder="type a html tags " >

    <input name="check" type="submit" value="check html">
	<input name="bracket" type="text" placeholder="type a bracket" >

	<input name="checkbracket" type="submit" value="check bracket">

    </form>

   
    <?php		 
	


    $html=$_POST['checkeddiv'];

    if (isset($_POST["check"])) {
 

          check($html);   } 
		  if (isset($_POST["checkbracket"]) && (!empty($_POST['bracket']))) {
			$check_braces = array(
				$_POST['bracket'] => '',
			   
			);
			
			foreach ($check_braces as $key => $value ) {
				 $check_braces[$key] = (checkbracket($key) ? 'Valid' : 'Invalid' );
			}
 

		  } 
		        


echo "<pre>";
print_r($check_braces);
echo "</pre>";
//check if the html tags is closed correctly
    
         function check($html) {

            libxml_use_internal_errors(true);
            $dom = New DOMDocument();
            $dom->loadHTML($html);
            if (empty(libxml_get_errors())) {
              echo "This is a good HTML";
              return;
            }else {
              echo "This not html";
            }
        
          
            
          }
	  //check bracket
function checkbracket($string) {
    $string = str_split($string);
    $stack = array();
    foreach($string as $key=>$value){

        switch ($value) {
            case '(': array_push($stack, 0); break;
            case ')': 
                if (array_pop($stack) !== 0)
                    return false;
            break;
            case '[': array_push($stack, 1); break;
            case ']': 
                if (array_pop($stack) !== 1)
                    return false;
            break;
            default: break;
            case '{': array_push($stack, 2); break;
            case '}': 
                if (array_pop($stack) !== 2)
                    return false;
            break;
        }
    }
    return (empty($stack));
}

		   
		
        ?>
		<form action="" method="post">
			<input name="chessnumber" type="number" placeholder="number of section">
			<input name="chess" type="submit" value="create chess">

		</form>
 <table width="270px">

 <?php
      $number=$_POST['chessnumber'];
	  if(isset($_POST['chess']) &&(!empty($number))){
		for($row=1;$row<=$number;$row++)
		{
			echo "<tr>";
			for($col=1;$col<=$number;$col++)
			{
			$total=$row+$col;
			if($total%2==0)
			{
			echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
			}
			else
			{
			echo "<td height=30px width=30px bgcolor=#000000></td>";
			}
			}
			echo "</tr>";
	  }

	  }
     
          ?>	
 </table>
</script>
</body>
</html>