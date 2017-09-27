<!DOCTYPE html>
<?php
$fullCSS = "../dist/assets/css/main.css";
$fullJS = "../dist/assets/js/main.js";
$rootpath = $_SERVER['DOCUMENT_ROOT'];
?>
<html lang="en">
<head>
<meta charset="utf-8" />

<title><?php echo $pageTitle; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="fullCSS" content="<?php echo( $fullCSS ); ?>" />
<meta name="fullJS" content="<?php echo( $fullJS ); ?>" />
<meta name="grunticon" id="grunticon" content="../dist/svg/" />

<?php
if ( isset( $criticalCSS ) ) {
?>
<style media="screen"><?php include( "../dist/inc/" . $criticalCSS ); ?></style>
<noscript><link rel="stylesheet" href="<?php echo( $fullCSS ); ?>" /></noscript>
<?php
} else {
?>
<link rel="stylesheet" href="<?php echo( $fullCSS ); ?>" />
<?php
}
?>

<script>
<?php include( "../dist/assets/js/initial.js" ); ?>
</script>

<script>document.createElement( "picture" );</script>
<script src="../dist/assets/js/lib/picturefill.js" async></script>

</head>

<?php if ( $bodyClass ) { ?>
<body id="www-karenmcgrane-com" class="tmpl-<?php echo $bodyClass; ?>">
<?php } else { ?>
<body id="www-karenmcgrane-com">
<?php } ?>

<header class="region site-mast">
    <h1 class="logo"><a href="#">Karen McGrane</a></h1>

    <nav>
        <ul class="site-nav">
            <li>
                <a href="#">
                    <img src="../dist/assets/svg/talks.svg" alt="" />
                    Talks
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../dist/assets/svg/articles.svg" alt="" />
                    Articles
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../dist/assets/svg/sources.svg" alt="" />
                    Sources
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../dist/assets/svg/contact.svg" alt="" />
                    Contact
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../dist/assets/svg/books.svg" alt="" />
                    Books
                </a>
            </li>
        </ul>
    </nav>
</header>

<?php if ( isset( $bodyClass ) && $bodyClass == "home" ) { ?>
<div class="region">
    <p class="tagline">On a good day, I make the web more awesome. On a bad day, I just make it suck less.</p>
</div>
<?php } ?>

<main class="site-content">
