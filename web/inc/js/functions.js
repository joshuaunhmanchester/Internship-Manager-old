$(function() {
   $('#company-form-wrapper').hide();
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
      $('#student-search-wrapper').slideToggle('slow'); 
   });
   
   $('#student-opts-view-list').on('click', function(e) {
      $('#studentForm').slideUp('fast');
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
      $('#generatedStudentList').slideUp('fast');
      $('#studentForm').slideToggle('slow'); 
      $('#student-continue').slideToggle('fast');
   }); 
   
   $('.form-wrapper-item').on('click', '.select-student', function () {
      var sID = $(this).attr('id');
      $('#selected-student-from-list').val(sID); //when we save, check the value of this element first
      $('.listing-table tr').not($(this)).css('color', '#666');
      $(this).closest('tr').css('color', 'red');
      $('#student-continue').slideDown('slow');
   });
   

   $('#btn-student-search').on('click', function(e) {
      var query = $('#student-search').val();
      $.ajax({
         url: '/intern/Models/StudentModel.php',
         data: { action: 'StudentSearch', q: query },
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
   
   $('#student-continue').on('click', function(e){
       e.preventDefault();
       $('.step1').css('text-decoration', 'line-through');
       $('.step2').css('opacity', '1');
       $('.step3').css('opactiy', '.75');
       $('.step4').css('opacity', '.5');
       
       $.ajax({ 
            url: '/intern/Models/StudentModel.php',
            data: {action: 'StudentContinue'},
            type: 'POST',
            success: function(data) {
                $('#company-form-wrapper').slideDown('medium');
                $('#company-form-wrapper').append(data);
            }
       });
       
       $("html, body").animate({ scrollTop: $(document).height() }, 1000);
   });
   
   
   
   /* COMPANY FORM SECITON */
  
  $('form').on('click', '#company-opts-search-company', function () {
      $('#company-search-wrapper').slideToggle('slow'); 
   });
   
   $('form').on('click', '#company-opts-view-list', function () {
      $('#companyForm').slideUp('fast');
      $.ajax({ 
        url: '/intern/Models/CompanyModel.php',
        data: {action: 'AjaxGenerateCompanyList'},
        type: 'POST',
        beforeSend: function() {
            $('#generatedCompanyList').show();
            $('#generatedCompanyList').html("<img src='/intern/inc/images/ajax-loader.gif' />");
        },
        success: function(data) {
            $('#generatedCompanyList').html(data);
        }
        
        });
   });
   
   $('form').on('click', '#company-opts-create-custom', function () {
      $('#generatedCompanyList').slideUp('fast');
      $('#companyForm').slideToggle('slow'); 
      $('#company-continue').slideToggle('fast');
   }); 
   
   $('form').on('click', '.select-company', function () {
      var sID = $(this).attr('id');
      $('#selected-company-from-list').val(sID); //when we save, check the value of this element first before creating one
      $(this).prev('.listing-table tr').not($(this)).css('color', '#666');
      $(this).closest('tr').css('color', 'red');
      $('#company-continue').slideDown('slow');
   });
   
   $('form').on('click', '#btn-company-search', function () {
      var query = $('#company-search').val();
      $.ajax({
         url: '/intern/Models/CompanyModel.php',
         data: { action: 'CompanySearch', q: query },
         type: 'POST',
         beforeSend: function() {
            $('#generatedCompanyList').show();
            $('#generatedCompanyList').html("<img src='/intern/inc/images/ajax-loader.gif' />");
         },
         success: function(data) {
            $('#generatedCompanyList').html(data);
         }
      });
   });
   
   $('form').on('click', '#company-continue', function (e) {
       e.preventDefault();
       $('.step1').css('text-decoration', 'line-through');
       $('.step2').css('text-decoration', 'line-through');
       $('.step3').css('opactiy', '1');
       $('.step4').css('opacity', '.75');
       
       $.ajax({ 
            url: '/intern/Models/CompanyModel.php',
            data: {action: 'CompanyContinue'},
            type: 'POST',
            success: function(data) {
                $('#supervisor-form-wrapper').slideDown('medium');
                $('#supervisor-form-wrapper').append(data);
            }
       });
       
       $("html, body").animate({ scrollTop: $(document).height() }, 1000);
   });
   
   
  /* SUPERVISOR FORM SECITON */
  
  $('form').on('click', '#supervisor-opts-search-supervisor', function () {
      $('#super-search-wrapper').slideToggle('slow'); 
   });
   
   $('form').on('click', '#supervisor-opts-view-list', function () {
      $('#supervisorForm').slideUp('fast');
      $.ajax({ 
        url: '/intern/Models/SupervisorModel.php',
        data: {action: 'AjaxGenerateSupervisorList'},
        type: 'POST',
        beforeSend: function() {
            $('#generatedSupervisorList').show();
            $('#generatedSupervisorList').html("<img src='/intern/inc/images/ajax-loader.gif' />");
        },
        success: function(data) {
            $('#generatedSupervisorList').html(data);
        }
        
        });
   });
   
   $('form').on('click', '#supervisor-opts-create-custom', function () {
      $('#generatedSupervisorList').slideUp('fast');
      $('#supervisorForm').slideToggle('slow'); 
      $('#supervisor-continue').slideToggle('fast');
   }); 
   
   $('form').on('click', '.select-supervisor', function () {
      var sID = $(this).attr('id');
      $('#selected-supervisor-from-list').val(sID); //when we save, check the value of this element first before creating one
      $(this).prev('.listing-table tr').not($(this)).css('color', '#666');
      $(this).closest('tr').css('color', 'red');
      $('#supervisor-continue').slideDown('slow');
   });
   
   $('form').on('click', '#btn-supervisor-search', function () {
      var query = $('#supervisor-search').val();
      $.ajax({
         url: '/intern/Models/SupervisorModel.php',
         data: { action: 'SupervisorSearch', q: query },
         type: 'POST',
         beforeSend: function() {
            $('#generatedSupervisorList').show();
            $('#generatedSupervisorList').html("<img src='/intern/inc/images/ajax-loader.gif' />");
         },
         success: function(data) {
            $('#generatedSupervisorList').html(data);
         }
      });
   });
   
   $('form').on('click', '#supervisor-continue', function () {
       e.preventDefault();
       $('.step1').css('text-decoration', 'line-through');
       $('.step2').css('text-decoration', 'line-through');
       $('.stpe3').css('text-decoration', 'line-through');
       $('.step4').css('opacity', '1');
       
       $.ajax({ 
            url: '/intern/Models/SupervisorModel.php',
            data: {action: 'SupervisorContinue'},
            type: 'POST',
            success: function(data) {
                $('#position-form-wrapper').slideDown('medium');
                $('#position-form-wrapper').append(data);
            }
       });
       
       $("html, body").animate({ scrollTop: $(document).height() }, 1000);
   });
  
});
