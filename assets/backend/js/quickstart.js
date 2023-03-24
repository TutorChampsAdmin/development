$(function () {
    //log('Requesting Capability Token...');
    var current_url = document.location.href;
    var url = new URL(current_url);
    var client_name = url.searchParams.get("client_name");

    $.getJSON('call_token.php?client_name='+client_name)
    .done(function (data) {
        //log('Got a token.');
        console.log('Token: ' + data.token);

        // Setup Twilio.Device
        Twilio.Device.setup(data.token);

        Twilio.Device.ready(function (device) {
            console_log('Now you are ready to connect a call. ', 'hide');
            //document.getElementById('call-controls').style.display = 'none';

            var x = document.getElementById("alert_notification");
            x.autoplay = false;
            x.loop = false;
            x.pause(); 
        });

        Twilio.Device.error(function (error) {
            console_log('Twilio.Device Error: ' + error.message+' <a href="javascript:void(0);" onclick="return resolve_token_issue();" class="btn btn-danger">Click to Resolve</a> <a href="javascript:void(0);" class="btn btn-success" onclick="return stop_shout_notification();">Stop Shout</a>', 'show');

            if(error.message == 'JWT Token Expired') {
                var x = document.getElementById("alert_notification");
                x.autoplay = true;
                x.loop = true;
                x.load();
            }
        });

        Twilio.Device.connect(function (conn, auto_call = 0) {
            console_log('Outgoing call started...');


            console.log(conn);

            $( "#disconnect_popup_msg_after_call" ).html('<p class="always_error">The call is being monitored and recorded</p>');

            calling_sid = conn.parameters.CallSid;
            $('#twilio_call_sid').val(calling_sid);
        });

        // Call Disconnect Start
        Twilio.Device.disconnect(function (conn) {
            console_log('Call ended.');

            var call_sid = conn.parameters.CallSid;

            var conference_call_perform = conference_yes_no();


            open_comment_for_call( call_sid );

            $('#call_popup_outgoing').hide();
            //console.log(conn);
            var show_message_disconnect = '';
            if(conn.sendHangup == true) {
                show_message_disconnect = 'Call ended successfully';
            } else {
                show_message_disconnect = 'Call ended';
            }
            //$( "#call_message" ).html( show_message_disconnect );

            console_log(show_message_disconnect, 'show');

            if(conference_call_perform == true) {
                endConferenceCall();
                $("#called_conference_members").html('');
            } else {
                Twilio.Device.disconnectAll();
            }

            $('#twilio_call_sid').val('');
            
        });
        // Call Disconnect End


        // Call Cancel
        Twilio.Device.cancel(function (conn) {
            console_log('Call was cancelled.');
            var call_sid = conn.parameters.CallSid;

            open_comment_for_call( call_sid );

            update_auto_call_lead();

            $('#call_popup_incoming').hide();
            $("#called_conference_members").html('');

            $('#twilio_call_sid').val('');

        }); 


        // Incoming Call Start
        Twilio.Device.incoming(function (conn) {
            console.log(conn);

            console_log('Incoming call', 'show');

            var client_phone_number = conn.parameters.From;
            var call_sid = conn.parameters.CallSid;

            $.ajax( {
                    type: 'POST',
                    dataType: "html",
                    data: {
                        request_type: 'register_new_client',
                        client_phone_number: client_phone_number,
                    },
                    url: "ajax_client_call.php",

                    success: function ( response ) {
                        display_client_name = response;

                        $('#call_popup_incoming_caller_phone').html(display_client_name);
                    }
                } );

            $('#call_popup_incoming').show();
            $('#call_popup_incoming_call_duration_div').hide();
            
            $('#call_popup_incoming_accept_call').show();

            get_order_list_by_phone_number(client_phone_number);

            var missed_call_id = '';

            $.ajax( {
                    type: 'POST',
                    dataType: "html",
                    data: {
                        request_type: 'missed_incoming_call',
                        client_phone_number: client_phone_number,
                        twilio_call_sid: call_sid,
                    },
                    url: "ajax_client_call.php",

                    success: function ( response ) {
                        missed_call_id = response;
                    }
                } );

            $( "#call_popup_incoming_accept_call" ).click(function() {
                // get the phone number to connect the call to
                if(conn) {
                    conn.accept();
                    $('#call_popup_incoming_call_duration_div').show();
                    $('#call_popup_incoming_accept_call').hide();
                    //show_call_timer_incoming();

                    $.ajax( {
                        type: 'POST',
                        dataType: "html",
                        data: {
                            request_type: 'accept_incoming_call',
                            client_phone_number: client_phone_number,
                            twilio_call_sid: call_sid,
                            missed_call_id: missed_call_id,
                        },
                        url: "ajax_client_call.php",

                        success: function ( response ) {

                        }
                    } );


                } else {
                    $('#call_popup_incoming').hide();
                }
            });
        });
        // Incoming Call End

        Twilio.Device.offline(function (conn) {

            console_log('Twilio Device is now offline :  <a href="javascript:void(0);" onclick="return resolve_token_issue();" class="btn btn-danger">Click to Resolve</a>', 'show');

            $('#call_popup_incoming').hide();
            $("#called_conference_members").html('');
        });
    
    })
    .fail(function () {
        console_log('Could not get a token from server!');
    });


    $("#snooze_call_after").change(function() {

        var snooze_call_after = $('#snooze_call_after').val();

        if(snooze_call_after != '') {
            update_call_snooze_time();
        }
        $("#snooze_call_after").prop('selectedIndex', 0);

    });


    // Bind button to hangup call
    $( "#call_popup_outgoing_end_call" ).click(function() {

        var conference_call_perform = conference_yes_no();

        if(conference_call_perform == true) {
            endConferenceCall();
        } else {
            Twilio.Device.disconnectAll();
        }

        $('#call_popup_outgoing').hide();
        $("#called_conference_members").html('');

        //$( "#call_message" ).html( 'Call disconnected' );

        console_log('Call disconnected');
        update_auto_call_lead();
    });

});


function stop_shout_notification() {
    var x = document.getElementById("alert_notification");
    x.autoplay = false;
    x.loop = false;
    x.pause(); 
}