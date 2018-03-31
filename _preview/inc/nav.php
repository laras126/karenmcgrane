<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
?>
        <nav>
            <ul class="nav-list">
                <li class="nav-item"<?php if ( isset( $bodyClass ) && strpos ( $bodyClass, "sect-articles" ) !== false ) { ?> aria-describedby="current-page"<?php } ?>>
                    <a href="#">
                        <?php include( $rootpath . "/wp-content/themes/karenmcgrane/inc/svg/articles.svg" ); ?>
                        Articles
                    </a>
                </li>
                <li class="nav-item"<?php if ( isset( $bodyClass ) && strpos ( $bodyClass, "sect-talks" ) !== false ) { ?> aria-describedby="current-page"<?php } ?>>
                    <a href="#">
                        <?php include( $rootpath . "/wp-content/themes/karenmcgrane/inc/svg/talks.svg" ); ?>
                        Talks
                    </a>
                </li>
                <li class="nav-item"<?php if ( isset( $bodyClass ) && strpos ( $bodyClass, "sect-books" ) !== false ) { ?> aria-describedby="current-page"<?php } ?>>
                    <a href="#">
                        <?php include( $rootpath . "/wp-content/themes/karenmcgrane/inc/svg/books.svg" ); ?>
                        Books
                    </a>
                </li>
                <li class="nav-item"<?php if ( isset( $bodyClass ) && strpos ( $bodyClass, "sect-sources" ) !== false ) { ?> aria-describedby="current-page"<?php } ?>>
                    <a href="#">
                        <?php include( $rootpath . "/wp-content/themes/karenmcgrane/inc/svg/sources.svg" ); ?>
                        Sources
                    </a>
                </li>
                <li class="nav-item"<?php if ( isset( $bodyClass ) && strpos ( $bodyClass, "sect-contact" ) !== false ) { ?> aria-describedby="current-page"<?php } ?>>
                    <a href="#">
                        <?php include( $rootpath . "/wp-content/themes/karenmcgrane/inc/svg/contact.svg" ); ?>
                        Contact
                    </a>
                </li>
            </ul><!-- /end .nav-list -->
        </nav>
