<?php 
	$current_date = date("d-M-Y");
	$post_usersdata = get_userdata($post_users_id);		
	$invoice_dateformat = date(MY);
	$invoice_number = get_field('oc_invoice_number', 'option');
	$invoiceformat = 'S/'.$invoice_dateformat.'/'.$invoice_number;
	$result = getOCData($invoice_number);
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
</head>
<body>
	<table style="width: 100%" class="invoice">
		<tr>
			<td class="logo">
				<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/logo.png'?>" class="image">
			</td>
			<td class="address-details">
				<p><h2>Thriive Art & Soul LLP</h2></p>
				<p class="paragraph">118, Floor - 11, Plot-226, Bajaj Bhavan, Barrister Rajni Patel Marg, Nariman Point, Mumbai - 4000021</p>
				<p><b>finance@thriive.in</b></p><br>
				<p><b>GSTIN - 27AALFT2214J1Z3</b></p>
			</td>
			<td class="invoice-details">
				<p><b>Invoice No.</b> : <?php echo $invoiceformat; ?></p><br>
				<p><b>Invoice Date</b> : <?php echo $current_date; ?></p><br>
				<p><b>Reference No.</b> : </p><br>
			</td>
		</tr>	
	</table><br>
	<h2 class="title">TAX INVOICE</h2>
	<table class="customer-details">
		<?php if($post_usersdata->first_name){ ?>
			<tr>
				<td class="head">Customer Name:</td>
				<td class="body"><?php echo $post_usersdata->first_name . ' ' . $post_usersdata->last_name; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td class="head">Customer Email:</td>
			<td class="body"><?php echo $post_usersdata->user_email; ?></td>
		</tr>
		<tr>
			<td class="head">Customer Mobile:</td>
			<td class="body"><?php echo $post_usersdata->mobile; ?></td>
		</tr>
	</table>
	<table class="product-details">
		<tr>
			<th class="description">DESCRIPTION</th>
			<th class="product-title">SAC</th>
			<th class="product-title">GST RATE</th>
			<th class="product-title">AMOUNT</th>
		</tr>
		<tr>
			<td class="content">
				<?php if($result->therapy_name == "all-page"){ ?>
					Online Consultation for therapy with <?php echo $result->tname; ?> for <?php echo $result->package; ?>
				<?php } else { ?>
					Online Consultation for therapy <?php echo $result->therapy_name; ?> with <?php echo $result->tname; ?> for <?php echo $result->package; ?>
				<?php } ?>
			</td>
			<?php 
				$amountWithTax = $result->amount;
				// Formula obtained from Thriive
				$amountWithoutTax = number_format(($amountWithTax / 118)*100, 2, '.', '');
								
				if($state == 'Maharashtra') {
					$tax = (9 / 100) * $amountWithoutTax;
					$tax = number_format($tax, 2, '.', '');
				} else {
					$tax = (18 / 100) * $amountWithoutTax; 
					$tax = number_format($tax, 2, '.', '');
				}	?>
			<td class="content">9983</td>
			<td class="content text-right"></td>
			<td class="content text-right"><?php echo $amountWithTax; ?></td>
		</tr>
		<?php 
		/* if($state == 'Maharashtra') {
			$calculatedAmount = $amountWithoutTax+($tax*2);						
		} else {
			$calculatedAmount = $amountWithoutTax+$tax;
		}
		
		$calculated_amount = number_format($calculatedAmount, 2, '.', '');
		
		if($calculated_amount != $amountWithoutTax) { ?>
			<tr>
				<td class="text-right tax round">Round off</td>
				<td class="tax"></td>
				<td class="tax"></td>
				<td class="text-right tax">
					<?php 							
						if($calculatedAmount > $amountWithTax) {
							$roundOff = $calculatedAmount - $amountWithTax;							
							echo '(-)&nbsp;'.number_format($roundOff, 2, '.', '');
						} else {
							$roundOff = $amountWithTax - $calculatedAmount;
							echo '(+)&nbsp;'.number_format($roundOff, 2, '.', '');
						}										
					?>					
				</td>
			</tr>
			
		<?php } */ ?>
				
		<?php /* if($state != 'Maharashtra') { ?>		
			<tr>
				<td class="text-right">Output IGST 18 %</td>
				<td class=""></td>
				<td class="text-right">18 %</td>
				<td class="text-right"><?php echo $tax; ?></td>
			</tr>		
		<?php } else { ?>
			<tr>
				<td class="text-right tax">Output CGST 9 %</td>
				<td class="tax"></td>
				<td class="text-right tax">9 %</td>
				<td class="text-right tax"><?php echo $tax; ?></td>
			</tr>	
			<tr>
				<td class="text-right">Output SGST 9 %</td>
				<td class=""></td>
				<td class="text-right">9 %</td>
				<td class="text-right"><?php echo $tax; ?></td>
			</tr>
	<?php }*/ ?>
		
		<tr>						
			<td><center><b>TOTAL</b></td>
			<td></td>				
			<td></td>				
			<td class="text-right"><b><?php echo $amountWithTax; ?></b></td>
		</tr>
		<tr>						
			<td colspan="4" style="padding: 10px 5px; font-size: 12px;"><b>Total Amount (in words): </b> <?php echo currencyToWords($amountWithTax).' only.'; ?></td>
		</tr>
		<!-- <tr>						
			<td colspan="4" style="padding: 10px 5px; font-size: 12px;"><b>Tax Amount (in words): </b> 
				<?php //echo currencyToWords($amountWithTax).' only.'; 
					if($state == 'Maharashtra') {
						//echo currencyToWords($tax*2).' only.';
					} else {
						//echo currencyToWords($tax).' only.';
					}
				?>
			</td>
		</tr> -->
		<tr class="footer">
			<td style="font-size: 11px;">Terms and Conditions:</td>
			<td class="text-right" colspan="3"><b>For Thriive Art & Soul LLP</b></td>
		</tr>	
		<tr class="footer">
			<td class="text-right" colspan="4" style="padding-top: 30px;">
				<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/sign.jpg'?>" class="image"><br><br>
				<span style="font-size: 11px;"><b>Authorized Signature</b></span>
			</td>
		</tr>
	</table>
	<p class="title" style="padding-top: 10px;"><b>This is a Computer Generated Invoice</b></p>
</body>
</html>

