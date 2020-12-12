<?php
/*
Template Name: Admin Hosting Notice
Description: This report is sent to PLW Clients as a reminder for upcoming hosting renewals.
Version: 1.0
Author: Pink Lizard Web
Screenshot URI: ../wp-content/plugins/mainwp-pro-reports-extension/images/plw-logo-1200x850.png
*/

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

$bg_color = $report->background_color;

$showhide_values = @json_decode($report->showhide_sections, 1);

if (!is_array($showhide_values)) {
	$showhide_values = array();
}

$showhide_values = array_merge($default_config, $showhide_values);

if (!empty($bg_color)) {
	$bg_color = 'background:' . $bg_color . ';';
}

$accent_color = $report->accent_color;
if (!empty($accent_color)) {
	$accent_color = 'color:' . $accent_color . ';';
}

$text_color = $report->text_color;
if (!empty($text_color)) {
	$text_color = 'color:' . $text_color . ';';
}

$heading = $report->heading;
$intro   = $report->intro;
$intro   = nl2br($intro); // to fix

$outro = $report->outro;
$outro = nl2br($outro); // to fix

?>
<html>

<head>
	<style type="text/css">
		@page {
			margin: 50px 0px 0px 0px;
		}

		.page-break {
			page-break-after: always;
		}

		body {
			<?php echo esc_html($bg_color); ?><?php echo esc_html($text_color); ?>font-size: 13px;
			font-family: 'Lato', sans-serif;
		}

		a {
			text-decoration: none;
		}

		p {
			font-family: 'Lato', sans-serif;
		}

		table {
			border: 1px solid #ddd;
			width: 100%;
		}

		table th {
			padding: 10px;
			background: #e5e5e5;
			border-bottom: 1px solid #ddd;
		}

		table td {
			padding: 10px;
			border-bottom: 1px solid #ddd;
			font-family: 'Lato', sans-serif;
		}

		h1 {
			<?php echo esc_html($accent_color); ?>font-weight: bold;
			font-size: 32px;
			margin-bottom: 5px;
			font-family: 'Lato', sans-serif;
		}

		h2 {
			<?php echo esc_html($accent_color); ?>font-weight: bold;
			font-size: 22px;
			font-family: 'Lato', sans-serif;
		}

		h3 {
			color: #666666;
			font-weight: normal;
			font-size: 24px;
			font-family: 'Lato', sans-serif;
		}

		#ga-chart img {
			width: 100%;
		}
	</style>
</head>

<body>
	<header></header>
	<main>
		<div style="margin:0px;">
			<div style="width:100%;">

				<!-- Report Header -->

				<div style="margin:0 0 30px 0;text-align:center;">
					<table style="margin-top: -40px; border-top: 0px; border-bottom: 2px solid #ff1493;">
						<tr>

							<!-- Image token pulled from report content and design customization under the personal branding tab -->

							<td style="border-bottom: 0px; padding-left: 35px; padding-right: 15px;"><img src="[logo.url]" alt="Pink Lizard Web Logo" style="width:80px;height:auto;"></td>
							<td style="border-bottom: 0px;">
								<p style="text-align: left; margin-top: 12px; margin-left: -300px;">PINK LIZARD WEB, LLC</p><br>
								<p style="font-size: 12px; text-align: left; margin-left: -300px; margin-top: -35px;">602.695.9909 | 480.570.6470</p>
							</td>

							<!-- The following table data is pulled from the report content and design customization editor in the report heading text field -->

							<td style="border-bottom: 0px;">
								<p style="margin-right: -140px; margin-top: 12px;"><?php echo esc_html($heading); ?></p>

								<!-- Change plan type (Basic, Essential, Premium) accoring to client -->
								<p style="margin-right: -140px; margin-top: -20px;">LIFE CHURCH AT SOUTH MOUNTAIN</p>
							</td>
						</tr>
					</table>
				</div>

				<!-- End Header ---------------------------------------------------------------------------------------------------------------->

				<!-- Client information and report date range directly under header -->
				<table style="border: 0px; margin-right: -100px;">
					<tr>
						<td style="vertical-align: center; border-bottom: 0px;">
							<p style="padding-left: 40px; font-weight: bold;">Client:</p>
						</td>
						<td style="border-bottom: 0px;">
							<p style="margin-left: -95px;">[client.contact.name]<br>[client.contact.address.1]<br>[client.city],&nbsp;[client.state] &nbsp;[client.zip]</p>
						</td>
						<td style="vertical-align: center; text-align: right; padding-left: 50px; border-bottom: 0px;">
							<p style="font-weight: bold; margin-left: -30px;">Date:<br>Website:</p>
						</td>
						<td style="vertical-align: top; border-bottom: 0px;">
							<p>[report.send.date]<br>[client.site.url]</p>
						</td>
					</tr>
				</table>

				<!-- Data pulled from the report introduction message editor under the custom content tab -->

				<div style="width:100%;text-align:left;">
					<div style="margin:10px; text-align:left;">
					</div>
					<div style="padding:0px;">
						<div style="padding:0px 60px 60px; margin-top: -20px;">
							<p><?php echo MainWP_Pro_Reports_Utility::esc_content($intro); ?></p>
						</div>

						<!---------------------------------------------------------------------------->

						<!-- Report Closing Message  -->

						<div style="width:100%;text-align:left;">
							<div style="margin:10px; text-align:left;">
							</div>
							<div style="padding:0px;">
								<div style="padding:0px 60px 60px; margin-top: -20px;">
									<p><?php echo MainWP_Pro_Reports_Utility::esc_content($outro); ?></p>
								</div>
	</main>
	<footer></footer>
</body>

</html>