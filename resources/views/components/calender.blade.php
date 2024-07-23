<!-- Main content -->
<section class="content mt-3 mb-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class=" mb-3">
          <div class="card card-body card-outline card-success">
            <div class="card-header">
              <h4 class="card-title">Jadwal Kegiatan</h4>
            </div>
              <!-- the events -->
              <div id="external-events">
                <ul>
                  @if (!empty($event))
                  @foreach ($event as $ev )
                  <li>{{ $ev->title }} : </li>
                  <p>Mulai {{$ev->start}}</p>
                  <p>Berakhir {{$ev->end}}</p>
                  @endforeach
                  @else
                  tidak ada kegiatan
                  @endif
                </ul>
              </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card-body card card-primary card-outline">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@section('script')
<!--Css FullCalendar -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/main.css') }}">
  <!-- FullCalendar -->
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/fullcalendar/main.js') }}"></script>

<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });
// ubah data event menjadi format json
    var events = @json($event);

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      events: events.map(event => ({
        title: event.title,
        start: event.start, 
        end: event.end, 
        backgroundColor: event.backgroundColor,
        borderColor: event.borderColor,
        allDay: event.allDay,
      })),
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
  })
</script>

@endsection