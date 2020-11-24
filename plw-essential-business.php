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
			border: 1px solid #000;
			width: 100%;
		}

		table th {
			padding: 10px;
			background: #e5e5e5;
			border-bottom: 1px solid #000;
		}

		table td {
			padding: 10px;
			border-bottom: 1px solid #000;
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
			font-size: 24px;
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
				<div style="margin:0 0 30px 0;text-align:center;">

					<!-- Report Header -->
					<table>
						<tr>
							<td style="border-bottom: 0px;"><img src="[logo.url]" alt="Pink Lizard Web Logo" style="width:125px;height:auto;"></td>
							<td style="border-bottom: 0px;">
								<p style="text-align: left; margin-left: -170px;">PINK LIZARD WEB</p><br>
								<p style="text-align: left; margin-left: -170px; margin-top: -35px;">602-695-9909 | 480-570-6470</p>
							</td>
							<td style="border-bottom: 0px;">
								<p style="text-align: right;">MONTHLY SITE MAINTENANCE REPORT</p>
							</td>
						</tr>
					</table>
				</div>
				<!-- End Header -->

				<!-- Site name and date range directly under header -->
				<div style="width:100%;text-align:center;">
					<div style="margin:10px;text-align:center;">
						<h3>[client.site.name]</h3>
						<div style="color:#000000;font-weight:normal;font-size:14px;">[report.daterange]</div>
					</div>
					<!-- End site name,etc... -->
				</div>

				<!-- Removed page break -->

				<!-- Data pulled from the report introduction editor under the custom content tab -->
				<div style="padding:0px;">
					<div style="padding:0px 60px 60px;">
						<p><?php echo MainWP_Pro_Reports_Utility::esc_content($intro); ?></p>
						<!-- End intro data -->

						<!-- Begin overview table -->
						<h2>Overview</h2>
						<table cellspacing="0">
							<tbody>
								<tr>
									<th><?php echo __('Website', 'mainwp-pro-reports-extension'); ?></th>
									<td><a href="[client.site.url]" style="<?php echo esc_html($accent_color); ?>" target="_blank">[client.site.url]</a></td>
								</tr>
								<tr>
									<th><?php echo __('WordPress Version', 'mainwp-pro-reports-extension'); ?></th>
									<td>[client.site.version]</td>
								</tr>
								<tr>
									<th><?php echo __('Active Theme', 'mainwp-pro-reports-extension'); ?></th>
									<td>[client.site.theme]</td>
								</tr>
								<tr>
									<th><?php echo __('PHP Version', 'mainwp-pro-reports-extension'); ?></th>
									<td>[client.site.php]</td>
								</tr>
								<tr>
									<th><?php echo __('MySQL Version', 'mainwp-pro-reports-extension'); ?></th>
									<td style="padding:10px;">[client.site.mysql]</td>
								</tr>
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['uptime']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Website Uptime', 'mainwp-pro-reports-extension'); ?></th>
									<td>[aum.alltimeuptimeratio]</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['security']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Security Scans', 'mainwp-pro-reports-extension'); ?></th>
									<td>[sucuri.checks.count]</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['plugins-updates']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Plugins Updated', 'mainwp-pro-reports-extension'); ?></th>
									<td>[plugin.updated.count]</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['themes-updates']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Themes Updated', 'mainwp-pro-reports-extension'); ?></th>
									<td>[theme.updated.count]</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['backups']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Backups Created', 'mainwp-pro-reports-extension'); ?></th>
									<td>[backup.created.count]</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['maintenance']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Database Optimizations', 'mainwp-pro-reports-extension'); ?></th>
									<td>[maintenance.process.count]</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
								[config-section-data]
								<?php echo $config_tokens[$showhide_values['pagespeed']]; ?>
								[remove-if-empty]
								<tr>
									<th><?php echo __('Average Pagespeed', 'mainwp-pro-reports-extension'); ?></th>
									<td>[pagespeed.average.desktop] / 100</td>
								</tr>
								[/remove-if-empty]
								[/config-section-data]
							</tbody>
						</table>
					</div>
				</div>
				<!-- End Overview. Do not remove pagebreak to allow room for sections if not empty. -->

				<!-- Uptime Data -->
				<?php if (is_plugin_active('advanced-uptime-monitor-extension/advanced-uptime-monitor-extension.php')) : ?>
					[config-section-data]
					<?php echo $config_tokens[$showhide_values['uptime']]; ?>
					<div class="page-break"></div>
					<div style="padding:0px 30px 30px;">
						<div style="padding:0px 30px 30px;">
							<h2><?php echo __('Uptime Monitoring', 'mainwp-pro-reports-extension'); ?></h2>
							<?php do_action('mainwp_pro_reports_before_uptime'); ?>
							<table cellspacing="0">
								<tbody>
									<tr>
										<th><?php echo __('Overall', 'mainwp-pro-reports-extension'); ?></th>
										<td>[aum.alltimeuptimeratio]</td>
									</tr>
									<tr>
										<th><?php echo __('Last 7 Days', 'mainwp-pro-reports-extension'); ?></th>
										<td>[aum.uptime7]</td>
									</tr>
									<tr>
										<th><?php echo __('Last 15 Days', 'mainwp-pro-reports-extension'); ?></th>
										<td>[aum.uptime15]</td>
									</tr>
									<tr>
										<th><?php echo __('Last 30 Days', 'mainwp-pro-reports-extension'); ?></th>
										<td>[aum.uptime30]</td>
									</tr>
									<tr>
										<th><?php echo __('Last 45 Days', 'mainwp-pro-reports-extension'); ?></th>
										<td>[aum.uptime45]</td>
									</tr>
									<tr>
										<th><?php echo __('Last 60 Days', 'mainwp-pro-reports-extension'); ?></th>
										<td>[aum.uptime60]</td>
									</tr>
								</tbody>
							</table>
							<?php do_action('mainwp_pro_reports_after_uptime'); ?>
						</div>
					</div>
					[/config-section-data]
				<?php endif; ?>
				<!-- End Uptime Data -->

				<!-- Security Scans Data -->
				<?php if (is_plugin_active('mainwp-sucuri-extension/mainwp-sucuri-extension.php')) : ?>
					[config-section-data]
					<?php echo $config_tokens[$showhide_values['security']]; ?>
					<div class="page-break"></div>
					<div style="padding:0px 30px 30px;">
						<div style="padding:0px 30px 30px;">
							<h2><?php echo __('Security', 'mainwp-pro-reports-extension'); ?></h2>
							<?php do_action('mainwp_pro_reports_before_sucuri'); ?>
							<table cellspacing="0">
								<thead>
									<tr>
										<th><?php echo __('Scanned on', 'mainwp-pro-reports-extension'); ?></th>
										<th><?php echo __('Status', 'mainwp-pro-reports-extension'); ?></th>
										<th><?php echo __('Webtrust Status', 'mainwp-pro-reports-extension'); ?></th>
									</tr>
								</thead>
								<tbody>
									[section.sucuri.checks]
									<tr>
										<td>[sucuri.check.date]</td>
										<td>[sucuri.check.status]</td>
										<td>[sucuri.check.webtrust]</td>
									</tr>
									[/section.sucuri.checks]
								</tbody>
							</table>
							<?php do_action('mainwp_pro_reports_after_sucuri'); ?>
						</div>
					</div>
					[/config-section-data]
				<?php endif; ?>
				<!-- End Security Scans Data -->


				<!-- Updates Data -->

				<?php do_action('mainwp_pro_reports_before_updates'); ?>

				[config-section-data]
				<?php echo $config_tokens[$showhide_values['wp-update']]; ?>
				<div class="page-break"></div>
				<div style="padding:0px 30px 30px;">
					<div style="padding:0px 30px 30px;">
						<h2><?php echo __('WordPress Updates', 'mainwp-pro-reports-extension'); ?></h2>
						<table cellspacing="0">
							<thead>
								<tr>
									<th><?php echo __('Updated on', 'mainwp-pro-reports-extension'); ?></th>
									<th><?php echo __('Old Version', 'mainwp-pro-reports-extension'); ?></th>
									<th><?php echo __('New Version', 'mainwp-pro-reports-extension'); ?></th>
								</tr>
							</thead>
							<tbody>
								[section.WordPress.updated]
								<tr>
									<td>[WordPress.updated.date]</td>
									<td><span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[WordPress.old.version]</span></td>
									<td><span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[WordPress.current.version]</span></td>
								</tr>
								[/section.WordPress.updated]
							</tbody>
						</table>
					</div>
				</div>
				[/config-section-data]

				[config-section-data]
				<?php echo $config_tokens[$showhide_values['plugins-updates']]; ?>
				<div class="page-break"></div>
				<div style="padding:0px 30px 30px;">
					<div style="padding:0px 30px 30px;">
						<h2><?php echo __('Plugins Updates', 'mainwp-pro-reports-extension'); ?></h2>
						<table cellspacing="0">
							<thead>
								<tr>
									<th><?php echo __('Updated on', 'mainwp-pro-reports-extension'); ?></th>
									<th><?php echo __('Plugin', 'mainwp-pro-reports-extension'); ?></th>
									<th><?php echo __('Version', 'mainwp-pro-reports-extension'); ?></th>
								</tr>
							</thead>
							<tbody>
								[section.plugins.updated]
								<tr>
									<td>[plugin.updated.date]</td>
									<td><span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[plugin.name]</span></td>
									<td>From [plugin.old.version] to <span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[plugin.current.version]</span></td>
								</tr>
								[/section.plugins.updated]
							</tbody>
						</table>
					</div>
				</div>
				[/config-section-data]

				[config-section-data]
				<?php echo $config_tokens[$showhide_values['themes-updates']]; ?>
				<div class="page-break"></div>
				<div style="padding:0px 30px 30px;">
					<div style="padding:0px 30px 30px;">
						<h2><?php echo __('Themes Updates', 'mainwp-pro-reports-extension'); ?></h2>
						<table cellspacing="0">
							<thead>
								<tr>
									<th><?php echo __('Updated on', 'mainwp-pro-reports-extension'); ?></th>
									<th><?php echo __('Theme', 'mainwp-pro-reports-extension'); ?></th>
									<th><?php echo __('Version', 'mainwp-pro-reports-extension'); ?></th>
								</tr>
							</thead>
							<tbody>
								[section.themes.updated]
								<tr>
									<td>[theme.updated.date] </td>
									<td><span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[theme.name]</span></td>
									<td>From [theme.old.version] to <span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[theme.current.version]</span></td>
								</tr>
								[/section.themes.updated]
							</tbody>
						</table>
					</div>
				</div>
				[/config-section-data]

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
					<div class="page-break"></div>
					<div style="padding:0px 30px 30px;">
						<div style="padding:0px 30px 30px;">
							<h2 style="<?php echo esc_html($accent_color); ?>font-weight:bold;font-size:24px;"><?php echo __('Backups', 'mainwp-pro-reports-extension'); ?></h2>
							<?php do_action('mainwp_pro_reports_before_backups'); ?>
							<table cellspacing="0">
								<thead>
									<tr>
										<th><?php echo __('Backup Date', 'mainwp-pro-reports-extension'); ?></th>
										<th><?php echo __('Backup Type', 'mainwp-pro-reports-extension'); ?></th>
									</tr>
								</thead>
								<tbody>
									[section.backups.created]
									<tr>
										<td>[backup.created.date]</td>
										<td><span style="font-weight:bold;<?php echo esc_html($accent_color); ?>">[backup.created.type]</span></td>
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

				<!-- Google Analytics Data -->
				<?php if (is_plugin_active('mainwp-google-analytics-extension/mainwp-google-analytics-extension.php')) : ?>
					[config-section-data]
					<?php echo $config_tokens[$showhide_values['ga']]; ?>
					[config-section-extra max-empty="7" /]
					<div class="page-break"></div>
					<div style="padding:0px 30px 30px;">
						<div style="padding:0px 30px 30px;">
							<h2><?php echo __('Analytics', 'mainwp-pro-reports-extension'); ?></h2>
							<?php do_action('mainwp_pro_reports_before_ga'); ?>
							<div style="margin: 30px 0;" id="ga-chart">[ga.visits.chart]</div>
							<table style="border:1px solid #000;width:100%;clear:both;" cellspacing="0">
								<tbody>
									<tr>
										<th><?php echo __('Website Visits', 'mainwp-pro-reports-extension'); ?></th>
										<td>[ga.visits]</td>
									</tr>
									<tr>
										<th><?php echo __('Page Views', 'mainwp-pro-reports-extension'); ?></th>
										<td>[ga.pageviews]</td>
									</tr>
									<tr>
										<th><?php echo __('Page Visits', 'mainwp-pro-reports-extension'); ?></th>
										<td>[ga.pages.visit]</td>
									</tr>
									<tr>
										<th><?php echo __('Bounce Rate', 'mainwp-pro-reports-extension'); ?></th>
										<td>[ga.bounce.rate]</td>
									</tr>
									<tr>
										<th><?php echo __('Average Time', 'mainwp-pro-reports-extension'); ?></th>
										<td>[ga.avg.time]</td>
									</tr>
									<tr>
										<th><?php echo __('New Visits', 'mainwp-pro-reports-extension'); ?></th>
										<td style="padding:10px;">[ga.new.visits]</td>
									</tr>
								</tbody>
							</table>
							<?php do_action('mainwp_pro_reports_after_ga'); ?>
						</div>
					</div>
					[/config-section-data]
				<?php endif; ?>
				<!-- End Google Analytics Data -->

				<!-- Maintenance Data -->
				<?php if (is_plugin_active('mainwp-maintenance-extension/mainwp-maintenance-extension.php')) : ?>
					[config-section-data]
					<?php echo $config_tokens[$showhide_values['maintenance']]; ?>
					<div class="page-break"></div>
					<div style="padding:0px 30px 30px;">
						<div style="padding:0px 30px 30px;">
							<h2><?php echo __('Maintenance', 'mainwp-pro-reports-extension'); ?></h2>
							<?php do_action('mainwp_pro_reports_before_maintenance'); ?>
							<table style="border:1px solid #000;width:100%;clear:both;" cellspacing="0">
								<thead>
									<tr>
										<th><?php echo __('Date', 'mainwp-pro-reports-extension'); ?></th>
										<th><?php echo __('Details', 'mainwp-pro-reports-extension'); ?></th>
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