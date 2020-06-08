
<footer class="footer" id="footer">
  <img class="footLogo" src="<?php echo get_template_directory_uri(); ?>/img/footLogo.png" alt="Silversea Logo">
  <aside class="footerInfoCont">
    <div class="iconTextInline">
      <svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.62842 13.9486C9.35485 11.8843 12.0616 8.29423 12.0616 6.03247C12.0649 2.70675 9.3582 0 6.03247 0C2.70675 0 0 2.70675 0 6.03247C0 8.29423 2.70675 11.8843 4.43318 13.9486C3.54989 14.2397 3.01456 14.7583 3.01456 15.3539C3.01456 16.2773 4.3395 17 6.02913 17C7.71875 17 9.04369 16.2773 9.04369 15.3539C9.04704 14.7617 8.51171 14.2397 7.62842 13.9486ZM0.548711 6.03247C0.548711 3.00787 3.00787 0.548711 6.03247 0.548711C9.05707 0.548711 11.5162 3.00787 11.5162 6.03247C11.5162 8.73922 7.0429 13.8349 6.03247 14.949C5.02539 13.8315 0.548711 8.73588 0.548711 6.03247ZM6.03247 16.4479C4.57705 16.4479 3.56662 15.8691 3.56662 15.3505C3.56662 14.9791 4.07853 14.6044 4.82464 14.407C5.38004 15.0527 5.77485 15.4743 5.83173 15.5379L6.03247 15.752L6.23322 15.5379C6.29345 15.4743 6.6849 15.0527 7.24365 14.4037C7.99646 14.6044 8.50167 14.9791 8.50167 15.3505C8.49833 15.8691 7.4879 16.4479 6.03247 16.4479Z" fill="white"/>
        <path d="M6.03251 2.46924C4.06853 2.46924 2.46924 4.06853 2.46924 6.03252C2.46924 7.99651 4.06853 9.5958 6.03251 9.5958C7.9965 9.5958 9.59579 7.99651 9.59579 6.03252C9.59579 4.06853 7.9965 2.46924 6.03251 2.46924ZM6.03251 9.04709C4.36965 9.04709 3.01795 7.69539 3.01795 6.03252C3.01795 4.36966 4.36965 3.01795 6.03251 3.01795C7.69537 3.01795 9.04708 4.36966 9.04708 6.03252C9.04708 7.69539 7.69537 9.04709 6.03251 9.04709Z" fill="white"/>
        <path d="M6.30677 12.8845H5.75806V13.4332H6.30677V12.8845Z" fill="white"/>
        <path d="M6.30677 11.7871H5.75806V12.3358H6.30677V11.7871Z" fill="white"/>
        <path d="M6.30677 10.6899H5.75806V11.2387H6.30677V10.6899Z" fill="white"/>
      </svg>
      <p class="footLoc">Barcelona, España</p>
    </div>
    <div class="iconTextInline">
      <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
          <path d="M6.89062 15.75H4.35938C4.12734 15.75 3.9375 15.5602 3.9375 15.3281V15.0469C3.9375 14.8148 4.12734 14.625 4.35938 14.625H6.89062C7.12266 14.625 7.3125 14.8148 7.3125 15.0469V15.3281C7.3125 15.5602 7.12266 15.75 6.89062 15.75ZM11.25 1.6875V16.3125C11.25 17.2441 10.4941 18 9.5625 18H1.6875C0.755859 18 0 17.2441 0 16.3125V1.6875C0 0.755859 0.755859 0 1.6875 0H9.5625C10.4941 0 11.25 0.755859 11.25 1.6875ZM10.125 1.6875C10.125 1.37812 9.87188 1.125 9.5625 1.125H1.6875C1.37812 1.125 1.125 1.37812 1.125 1.6875V16.3125C1.125 16.6219 1.37812 16.875 1.6875 16.875H9.5625C9.87188 16.875 10.125 16.6219 10.125 16.3125V1.6875Z" fill="white"/>
        </g>
        <defs>
          <clipPath id="clip0">
            <rect width="11.25" height="18" fill="white"/>
          </clipPath>
        </defs>
      </svg>
      <a class="footTel" href="tel:34-935-958-800">Teléfono: (+34) 935 958 800</a>
    </div>
    <?php include('socialMedia.php') ?>
  </aside>


  <!-- NAVIGATION BAR -->
  <?php
  $args = array(
    'theme_location' => 'footerNav',
    'depth' => 0,
    'container'	=> false,
    'fallback_cb' => false,
    'menu_class' => 'footerNav',
  );
  wp_nav_menu($args);
  ?>

  <form class="footLog" action="/action_page.php">
    <input class="footLogInput" type="text" name="user" placeholder="User">
    <input class="footLogInput" type="password" name="pass" placeholder="Password">
    <button class="footLogSubmit btn" type="submit" value="Submit">LOGIN</button>
  </form>
</footer>
<?php wp_footer(); ?>
</body>
</html>
