<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$bodyClass = "books";
$pageTitle = "Books";

require("inc/header.php" );
?>

    <div class="region content-main">
        <div class="l-50-50">

            <div class="group">
                <section class="book">
                    <h2 class="hed book-title">Content Strategy for Mobile</h2>

                    <img src="/wp-content/themes/karenmcgrane/dist/assets/svg/cover-csm.svg" alt="">

                    <div class="book-desc">
                        <p>Mobile isn’t just smartphones, and it doesn’t necessarily mean you are on the move. It’s a proliferation of devices, platforms, and screensizes — from the tiniest “dumb” phones to the desktop web. How can you be sure that your content will work everywhere, all the time?</p>

                        <p>Karen McGrane will teach you everything you need to get your content onto mobile devices (and more). You’ll first gather data to help you make the case for a mobile strategy, then learn how to publish flexibly to multiple channels. Along the way, you'll get valuable advice on adapting your workflow to a world of emerging devices, platforms, screen sizes, and resolutions. And all in less time than it takes you to fly from New York to Chicago.</p>
                    </div><!-- /end .book-desc -->

                    <p class="cap"><a class="link-more" href="#">Buy now</a></p>

                </section><!-- /end .book -->
            </div><!-- /end .group -->

            <div class="group">
                <section class="book">
                    <h2 class="hed book-title">Going Responsive</h2>

                    <img src="/wp-content/themes/karenmcgrane/dist/assets/svg/cover-goingresponsive.svg" alt="">

                    <div class="book-desc">
                        <p>Responsive design is more than the technical; it’s a new way of communicating and working that affects every person on your team. Karen McGrane draws on data and stories from real-world teams to show you why going responsive is just good business sense—and how to set up your project (from concept to launch) for total success. Learn how to plan and scope work, collaborate in a responsive context, evaluate content, handle browser support and testing, and measure performance outcomes. No matter your role or project, go responsive with confidence.</p>
                    </div><!-- /end .book-desc -->

                    <p class="cap"><a class="link-more" href="#">Buy now</a></p>
                </section><!-- /end .book -->
            </div><!-- /end .group -->
        </div><!-- /end .l-50-50 -->

    </div><!-- /end .region.content-main.has-index -->

<?php
require("inc/footer.php" );
?>
