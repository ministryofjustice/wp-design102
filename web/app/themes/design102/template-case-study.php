<?php

use Roots\Sage\Extras;

/**
 * Template name: Case Study
 */
?>


<div class="l-blocks">
  <div class="row">
    <div class="col">
      <header class="page-header-block">
        <h1>For public good, design great.</h1>
      </header>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <header class="page-header-block page-header-block--jumbo"
              style="background-image: url('<?= Extras\asset_url('images/static/case-study-header.jpg') ?>');">
        <h1>Small change for a better world</h1>
        <div class="page-header-block__subheading">Department for Envrionment &amp; Rural Affairs</div>
      </header>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="video-block">
        <?php
        $oembed = wp_oembed_get('https://www.youtube.com/watch?v=YE7VzlLtp-4');
        echo Extras\unbrand_youtube_iframe($oembed);
        ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="image-block">
        <img src="<?= Extras\asset_url('images/static/case-study-image-1.jpg') ?>" width="1173" height="480">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="text-block" style="background-color: #75B837; color: #fff">
        <div class="text-block__content">
          <p>Inform the public about the new 5p charge for single-use carrier bags.</p>
          <p>We designed a simple bag logo to act as a visual reminder. The designs developed from it were easy for
            retailers to use in store and cost-effective to produce, meaning that they could reach a wide audience
            across a variety of platforms.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="text-block">
        <div class="row">
          <div class="col-md-6">
            <div class="text-block__content">
              <p>Inform the public about the new 5p charge for single-use carrier bags.</p>
              <p>We designed a simple bag logo to act as a visual reminder. The designs developed from it were easy for
                retailers to use in store and cost-effective to produce, meaning that they could reach a wide audience
                across a variety of platforms.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="text-block__content">
              <p>Inform the public about the new 5p charge for single-use carrier bags.</p>
              <p>We designed a simple bag logo to act as a visual reminder. The designs developed from it were easy for
                retailers to use in store and cost-effective to produce, meaning that they could reach a wide audience
                across a variety of platforms.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="image-block">
        <div class="row">
          <div class="col-sm-6">
              <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>" width="1173" height="480">
          </div>
          <div class="col-sm-6">
            <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>" width="1173" height="480">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="text-block" style="background-color: #75B837; color: #fff">
        <div class="text-block__content">
          <p>Our assets were displayed in shops across the country,
            including in John Lewis and ASDA.</p>
          <p>The number of single-use plastic bags used by shoppers in England has reduced by 85%.</p>

          <blockquote class="testimonial">
            <p>“The brand developed by D102 was almost universally adopted by smaller shops&hellip;”</p>
            <footer>
              <div class="person">Drew Morris, Head of Capability and Learning</div>
              <div class="org">Ministry of Justice</div>
            </footer>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="testimonial-block">
        <blockquote class="testimonial">
          <p>“The brand developed by D102 was almost universally adopted by smaller shops&hellip;”</p>
          <footer>
            <div class="person">Drew Morris, Head of Capability and Learning</div>
            <div class="org">Ministry of Justice</div>
          </footer>
        </blockquote>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="call-to-action-block">
        <p class="lead">Great design starts with a conversation</p>
        <a href="#" class="btn btn-outline-white btn-lg">Get in touch</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="other-projects-block">
        <h2>Other projects</h2>
        <div class="carousel">
          <ul class="carousel__slides">
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>"/>
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>"/>
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>"/>
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>"/>
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>"/>
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>" />
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>" />
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="carousel__thumb">
                <img src="<?= Extras\asset_url('images/static/case-study-image-2.jpg') ?>" />
                <div class="overlay">
                  Department for Business, Energy and Industrial Strategy
                </div>
              </a>
            </li>
          </ul>
          <a href="#" class="carousel__prev"><svg><use xlink:href="<?= Extras\asset_url('images/carousel-arrows.svg#left') ?>" /></svg></a>
          <a href="#" class="carousel__next"><svg><use xlink:href="<?= Extras\asset_url('images/carousel-arrows.svg#right') ?>" /></svg></a>
        </div>
      </div>
    </div>
  </div>
</div>
