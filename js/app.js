$(document).ready(function() {
   $(document).foundation({
      reveal: {
         animation: 'fade',
      }
   });
   $(document).on('opened.fndtn.reveal', '[data-reveal]', function () {
      $('html').addClass('modal-open');
   });

   $(document).on('closed.fndtn.reveal', '[data-reveal]', function () {
      $('html').removeClass('modal-open');
   });
});
