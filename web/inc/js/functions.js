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
   
   $('#student-opts-search-student').on('click', function() {
      $('.input-search').slideToggle('slow'); 
   });
   
   $('#student-opts-view-list').on('click', function(e) {
      $.ajax({ 
        url: '/intern/Models/StudentModel.php',
        data: {action: 'AjaxGenerateStudentList'},
        type: 'POST',
        beforeSend: function() {
            $('#generatedStudentList').show();
            $('#generatedStudentList').html("<img src='/intern/inc/images/ajax-loader.gif' />");
        },
        success: function(data) {
            $('#generatedStudentList').html(data);
        }
        
        });
   });
   
   $('#student-opts-create-custom').on('click', function(e) {
      $('#studentForm').slideToggle('slow'); 
      $('#student-continue').slideToggle('fast');
   });
   
   $('.form-wrapper-item').on('click', '.select-student', function () {
      var sID = $(this).attr('id');
      $('#selected-student-from-list').val(sID); //when we save, check the value of this element first
      $('#student-continue').slideDown('slow');
   });
   
   $('#student-continue').on('click', function(e){
       e.preventDefault();
       alert('yp');
   });
   
   $('#btn-student-search').on('click', function(e) {
      alert('y');
   });
  
});
