$(document).ready(function(){
    
    
    /* LEFT SIDE DATEPICKER */
    $("#menuDatepicker").datepicker();
    /* UI elements datepicker */        
    $("#Datepicker").datepicker();
        
    
    /* CALENDAR */
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar({
            header: {		
                    left: 'prev,next',
                    center: 'title',
                    right: ''
                    //right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                            calendar.fullCalendar('renderEvent',
                                    {
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                    },
                                    true // make the event "stick"
                            );
                    }
                    calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [
                    {
                            title: 'All Day Event',
                            start: new Date(y, m, 20),
                            end: new Date(y, m, 21)
                    },
                    {
                            title: 'Long Event',
                            start: new Date(y, m, 1),
                            end: new Date(y, m, 10)
                    }
            ]
    });

    // SELECT2       
        $("#s2_1").select2();
        $("#s2_2").select2();
        
    // CHECKBOXES AND RADIO
        $(".row-form,.dialog,.loginBox,.block-fluid").find("input:checkbox, input:radio, input:file").not(".skip").uniform();
    
    
    // MASKED INPUTS
        
        $("#mask_phone").mask('99 (999) 999-99-99');
        $("#mask_credit").mask('9999-9999-9999-9999');
        $("#mask_date").mask('99/99/9999');
        $("#mask_tin").mask('99-9999999');
        $("#mask_ssn").mask('999-99-9999');
        
    //FORM VALIDATION

        $("#validation").validationEngine({promptPosition : "topLeft", scroll: true});        
        
    // CUSTOM SCROLLING
    
        $(".scroll").mCustomScrollbar();
    
    // ACCORDION 
    
        $(".accordion").accordion();
    
    // PROGRESSBAR
    
    if($("#progressbar-1").length > 0)    
        $("#progressbar-1").anim_progressbar();
    
    if($("#progressbar-2").length > 0){
        var iNow = new Date().setTime(new Date().getTime() + 3 * 1000);
	var iEnd = new Date().setTime(new Date().getTime() + 20 * 1000);
	$('#progressbar-2').anim_progressbar({start: iNow, finish: iEnd, interval: 1});        
    }
    if($("#progressbar-3").length > 0)
        $('#progressbar-3').progressbar({value: 65});;
        
        
    // DIALOG
    
    $("#b_popup_1").dialog({autoOpen: false});
        
        $("#popup_1").click(function(){$("#b_popup_1").dialog('open')});
        
    $("#b_popup_2").dialog({autoOpen: false, show: "blind", hide: "explode"});

        $("#popup_2").click(function(){$("#b_popup_2").dialog('open')});

    $("#b_popup_3").dialog({autoOpen: false, modal: true});
        
        $("#popup_3").click(function(){$("#b_popup_3").dialog('open')});
        
    $("#b_popup_4").dialog({autoOpen: false, 
                            modal: true,
                            width: 400,
                            buttons: {                            
                                "Ok": function() {
                                    $( this ).dialog( "close" );
                                },
                                Cancel: function() {
                                    $( this ).dialog( "close" );
                                }
    }});
    
        $("#popup_4").click(function(){$("#b_popup_4").dialog('open')});
    
    // SLIDER
    
        $("#slider_1").slider({
            value: 60,
            orientation: "horizontal",
            range: "min",
            animate: true,
            slide: function( event, ui ) {
                $( "#slider_1_amount" ).html( "$" + ui.value );
            }
        });
        
        $("#slider_2").slider({
            values: [ 17, 67 ],
            orientation: "horizontal",
            range: true,
            animate: true,
            slide: function( event, ui ) {
                $( "#slider_2_amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }            
        });    
            
        $("#slider_3").slider({
            orientation: "vertical",
            range: "min",
            min: 0,
            max: 100,
            value: 10,
            slide: function( event, ui ) {
                $( "#slider_3_amount" ).html( '$'+ui.value );
            }            
        }); 

        $("#slider_4").slider({
            orientation: "vertical",
            range: true,
            values: [ 17, 67 ]
        }); 

        $("#slider_5").slider({
            orientation: "vertical",            
            range: "max",
            min: 1,
            max: 10,
            value: 2
        }); 
        
        
    // TABS
    
        $( ".tabs" ).tabs();

   // TOOLTIPSborder:{

        $('.tt').qtip({ style: {name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'topRight',
                                tooltip: 'bottomLeft'
                            }
                        } 
                    });
        
        $('.ttRC').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'rightMiddle',
                                tooltip: 'leftMiddle'
                            }
                        } 
                    });        

        $('.ttRB').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'bottomRight',
                                tooltip: 'topLeft'
                            }
                        } 
                    });
                    
        $('.ttLT').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'topLeft',
                                tooltip: 'bottomRight'
                            }
                        } 
                    });
        
        $('.ttLC').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'leftMiddle',
                                tooltip: 'rightMiddle'
                            }
                        } 
                    });        

        $('.ttLB').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'bottomLeft',
                                tooltip: 'topRight'
                            }
                        } 
                    });
                    
                    
        // SORTABLE       
            $("#sort_1").sortable({placeholder: "placeholder"});
            $("#sort_1").disableSelection();    
            
        // SELECTABLE
            $("#selectable_1").selectable();
            
            
        // WYSIWIG HTML EDITOR
            if($("#wysiwyg").length > 0){
                editor = $("#wysiwyg").cleditor({width:"100%", height:"50%"})[0].focus();                
            }                                          
            
         // Sortable table
         if($("#tSortable").length > 0)
         {
            $("#tSortable").dataTable({"iDisplayLength": 5, "aLengthMenu": [5,10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": false }, null, null, null, null]});
            $("#tSortable_2").dataTable({"iDisplayLength": 5, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null]});
         }
         
});

$(window).resize(function() {

    if($("#wysiwyg").length > 0) editor.refresh();

    
});
