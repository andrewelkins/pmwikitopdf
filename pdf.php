<?php if (!defined('PmWiki')) exit();
/* PMWikiToPDF Recipe for PMWiki */

SDV($RecipeInfo['PMWikiToPDF']['Version'], '2013-11-14');
SDV($HandleActions['pdf'], 'outputPdf');
SDV($ActionSkin['pdf'], 'print');

function outputPdf($pagename, $auth='read') {
  global $HandleActions, $WorkDir;

  require dirname(__FILE__).'/vendor/autoload.php';
  define('DOMPDF_ENABLE_AUTOLOAD', false);
  require_once(dirname(__FILE__).'/vendor/dompdf/dompdf/dompdf_config.inc.php');

  // Get the page html
  ob_start();
  $browse = $HandleActions['browse'];
  $browse($pagename, $auth);
  $html = ob_get_contents();
  ob_end_clean();

  // Disable CGI it'll muck with the pdf
  putenv('HTMLDOC_NOCGI=1');

  // Set doctype as a pdf
  header("Content-type: application/pdf");
  flush();

  // Create pdf and output
  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->render();
  $dompdf->stream($pagename . ".pdf");
}

