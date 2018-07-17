
//js/script.js
$(function(){
	var cheque = $('#cheque');
	var cash = $('#cash');
	var cheque_field = $('#check');

	    cheque_field.attr('disabled', 'disabled');
        cheque_field.hide();
        $(cheque).change(function(){
        	var val = $(this).val();
        	cheque_field.attr('disabled', 'disabled');
            cheque_field.hide();
            
            if(val == 'cheque'){
               cheque_field.removeAttr('disabled');
               cheque_field.show();
               console.log("You pressed");
            }else{
               cheque_field.attr('disabled', 'disabled');
               cheque_field.hide();
            }
        });
});



function checkBox(){
	var check_box_1 = document.getElementById("check_box_1");
	var check_box_2 = document.getElementById('check_box_2').innerHTML="It works";
}

// output information
function Output(msg) {
	var m = document.getElementById("output");
	m.innerHTML = msg + m.innerHTML;
}


// drop box hover effect
function FileHover(e) {
	e.preventDefault();
	e.target.className = (e.type == "dragover" ? "hover" : "");
}


// file selection
function FileSelect(e) {
	FileHover(e);
	
	var files = e.target.files || e.dataTransfer.files;

	// process all files
	for (var i = 0, f; f = files[i]; i++) {
		ParseFile(f);
	}

}


// output file information
function ParseFile(file) {


	// display an image
	if (file.type.indexOf("image") == 0) {
		var reader = new FileReader();
		reader.onload = function(e) {
			Output(
				'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="' + e.target.result +
				'" width="150" height="150" border="1"/></p>'
			);
		}
		reader.readAsDataURL(file);
	}

	// display text
	if (file.type.indexOf("text") == 0) {
		var reader = new FileReader();
		reader.onload = function(e) {
			Output(
				"<p>" + file.name +
				": <p><pre>" + e.target.result +
				"</pre>"
			);
		}
		reader.readAsText(file);
	}

}


// initialization
if (window.File && window.FileList && window.FileReader) {
	
	// select box used
	var fileselect = document.getElementById("fileselect");
	fileselect.addEventListener("change", FileSelect, false);
	
}

