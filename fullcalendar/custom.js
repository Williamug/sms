
// // Create calendar when document is ready
// $(document).ready(function() {
//  // We will refer to $calendar in future code
//  var calendar = $("#calendar").fullCalendar(
//       { // Start of options
//      theme: true,
//      header: {
//      weekends: false,
//     left: 'prevYear,nextYear',
//     center: 'title',
//    right: 'today,month, listWeek, prev,next'
//    },
   
//    // customize the button names,
//       // otherwise they'd all just say "list"
//       views: {
//        // listDay: { buttonText: 'list day' },
//         listWeek: { buttonText: 'School Events' }
//       },

//    // Make possible to respond to clicks and selections
//      selectable: true,

//      // This is the callback that will be triggered when a selection is made.
//      // It gets start and end date/time as part of its arguments
//      select: function(start, end, jsEvent, view) {

//      // Ask for a title. If empty it will default to "New event"
//      var title = prompt("Enter a title for this event", "New event");

//      // If did not pressed Cancel button
//      if (title != null) {
//      // Create event
//      var event = {
//      title: title.trim() != "" ? title : "New event",
//      start: start,
//      end: end
//      };
//      // Push event into fullCalendar's array of events
//      // and displays it. The last argument is the
//      // "stick" value. If set to true the event
//      // will "stick" even after you move to other
//      // year, month, day or week.
//      calendar.fullCalendar("renderEvent", event, true);
//      };
//      // Whatever happens, unselect selection
//      calendar.fullCalendar("unselect");

//           } // End select callback
       
      
//      });
    
 
//  });


$(document).ready(function() {

    $('#calendar').fullCalendar({
      theme: true,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      defaultDate: '2017-05-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2017-05-01'
        },
        {
          title: 'Long Event',
          start: '2017-05-07',
          end: '2017-05-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2017-05-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2017-05-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2017-05-11',
          end: '2017-05-13'
        },
        {
          title: 'Meeting',
          start: '2017-05-12T10:30:00',
          end: '2017-05-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2017-05-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2017-05-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2017-05-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2017-05-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2017-05-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2017-05-28'
        }
      ]
    });
    
  });









