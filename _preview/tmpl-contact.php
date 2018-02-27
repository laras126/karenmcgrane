<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$bodyClass = "sect-contact";
$pageTitle = "Contact Karen";

require("inc/header.php" );
?>

    <div class="region content-main">
        <div class="l-sole">
            <div class="group">
                <h2 class="hed-section-sub">Contact Karen</h2>

                <form class="contact-form" action="/contact/">
                    <p>
                        <label for="contact-name">Name</label>
                        <input id="contact-name" name="contact-name" type="text" required />
                    </p>

                    <p>
                        <label for="contact-email">Email</label>
                        <input id="contact-email" name="contact-email" type="email" required />
                    </p>

                    <p>
                        <label for="contact-subject">Subject</label>
                        <input id="contact-subject" name="contact-subject" type="email" />
                    </p>

                    <p>
                        <label for="contact-body">Message</label>
                        <textarea id="contact-body" name="contact-body" cols="30" rows="10" required></textarea>
                    </p>

                    <p class="cap"><input class="btn" type="submit" value="Send" /></p>

                </form><!-- /end .contact-form -->

                <h2 class="hed-section-sub">Connect with Karen</h2>

                <ul class="links-social">
                    <li><a href="#"><img src="/wp-content/themes/karenmcgrane/dist/assets/svg/icon-twitter.svg" alt="Twitter" /></a></li>
                    <li><a href="#"><img src="/wp-content/themes/karenmcgrane/dist/assets/svg/icon-linkedin.svg" alt="LinkedIn" /></a></li>
                    <li><a href="#"><img src="/wp-content/themes/karenmcgrane/dist/assets/svg/icon-facebook.svg" alt="Facebook" /></a></li>
                </ul><!-- /end .links-social -->

                <h2 class="hed-section-sub">Clients</h2>

                <ul>
                    <li><a href="#">Past Projects</a></li>
                    <li><a href="#">Testimonials</a></li>
                </ul>

                <h2 class="hed-section-sub">Assets</h2>

                <ul>
                    <li><a href="#">B&amp;W Web Headshot</a></li>
                    <li><a href="#">B&amp;W Print Headshot</a></li>
                    <li><a href="#">Color Web Headshot</a></li>
                    <li><a href="#">Color Print Headshot</a></li>
                </ul>

                <h2 class="hed-section-sub">Short Bio</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>

                <h2 class="hed-section-sub">Medium Bio</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>

                <h3>Long Bio</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
            </div><!-- /end .group -->
        </div><!-- /end .l-sole -->
    </div><!-- /end .region.content-main.l-sole -->

<?php
require("inc/footer.php" );
?>
