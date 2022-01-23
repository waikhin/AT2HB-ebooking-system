<?php

    if (session_status() == PHP_SESSION_NONE) 
    {
    session_start();
    }
    require_once("../process/dbcontroller.php");
    $db_handler = new DBController();
    if (session_status() == PHP_SESSION_NONE) 
    {
    session_start();
    }
    
    if(isset($_SESSION['id']))
    {
        $uid=$_SESSION['id'];
    }
    else{
        header("Location: ../../login.php");
    }

    $invoice_array = $db_handler->runQuery("SELECT reservation_id, user_id, user_name, user_email, user_mobile_num, user_faculty, 
    reservation_remark, reservation_edit,reservation_date, court_name, reservation_slot, reservation_status
    FROM reservation JOIN user USING(user_id) JOIN court USING(court_id)
    WHERE user_id = $uid
    ORDER BY reservation_date DESC;");
    if(!empty($invoice_array))
    {
         foreach($invoice_array as $key=>$value)
         {
            $reserveID = $invoice_array[$key]['reservation_id'];
            $uid = $invoice_array[$key]['user_id'];
            $Name = $invoice_array[$key]['user_name'];
            $Email = $invoice_array[$key]['user_email'];
            $Phone = $invoice_array[$key]['user_mobile_num'];
            $Faculty = $invoice_array[$key]['user_faculty'];
            $Edit = $invoice_array[$key]['reservation_edit'];
            $Remark = $invoice_array[$key]['reservation_remark'];
            $ReserveDate = $invoice_array[$key]['reservation_date'];
            $Court = $invoice_array[$key]['court_name'];
            $Slot = $invoice_array[$key]['reservation_slot'];
            $Status = $invoice_array[$key]['reservation_status'];
         }
    }
require_once 'fpdf/fpdf.php';
if(isset($_GET['pi']))
{
    $pdf = new FPDF('P', 'mm', 'A4');

    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', '18');
    $pdf->Image('../../../img/apple-touch-icon.png',15,15,30,30);

    $pdf->Cell('40', '10', '', '0','0','L');
    $pdf->Cell('100', '10', 'Arena Tun Tuanku Haji Bujang', '0','1','L');
   
    $pdf->SetFont('Arial', '', '14');
    $pdf->Cell('40', '10', '', '0','0','L');
    $pdf->Cell('90', '10', 'UNIVERSITI MALAYSIA SARAWAK', '0','1','L');
    $pdf->Cell('40', '10', '', '0','0','L');
    $pdf->Cell('90', '10', '94300 KOTA SMARAHAN SARAWAK, MALAYSIA', '0','1','L');
    $pdf->Cell('40', '10', '', '0','0','L');
    $pdf->Cell('50', '10', 'Tel : +60 82 58 1658', '0','0','L');
    $pdf->Cell('50', '10', 'Fax :+60 82 58 1660', '0','1','C');

    $pdf->Cell('180', '15', 'Invoice # '.$reserveID, 'B','1','L');
    $pdf->Cell('180', '5', '', '0','1','C');

    $pdf->SetFillColor('211', '211', '211');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Faculty/Department', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('136', '8', $Faculty, '1', '1', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Full Name', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('61', '8', $Name, '1', '0', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('35', '8', 'User ID', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('40', '8', $uid, '1', '1', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Email', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('61', '8', $Email, '1', '0', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('35', '8', 'Mobile No.', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('40', '8', $Phone, '1', '1', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Court', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('136', '8', $Court, '1', '1', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Reservation Date', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('61', '8', $ReserveDate, '1', '0', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('35', '8', 'Slot', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('40', '8', $Slot, '1', '1', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Remark', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('136', '8', $Remark, '1', '1', 'C');

    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('44', '8', 'Status', '1', '0', 'L', true);
    $pdf->SetFont('Helvetica', '', '12');
    $pdf->Cell('136', '8', $Status.' on '.$Edit, '1', '1', 'C');

    $pdf->Cell('180', '10', '', '0','1','C');

    $pdf->SetFont('Arial', 'B', '11');
    $pdf->SetFillColor('211', '211', '211');
    $pdf->Cell('10', '5', 'No.', 'LT','0','C', true);
    $pdf->Cell('80', '5', 'Item', 'T','0','C', true);
    $pdf->Cell('20', '5', 'Quantity', 'T','0','C', true);
    $pdf->Cell('30', '5', 'Price (RM)', 'T','0','R', true);
    $pdf->Cell('40', '5', 'SubTotal (RM)', 'TR','1','R', true);
    
    $totalPrice=0;
    $quantity=1;
    $price=0;
    $totalPrice = $quantity * $price;
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell('10', '5', 1, 'LTB','LB','C');
    $pdf->Cell('80', '5', $Court, 'TB','0','C');
    $pdf->Cell('20', '5', $quantity, 'TB','0','C');
    $pdf->Cell('30', '5', $price, 'TB','0','R');
    $pdf->Cell('40', '5', $totalPrice, 'TBR','1','R');

    $equipment_array = $db_handler->runQuery("SELECT equipment_name,equipment_qty
    FROM equipment JOIN reservation_addon USING (equipment_id)
    WHERE reservation_id = $reserveID;");
    if(!empty($equipment_array))
    {
         foreach($equipment_array as $key=>$value)
         {
            $equip = $equipment_array[$key]['equipment_name'];
            $qty = $equipment_array[$key]['equipment_qty'];

            $pdf->Cell('10', '5', $key+2, 'LTB','LB','C');
            $pdf->Cell('80', '5', $equip, 'TB','0','C');
            $pdf->Cell('20', '5', $qty, 'TB','0','C');
            $pdf->Cell('30', '5', $price, 'TB','0','R');
            $pdf->Cell('40', '5', $totalPrice, 'TBR','1','R');
         }
    }
    
    $pdf->SetFont('Helvetica', 'B', '12');
    $pdf->Cell('140', '8', 'Total (RM)', '1', '0', 'L', true);
    $pdf->Cell('40', '8', $totalPrice, '1', '1', 'R');

    $pdf->Output('invoice.pdf','I'); 

}   
?>