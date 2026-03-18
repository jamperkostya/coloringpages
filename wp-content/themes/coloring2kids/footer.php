<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
    </main>
    <footer id="footer" class="footer">
        <section class="container grid gap-102 footer-container">
            <aside class="flex flex-wrap logo-section">
                <?php echo add_class_to_custom_logo();?>
                <p class="description opacity-08 color-white">Coloring2Kids bietet eine stetig wachsende Auswahl an hochwertigen Ausmalbildern für Kinder jeden Alters. Von beliebten Zeichentrickfiguren und Superhelden bis hin zu festlichen Feiertagsmotiven – unsere Vorlagen sind ideal für zu Hause, die Schule oder gemeinsame Familienaktivitäten. So wird jede Malstunde zu einem kreativen Abenteuer!</p>
                <aside class="socials flex gap-30 flex-align-end">
                    <span class="icon-36 border-radius-10 flex flex-align-center flex-justify-center">
                        <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.62343 0.503953L7.22488 0.5C4.5302 0.5 2.78878 2.3353 2.78878 5.17593V7.33184H0.377148C0.168755 7.33184 0 7.50539 0 7.71946V10.8431C0 11.0572 0.168947 11.2306 0.377148 11.2306H2.78878V19.1126C2.78878 19.3267 2.95753 19.5 3.16593 19.5H6.31242C6.52081 19.5 6.68957 19.3265 6.68957 19.1126V11.2306H9.50932C9.71772 11.2306 9.88647 11.0572 9.88647 10.8431L9.88763 7.71946C9.88763 7.61667 9.84779 7.51824 9.77718 7.4455C9.70656 7.37276 9.61034 7.33184 9.51029 7.33184H6.68957V5.50424C6.68957 4.62583 6.89334 4.1799 8.00727 4.1799L9.62304 4.17931C9.83125 4.17931 10 4.00576 10 3.79189V0.891374C10 0.677699 9.83144 0.504349 9.62343 0.503953Z" fill="white"/>
                        </svg>
                    </span>
                    <span class="icon-36 border-radius-10 flex flex-align-center flex-justify-center">
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 1.65642C17.3375 1.93751 16.6266 2.12814 15.8798 2.21324C16.6424 1.77597 17.2261 1.08239 17.5028 0.258473C16.7875 0.663419 15.9978 0.957461 15.1565 1.11686C14.4828 0.428658 13.5244 0 12.4615 0C10.4223 0 8.76881 1.5832 8.76881 3.53473C8.76881 3.81151 8.80143 4.08184 8.86443 4.34034C5.79601 4.19277 3.07515 2.78514 1.25412 0.646183C0.935796 1.16747 0.754707 1.77487 0.754707 2.42325C0.754707 3.64997 1.40709 4.73236 2.39692 5.36562C1.79177 5.34624 1.22262 5.18684 0.724354 4.92189V4.96605C0.724354 6.67849 1.99762 8.10766 3.68592 8.43294C3.37659 8.51264 3.05042 8.5568 2.71297 8.5568C2.47453 8.5568 2.24394 8.53418 2.01786 8.49109C2.488 9.89659 3.85127 10.9187 5.46648 10.9467C4.20333 11.8944 2.61062 12.4577 0.880707 12.4577C0.582648 12.4577 0.289059 12.4405 0 12.4093C1.63433 13.4141 3.57459 14 5.65995 14C12.4525 14 16.1655 8.61281 16.1655 3.94077L16.1531 3.48305C16.8786 2.98759 17.5062 2.3651 18 1.65642Z" fill="white"/>
                        </svg>
                    </span>
                    <span class="icon-36 border-radius-10 flex flex-align-center flex-justify-center">
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.53568 4.58934C1.73808 4.73216 2.34818 5.15634 3.36601 5.86167C4.38388 6.567 5.16364 7.11008 5.70531 7.49095C5.76482 7.5327 5.89126 7.62345 6.08468 7.76334C6.27814 7.90331 6.43888 8.01643 6.56678 8.10271C6.69478 8.18896 6.84952 8.28572 7.03115 8.39283C7.21272 8.49984 7.38388 8.58034 7.54459 8.63363C7.70533 8.68735 7.85413 8.71397 7.99101 8.71397H7.99998H8.00899C8.14587 8.71397 8.29473 8.68732 8.45547 8.63363C8.61612 8.58034 8.78743 8.49975 8.96885 8.39283C9.15035 8.28559 9.30509 8.18893 9.43309 8.10271C9.56109 8.01643 9.72171 7.90331 9.91522 7.76334C10.1086 7.62333 10.2352 7.5327 10.2947 7.49095C10.8422 7.11008 12.2352 6.14278 14.4732 4.58915C14.9077 4.28571 15.2707 3.91957 15.5624 3.49097C15.8542 3.06257 16 2.61315 16 2.14296C16 1.75005 15.8585 1.41371 15.5758 1.13397C15.293 0.854176 14.9581 0.714355 14.5714 0.714355H1.42851C0.970207 0.714355 0.617512 0.869093 0.370489 1.17857C0.123496 1.48811 0 1.87501 0 2.33926C0 2.71425 0.163744 3.12061 0.491076 3.55808C0.818377 3.99559 1.16669 4.33937 1.53568 4.58934Z" fill="white"/>
                        <path d="M15.107 5.54482C13.1548 6.86613 11.6725 7.893 10.6607 8.62522C10.3215 8.87512 10.0462 9.0702 9.83485 9.20999C9.62348 9.34987 9.34237 9.49273 8.99111 9.63849C8.63998 9.78447 8.31274 9.85724 8.00912 9.85724H8.00002H7.99104C7.68747 9.85724 7.36005 9.78447 7.00892 9.63849C6.65779 9.49273 6.37649 9.34987 6.16518 9.20999C5.95393 9.0702 5.67861 8.87512 5.33936 8.62522C4.53574 8.03598 3.0566 7.00904 0.901876 5.54482C0.562504 5.31878 0.26191 5.05969 0 4.76807V11.8571C0 12.2502 0.139821 12.5864 0.419618 12.8662C0.699353 13.146 1.03572 13.2859 1.4286 13.2859H14.5715C14.9643 13.2859 15.3006 13.146 15.5804 12.8662C15.8602 12.5863 16 12.2503 16 11.8571V4.76807C15.744 5.05365 15.4465 5.31274 15.107 5.54482Z" fill="white"/>
                        </svg>
                    </span>
                    <span class="icon-36 border-radius-10 flex flex-align-center flex-justify-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 9C0.5 6.20237 0.5 4.80355 0.997024 3.71522C1.54665 2.5117 2.5117 1.54665 3.71522 0.997024C4.80355 0.5 6.20237 0.5 9 0.5C11.7976 0.5 13.1965 0.5 14.2848 0.997024C15.4883 1.54665 16.4533 2.5117 17.003 3.71522C17.5 4.80355 17.5 6.20237 17.5 9C17.5 11.7976 17.5 13.1965 17.003 14.2848C16.4533 15.4883 15.4883 16.4533 14.2848 17.003C13.1965 17.5 11.7976 17.5 9 17.5C6.20237 17.5 4.80355 17.5 3.71522 17.003C2.5117 16.4533 1.54665 15.4883 0.997024 14.2848C0.5 13.1965 0.5 11.7976 0.5 9ZM9 4.5C6.51487 4.5 4.5 6.51487 4.5 9C4.5 11.4851 6.51487 13.5 9 13.5C11.4851 13.5 13.5 11.4851 13.5 9C13.5 6.51487 11.4851 4.5 9 4.5ZM9 11.8125C7.44975 11.8125 6.1875 10.5503 6.1875 9C6.1875 7.44863 7.44975 6.1875 9 6.1875C10.5503 6.1875 11.8125 7.44863 11.8125 9C11.8125 10.5503 10.5503 11.8125 9 11.8125ZM14.4371 4.1625C14.4371 4.49366 14.1687 4.76213 13.8375 4.76213C13.5063 4.76213 13.2379 4.49366 13.2379 4.1625C13.2379 3.83134 13.5063 3.56288 13.8375 3.56288C14.1687 3.56288 14.4371 3.83134 14.4371 4.1625Z" fill="white"/>
                        </svg>
                    </span>
                </aside>
            </aside>
            <aside class="flex gap-60 footer-menu-container">
                <nav class="menu">
                    <header class="title">Menu</header>
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => ''
                    ]);?>
                </nav>
                <nav class="menu">
                    <header class="title">Popular Category</header>
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-popular-category',
                        'container' => false,
                        'menu_class' => ''
                    ]);?>
                </nav>
                <nav class="menu">
                    <header class="title">Popular Pages</header>
                    <?php wp_nav_menu([
                        'theme_location' => 'footer-popular-pages',
                        'container' => false,
                        'menu_class' => ''
                    ]);?>
                </nav>
            </aside>
            <aside class="newsletter">
                <header class="title">Newsletter</header>
                <p class="description opacity-08 color-white">Wenn du nach kostenlosen Malvorlagen zum Herunterladen suchst (insbesondere im PDF-Format), gibt es einige hervorragende Anlaufstellen, die sowohl für zu Hause als auch für die Schule ideal sind.</p>
                <p class="description opacity-08 color-white">Download FREE PDF Coloring Pages for Kids</p>
            </aside>
        </section>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
