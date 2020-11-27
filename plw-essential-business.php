<?php
/*
Template Name: MainWP Pro Report Basic Template
Description: Default template for the MainWP Pro Reports extension. Colors for this report can be changed in the Custom Report Color section below.
Version: 1.0
Author: MainWP
Screenshot URI: ../wp-content/plugins/mainwp-pro-reports-extension/images/template-basic.jpg
*/

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

$config_tokens = array(
	0 => '[hide-if-empty]',
	1 => '', // show report data
	2 => '[hide-section-data]',
);

$default_config = array(
	'wp-update'       => 0,
	'plugins-updates' => 0,
	'themes-updates'  => 0,
	'uptime'          => 0,
	'security'        => 0,
	'backups'         => 0,
	'ga'              => 0,
	'matomo'          => 0,
	'pagespeed'       => 0,
	'maintenance'     => 0,
);


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
								<p style="text-align: left; margin-left: -275px;">PINK LIZARD WEB, LLC</p><br>
								<p style="font-size: 12px; text-align: left; margin-left: -275px; margin-top: -35px;">602-695-9909 | 480-570-6470</p>
							</td>
							<!-- The following table data is pulled from the report content and design customization editor in the report heading text field -->
							<td style="border-bottom: 0px;">
								<p style="margin-right: -140px;"><?php echo esc_html($heading); ?></p>
								<!-- Change plan type (Basic, Essential, Premium) accoring to client -->
								<p style="margin-right: -140px; margin-top: -18px;">ESSENTIAL MAINTENANCE PLAN</p>
							</td>
						</tr>
					</table>
				</div>
				<!-- End Header -->

				<!-- Client information and report date range directly under header -->
				<table style="border: 0px; margin-right: -100px; margin-top: -30px;">
					<tr>
						<td style="vertical-align: center; border-bottom: 0px;">
							<p style="padding-left: 40px; font-weight: bold;">Client:</p>
						</td>
						<td style="border-bottom: 0px;">
							<p style="margin-top: -25px; margin-left: -95px;">[client.contact.name]<br>[client.contact.address.1]<br>[client.city],&nbsp;[client.state] &nbsp;[client.zip]</p>
						</td>
						<td style="vertical-align: center; text-align: right; padding-left: 50px; border-bottom: 0px;">
							<p style="font-weight: bold; margin-left: -30px;">Report Period:<br>Website:<br>WordPress Version:<br>PHP Version:<br>MySQL Version:</p>
						</td>
						<td style="vertical-align: top; border-bottom: 0px;">
							<p>[report.daterange]<br>[client.site.url]<br>[client.site.version]<br>[client.site.php]<br>[client.site.mysql]</p>
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
						<!-- End intro data -->

						<!-- End Client Information under header -->

						<!-- Removed page break -->

						<!--------------------------------------- Start new table styles here -------------------------------------------------->
						<div style="padding:0px;">
							<div style="padding:0px 60px 60px;">

								<!-- Begin performance table -->

								<h2 style="margin-top: -15px; text-align: left;"> Activity Overview</h2>
								<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: -10px;">Performance</p>
								<div style="margin-left: 50px;">
									<table style="border: 0px;">
										<tr>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Site Vistiors<br>[ga.visits]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Page Views<br>[ga.pageviews]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">New Visits<br>[ga.new.visits]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Uptime<br>[aum.uptime30]</td>
										</tr>
									</table>
								</div>

								<!-- End Performance Table -->

								<!-- Begin Updates table -->

								<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;">Updates</p>
								<div style="margin-left: 50px;">
									<table style="margin-top: 10px; border: 0px;">
										<tr>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">WordPress Updates<br>[wordpress.updated.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Theme Updates<br>[theme.updated.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Plugin Updates<br>[plugin.updated.count]</td>
										</tr>
									</table>
								</div>

								<!-- End Updates Table -->

								<!-- Begin Security table -->

								<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;">Security</p>
								<div style="margin-left: 50px;">
									<table style="margin-top: 10px; border: 0px;">
										<tr>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Scans<br>[sucuri.checks.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Optimizations<br>[maintenance.process.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Backups Created<br>[backup.created.count]</td>
										</tr>
									</table>
								</div>

								<!-- End Security Table -->

								<!-- Begin Posts table -->

								<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;">Posts</p>
								<div style="margin-left: 50px;">
									<table style="margin-top: 10px; border: 0px;">
										<tr>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Posts Created<br>[post.created.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Comments<br>[comment.created.count]</td>
										</tr>
									</table>
								</div>

								<!-- End PostsTable -->

								<div class="page-break"></div>

						<!-- End Activity Overview. Do not remove pagebreak to allow room for sections if not empty. -->

						<div class="page-break"></div>
						<div style="padding:0px 30px 30px;">
							<div style="padding:0px 30px 30px;">
								<p><?php echo MainWP_Pro_Reports_Utility::esc_content($outro); ?></p>
							</div>
						</div>
					</div>
	</main>
	<footer></footer>
</body>

</html>