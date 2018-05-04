<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$bodyClass = "sect-home";
$pageTitle = "Welcome to Karen McGrane’s website";

require( "inc/header.php" );
?>

    <section class="region about-karen">
        <h2 class="hed about-hed"><cite class="name-km">Karen M<b>c</b>Grane</cite> has to write a paragraph about herself</h2>

        <div class="about-content">
            <p>But fortunately it is only 50-60 words, 75 at the most Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend. 500 characters</p>
        </div>
    </section><!-- /end .region.about-karen -->

    <ol class="region list-featured">
        <li class="featured-item">
            <div class="featured-content">
                <h2><a class="hed-featured" href="#">Don’t Let Paper Paradigms Drive Your Digital Strategy</a></h2>
                <p>The web isn't print. As we adapt to a world of connected devices, the way we think about our publishing process must change. Sometimes one teaser might be a bit longer than the others but still no more than 250 characters. <a class="read-more" href="#">Read more</a></p>
                <span class="meta-featured"><a href="#">Harvard Business Review</a>, June 17, 2003</span>
            </div><!-- /end .featured-content -->
        </li>
        <li class="featured-item">
            <div class="featured-content">
                <h2><a class="hed-featured" href="#">Career Day Special With A Future Web Designer</a></h2>
                <p>An eighth grader asked me some questions about web design as a career, and I had some questions in response. Aim for 140 characters. <a class="read-more" href="#">Read more</a></p>
                <span class="meta-featured"><a href="#">Harvard Business Review</a>, June 17, March 4, 2016</span>
            </div><!-- /end .featured-content -->
        </li>
        <li class="featured-item is-priority">
            <img src="/wp-content/themes/karenmcgrane/_assets/fpo/slide-adaptive.png" alt="" />
            <div class="featured-content">
                <h2><a class="hed-featured" href="#">Adaptive: Content, Context, and Controversy</a></h2>
                <p>We all know what responsive means, but what the heck is adaptive? In this talk I unpack what we mean when we talk about adaptive. <a class="read-more" href="#">Read more</a></p>
                <span class="meta-featured"><a href="#">Harvard Business Review</a>, June 17, 2003</span>
            </div><!-- /end .featured-content -->
        </li>
        <li class="featured-item">
            <div class="featured-content">
                <h2><a class="hed-featured" href="#">WYSIWTF</a></h2>
                <p>How should content management tools guide content creators to focus on meaning and structure? What’s the right amount of control over presentation and styling in the CMS? <a class="read-more" href="#">Read more</a></p>
                <span class="meta-featured"><a href="#">A List Apart</a>, May 2, 2013</span>
            </div><!-- /end .featured-content -->
        </li>
        <li class="featured-item">
            <div class="featured-content">
                <h2><a class="hed-featured" href="#">The Alternative is Nothing</a></h2>
                <p>The history of technology innovation is the history of disruption. New technologies become available and disrupt the market for more-established, higher-end products. <a class="read-more" href="#">Read more</a></p>
                <span class="meta-featured"><a href="#">A List Apart</a>, June 6, 2013</span>
            </div><!-- /end .featured-content -->
        </li>
    </ol><!-- /end .region.list-featured -->

    <div class="region site-nav">
        <div class="site-mast">
            <?php require( "inc/nav.php" ); ?>
        </div><!-- /end .site-mast -->
    </div><!-- /end .region -->

<?php
require( "inc/footer.php" );
?>
