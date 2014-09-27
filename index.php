<?php
  include_once './php/markdown.php'; // markdown-package

  $meta_text = file('./text/meta.txt', FILE_USE_INCLUDE_PATH);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="nl" lang="nl" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>
      Stalhouderij Klein Middelwijck
      <?php
        if(isset($_GET['id'])) {
          switch($_GET['id']) {
            case "tochten_met_huifkar_en_paardentram":
              echo " - Tochten met huifkar &amp; paardentram";
              break;
            case "authentieke_rijtuigen":
              echo " - Authentieke rijtuigen";
              break;
            case "arrangementen":
              echo " - Arrangementen";
              break;
            case "ringsteken":
              echo " - Ringsteken";
              break;
            case "geschiedenis_en_achtergrondinformatie":
              echo " - Geschiedenis &amp; achtergrondinformatie";
              break;
            case "links":
              echo " - Links";
              break;
            case "contact":
              echo " - Contact";
              break;
          }
        }
      ?>
    </title>
    <meta name="keywords" lang="nl" content="<?php echo $meta_text[0]; ?>" />
    <meta name="description" lang="nl" content="<?php echo $meta_text[1]; ?>" />
    <meta name="robots" content="all" />
    <meta name="language" content="nl" lang="nl" />
    <meta name="google-site-verification" content="D7IM-VF4syzd7Cn2Cb5AvCFOuzZhTid9M-1HPqUSAnk" />
    <link rel="stylesheet" type="text/css" href="/css/default.css" />
    <link rel="stylesheet" type="text/css" href="/css/red.css" />
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-16907361-1']);
      _gaq.push(['_setDomainName', 'none']);
      _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </head>
  <body>
    <div id="main">
      <div id="header">
        <h1>Stalhouderij Klein Middelwijck</h1>
      </div>
      <div id="page">
        <div id="menu">
          <ul>
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="/tochten_met_huifkar_en_paardentram.php">Tochten met huifkar &amp; paardentram</a>
            </li>
            <li>
              <a href="/authentieke_rijtuigen.php">Authentieke rijtuigen</a>
            </li>
            <li>
              <a href="/arrangementen.php">Arrangementen</a>
            </li>
            <li>
              <a href="/ringsteken.php">Ringsteken</a>
            </li>
            <li>
              <a href="/geschiedenis_en_achtergrondinformatie.php">Geschiedenis &amp; achtergrondinformatie</a>
            </li>
            <li>
              <a href="/links.php">Links</a>
            </li>
            <li>
              <a href="/contact.php">Contact</a>
            </li>
          </ul>
        </div>
        <div id="content">
          <?php

          $filename = './text/home.txt';
          if(isset($_GET['id'])) {
            $filename = './text/'.$_GET['id'].'.txt';

            if(!file_exists($filename)) {
              $filename = './text/error404.txt';
            }
          }

          $contents_text = file_get_contents($filename, FILE_USE_INCLUDE_PATH);
          $contents_html = Markdown($contents_text);

          echo $contents_html;
          ?>
        </div>
      </div>
    </div>
  </body>
</html>