<section>
            
                <header class="section-header">
                    <?php if ( ! empty( $instance['primary_title'] ) ) : ?>
                        <h2 class="color"><?php echo esc_html( $instance['primary_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $instance['secondary_title'] ) ) : ?>
                         <small class="color"><?php echo esc_html( $instance['secondary_title'] ); ?></small>
                    <?php endif; ?>
                    </header>
                <p class="color"><?php echo esc_html( $instance['title_content'] ); ?></p>
</section>