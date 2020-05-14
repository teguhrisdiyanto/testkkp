		<script>

			

function EditKey(){
	// PERSIAPAN PENGIRIMAN
	var whattodo = "";

	var currkey = "<?php echo $this->session->userdata('key');?>";
	var oldkey = document.getElementById('forminput_key-old').value;


	if(currkey != oldkey){
		alert('Key Lama, Salah');
		return false;
	}


	var newkey = document.getElementById('forminput_key-new').value;
	var confirmkey = document.getElementById('forminput_key-confirm').value;

	if(newkey != confirmkey){
		alert('Key baru tidak sama');
		return false;
	}



      var kiriman = {
          //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX JANGAN DI UBAH !! XXXXXXXXXXXXXXXXXX
		  		// '_token'				: "{{ csrf_token() }}",
          'whattodo'			: whattodo,
          'cadangan'			: 'cadangan',
          'cadangan'			: 'cadangan',

          //>>>>>>>>>>>>>>>>>> BOLEH DI UBAH <<<<<<<<<<<<<<<<<<<<
          // INI MENGIRIM DATA TELEGRAM YA. TAPI JANGAN DISINI UNTK INSERT KE AUDITTRAIL
          'var_1'			: document.getElementById('forminput_key-confirm').value
          
      }
      // MENGIRIM DATA KE SERVICE

      $.ajax({
       url:"<?php echo base_url();?>Private_Key/editKey",
       method:"POST",
       async: false,
       data: kiriman,
       success:function(returnData)
         {
            // BALIKAN DARI SERVICE
            if(returnData == '1'){
				alert('key berhasil terubah');
			}
         }
      });
}


		</script>	
		
		
		
		
		
		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></svg></a></li>
				<li class="active">EDIT KEY</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></svg>
<a href="#" style="text-decoration:none">EDIT KEY</a></div>
					<div class="panel-body">
						<div class="col-md-6">
						<div class="form-group">
								<div class="col-sm-9">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input id="forminput_key-old" class="form-control" placeholder="Old-Key" name="username" type="password" required>
										</div>
									</div>
								</div>
					    </div>
						<div class="form-group">
								<div class="col-sm-9">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input id="forminput_key-new" class="form-control" placeholder="new-key" name="username" type="password" required>
										</div>
									</div>
								</div>
					    </div>
						<div class="form-group">
								<div class="col-sm-9">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input id="forminput_key-confirm" class="form-control" placeholder="confrim-key" name="username" type="password" required>
										</div>
									</div>
									<legend></legend>
									<button onclick="EditKey();" type="button" class="btn btn-primary">EDIT</button>
								</div>
								
					    </div>
					
						</div>

					</div>
					
				</div>
			</div>
		</div><!--/.row-->	


		<?php echo $this->session->flashdata("msg");?>

	
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>




<script type="text/javascript">
$(document).ready(function(){

$(".hapus").click(function(){
var id = $(this).data('id');

$(".modal-body #mod").text(id);

});

});
</script>




					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
