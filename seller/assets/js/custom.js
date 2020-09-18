$(document).ready(function () {
	$(".homeScreen").show();
	$(".special").hide();
	$(".gamePlay").hide();
	$(".profilePage").hide();
	$(".notification").hide();
	$(".alertPage").hide();
	$("#gamePage").hide();
	$(".transaction_page").hide();
	
	$(document).on('click', ".loadGames", function () {
		var od = $(this).attr("id");
		$("#"+od).removeAttr('style').addClass("custom7");
		$("#gameType").val(od)
		var url = '../lottery/seller/index.php?type='+(od);
		history.pushState(null, null, url);
		if (od == '_wedding') {
			$(".special").show();
			$(".common").hide();
		}else{
			$(".special").hide();
			$(".common").show();
		}
	});

	// Default Configuration
	toastr.options = {
		'closeButton': true,
		'debug': false,
		'newestOnTop': false,
		'progressBar': false,
		'positionClass': "toast-top-full-width",
  		'progressBar': true,
		'preventDuplicates': false,
		'showDuration': '1000',
		'hideDuration': '1000',
		'timeOut': '5000',
		'extendedTimeOut': '1000',
		'showEasing': 'swing',
		'hideEasing': 'linear',
		'showMethod': 'fadeIn',
		'hideMethod': 'fadeOut',
	}

	$(document).on('click', ".deleteRow", function () {
		var delRow = $(this).attr('id');
		var stack = $("#stack"+delRow).val();
		var gTotal = $("#getTotal").html();
		var newTotal = gTotal - stack;
		$("#getTotal").html(newTotal);
		$("#"+delRow).remove();
		// getTotal();
	});

	//Save Data into Database
    $("#formData").on('submit',function(e) {
        e.preventDefault();
        var form = $('#formData');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success:function (msg) {
            	console.log(msg)
                $('#saveData').text("Save");
                $('#formData').each(function(){
                    this.reset();
                });
                showMessage('info', "Tickets Added Successfully Printing...")
                window.open("ticket.php?seller="+msg.seller_id+"&tickets="+msg.tickets, '_self'); 
            }
        });    
    });   

    $(document).on('click', '.button1', function () {
    	$("#gamePage").show();
		$(".alertPage").hide();
		$(".notification").hide();
		$(".profilePage").hide();
		$(".homeScreen").hide();
		$(".gamePlay").hide();
		var url = '../seller/index.php?type=borlette';
		history.pushState(null, null, url);
		$("#gameType").val("_borlette");
    });

});//document Ready

function showMessage(type, msg) {
	switch (type) {
		case 'success':
			toastr.success(msg)
			break;
		case 'info':
			toastr.info(msg)
			break;
		case 'error':
			toastr.error(msg)
			break;
		case 'warning':
			toastr.warning(msg)
			break;
		default:
			// statements_def
			break;
	}
}

function homePage() {
	$(".homeScreen").show();
	$(".gamePlay").hide();
	$(".profilePage").hide();
	$(".notification").hide();
	$(".alertPage").hide();
	$("#gamePage").hide();
	$(".transaction_page").hide();
}

function gamePlay() {
	$(".gamePlay").show();
	$(".homeScreen").hide();
	$(".profilePage").hide();
	$(".notification").hide();
	$(".alertPage").hide();
	$("#gamePage").hide();
	$(".transaction_page").hide();
}

function profilePage() {
	$(".profilePage").show();
	$(".homeScreen").hide();
	$(".gamePlay").hide();
	$(".notification").hide();
	$(".alertPage").hide();
	$("#gamePage").hide();
	$(".transaction_page").hide();
}

function notifyPage() {
	$(".notification").show();
	$(".profilePage").hide();
	$(".homeScreen").hide();
	$(".gamePlay").hide();
	$(".alertPage").hide();
	$("#gamePage").hide();
	$(".transaction_page").hide();
}

function alertPage() {
	$(".alertPage").show();
	$(".notification").hide();
	$(".profilePage").hide();
	$(".homeScreen").hide();
	$(".gamePlay").hide();
	$("#gamePage").hide();
	$(".transaction_page").hide();
}

function loadTransaction() {
	$(".transaction_page").show();
	$(".alertPage").hide();
	$(".notification").hide();
	$(".profilePage").hide();
	$(".homeScreen").hide();
	$(".gamePlay").hide();
	$("#gamePage").hide();
}

