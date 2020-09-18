<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<div id="google_translate_element"></div>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({  
      pageLanguage: 'en', 
      includedLanguages: 'en,fr',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
  }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
  $(document).ready(function(){
    $('#google_translate_element').bind('DOMNodeInserted', function(event) {
      $('.goog-te-menu-value span:first').html('Translate');
      $('.goog-te-menu-frame.skiptranslate').load(function(){
        setTimeout(function(){
          $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('Translate');    
        }, 100);
      });
    });
  });
</script>


 <!-- <div id="google_translate_element"    ></div>


 <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'ro', includedLanguages: 'en,ro', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

<style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
<style type="text/css">body {position: static !important; top:0px !important;}</style>