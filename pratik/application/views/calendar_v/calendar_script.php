    <script type="text/javascript" src="<?php echo base_url("resources/");?>assets/js/jquery-3.6.1.slim.js"></script>
    <script type="text/javascript" src="<?php echo base_url("resources/").'assets/js/moment.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("resources/").'assets/js/popper.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("resources/").'assets/js/bootstrap.min.js'; ?>"></script>


    <script type="text/javascript" src="<?php echo base_url("resources/").'assets/js/fullcalendar.min.js'; ?>"></script>


    <script type="text/javascript" src="<?php echo base_url("resources/");?>assets/js/tether.min.js"></script>
    
    <script type="text/javascript">
        <?php $data=getCalendarinfo(); ?>
        var get_data        = '<?php echo $data; ?>';
        var backend_url     = '<?php echo base_url(); ?>';
        $(document).ready(function() {
            $('.date-picker').datepicker();
            $('#calendarIO').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                locale : 'tr_TR',
                firstDay:1,
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                monthNames: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
                monthNamesShort: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
                dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
                dayNamesShort: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
                buttonText: {
                    today:    'Bugün',
                    month:    'Ay',
                    week:     'Hafta',
                    day:      'Gün',
                    list:     'Liste',
                    listMonth: 'Aylık Liste',
                    listYear: 'Yıllık Liste',
                    listWeek: 'Haftalık Liste',
                    listDay: 'Günlük Liste'
                },
                displayEventTime: false,
                eventLimit: true, // allow "more" link when too many events
                navLinks:true,
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                    $('#ModalAdd').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventAfterRender: function(eventObj, $el) {
                    var request = new XMLHttpRequest();
                    request.open('GET', '', true);
                    request.onload = function () {
                        $el.popover({
                            title: String(eventObj.title),
                            content: String(eventObj.description),
                            trigger: 'hover',
                            html : true,
                            placement: 'top',
                            container: 'body'
                        });
                    }
                    request.send();
                },

                eventRender: function(event, element,view) {
                    $(element).css("font-weight", "bold");
                    $(element).css("font-size", "15px");
                    element.bind('click', function() {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #description').val(event.description);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit #start').val(moment(event.start).format('YYYY-MM-DD'));
                        $('#ModalEdit #end').val(moment(event.end).format('YYYY-MM-DD'));
                        $('#ModalEdit').modal('show');
                    });
                },
                
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
               eventClick: function(event,element)
               {
                   editData(event);
                   deleteData(event);
              },

                events: JSON.parse(get_data)
            });
        });
        
        $(document).on('submit', '#form_create', function(){

            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'admin/calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                            title       : $('#ModalAdd input[name=title]').val(),
                            description : $('#ModalAdd input[name=description]').val(),
                            start       : moment($('#ModalAdd input[name=start_date]').val()).format('YYYY-MM-DD'),
                            end         : moment($('#ModalAdd input[name=end_date]').val()).format('YYYY-MM-DD'),
                            color       : $('#ModalAdd input[name=color]').val()
                        };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#ModalAdd').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('OMG 0 Wrong server, please save again');
                }         
            });
            return false;
        })


        $(document).on('submit', '#form_edit', function(){

            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'admin/calendar/edit',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {
                        eventData = {
                            id          : data.id,
                            title       : $('#ModalEdit input[name=title]').val(),
                            description : $('#ModalEdit input[name=description]').val(),
                            start       : moment($('#ModalEdit input[name=start_date]').val()).format('YYYY-MM-DD'),
                            end         : moment($('#ModalEdit input[name=end_date]').val()).format('YYYY-MM-DD'),
                            color       : $('#ModalEdit input[name=color]').val()
                        };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#ModalEdit').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('OMG 0 Wrong server, please save again');
                }
            });
            return false;
        })


        function editDropResize(event)
        {
            start = event.start.format('YYYY-MM-DD');
            if(event.end)
            {
                end = event.end.format('YYYY-MM-DD');
            }
            else
            {
                end = start;
            }
         
            $.ajax({
                url     : backend_url+'admin/calendar/save',
                type    : 'POST',
                data    : 'calendar_id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end+'&color='+event.color+'&description='+event.description,
                dataType: 'JSON',
                beforeSend: function()
                {
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                    }
                    else
                    {
                        $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                    }
             
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('OMG 1 Wrong server, please save again');
                }         
            });
        }

        function save()
        {
            $('#form_create').submit(function(){
                var element = $(this);
                var eventData;
                $.ajax({
                    url     : backend_url+'admin/calendar/save',
                    type    : element.attr('method'),
                    data    : element.serialize(),
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                        element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {
                            eventData = {
                                id          : data.id,
                                title       : $('#ModalAdd input[name=title]').val(),
                                description : $('#ModalAdd textarea[name=description]').val(),
                                start       : moment($('#ModalAdd input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                                end         : moment($('#ModalAdd input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                                color       : $('#ModalAdd select[name=color]').val()
                            };
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#ModalAdd').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('OMG 2 Wrong server, please save again');
                    }
                });
                return false;
            })
        }


        function editData(event)
        {
            $('#form_edit').submit(function(){
                var element = $(this);
                var eventData;
                $.ajax({
                    url     : backend_url+'admin/calendar/edit',
                    type    : element.attr('method'),
                    data    : element.serialize(),
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                        element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {
                            event.id = data.id;
                            event.title         = $('#ModalEdit input[name=title]').val();
                            event.description   = $('#ModalEdit input[name=description]').val();
                            event.start         = moment($('#ModalEdit input[name=start_date]').val()).format('YYYY-MM-DD');
                            event.end           = moment($('#ModalEdit input[name=end_date]').val()).format('YYYY-MM-DD');
                            event.color         = $('#ModalEdit input[name=color]').val();
                            $('#calendarIO').fullCalendar('updateEvent', event._id);

                            $('#ModalEdit').modal('hide');
                            element[0].reset();
                            $('#ModalEdit input[name=calendar_id]').val(0)
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('OMG 3 Wrong server, please save again');
                    }         
                });
                return false;
            })
        }

        function deleteData(event)
        {
            $('#delete_calendar').click(function(){
                $.ajax({
                    url     : backend_url+'admin/calendar/delete',
                    type    : 'POST',
                    data    : 'id='+event.id,
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {
                            $('#calendarIO').fullCalendar('removeEvents',event._id);
                            $('#ModalEdit').modal('hide');
                            $('#form_create')[0].reset();
                            $('#ModalEdit input[name=calendar_id]').val(0)
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            $('#ModalEdit').find('.alert').css('display', 'block');
                            $('#ModalEdit').find('.alert').html(data.notif);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        $('#ModalEdit').find('.alert').css('display', 'block');
                        $('#ModalEdit').find('.alert').html('OMG 4 Wrong server, please save again');
                    }
                });
            })
        }

    </script>