(function(t){'use strict';t('.input100').each(function(){t(this).on('blur',function(){if(t(this).val().trim()!=''){t(this).addClass('has-val')}
else{t(this).removeClass('has-val')}})});var a=t('.validate-input .input100');t('.validate-form').on('submit',function(){var e=!0;for(var t=0;t<a.length;t++){if(i(a[t])==!1){n(a[t]);e=!1}};return e});t('.validate-form .input100').each(function(){t(this).focus(function(){e(this)})});function i(a){if(t(a).attr('type')=='email'||t(a).attr('name')=='email'){if(t(a).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/)==null){return!1}}
else{if(t(a).val().trim()==''){return!1}}};function n(a){var i=t(a).parent();t(i).addClass('alert-validate')};function e(a){var i=t(a).parent();t(i).removeClass('alert-validate')}})(jQuery);