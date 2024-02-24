<?php
/**
 * The footer template.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ZEDOCS
 * @since  1.0.0
 */
    
$credit_active = ZD_theme_option("credit_active"); 
$change_log_btn = ZD_theme_option("change_log_btn"); 
$version_log = ZD_theme_option("version_log");   
$date_log = ZD_theme_option("date_log");   
$text_log = ZD_theme_option("text_log");   

$road_btn = ZD_theme_option("road_btn");   
$text_roadmap = ZD_theme_option("text_roadmap");   
?>

<footer class="footer">
    <div class="container text-center py-5">
		<?php if ($credit_active == true) { ?>
			<small class="copyright">Designed with ❤️ by<a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a></small><br />
        	<small class="copyright"> Modified with 🔥 by Doc-template - <a class="theme-link" href="https://github.com/joelthorner/doc-template" target="_blank">joelthorner</a></small><br />
        	<small class="copyright">Developped with ❤️🔥 by MELIOZE / Moez - <a class="theme-link" href="https://github.com/mizou1255/" target="_blank">MELIOZE</a></small>
		<?php } ?>
    </div>
</footer>

<!-- Modal -->

<?php if ($change_log_btn == true) { ?>
<div class="modal fade" id="changelogModal" tabindex="-1" aria-labelledby="changelogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title px-3 py-1" id="changelogModalLabel"><?php echo esc_html__('Changelog', 'zedocs'); ?></h4>
                <button type="button" class="btn-close p-4" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
						<?php
						foreach ($version_log as $key => $item) { 
							echo '<div class="col-12">
								<h6 class="mt-3"> 
									<span class="p-2"> Version ' . $item . '</span> - ';
							foreach ($date_log as $k => $date) { 
								if ($k == $key) {
									echo $date;
								}
							}
							echo '</h6>';
							foreach ($text_log as $t => $text) { 
								if ($t == $key) {
									echo $text;
								}
							}
							echo '</div>';
						}
						?>
                        
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo esc_html__('Close', 'zedocs'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($road_btn == true) { ?>
	<div class="modal fade" id="roadmapModal" tabindex="-1" aria-labelledby="roadmapModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title px-3 py-1" id="roadmapModalLabel"><?php echo esc_html__('RoadMap', 'zedocs'); ?></h4>
					<button type="button" class="btn-close p-4" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-12">
								<?php echo $text_roadmap; ?>
							</div>
							<!--end col-->
						</div>
						<!--end row-->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo esc_html__('Close', 'zedocs'); ?></button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php wp_footer(); ?>
</body>

</html>