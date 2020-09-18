$(document).ready(function () {
	//seller
	seller = $('#seller').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'seller'},
            type: 'post',  // method  , by default get
        },
        'order': []     
    });

    //tickets
    tickets = $('#tickets').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'tickets'},
            type: 'post',  // method  , by default get
        },
        'order': []     
    });

    //configs
    configs = $('#configs').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'configs'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //post_manager
    post_manager = $('#post_manager').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'post_manager'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //post_management
    post_management = $('#post_management').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'post_management'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //limit_per_game
    limit_per_game = $('#limit_per_game').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'limit_per_game'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //limit_per_game
    limit_per_ball = $('#limit_per_ball').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'limit_per_ball'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //overview_of_limits
    overview_of_limits = $('#overview_of_limits').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'overview_of_limits'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //configs
    winning_numbers = $('#winning_numbers').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'winning_numbers'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //overview_of_limits
    balance_sheets = $('#balance_sheets').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'balance_sheets'},
            type: 'post',  // method  , by default get
        },
        'order': [],
    });

    //overview_of_limits
    sale_report = $('#sale_report').DataTable({
        stateSave: true,
        'autoWidth'   : true,
        "responsive": true,
        "ajax": {
            url: "php_action/custom_action.php", // json datasource
            data: {action: 'sale_report'},
            type: 'post',  // method  , by default get
        },
        'order': [],
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
            beforeSend:function() {
                $('#saveData').attr("disabled","disabled");
                $('#saveData').text("Loading...");
            },
            success:function (msg) { 
                $('#formData').each(function(){
                    this.reset();
                });
            	$("#saveData").removeAttr("disabled").text("Save").addClass("btn-primary").removeClass("btn-warning")  
                $('#formData').css("opacity","");   
                $('.msg').text(msg.msg).addClass("alert alert-"+msg.sts).fadeIn(6000).fadeOut(4000);
                seller.ajax.reload(null, false);
                tickets.ajax.reload(null, false);
                configs.ajax.reload(null, false);
                post_manager.ajax.reload(null, false);
                post_management.ajax.reload(null, false);
                limit_per_game.ajax.reload(null, false);
                limit_per_ball.ajax.reload(null, false);
                winning_numbers.ajax.reload(null, false);
            }
        });//ajax call
    });//main

    //Fetech Data From Database For Editing
    $(document).on('click','.update',function () {
        var edit_user_id = $(this).attr("id");
        var tbl = $("#table_name").val();
        var col = $("#col_name").val();
        $.ajax({
            url:'php_action/custom_action.php',
            type:"POST",
            data:{edit_user_id:edit_user_id, tbl2:tbl, col2:col},
            dataType:"json",
            beforeSend:function() {

            },
            success:function(data) {
            	$("#saveData").text("Edit").addClass("btn-warning").removeClass("btn-primary")  
            	if (tbl == 'seller') {
                    $("#modal-1").modal('show')
                    $("#seller_id").val(data.seller_id)
                    $("#seller_name").val(data.seller_name)
                    $("#seller_email").val(data.seller_email)
                    $("#seller_contact").val(data.seller_contact)
                    $("#seller_password").val(data.seller_password)
                    $("#seller_address").val(data.seller_address)
                    $('#seller_sts option[value="'+data.seller_sts+'"]').prop("selected", true); 
                    $("#login").val(data.login);
                    $("#delay_inactivity").val(data.delay_inactivity);
                    $("#last_name").val(data.last_name);
                    $("#commission").val(data.commission);
                    $("#pos_serial").val(data.pos_serial);
                    if (data.gender == 'male') {
                        $("#radioStacked1").prop("checked", true);
                    }else{
                        $("#radioStacked2").prop("checked", true);
                    }
                }else if (tbl == 'tickets') {
                    $("#ticket_id").val(data.ticket_id)
                    $("#ticket_name").val(data.ticket_name)
                    $("#ticket_number").val(data.ticket_number)
                    $("#ticket_type").val(data.ticket_type)
                    $("#ticket_sts").val(data.ticket_sts)
                }else if (tbl == 'post_manager') {
                    $("#modal-1").modal('show')
                    $("#post_manager_id").val(data.post_manager_id);
                    $('#seller_id option[value="'+data.seller_id+'"]').prop("selected", true); 
                    $("#description").val(data.description);
                    $("#zone").val(data.zone);
                }else if (tbl == 'post_management') {
                    $("#modal-1").modal('show')
                    $("#post_management_id").val(data.post_management_id)
                    $('#seller_id1 option[value="'+data.seller_id1+'"]').prop("selected", true); 
                    $('#seller_id2 option[value="'+data.seller_id2+'"]').prop("selected", true); 
                    $("#imei").val(data.imei)
                    $("#description").val(data.description)
                    $("#status").val(data.status)
                }else if (tbl == "configurations") {
                    $("#modal-id").modal('show')
                    $("#config_id").val(data.config_id);
                    $("#config_start").val(data.config_start);
                    $("#config_end").val(data.config_end);
                    $("#config_1st_lot").val(data.config_1st_lot);
                    $("#config_2nd_lot").val(data.config_2nd_lot);
                    $("#config_3rd_lot").val(data.config_3rd_lot);
                    $("#config_loto_3").val(data.config_loto_3);
                    $("#config_loto_4").val(data.config_loto_4);
                    $("#config_loto_5").val(data.config_loto_5);
                    $("#marraige1").val(data.marraige1);
                    $("#marraige2").val(data.marraige2);
                    $("#config_early_draw").val(data.config_early_draw);
                    $("#config_evening_draw").val(data.config_evening_draw);
                    $("#from_amount_played").val(data.from_amount_played);
                    $("#gen_quantity_wed_free").val(data.gen_quantity_wed_free);
                }else if (tbl == 'limit_per_game') {
                    $("#modal-1").modal('show')
                    $("#limit_per_game_id").val(data.limit_per_game_id)
                    $("#limits").val(data.limits)
                    $("#ball_number").val(data.ball_number)
                    $('#lottery option[value="'+data.lottery+'"]').prop("selected", true); 
                    $('#game_type option[value="'+data.game_type+'"]').prop("selected", true); 
                    $('#seller_id option[value="'+data.seller_id+'"]').prop("selected", true); 
                    $('#status option[value="'+data.status+'"]').prop("selected", true); 
                }else if (tbl == 'winning_numbers') {
                    $("#modal-1").modal('show')
                    $("#wining_date").val(data.wining_date);
                    $("#winning_numbers_id").val(data.winning_numbers_id);
                    $("#lottery_for_wining").val(data.lottery_for_wining);
                    $("#draw").val(data.draw);
                    $("#numbers").val(data.numbers);
                    $("#win4").val(data.win4);
                    $('#status option[value="'+data.status+'"]').prop("selected", true); 
                }
            }
        });
    });

    //Fetech Data From Database For Editing
    $(document).on('click','.delete',function () {
        var delete_user_id = $(this).attr("id");
        var tbl3 = $("#table_name").val();
        var sts_col = $("#sts_col").val();
        var col_name = $("#col_name").val();
        $.ajax({
            url:'php_action/custom_action.php',
            type:"POST",
            data:{delete_user_id:delete_user_id, tbl3:tbl3, col_name:col_name, sts_col:sts_col},
            dataType:"text",
            beforeSend:function() {

            },
            success:function(data) {       
                $('.msg').text(data).addClass("alert alert-success").fadeIn(6000).fadeOut(4000);
                seller.ajax.reload(null, false);
                tickets.ajax.reload(null, false);
                configs.ajax.reload(null, false);
                post_manager.ajax.reload(null, false);
                post_management.ajax.reload(null, false);
                limit_per_game.ajax.reload(null, false);
                limit_per_ball.ajax.reload(null, false);
                winning_numbers.ajax.reload(null, false);
            }
        });
    });//main

    $(document).on('change','.limit_per_game', function(){
        var lottery_for_search = $("#lottery_for_search").val();
        var seller_id = $("#seller_id").val();
        var game_type = $("#game_type").val();
        //limit_per_game
        $("#limit_per_game").DataTable().clear().destroy();
        limit_per_game = $('#limit_per_game').DataTable({
            stateSave: true,
            'autoWidth'   : true,
            "responsive": true,
            "ajax": {
                url: "php_action/custom_action.php", // json datasource
                data: {action: 'limit_per_game', lottery_for_search : lottery_for_search, seller_id : seller_id, game_type : game_type},
                type: 'post',  // method  , by default get
            },
            'order': [],
        });
    });

    $(document).on('change','.limit_per_ball', function(){
        var lottery_for_search = $("#lottery_for_search").val();
        var seller_id = $("#seller_id").val();
        var game_type = $("#game_type").val();
        var ball_number = $("#ball_number").val();
        //limit_per_ball
        $("#limit_per_ball").DataTable().clear().destroy();
        limit_per_ball = $('#limit_per_ball').DataTable({
            stateSave: true,
            'autoWidth'   : true,
            "responsive": true,
            "ajax": {
                url: "php_action/custom_action.php", // json datasource
                data: {action: 'limit_per_ball', lottery_for_search : lottery_for_search, seller_id : seller_id, game_type : game_type, ball_number : ball_number},
                type: 'post',  // method  , by default get
            },
            'order': [],
        });
    });

    $(document).on('change','.limit_per_ball1', function(){
        var lottery_for_search = $("#lottery_for_search").val();
        var seller_id = $("#seller_id").val();
        var game_type = $("#game_type").val();
        var ball_number = $("#ball_number").val();
        //overview_of_limits
        $("#overview_of_limits").DataTable().clear().destroy();
        overview_of_limits = $('#overview_of_limits').DataTable({
            stateSave: true,
            'autoWidth'   : true,
            "responsive": true,
            "ajax": {
                url: "php_action/custom_action.php", // json datasource
                data: {action: 'overview_of_limits'},
                type: 'post',  // method  , by default get
            },
            'order': [],
        });
    });

    $(document).on('change','.balance_sheets', function(){
        var lottery_for_search = $("#lottery_for_search").val();
        var draw = $("#draw").val();
        var seller_id = $("#seller_id").val();
        var responsible = $("#responsible").val();
        //overview_of_limits
        $("#balance_sheets").DataTable().clear().destroy();
        balance_sheets = $('#balance_sheets').DataTable({
            stateSave: true,
            'autoWidth'   : true,
            "responsive": true,
            "ajax": {
                url: "php_action/custom_action.php", // json datasource
                data: {action: 'balance_sheets'},
                type: 'post',  // method  , by default get
            },
            'order': [],
        });
    });

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('.reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            //format: 'Y-m-d',
            //format: "DD-MM-YYYY",
            minDate: moment(),
            cancelLabel: 'Cancel',
            applyLabel: 'Apply',          
        }
    }, cb);

    cb(start, end);


    $('.reportrange').on('cancel.daterangepicker', function(ev, picker) {
        $('.reportrange').val('');
        overview_of_limits.draw();
    });

    $('.reportrange').on('apply.daterangepicker', function(ev, picker) {
        var start = picker.startDate;
        var end = picker.endDate;
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var min = start;
            var max = end;
            var page_decide = $(".page_decide").val();
            //var startDate = new Date(data[10]).format('YYYYMMDD hhmm');; 
            if (page_decide == "overview") {
                var date1 = (data[1]).split('/') 
            }else if (page_decide == "sale_report") {
                alert(page_decide)
                var date1 = (data[6]).split('/') 
            }
            else{
                var date1 = (data[2]).split('/') 
            }
            var newDate = date1[1] + '/' +date1[0] +'/' +date1[2];  
            var startDate = new Date(newDate);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true; }
            if (max == null && startDate >= min) { return true; }
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        });
        balance_sheets.draw();
        overview_of_limits.draw();
        sale_report.draw();
        $.fn.dataTable.ext.search.pop();    
    });

});//document ready


// ******************************************************8888 Functions *********************************************************\\

function addTable() {
    var numero = $("#numero").val();
    var mise = $("#mise").val();
    var count = $("#newTable tr").attr("id");
    if (count == null) {
        count = 1;
    }else{
        count++
    }
    $("#newTable").append("<tr id='"+count+"'><td>"+count+"</td><td>"+numero+"</td><td>"+mise+"</td><tr>x</tr></tr>")
}
