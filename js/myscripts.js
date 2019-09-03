$(document).ready(function() {
    $('#datatable').DataTable({
        order: [[0, 'desc']]
      });

    $('#scheduled').toggle();

    $('#schedule').click(function(){
        $('#scheduled').toggle();
    });

    $('#message').on('input keyup change click', function(){
        var nochar = $(this).val().length;
        $('.messagecounter').html("No of Characters: "+nochar);

        var divider = 160;
        if(nochar>310){ divider = 155}else if(nochar>500){divider = 150}
        var pages = eval(Math.ceil(nochar/divider));
        $('.pagecounter').html("No of Pages: "+pages);

        var recipients = $('#recipient').val();
        var numbers = recipients.split(',').length;

        if(pages>userunits || numbers>userunits || userunits<1){
            $("#sendsms").attr( "disabled", "disabled" );
            $('#warning').html("You have insufficient SMS Credit Units to send this message, please go to topup to buy more units!");
        }else{
            $("#sendsms").removeAttr("disabled");
            $('#warning').html("");
        }
        
    });

    $('#smsform').keypress(
        function(event){
          if (event.which == '13') {
            event.preventDefault();
          }
    });


    //Populate recipients for a group

    $('#group').change(function() {
        $.ajax({
            method: 'get',
            url: 'getgroupnos/' + $(this).val(),
            dataType: "json",
            success: function(data){
               $('#recipient').text(data.contacts);    
            },
            statusCode: {
                500: function() {
                    // 
                },
                422: function(data) {
                    // 
                }
            }
        });         
    });

    $("#recipient").forceNumeric();    

    var location = window.location.href;
    if(location.indexOf("newtopup") > -1) {
        $("#topuphistory").hide();
    }else if(location.indexOf("topuphistory") > -1){
        $("#newtopup").hide();
    }else if(location.indexOf("topup") > -1){
        $("#topuphistory").hide();
    }

    
});

function addphoneNumber(phonenumber){
    var currepients = $("#recipient").val();
    var recipients;
    if(currepients!=""){
        recipients = currepients+","+phonenumber;
    }else{
        recipients = phonenumber;        
    }
    $('#recipient').val(recipients);    
}

// forceNumeric() plug-in implementation
jQuery.fn.forceNumeric = function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.which || e.keyCode;

            if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
            // numbers   
                key >= 48 && key <= 57 ||
            // Numeric keypad
                key >= 96 && key <= 105 ||
            // comma, period and minus, . on keypad
               key == 190 || key == 188 || key == 109 || key == 110 ||
            // Backspace and Tab and Enter
               key == 8 || key == 9 || key == 13 ||
            // Home and End
               key == 35 || key == 36 ||
            // left and right arrows
               key == 37 || key == 39 ||
            // Del and Ins
               key == 46 || key == 45)
                return true;

            return false;
        });
    });
}

    