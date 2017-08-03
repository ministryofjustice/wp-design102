<?php

use Roots\Sage\Extras;

/**
 * Template name: Case Study
 */
?>

<header class="page-header" style="background-image: url('<?= Extras\asset_url('images/static/case-study-header.jpg') ?>');">
    <h1>Small change for a better world</h1>
    <div class="lead">Department for Envrionment &amp; Rural Affairs</div>
</header>

<div class="l-masonry">
    <div class="l-masonry__item">
        <div class="block block--image">
            <img src="<?= Extras\asset_url('images/static/case-study-image-1.jpg') ?>" width="570" height="480">
        </div>
    </div>
    <div class="l-masonry__item">
        <div class="block block--text">
            <h2 class="block__heading"><span>Challenge</span></h2>
            <p>Inform the public about the new 5p charge for single-use carrier bags.</p>
        </div>
    </div>
    <div class="l-masonry__item">
        <div class="block block--image">
            <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>" width="570" height="480">
        </div>
    </div>
    <div class="l-masonry__item">
        <div class="block block--text">
            <h2 class="block__heading"><span>Solution</span></h2>
            <p>We designed a simple bag logo to act as a visual reminder. The designs developed from it were easy for retailers to use in store and cost-effective to produce, meaning that they could reach a wide audience across a variety of platforms.</p>
            <ul>
                <li>Logo</li>
                <li>Posters</li>
                <li>Social-media assets</li>
                <li>Infographics</li>
            </ul>
            <p>Te secus, sam ad molum suscil et estius pel id que veruptatem etus etuscias dolores si comnimpor reium estem. Nam facerferrum sita.</p>
            <p><a href="#more-info" class="btn btn-outline-primary" data-toggle="collapse" aria-expanded="false" aria-controls="more-info">Read More</a></p>
            <div class="collapse" id="more-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac ligula lacus. Morbi euismod a massa id ultrices. Suspendisse sed dignissim erat, id pellentesque erat.</p>
                <p>Nunc pulvinar sit amet lectus sit amet varius. Integer nec sapien quis nisi cursus semper at vitae ipsum. Nulla ac eros a lectus vestibulum cursus. Fusce ac est tempus, volutpat enim lacinia, vehicula nisl. Maecenas quis tortor metus. Vestibulum vitae risus ut tortor tristique tincidunt sed id nunc.</p>
                <p>Nulla ac ullamcorper elit, vel mollis risus. Nulla condimentum porta leo ac malesuada. Duis ultricies, arcu at vulputate gravida, augue odio venenatis lectus, at varius augue velit eget orci.</p>
            </div>
        </div>
    </div>
    <div class="l-masonry__item">
        <blockquote class="block block--testimonial">
            <p>“The brand developed by D102 was almost universally adopted by smaller shops&hellip;”</p>
            <footer>
                <div class="person">Drew Morris, Head of Capability and Learning</div>
                <div class="org">Ministry of Justice</div>
            </footer>
        </blockquote>
    </div>
    <div class="l-masonry__item">
        <div class="block block--image">
            <img src="<?= Extras\asset_url('images/static/case-study-image-3.png') ?>" width="570" height="480">
        </div>
    </div>
    <div class="l-masonry__item">
        <div class="block block--text block--text--light" style="background-color: #75B837;">
            <h2 class="block__heading"><span>Impact</span></h2>
            <p>Our assets were displayed in shops across the country, including in John Lewis and ASDA.</p>
            <p>The number of single-use plastic bags used by shoppers in England has reduced by 85%.</p>
        </div>
    </div>
    <div class="l-masonry__item">
        <div class="block block--image">
            <img src="<?= Extras\asset_url('images/static/case-study-image-4.jpg') ?>" width="570" height="480">
        </div>
    </div>
</div>

<div class="jumbotron">
    <p>Good design starts, begins and ends with conversation.</p>
    <a href="#" class="btn btn-outline-primary btn-lg">Get In Touch</a>
</div>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