function loadGame(selector) {
	$("#gamePage").show();
	$(".alertPage").hide();
	$(".notification").hide();
	$(".profilePage").hide();
	$(".homeScreen").hide();
	$(".gamePlay").hide();
	//Game Page Logics
	$("#_"+selector).removeAttr('style').addClass("custom7");
	$("#gameType").val(selector);
	var url = '../seller/index.php?type='+(selector);
	history.pushState(null, null, url);
	if (selector == '_wedding') {
		$(".special").show();
		$(".common").hide();
	}else{
		$(".special").hide();
		$(".common").show();
	}
}

var count = 0;
function uploadTickets() {
	var number 	= $(".ticketNumber").val();
	var number1	= $(".ticketNumber1").val();
	var number2 = $(".ticketNumber2").val();
	var stack 	= $(".ticketStack").val();
	var stack2 	= $(".ticketStack2").val();
    var gameType = $("#gameType").val();

    var ident = $("#_borlette1").next().attr('id');
    if(validate(ident) === false){
    	count = 1;
    }else{
    	count += 1;
    }

    if (number2 == "") {
    	$("#"+gameType+"1").after("\
    		<tr id='"+count+"' class='text-center "+gameType+"'>\
    			<td>\
    				<input type='text' name='game_type[]' value='"+gameType+"' class='d-none'>\
    				<input type='text' id='number"+count+"' name='number[]' value='"+number+"' class='d-none'>\
    				<input type='text' id='stack"+count+"' name='stack[]' value='"+stack+"' class='d-none'>\
    				<span style='border: 1px solid black;padding: 4px; border-radius: 20px; padding: 5px 6.5px'>"+number+"</span></td><td>\
    			</td>\
    			<td>"+stack+"HTG</td>\
    			<td><small class='fas fa-trash deleteRow' id='"+count+"'></small></td>\
    		</tr>");
	    	$(".ticketNumber1").val('');
			$(".ticketNumber2").val('');
			$(".ticketStack2").val('');
    }else{
    	var abc = number1+"x"+number2;
    	$("#"+gameType+"1").after("<tr id='"+count+"' class='text-center "+gameType+"'><td><input type='text' id='number"+count+"' name='number[]' value='"+abc+"' class='d-none'><input type='text' name='game_type[]' value='"+gameType+"' class='d-none'><input type='text' id='stack"+count+"' name='stack[]' value='"+stack2+"' class='d-none'><span style='border: 1px solid black;padding: 4px; border-radius: 20px; padding: 5px 6.5px'>"+abc+"</span></td><td></td><td>"+stack2+"HTG</td><td><small class='fas fa-trash deleteRow' id='"+count+"'></small></td></tr>");
	    	$(".ticketNumber1").val('');
			$(".ticketNumber2").val('');
			$(".ticketStack2").val('');
    }
    getTotal();
}

var stack = 0;
function getTotal() {
	var grandTotal = 0;
	var _borlette= 0;
	var _wedding = 0;
	var _3 = 0;
	var _4 = 0;
	var _5 = 0;
   	$('#ticketTable tr').each(function(){
	   	if ($(this).hasClass('_borlette')) {
	       	_borlette++;
	   	}
	   	if ($(this).hasClass('_wedding')) {
	       	_wedding++;
	   	}	
	   	if ($(this).hasClass('_3')) {
	       	_3++;
	   	}	
	   	if ($(this).hasClass('_4')) {
	       	_4++;
	   	}	
	   	if ($(this).hasClass('_5')) {
	       	_5++;
	   	}	
	});
	var types = [_borlette, _wedding, _3, _4, _5];
	
	var sum = types.reduce(function(a, b){
        return a + b;
    }, 0);
    
	for (var i = 1; i <= sum; i++) {
		if (Number.isNaN(stack) === true) {
			stack = 0;
		}else{
			stack = $("#stack"+i).val();
		}
		grandTotal += Number(stack);
	}
	$("#getTotal").html(grandTotal);

	// var tableProductLength = $("#productTable tbody tr").length;
	// var previous_balanceValue = Number($("#previous_balanceValue").val());
	var totalSubAmount = 0;
	var abc = 0;
	for(x = 0; x < sum; x++) {
		var tr = $("#gameTable tbody tr")[x];
		var count = $(tr).attr('id');
		if (count == '_borlette1' || count == '_wedding1' || count == '_3' || count == '_4' || count == '_5') {
			abc = 0;
		}else{
			abc = $("#stack"+count).val();
		}
		alert(count)
			totalSubAmount = Number(totalSubAmount) + Number(abc);
			console.log(totalSubAmount)
	} // /for

	// totalSubAmount = totalSubAmount.toFixed(2);

	
}

function validate(input){
    let str = String(input);
    for( let i = 0; i < str.length; i++){
        if(!isNaN(str.charAt(i))){           //if the string is a number, do the following
            return true;
        }else{
            return false;
        }
    }
}