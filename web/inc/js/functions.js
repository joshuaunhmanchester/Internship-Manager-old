$(function() {
   $('.ac-label').on('click', function (e) {
      
      $(this).next('.ac-content').slideToggle('medium');
   
   });
   
   $('.c-type').on('change', function(e) {
      var current = $(this).attr('id');
      var customForm = $('#custom-company-form');
      
      if(current === 'exist-company') {
          customForm.slideUp('fast');
      } else {
          customForm.slideDown('fast');
      }
   });
});
