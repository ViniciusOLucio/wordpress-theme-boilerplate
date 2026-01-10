<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

  <main class="error-404" role="main">
    <div class="error-404__container">
      <span class="error-404__code">404</span>
      <h1 class="error-404__title">Página não encontrada</h1>
      <p class="error-404__text">A página que você procura não existe ou foi removida.</p>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="error-404__btn">
        Voltar para o início
      </a>
    </div>
  </main>

<?php
get_footer();
