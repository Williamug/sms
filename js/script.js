//js/script.js
$(function(){
              var guardian = $('.as_guardian'); 
              var parent = $('.as_parent');

              guardian.attr('disabled', 'disabled');
                $('input[name=living]').change(function(e){
                  if($(this).val() =='Guardian'){
                    guardian.removeAttr('disabled');
                    parent.attr('disabled', 'disabled');
                  }else{
                    guardian.attr('disabled', 'disabled');
                    parent.removeAttr('disabled');
                  }
                });

            });

function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}

alert("Hello");

