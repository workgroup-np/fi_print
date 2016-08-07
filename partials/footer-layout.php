<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<?php  global $fi_print_options; ?>

<?php if(isset($fi_print_options['fi_print_footer_layout'])): ?>

                     <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option1'): ?>

                            <div class="col-sm-12">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                     <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option2'): ?>

                            <div class="col-sm-6">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-6">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                    <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option3'): ?>

                            <div class="col-sm-8">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-4">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                    <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option4'): ?>

                            <div class="col-sm-4">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-8">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                     <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option5'): ?>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-9">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                      <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option6'): ?>

                            <div class="col-sm-4">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-4">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-4">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-3')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                     <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option7'): ?>

                            <div class="col-sm-6">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-3')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                     <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option8'): ?>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-6">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-3')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                     <?php endif; ?>

                     <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option9'): ?>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-6">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-3')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                    <?php endif; ?>

                    <?php if(esc_attr($fi_print_options['fi_print_footer_layout'])=='option10'): ?>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-1')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-2')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-3')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                            <div class="col-sm-3">

                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('fi_print-widgets-footer-block-4')) : ?>

                                    <?php //_e ('add widgets here', 'fi-print'); ?>

                                <?php endif; ?>

                            </div>

                    <?php endif; ?>



<?php endif; ?>