<?php

function renderHeadPage($titlePage) {
  echo "
      <head>
      <meta charset='UTF-8' />
      <meta http-equiv='X-UA-Compatible' content='IE=edge' />
      <meta name='viewport' content='width=device-width, initial-scale=1.0' />
      <link rel='shortcut icon' href='resources/images/icons/bag.png' type='image/png' />

      <!-- SEO -->
      <meta name='robots' content='index, follow' />
      <link rel='canonical' href='https://projeto-final-php.netlify.app/' />
      <title>$titlePage</title>
      <meta name='description' content='Realize o seu sonho de conhecer a Terra Santa, Turquia e Jordânia com preço, qualidade e segurança. Confira os preços de nossos pacotes.' />

      <!-- OpenGraph Facebook -->
      <meta property='og:type' content='website' />
      <meta property='og:locale' content='pt_BR' />
      <meta property='og:site_name' content='tripEast' />
      <meta property='og:url' content='https://projeto-final-php.netlify.app/' />
      <meta property='og:title' content='tripEast | Agência de turismo' />
      <meta property='og:description' content='Realize o seu sonho de conhecer a Terra Santa, Turquia e Jordânia com preço, qualidade e segurança. Confira os preços de nossos pacotes.' />
      <meta property='og:image' content='https://projeto-final-php.netlify.app/resources/images/hero/turquia.jpg' />
      <meta property='og:image:type' content='image/jpeg' />

      <!-- Em pixels -->
      <meta property='og:image:width' content='800' />
      <!-- Em pixels -->
      <meta property='og:image:height' content='600' />

      <!-- Twitter -->
      <meta property='twitter:card' content='summary_large_image' />
      <meta property='twitter:url' content='https://projeto-final-php.netlify.app/' />
      <meta property='twitter:title' content='tripEast | Agência de turismo' />
      <meta property='twitter:description' content='Realize o seu sonho de conhecer a Terra Santa, Turquia e Jordânia com preço, qualidade e segurança. Confira os preços de nossos pacotes.' />

      <!-- GOOGLE FONTS -->
      <link rel='preconnect' href='https://fonts.googleapis.com' />
      <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
      <link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Sarabun:wght@800&display=swap' rel='stylesheet' />

      <!-- CSS RESET -->
      <link rel='stylesheet' href='resources/css/reset.css' />

      <!-- TYPOGRAPHY -->
      <link rel='stylesheet' href='resources/css/typography.css' />

      <!-- COLORS -->
      <link rel='stylesheet' href='resources/css/colors.css' />

      <!-- STYLES -->
      <link rel='stylesheet' href='resources/css/styles.css' />

      <!-- FORMS -->
      <link rel='stylesheet' href='resources/css/forms.css' />

      <!-- BUTTONS -->
      <link rel='stylesheet' href='resources/css/buttons.css' />

      <!-- MESSAGES -->
      <link rel='stylesheet' href='resources/css/messages.css' />
    </head>
  ";
}
