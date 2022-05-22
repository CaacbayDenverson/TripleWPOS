<?php
//print_invoice.php
if(isset($_GET["pdf"]) && isset($_GET["id"]))
{
 require_once 'pdf.php';
 include('database_connection.php');
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM invoice 
  WHERE order_id = :order_id
  LIMIT 1
 ");
 $statement->execute(
  array(
   ':order_id'       =>  $_GET["id"]
  )
 );
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '
   <table width="100%" cellpadding="5" cellspacing="0">
    <tr>
     <td colspan="2" align="center" style="font-size:18px;"><b>Triple W Motorcycle Parts & Accessories</b></td>
    </tr>
    <tr>
    <td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
    </tr>
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%">
         <b>Print By : </b><br />
         Name : Amir El Amari<br /> 
         Billing Address : 10 Matiyaga Street, Barangay Kabo, Maryville Village, Batangas City 4200<br />
        </td>
        <td width="35%">
         Reverse Charge<br />
         Invoice No. : '.$row["order_id"].'<br />
         Invoice Date : '.$row["created_at"].'<br />
        </td>
       </tr>
      </table>
      <br />
      <table width="100%" style="border-radius: 10px;font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%">
       <tr>
        <th style="background:#ef534f;color:white;text-align:center;">Sr No.</th>
        <th style="background:#ef534f;color:white;text-align:center;">Item Name</th>
        <th style="background:#ef534f;color:white;text-align:center;">Total</th>
       </tr>';
  $statement = $connect->prepare(
   "SELECT * FROM invoice 
   WHERE order_id = :order_id"
  );
  $statement->execute(
   array(
    ':order_id'       =>  $_GET["id"]
   )
  );
  $item_result = $statement->fetchAll();
  $count = 0;
  foreach($item_result as $sub_row)
  {
   $count++;
   $output .= '
   <tr>
    <td>'.$count.'</td>
    <td>'.$sub_row["product"].'</td>
    <td align="right">'.$sub_row["total"].'</td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td  align="right" colspan="2"><b>Cash  :</b></td>
   <td align="right">'.$row["cash"].'</td>
  </tr>
  <tr>
   <td  align="right" colspan="2"><b>Change :</b></td>
   <td align="right">'.$row["cash_change"].'</td>
  </tr>
  
  ';
  $output .= '
      </table>
  ';
 }
 $pdf = new Pdf();
// $dompdf->loadHtml(html_entity_decode($html));
 $file_name = 'Invoice-'.$row["order_id"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}
?>
