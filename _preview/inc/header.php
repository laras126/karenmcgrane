<!DOCTYPE html>
<?php
$fullCSS = "../dist/assets/css/main.css";
$fullJS = "../dist/assets/js/main.js";
$rootpath = $_SERVER['DOCUMENT_ROOT'];
?>
<html lang="en">
<head>
<meta charset="utf-8" />

<title><?php echo $pageTitle; ?><?php if ( isset( $bodyClass ) && $bodyClass !== "home" ) { ?> — Karen McGrane<?php } ?></title>

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
<script>
var MTIProjectId='a555b89b-28b3-4798-9e31-f3222456653c';
(function() {
    var mtiTracking = document.createElement('script');
    mtiTracking.type='text/javascript';
    mtiTracking.async='true';
    mtiTracking.src='mtiFontTrackingCode.js';

    ( document.getElementsByTagName( 'head' )[ 0 ] || document.getElementsByTagName( 'body' )[ 0 ] ).appendChild( mtiTracking );
})();
</script>
</head>

<?php if ( isset( $bodyClass ) ) { ?>
<body id="www-karenmcgrane-com" class="<?php echo $bodyClass; ?>">
<?php } else { ?>
<body id="www-karenmcgrane-com">
<?php } ?>

<?php
$is_home = ( isset( $bodyClass ) && ( strpos ( $bodyClass, "sect-home" ) !== false ) ) ? true : false;
if ( $is_home === false ) {
    include( "mast.php" );
} else {
?>
<header>
    <nav class="nav-compact region">
        <ul>
            <li><a href="#">Articles</a></li>
            <li><a href="#">Talks</a></li>
            <li><a href="#">Books</a></li>
            <li><a href="#">Sources</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>
<?php
}
?>

<main class="site-content">
