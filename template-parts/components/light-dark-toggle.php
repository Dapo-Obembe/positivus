<?php
/**
 * Light and Dark mode toggle.
 * 
 * @package AlphaWebConsult
 */

 ?>

<button id="theme-toggle" aria-label="Toggle dark mode" class="p-2 border-0 flex items-center relative" title="Toggle dark mode">
    <?php the_svg(
    array(
        'icon' => 'moon',
        'class' => 'dark-icon hidden cursor-pointer text-white relative',
        'width' => 20,
        'height' => 20,
        'title' => 'Dark Mode'
    )
    ); ?>
    <?php the_svg(
    array(
        'icon' => 'sun',
        'class' => 'light-icon cursor-pointer text-white relative',
        'width' => 20,
        'height' => 20,
        'title' => 'Light Mode'
    )
    ); ?>
</button>
