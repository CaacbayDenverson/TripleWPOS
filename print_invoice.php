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
  <!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Customer Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: small;
    }
    .gray {
        background-color: #cf3c4f
    }
</style>

</head>';
$output .= '<body>';
$admin_details = $connect->query("SELECT * FROM account LIMIT 1")->fetch();
$output .= '
<body>

  <table width="100%">
    <tr>
        <td align="right">
            <h1 style="color: #cf3c4f">Triple W Motorcycle Parts and Accessories</h1>
            <pre>
                '.$admin_details["name"].'
                '.$admin_details["address"].'
                '.$admin_details["contact_number"].'
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong style="color: #cf3c4f">Invoice ID:</strong> '.$row["order_id"].'</td>
        <td align="right"><strong style="color: #cf3c4f">Date:</strong> '.date("F j, Y", strtotime($row["created_at"])).'</td>
    </tr>

  </table>
  <br/>

  <table width="100%">
    <thead style="background-color: #cf3c4f; color: #fff;">
      <tr>
        <th>Order ID</th>
        <th>Orders</th>
        <th>Total</th>
      </tr>
    </thead>';
 }
 //get all order items
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
     <td align="center" width="10%">'.$count.'</td>
     <td align="left" width="70%">'.$sub_row["product"].'</td>
     <td align="center" width="10%">'.$sub_row["total"].'</td>
    </tr>
    ';
   }
   $output .= '
   <tr>
    <td  align="right" colspan="2"><b>Cash  :</b></td>
    <td align="center">'.$row["cash"].'</td>
   </tr>
   <tr>
    <td  align="right" colspan="2"><b>Change :</b></td>
    <td align="center">'.$row["cash_change"].'</td>
   </tr>
   
   ';
 $pdf = new Pdf();
// $dompdf->loadHtml(html_entity_decode($html));
//landscape orientation
 $file_name = 'Invoice-'.$row["order_id"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->setPaper('A4', 'landscape');
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}
?>
