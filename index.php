<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel='stylesheet' href='index.css' type='text/css'>
<h1>header this</h1>

<ul class='nav'>
    <li class='nav'><a href='../index.php'>Sales</a></li>
    <li class='nav'><a href='index.php'>Customers</a></li>
    <li class='nav about' ><a href='index.php'>productcatalogus</a></li>
</ul>


<div id="myCarousel" class="carousel slide slidediv"  data-bs-ride="carousel" height="200px" >
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="slideimg" style="background-image: url('images/panino.png') "></div>

            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Example headline.</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="slideimg" style="background-image: url('images/burgerS.png') "></div>

            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Another example headline.</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="slideimg" style="background-image: url('images/burgerS.png') "></div>

            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>One more for good measure.</h1>
                    <p>Some representative placeholder content for the third slide ofe this carousel.</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="underslide">
<?php
$path = $_GET['path'];
include $path ?? 'home.php';

echo "fgduhghfdugy"
?>
</div>

