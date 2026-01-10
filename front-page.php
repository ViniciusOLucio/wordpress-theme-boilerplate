<?php
/**
 * The front page template file
 *
 * This is the template that displays the home page by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

  get_header();
?>

  <main class="front-page" role="main">
    <section class="hero">
      <div class="hero__container">
        <h1 class="hero__title">WordPress Theme Boilerplate</h1>
        <p class="hero__subtitle">
          Criado por <a href="https://viniciuslucio.com.br/" target="_blank">Vinicius Lucio</a>
        </p>
        <p class="hero__text">
          Um boilerplate moderno com Vite, SCSS e todas as ferramentas que você precisa para começar seu próximo projeto WordPress.
        </p>
        <div class="hero__actions">
          <a href="https://github.com/ViniciusOLucio/wordpress-theme-boilerplate" class="hero__btn hero__btn--primary" target="_blank" rel="noopener">
            Ver no GitHub
          </a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
