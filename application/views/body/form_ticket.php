<script language="javascript" type="text/javascript">

var dataMain;

function getSatelite(ROW){
	document.getElementById('formmaininsertupdate_satelite').value = dataMain[ROW][3];
}

//======================================= BEGIN : RENDER TABLE ======================================================
function renderTable(returnData) {
  	  	obj = JSON.parse(returnData);

		var rownumber = 0;
		var tableMain = "";
		var i = 1;

		var p = obj.data;
		var j = 1;

         dataMain = new Array();
         for (var key in p) {
             if (p.hasOwnProperty(key)) {

                        dataMain.push(new Array(4))
                        dataMain[rownumber][1] = p[key].N1;
                        dataMain[rownumber][2] = p[key].N2;
                        dataMain[rownumber][3] = p[key].N3;


                        tableMain += "<option onclick='getSatelite("+rownumber+");' value='"+dataMain[rownumber][1]+"'>"; 
                        tableMain += dataMain[rownumber][2];
                        tableMain += "</option>"; 
						
                  rownumber++;
             }
         }
             document.getElementById("formmaininsertupdate_channel").innerHTML = tableMain;
  }
  //======================================================== END : RENDER TABLE =======================================




	//=============================== BEGIN : CALL SERVICE =======================================
	function callChannel(){
      // PERSIAPAN PENGIRIMAN
  	  var whattodo = "";
      var kiriman = {
          //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX JANGAN DI UBAH !! XXXXXXXXXXXXXXXXXX
		  		// '_token'				: "{{ csrf_token() }}",
          'whattodo'			: whattodo,
          'cadangan'			: 'cadangan',
          'cadangan'			: 'cadangan',

          //>>>>>>>>>>>>>>>>>> BOLEH DI UBAH <<<<<<<<<<<<<<<<<<<<
          // INI MENGIRIM DATA TELEGRAM YA. TAPI JANGAN DISINI UNTK INSERT KE AUDITTRAIL
        //   'var_1'			: document.getElementById('forminsert_idchat').value,
        //   'var_2'			: document.getElementById('forminsert_message').value
          
      }
      // MENGIRIM DATA KE SERVICE

      $.ajax({
       url:"<?php echo base_url();?>ticket/getChannel",
       method:"POST",
       async: false,
       data: kiriman,
       success:function(returnData)
         {
            // BALIKAN DARI SERVICE
            renderTable(returnData);
         }
      });
  }


	function validasiForm(){
		 var isvalid = true;
		 
		 if(document.getElementById('formmaininsertupdate_kode').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_kode').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_kode').style.background = 'white';
		 }
		 
		 if(document.getElementById('formmaininsertupdate_officer_1').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_officer_1').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_officer_1').style.background = 'white';
		 }
		 
		 
		 if(document.getElementById('formmaininsertupdate_officer_2').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_officer_2').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_officer_2').style.background = 'white';
		 }
		 
		 if(document.getElementById('formmaininsertupdate_failuredate').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_failuredate').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_failuredate').style.background = 'white';
		 }
		 
		 if(document.getElementById('formmaininsertupdate_failuretime').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_failuretime').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_failuretime').style.background = 'white';
		 }
		 
		 if(document.getElementById('formmaininsertupdate_channel').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_channel').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_channel').style.background = 'white';
		 }
		 
		 if(document.getElementById('formmaininsertupdate_satelite').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_satelite').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_satelite').style.background = 'white';
		 }
		 
		 if(document.getElementById('formmaininsertupdate_event').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_event').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_event').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_competitor').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_competitor').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_competitor').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_rootcausedescription').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_rootcausedescription').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_rootcausedescription').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_impact').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_impact').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_impact').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_action').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_action').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_action').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_comment').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_comment').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_comment').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_cleareddate').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_cleareddate').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_cleareddate').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_clearedtime').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_clearedtime').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_clearedtime').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_resolutiontime').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_resolutiontime').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_resolutiontime').style.background = 'white';
		 }

		 if(document.getElementById('formmaininsertupdate_resolutiontimesecond').value == ''){
			isvalid = false;
			document.getElementById('formmaininsertupdate_resolutiontimesecond').style.background = 'yellow';
		 }else{
			document.getElementById('formmaininsertupdate_resolutiontimesecond').style.background = 'white';
		 }

		 if(isvalid == false){
			 alert('ada yang belum di isi');
			 return isvalid;
		 }
		 
	}

	

	function saveFromRekap(){

		if(validasiForm() == false){
			return false;
		}


      // PERSIAPAN PENGIRIMAN
  	  var whattodo = "";
		

	var el1 = document.getElementById("formmaininsertupdate_officer_1");
	var officer1 = el1.options[el1.selectedIndex].text;

	var el2 = document.getElementById("formmaininsertupdate_officer_2");
	var officer2 = el2.options[el2.selectedIndex].text;

	var el3 = document.getElementById("formmaininsertupdate_channel");
	var channel = el3.options[el3.selectedIndex].text;
      var kiriman = {
          //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX JANGAN DI UBAH !! XXXXXXXXXXXXXXXXXX
		  		// '_token'				: "{{ csrf_token() }}",
          'whattodo'			: whattodo,
          'cadangan'			: 'cadangan',
          'cadangan'			: 'cadangan',

          //>>>>>>>>>>>>>>>>>> BOLEH DI UBAH <<<<<<<<<<<<<<<<<<<<
          // INI MENGIRIM DATA TELEGRAM YA. TAPI JANGAN DISINI UNTK INSERT KE AUDITTRAIL






          'var_1'			: document.getElementById('formmaininsertupdate_kode').value,
          'var_2'			: officer1+', '+officer2,
          'var_3'			: document.getElementById('formmaininsertupdate_failuredate').value,
          'var_4'			: document.getElementById('formmaininsertupdate_failuretime').value,
          'var_5'			: channel,
          'var_6'			: document.getElementById('formmaininsertupdate_satelite').value,
          'var_7'			: document.getElementById('formmaininsertupdate_event').value,
          'var_8'			: document.getElementById('formmaininsertupdate_competitor').value,
          'var_9'			: document.getElementById('formmaininsertupdate_rootcausedescription').value,
          'var_10'			: document.getElementById('formmaininsertupdate_impact').value,
          'var_11'			: document.getElementById('formmaininsertupdate_action').value,
          'var_12'			: document.getElementById('formmaininsertupdate_comment').value,
          'var_13'			: document.getElementById('formmaininsertupdate_cleareddate').value,
          'var_14'			: document.getElementById('formmaininsertupdate_clearedtime').value,
          'var_15'			: document.getElementById('formmaininsertupdate_resolutiontime').value,
          'var_16'			: document.getElementById('formmaininsertupdate_resolutiontimesecond').value
          
      }
      // MENGIRIM DATA KE SERVICE

      $.ajax({
       url:"<?php echo base_url();?>ticket/saveRekap",
       method:"POST",
       async: false,
       data: kiriman,
       success:function(returnData)
         {
            // BALIKAN DARI SERVICE
            alert('berhasil simpan');
         }
      });
  }
  //==================================== BEGIN : CALL SERVICE =======================================

	function validasiTime(e){
		var value = e.target.value.split(':');
		
		var value_1 = value[0].substring(0, 1);
		var value_2 = value[0];
		var value_3 = (value[1] == undefined ? '' : value[1].substring(0, 1));
		var value_5 = (value[2] == undefined ? '' : value[2].substring(0, 1));
		
		if(
		   parseInt(value_1) > 2
		|| parseInt(value_2) > 23
		|| parseInt(value_3) > 5
		|| parseInt(value_5) > 5
		)
		{
			alert('format jam belum benar');
			e.target.value = '';
		}
	}

	function getResolution(e){
		var lengthdata = e.target.value.length;
		// console.log(lengthdata);
		if(lengthdata == 8){
			// var start = document.getElementById('formmaininsertupdate_failuretime').value.replace(/:/g, '');
			// var finish = e.target.value.replace(/:/g, '');
			var timestart = document.getElementById('formmaininsertupdate_failuretime').value;
			var timefinish = e.target.value;

			var datestart = document.getElementById('formmaininsertupdate_failuredate').value;
			var datefinish = document.getElementById('formmaininsertupdate_cleareddate').value;
		
			var startDate = new Date(datestart+' ' + timestart);
			var endDate = new Date(datefinish+' ' + timefinish);
			var timeDiff = Math.abs(startDate - endDate);

			var hh = Math.floor(timeDiff / 1000 / 60 / 60);
			if(hh < 10) {
				hh = '0' + hh;
			}
			timeDiff -= hh * 1000 * 60 * 60;
			var mm = Math.floor(timeDiff / 1000 / 60);
			if(mm < 10) {
				mm = '0' + mm;
			}
			timeDiff -= mm * 1000 * 60;
			var ss = Math.floor(timeDiff / 1000);
			if(ss < 10) {
				ss = '0' + ss;
			}


			var hms = hh + ":" + mm + ":" + ss;;   // your input string
			var a = hms.split(':'); // split it at the colons

			// minutes are worth 60 seconds. Hours are worth 60 minutes.
			var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

			document.getElementById('formmaininsertupdate_resolutiontime').value = hms;
			document.getElementById('formmaininsertupdate_resolutiontimesecond').value = seconds;
		}

	}

	$(document).ready(function() {
		$('.formmaininsertupdate_failuretime, #formmaininsertupdate_clearedtime').mask('00:00:00');

		callChannel();

		$("#id_kategori").change(function(){
	 		// Put an animated GIF image insight of content
		
			var data = {id_kategori:$("#id_kategori").val()};
			$.ajax({
					type: "POST",
					url : "",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   


	});

</script>			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">New Ticket</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a href="#" style="text-decoration:none; font-color:white">Ticket</a></div>
				<div class="panel-body">
						
				<div class="col-md-12">
					<!-- <form id="form_validation" method="post" action="<?php //echo base_url();?>"> -->


					<div>
				
					<div class="panel-heading">
						<legend>Pelapor Masalah</legend>
					</div>
					<div class="panel-body">

						<div class="col-md-6">

						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode </label>
						<div class="col-sm-9">
							<input id="formmaininsertupdate_kode" class="form-control" name="Kode" placeholder="Kode" value="<?php echo $id_ticket;?>" disabled >
						</div>
					    </div>
						
						<label>&nbsp;</label>
						
					    <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Officer 1 </label>
						<div class="col-sm-9">
							<?php echo form_dropdown('id_oficer1',$dd_oficer1, $id_oficer1, '  id="formmaininsertupdate_officer_1" required class="form-control"');?>
						</div>
						</div>
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Officer 2 </label>
						<div class="col-sm-9">
							<?php echo form_dropdown('id_oficer1',$dd_oficer1, $id_oficer1, ' id="formmaininsertupdate_officer_2" required class="form-control"');?>
						</div>
						</div>
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Failure Date </label>
						<div class="col-sm-9">
									<div class="input-group date">
									<div class="input-group-addon">
									<i><span class="glyphicon glyphicon-calendar"></span></i>
									</div>
									<input class="form-control pull-right datepicker" id="formmaininsertupdate_failuredate" type="text">
									</div>
							
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Failure Time </label>
						<div class="col-sm-9">
							<input onkeyup="validasiTime(event);" class="form-control formmaininsertupdate_failuretime" name="formmaininsertupdate_failuretime" placeholder="Failure Time " id="formmaininsertupdate_failuretime" value="">
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Channel </label>
						<div class="col-sm-9">
							<?php //echo form_dropdown('id_channel',$dd_channel, $id_channel, ' id="id_channel" required class="form-control"'); ?>


							<select class="form-control" id="formmaininsertupdate_channel">
							</select>
						
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satelitte </label>
						<div class="col-sm-9">
							<input class="form-control" id="formmaininsertupdate_satelite" name="departemen" placeholder="" value="" readonly>
						</div>
						</div>
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Event </label>
						<div class="col-sm-9">
							<input class="form-control" name="departemen" placeholder="Event" id="formmaininsertupdate_event" value="">
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Competitor </label>
						<div class="col-sm-9">
							<?php echo form_dropdown('id_competitor',$competitor, $id_competitor, ' id="formmaininsertupdate_competitor" required class="form-control"');?>
						</div>
						</div>
						

						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Root Cause Description </label>
						<div class="col-sm-9">
							<?php echo form_dropdown('id_root',$root, $id_root, ' id="formmaininsertupdate_rootcausedescription" required class="form-control"');?>
						</div>
						</div>
		
					     </div>

					    <div class="col-md-6">

						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Impact </label>
						<div class="col-sm-9">
							<input class="form-control" name="Impact" placeholder="Impact" value="" id="formmaininsertupdate_impact">
						</div>
						</div>
						
						<label>&nbsp;</label>

						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Action </label>
						<div class="col-sm-9">
							<input class="form-control" name="Action" placeholder="Action" value="" id="formmaininsertupdate_action">
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Comment </label>
						<div class="col-sm-9">
							<textarea class="form-control" rows="8" id="formmaininsertupdate_comment"></textarea>
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cleared Date </label>
						<div class="col-sm-9">
									<div class="input-group date">
									<div class="input-group-addon">
									<i><span class="glyphicon glyphicon-calendar"></span></i>
									</div>
									<input class="form-control pull-right datepicker" id="formmaininsertupdate_cleareddate" type="text">
									</div>
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cleared Time </label>
						<div class="col-sm-9">
							<input class="form-control" onkeyup="validasiTime(event); getResolution(event);" name="Cleared_Time" placeholder="Cleared Time" id="formmaininsertupdate_clearedtime" value="">
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Resolution Time </label>
						<div class="col-sm-9">
							<input class="form-control" name="Resolution_Time" placeholder="Resolution Time" value="" id="formmaininsertupdate_resolutiontime" readonly>
						</div>
						</div>
						
						<label>&nbsp;</label>
						
						<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Resolution Time second </label>
						<div class="col-sm-9">
							<input class="form-control" name="Resolution_Time_second " placeholder="Resolution Time second " value="" id="formmaininsertupdate_resolutiontimesecond" readonly>
						</div>
						</div>
						
						
					
						
						
					
					    </div>
						
					</div>
						
				<legend></legend>

					<button type="button" onclick="saveFromRekap();" class="btn btn-primary">Simpan</button>
					
				    </div>

				  </div>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		<script>
			$('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
		, autoclose: true
		//, timeFormat: 'hh:mm TT'
	
		});
		</script>
		

		
		
