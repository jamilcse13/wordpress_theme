<?php wp_footer(); ?>

<footer>

    <div class="container">
        <?php
        wp_nav_menu(
            array (
                'theme_location' => 'footer_menu',
                'menu_class' => 'footer-bar'
            )
        );
        ?>
    </div>

</footer>

</body>
</html>