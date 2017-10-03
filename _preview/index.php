<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 9]>  <html class="ie oldie" lang="en"> <![endif]-->
<!--[if gte IE 9]>  <html class="ie" lang="en"><![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />

<title>Karen’s Website, 2017</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<script><?php include( "../dist/assets/js/initial.js" ); ?></script>

<style>
<?php include( "../dist/assets/css/main.css" ); ?>
</style>

<style>
* {
    font-size: inherit;
    font-weight: 500;
    list-style: none;
    margin: 0;
    padding: 0;
}
.content {
    margin: 2em auto;
    max-width: 42em;
    padding: 2em;
    position: relative;
}
.deliverables,
h1 {
    margin-left: 2em;
}
h1 {
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin: 4em 1em;
    margin: 8vh 1em;
}
h2 {
    font-weight: 700;
    margin-bottom: 1em;
    font-size: 1.4em;
    line-height: 1.4;
}
time {
    display: block;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 0.2em;
}
a {
    color: #FFF;
}
.deliverables {
    margin-top: 2em;
}
.deliverables:before {
    background: #FFF;
    border-radius: 0 0 2em 2em;
    bottom: 0;
    content: "";
    left: 0;
    position: absolute;
    top: -2em;
    width: 1em;
}
.deliverables > li {
    position: relative;
    margin: 5em 0;
}
.deliverables > li:last-child {
    margin-bottom: 0;
}
.deliverables > li:before {
    background: #F1592A;
    border-radius: 50%;
    border: 2px solid #FFF;
    content: "";
    height: 2em;
    left: -2em;
    margin-left: -2.7em;
    position: absolute;
    top: -0.45em;
    width: 2em;
}
.deliverables ul li {
    list-style: disc;
}
.deliverables ul ul {
    margin: 0.5em 1em;
}
</style>

</head>

<body>

<div class="content">
    <nav>
        <h1>Karen’s Website, 2017</h1>
        <ol class="deliverables">
            <li>
                <h2>Prototypes</h2>

                <ul>
                    <li><a href="tmpl-home.php">Homepage</a></li>
                    <li><a href="tmpl-entry.php">Article/entry detail</a></li>
                    <li><a href="tmpl-books.php">Books</a></li>
                    <li><a href="tmpl-talk.php">Talk detail</a></li>
                    <li><a href="tmpl-sources.php">Sources Landing</a></li>
                </ul>
            </li>
        </ol>
    </nav>
</div>


</body>
</html>
