<link rel="stylesheet" href="<?= base_url('vendor/'); ?>assets/css/invoice.css">
<style>
	.invoice-title h2,
	.invoice-title h3 {
		display: inline-block;
	}

	.table>tbody>tr>.no-line {
		border-top: none;
	}

	.table>thead>tr>.no-line {
		border-bottom: none;
	}

	.table>tbody>tr>.thick-line {
		border-top: 2px solid;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="invoice-title">
				<h2>Invoice</h2>
				<h3 class="pull-right">Order #<?php echo $dtInv->id_transaksi; ?></h3>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Pembayaran Oleh:</strong><br>
						<?php echo $this->session->userdata('nama'); ?><br>
						<?php echo $this->session->userdata('email'); ?><br>
					</address>
				</div>
				<div class="col-xs-6 text-right">
					<address>
						<strong>Waktu Order:</strong><br>
						<?php echo $dtInv->waktu_order; ?><br>

					</address>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Metode Pembayaran:</strong><br>
						Silakkan Transfer Ke Rekening BNI, dengan No Rekening <b>20101010123</b> <br>
						Dengan Nominal <b>Rp <?php echo $dtInv->total_harga; ?></b>. Jika Sudah Melakuan Pembayaran,
						<br>Silakkan Konfirmasi Ke No WA <b>081081081202</b>
					</address>
				</div>
				<div class="col-xs-6 text-right">
					<address>
						<?php $verif =  $dtInv->verifikasi;
						if ($verif == 0) {
							$sty = 'orange';
							$st = 'Menunggu Verifikasi';
							$note = '';
						} else {
							$sty = 'green';
							$st = 'Sudah Terverifikasi';
							$note = 'Pembayaran Anda Sudah Berhasil Kami Verifikasi.<br> Guide Atas Nama <b>' . $dtInv->nama_guide . '</b> Akan Segera menghubungi anda. <br>
							  Anda Juga Bisa Menghubungi Langsung di<br> No Hp/WA:<b>' . $dtInv->no_hp;
						}

						?><br>
						<strong>Status Order:</strong><br>
						<span class="badge" style="background-color:<?php echo $sty; ?>" id="sg"><?php echo $st; ?></span><br><br>
						<?php echo $note; ?>
					</address>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Order summary</strong></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<td><strong>Item</strong></td>
									<td class="text-center"><strong></strong></td>
									<td class="text-center"><strong>Persons</strong></td>
									<td class="text-right"><strong>Totals</strong></td>
								</tr>
							</thead>
							<tbody>
								<!-- foreach ($order->lineItems as $line) or some such thing here -->
								<tr>
									<td><?php echo $dtInv->keterangan; ?> + Guide</td>
									<td class="text-center"></td>
									<td class="text-center"><?php echo $dtInv->jml_pengunjung; ?></td>
									<td class="text-right">Rp <?php echo $dtInv->total_harga; ?></td>
								</tr>

								<tr>
									<td class="thick-line"></td>
									<td class="thick-line"></td>
									<td class="thick-line text-center"><strong>Total</strong></td>
									<td class="thick-line text-right">Rp <?php echo $dtInv->total_harga; ?></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>