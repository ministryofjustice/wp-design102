<?php use Roots\Sage\Extras; ?>
<div class="carousel-block">
  <?php

  if (!empty($fields['heading'])) {
    echo '<h2>' . wptexturize($fields['heading']) . '</h2>';
  }

  ?>
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
