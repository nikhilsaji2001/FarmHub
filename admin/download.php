<?php
  include_once('includes/dbconnect.php');
?>
<?php
header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=testdata.csv');
       $output = fopen("php://output", "w");
     fputcsv($output, array('pid','inputstring'));
         $query = "select *  from review" ;
         $result = mysql_query($query, $con);
         while($row = mysql_fetch_array($result))
         {
              fputcsv($output,array($row['id'],$row['review']));
         }
      fclose($output);

?>