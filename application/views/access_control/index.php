<?php $this->load->view("partial/header"); ?>

<script type="text/javascript">
	dialog_support.init("a.modal-dlg");
</script>

<h3 class="text-center"><?php echo $this->lang->line('common_search_customers_message'); ?></h3>


<div class='md-form mt-0'>
	<ul id="error_message_box" class="error_message_box"></ul>
	<div class="input-group mb-3">
		<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-search"></span></span>
		<input type="search" name="search_key" id="search_key" class="form-control"  placeholder="<?php echo $this->lang->line('common_search_customers');?>">

		<div class="input-group-btn">
			<form action="<?php echo site_url($controller_name .'/save'); ?>" method="POST" class="form-horizontal" id="access_control_form">
				<input type="hidden" name="customer_id" id="customer_id">
				<input type="hidden" name="dateaccess" id="dateaccess">
				<input type="hidden" name="status" id="status">
				<input type="hidden" name="item_id" id="item_id">
				<input type="submit" id="btn-send" class="btn btn-info" value="Enviar">
			</form>
		</div>
	</div>
</div>
<br>
<div class="panel panel-info" id="v-card">
	<div class="panel-body">
		<div class="row">
            <div class="col-md-6">
				<img class="img-fluid" id="pic_filename" src="">
				<br>
				<br>
				<div id="lb_dni"></div>
				<div id="lb_duedate"></div>
				<div id="lb_dateaccess"></div>
				<div id="lb_exhonerated"></div>
            </div>
            <div class="col-md-6">
				<br>
				<div id="lb_name"></div>
				<br>
				<br>
            	<div id="lb_status"></div>
				<br>
				<br>
				<div id="lb_discipline"></div>
            	<br>
				<div id="lb_deudado"></div>
            </div>
        </div>
	</div>
</div>

<?php $this->load->view("partial/footer"); ?>

<script type="text/javascript">
//validation and submit handling
$(document).ready(function()
{
	var isMobile = false; //initiate as false
	// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
	    isMobile = true;
	}
	var fill_value = function(event, ui) {
		event.preventDefault();
		$.ajax({
			type: 'GET',
			url: "<?php echo site_url('customers/get_status/"+ui.item.value+"'); ?>",
			dataType: 'json',
			success: function(resp){
				if(resp.length > 0){
					//	Hidden Fields
		            $('#customer_id').val(resp[0].id);
		            $('#dateaccess').val(resp[0].today);
		            $('#status').val(resp[0].status);
		            $('#item_id').val(resp[0].item_id);
		            //	V-Card
		            if(resp[0].is_exhonerated == 1)
		            {
		            	$('#lb_exhonerated').html("<b style='color: green;font-size: x-large;'><?php echo $this->lang->line('customers_exhonerated');?></b>");	
		            }
		            if(resp[0].deudado > 0)
		            {
						$('#lb_deudado').html("<b><?php echo $this->lang->line('sales_due');?>:</b><span style='color: red;font-size: x-large;'>"+resp[0].deudado+"</span>");
		            }
		            else
		            {
		            	$('#lb_deudado').html("");
		            }
		            var size_font_name = (!isMobile ? 'x-large' : 'large');
		            $('#lb_name').html("<b><?php echo $this->lang->line('common_first_name');?>:</b> <span style='color: black;font-size: "+size_font_name+";'>"+resp[0].name+"</span>");
		            $('#lb_discipline').html("<b><?php echo $this->lang->line('customers_discipline_id');?>:</b> <span style='color: black;font-size: large;'>"+resp[0].item_name+"</span>");
		            $('#lb_dateaccess').html("<b><?php echo $this->lang->line('common_date');?>:</b> "+resp[0].today);
		            $('#lb_duedate').html("<b><?php echo $this->lang->line('customers_service_duedate');?>:</b> "+resp[0].service_duedate);
		            $('#lb_dni').html("<b><?php echo $this->lang->line('common_dni');?>:</b> "+resp[0].dni);
		            var status = (resp[0].status == 0 ? "<?php echo $this->lang->line('customers_status_0');?>" : (resp[0].status == 1 ? "<?php echo $this->lang->line('customers_status_1');?>" : "<?php echo $this->lang->line('customers_status_2');?>"));
		            var font_size_full = (!isMobile ? 500: 250);
		            var font_size = (!isMobile ? 400: 200);
		            var span = (resp[0].status == 0 ? "<span style='font-size: "+font_size_full+"%;' class='label label-bs label-danger'>"+status.toUpperCase()+"</span>" : (resp[0].status == 1 ? (resp[0].daysplace > 5 ? "<span style='font-size: "+font_size_full+"%;' class='label label-bs label-success'>"+status.toUpperCase()+"</span>" : "<span style='font-size: "+font_size_full+"%;' class='label label-bs label-warning'>"+status.toUpperCase()+"</span>") : "<span style='font-size: "+font_size+"%;' class='label label-bs label-warning'>"+status.toUpperCase()+"</span>"));
		            $('#lb_status').html("<b><?php echo $this->lang->line('common_state');?>:</b> "+span);
		            if(resp[0].pic_filename.length > 0)
		            {
		            	$('#pic_filename').attr("src","./uploads/customer_pics/"+resp[0].pic_filename);
		            	$('#pic_filename').css('width',150);
		            	$('#pic_filename').css('height',150);
		            }
		            else
		            {
		            	if(resp[0].gender == 0)
		            	{
		            		$('#pic_filename').attr("src","./uploads/customer_pics/woman.png");
			            	$('#pic_filename').css('width',150);
			            	$('#pic_filename').css('height',150);	
		            	}
		            	else
		            	{
		            		$('#pic_filename').attr("src","./uploads/customer_pics/men.png");
			            	$('#pic_filename').css('width',150);
			            	$('#pic_filename').css('height',150);	
		            	}
		            }
		            $('#btn-send').removeClass("btn btn-info").addClass("btn btn-warning");
		            $('#btn-send').prop('value','Registrar');
		            $('#btn-send').focus();
				}
				else{
	    			$.notify("<?php echo $this->lang->line('customers_none_records') ?>", { type: 'warning' });
				}
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(jqXHR);
	        }
		});
	};

	$('#search_key').autocomplete({
		source: "<?php echo site_url('customers/suggest_accesscontrol'); ?>",
		minChars: 0,
		delay: 0,
		cacheLength: 1,
		select: fill_value
	});

	$('#access_control_form').submit(function(/*DOMEvent*/ e){
	  e.preventDefault();

	  var url = $(this).attr('action'),
	      data = $(this).serialize();
	  $.post(url, data, function(response){
	    /* Do something with the response, here we'll just log it to the console */
	    response = JSON.parse(response);
	    //	Clear V-Card
	    $('#lb_exhonerated').html("");
        $('#lb_name').html("");
        $('#lb_deudado').html("");
        $('#lb_dateaccess').html("");
        $('#lb_dni').html("");
        $('#lb_status').html("");
        $('#lb_discipline').html("");
        $('#lb_duedate').html("");
        $('#pic_filename').attr("src","");
    	$('#pic_filename').css('width','');
    	$('#pic_filename').css('height','');
		//	Clear Hidden Fields
        $('#customer_id').val("");
        $('#dateaccess').val("");
        $('#status').val("");
        $('#item_id').val("");
        //	Clear search field
        $('#search_key').val("");
        $('#btn-send').removeClass("btn btn-warning").addClass("btn btn-info");
		$('#btn-send').prop('value','Enviar');
	    $.notify(response[0].message, { type: response[0].success ? 'success' : 'danger' });
        $('#search_key').focus();
	  });
	});

});
</script>
