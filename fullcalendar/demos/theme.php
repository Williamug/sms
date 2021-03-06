<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../lib/cupertino/jquery-ui.min.css' />
<link href='../fullcalendar.min.css' rel='stylesheet' />
<link href='../fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
			//defaultDate: '',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end){
            	//var title = prompt('Enter Title:');
            	var eventData;
            	if(title){
            		eventData = {
                       title: title,
                       start: start,
                       end: end
            		};
            		$('#calendar').fullCalendar('renderEvent',
            			eventData, true);
            	}
            	$('#calendar').fullCalendar('unselect');
            },
			events:{
                    url: 'php/get-events.php',
                    error: function(){
                    	//$('#script-warning').show();
                  },
				}
			});
			
		});

</script>
<style>

	body {
		/*margin: 40px 10px;*/
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		 width: 750px;
		 display: block;
		 margin-left: auto;
		 margin-right: auto;
 }

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
