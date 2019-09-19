<script src="{{ asset('assets/vendor/calendar/js/fullcalendar.min.js') }}"></script>
<script>
 $(function() {
 	"use strict";
 	$('#calendar1').fullCalendar({
 		header: {
 			left: 'prev,next today',
 			center: 'title',
 			right: 'month,agendaWeek,agendaDay'
 		},
 		navLinks: true, // can click day/week names to navigate views
 		selectable: true,
 		selectHelper: true,
 		select: function(start, end) {
 			var title = prompt('Event Title:');
 			var eventData;
 			if (title) {
 				eventData = {
 					title: title,
 					start: start,
 					end: end
 				};
 				$('#calendar1').fullCalendar('renderEvent', eventData, true); // stick? = true
 			}
 			$('#calendar1').fullCalendar('unselect');
 		},
 		editable: true,
 		eventLimit: true, // allow "more" link when too many events
 		events: [
             @php
                $reservations = App\Reservation::whereIsApproved(true)->get();
                
             @endphp
             @foreach($reservations as $reservation)
             {
                @php
                    $colors = ['#67caf0', '#80bcdc', '#fd7274', '#a5ca7b', '#f68d60', '#f9be52', '#ff8087', '#ac92ec', '#41ca94', '#ffb445', '#89bf52', '#00b894'];
                    $randomColors = array_rand($colors);
                @endphp
                title: '{{ $reservation->service->name }} - {{ $reservation->name }}',
                start: '{{ $reservation->date }}',
                color: '{{ $colors[$randomColors] }}',
					 url: '{{ route('reservation.show', $reservation->id) }}'
            },
         @endforeach
    ]
 	}); 	
});
</script>