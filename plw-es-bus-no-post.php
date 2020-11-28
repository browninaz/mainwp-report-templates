<?php
/*
Template Name: Essential Maintenance Report - No Posts
Description: This report is sent to PLW Clients subscribed to the essential maintenance plan with no blog posts.
Version: 1.0
Author: Ben Brown
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
								<p style="font-size: 12px; text-align: left; margin-left: -275px; margin-top: -35px;">602.695.9909 | 480.570.6470</p>
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

				<!-- End Header ---------------------------------------------------------------------------------------------------------------->

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

						<!---------------------------------------------------------------------------->

						<!-- End Client Information under header -->

						<!--Start Activity Overview -------------------------------------------------->

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
											<td style="border: 0px; text-align: center; vertical-align: text-top;"></td>
										</tr>
									</table>
								</div>

								<!-- End Updates Table -->

								<!-- Begin Security table -->

								<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;">Security</p>
								<div style="margin-left: 50px;">
									<table style="margin-top: 10px; border: 0px;">
										<tr>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Malware Scans<br>[sucuri.checks.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Database Optimization<br>[maintenance.process.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;">Backups Created<br>[backup.created.count]</td>
											<td style="border: 0px; text-align: center; vertical-align: text-top;"></td>
										</tr>
									</table>
								</div>

								<!-- End Security Table -->

								<div class="page-break"></div>

								<!-- End Activity Overview. ------------------------------------------------------------------>

								<!---------------------------- Begin Full Activity Report ------------------------------------>

								<h2 style="margin-top: -15px; text-align: left;"> Full Activity Report</h2>

								<!-- Updates Data -->

								<!-- WordPress Updates -->

								<?php do_action('mainwp_pro_reports_before_updates'); ?>

								[config-section-data]
								<?php echo $config_tokens[$showhide_values['wp-update']]; ?>
								<div class="page-break"></div>
								<div style="margin: 0;">
									<div style="margin: 0;">
										<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;"><?php echo __('WordPress Updates', 'mainwp-pro-reports-extension'); ?></p>
										<table cellspacing="0">
											<thead>
												<tr style="font-weight: bold;">
													<td><?php echo __('Date', 'mainwp-pro-reports-extension'); ?></td>
													<td><?php echo __('Old Version', 'mainwp-pro-reports-extension'); ?></td>
													<td><?php echo __('New Version', 'mainwp-pro-reports-extension'); ?></td>
												</tr>
											</thead>
											<tbody>
												[section.WordPress.updated]
												<tr>
													<td>[WordPress.updated.date]</td>
													<td>[WordPress.old.version]</td>
													<td>[WordPress.current.version]</td>
												</tr>
												[/section.WordPress.updated]
											</tbody>
										</table>
									</div>
								</div>
								[/config-section-data]

								<!-- End WordPress Updates -->

								<!-- Theme Updates -->

								[config-section-data]
								<?php echo $config_tokens[$showhide_values['themes-updates']]; ?>

								<!-- <div class="page-break"></div> -->

								<div style="margin: 0;">
									<div style="margin: 0;">
										<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;"><?php echo __('Theme Updates', 'mainwp-pro-reports-extension'); ?></p>
										<table cellspacing="0">
											<thead>
												<tr style="font-weight: bold;">
													<td><?php echo __('Date', 'mainwp-pro-reports-extension'); ?></td>
													<td><?php echo __('Theme', 'mainwp-pro-reports-extension'); ?></td>
													<td><?php echo __('Version', 'mainwp-pro-reports-extension'); ?></td>
												</tr>
											</thead>
											<tbody>
												[section.themes.updated]
												<tr>
													<td>[theme.updated.date] </td>
													<td>[theme.name]</span></td>
													<td>From [theme.old.version] to [theme.current.version]</td>
												</tr>
												[/section.themes.updated]
											</tbody>
										</table>
									</div>
								</div>
								[/config-section-data]

								<!-- End Theme Updates -->

								<!-- Plugin Updates -->

								[config-section-data]
								<?php echo $config_tokens[$showhide_values['plugins-updates']]; ?>

								<!-- <div class="page-break"></div> -->

								<div style="margin: 0;">
									<div style="margin: 0;">
										<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;"><?php echo __('Plugin Updates', 'mainwp-pro-reports-extension'); ?></p>
										<table cellspacing="0">
											<thead>
												<tr style="font-weight: bold;">
													<td><?php echo __('Date', 'mainwp-pro-reports-extension'); ?></td>
													<td><?php echo __('Plugin', 'mainwp-pro-reports-extension'); ?></td>
													<td><?php echo __('Version', 'mainwp-pro-reports-extension'); ?></td>
												</tr>
											</thead>
											<tbody>
												[section.plugins.updated]
												<tr>
													<td>[plugin.updated.date]</td>
													<td>[plugin.name]</span></td>
													<td>From [plugin.old.version] to [plugin.current.version]</span></td>
												</tr>
												[/section.plugins.updated]
											</tbody>
										</table>
									</div>
								</div>
								[/config-section-data]

								<!-- End Plugin Updates -->

								<div class="page-break"></div>

								<?php do_action('mainwp_pro_reports_after_updates'); ?>

								<!-- End Updates Data -->

								<!-- Backups Data -->

								<?php
								if (
									is_plugin_active('mainwp-backwpup-extension/mainwp-backwpup-extension.php')
									|| is_plugin_active('mainwp-backupwordpress-extension/mainwp-backupwordpress-extension.php')
									|| is_plugin_active('mainwp-buddy-extension/mainwp-buddy-extension.php')
									|| is_plugin_active('mainwp-updraftplus-extension/mainwp-updraftplus-extension.php')
									|| is_plugin_active('mainwp-timecapsule-extension/mainwp-timecapsule-extension.php')
								) :
								?>
									[config-section-data]
									<?php echo $config_tokens[$showhide_values['backups']]; ?>
									<div style="margin: 0;">
										<div style="margin: 0;">
											<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;"><?php echo __('Backups', 'mainwp-pro-reports-extension'); ?></p>
											<?php do_action('mainwp_pro_reports_before_backups'); ?>
											<table cellspacing="0">
												<thead>
													<tr style="font-weight: bold;">
														<td><?php echo __('Date', 'mainwp-pro-reports-extension'); ?></td>
														<td><?php echo __('Backup Type', 'mainwp-pro-reports-extension'); ?></td>
													</tr>
												</thead>
												<tbody>
													[section.backups.created]
													<tr>
														<td>[backup.created.date]</td>
														<td>[backup.created.type]</span></td>
													</tr>
													[/section.backups.created]
												</tbody>
											</table>
											<?php do_action('mainwp_pro_reports_after_backups'); ?>
										</div>
									</div>
									[/config-section-data]
								<?php endif; ?>

								<!-- End Backups Data -->

								<!-- Maintenance Data -->

								<?php if (is_plugin_active('mainwp-maintenance-extension/mainwp-maintenance-extension.php')) : ?>
									[config-section-data]
									<?php echo $config_tokens[$showhide_values['maintenance']]; ?>
									<div style="margin: 0;">
										<div style="margin: 0;">
											<p style="font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000; margin-top: 20px;"><?php echo __('Maintenance', 'mainwp-pro-reports-extension'); ?></p>
											<?php do_action('mainwp_pro_reports_before_maintenance'); ?>
											<table style="border:1px solid #ddd;width:100%;clear:both;" cellspacing="0">
												<thead>
													<tr style="font-weight: bold;">
														<td><?php echo __('Date', 'mainwp-pro-reports-extension'); ?></td>
														<td><?php echo __('Details', 'mainwp-pro-reports-extension'); ?></td>
													</tr>
												</thead>
												<tbody>
													[section.maintenance.process]
													<tr>
														<td>[maintenance.process.date]</td>
														<td>[maintenance.process.details]</td>

													</tr>
													[/section.maintenance.process]
												</tbody>
											</table>
											<?php do_action('mainwp_pro_reports_after_maintenance'); ?>
										</div>
									</div>
									[/config-section-data]
								<?php endif; ?>

								<!-- End Maintenance Data -->

								<!-- Report Closing Message  -->
								<br>
								<br>
								<br>
								<div style="margin: 0;">
									<div style="margin: 0;">
										<p><?php echo MainWP_Pro_Reports_Utility::esc_content($outro); ?></p>
									</div>
								</div>

							</div>
	</main>
	<footer></footer>
</body>

</html>