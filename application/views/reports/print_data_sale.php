<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		table, th, td {
			border: 1px solid black;
		}
		th, td {
			padding: 10px;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
	<title>Laporan Invoice : <?= $report[0]->invoice ?></title>
</head>

<body>
	<b><h2 style="text-align: center;">Laporan Invoice</h2></b>
	<br>
	<h4>Invoice No:  <?= $report[0]->invoice ?></h4>
	<h4>Date:  <?= indo_date($report[0]->date) ?></h4>
	<h4>Customer:  <?= $report[0]->customer_name ? $report[0]->customer_name : 'Umum' ?></h4>
	<h4>Note:  <?= $report[0]->note ?  $report[0]->note : '-'?></h4>
	<h4>Total Payment:  <?= indo_currency($report[0]->final_price) ?></h4>
	<table>
		<tr>
			<th>Item Name</th>
			<th>Price</th>
			<th>Qty</th>
			<th>Total</th>
		</tr>
		<?php foreach ($report as $item) { ?>
			<tr>
				<td><?= $item->item_name ?></td>
				<td><?= indo_currency($item->price) ?></td>
				<td><?= $item->qty ?></td>
				<td><?= indo_currency($item->qty * $item->price) ?></td>
			</tr>
		<?php } ?>

	</table>
</body>

</html>
