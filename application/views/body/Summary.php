<script>
var dataMain;

function ModalInputkey(ROW){
	$('#modalinputkey').modal('show');

	// for(i=1; i<=17; i++){
	// 	document.getElementById('data_'+i).innerHTML = dataMain[ROW][i];
	// }

	//document.getElementById('data_1').innerHTML = dataMain[ROW][1];
	document.getElementById('data_2').innerHTML = dataMain[ROW][2];
	document.getElementById('data_3').innerHTML = dataMain[ROW][3];
	document.getElementById('data_4').innerHTML = dataMain[ROW][4];
	document.getElementById('data_5').innerHTML = dataMain[ROW][5];
	document.getElementById('data_6').innerHTML = dataMain[ROW][6];
	document.getElementById('data_7').innerHTML = dataMain[ROW][7];
	document.getElementById('data_8').innerHTML = dataMain[ROW][8];
	document.getElementById('data_9').innerHTML = dataMain[ROW][9];
	document.getElementById('data_10').innerHTML = dataMain[ROW][10];
	document.getElementById('data_11').innerHTML = dataMain[ROW][11];
	document.getElementById('data_12').innerHTML = dataMain[ROW][12];
	document.getElementById('data_13').innerHTML = dataMain[ROW][13];
	document.getElementById('data_14').innerHTML = dataMain[ROW][14];
	document.getElementById('data_15').innerHTML = dataMain[ROW][15];
	document.getElementById('data_16').innerHTML = dataMain[ROW][16];
	document.getElementById('data_17').innerHTML = dataMain[ROW][17];
	
		// document.getElementById('data_2').innerHTML = dataMain[ROW][2];
	
}






//======================================= BEGIN : RENDER TABLE ======================================================
function renderTable(returnData) {
  	  	obj = JSON.parse(returnData);

		var rownumber = 0;
		var tableMain = "";
		var i = 1;

		var p = obj.data;
		var j = 1;

		if(p[rownumber] == undefined){
			dataTables.rows.add($(tableMain)).draw();
			return;
		}
    	var totalfield = Object.keys(p[rownumber]).length;

         dataMain = new Array();
         for (var key in p) {
             if (p.hasOwnProperty(key)) {

                        dataMain.push(new Array(4))

						for(l=1; l<=totalfield; l++){
                        	dataMain[rownumber][l] = p[key]['N'+l];
						}


                        tableMain += "<tr>"; 
                        tableMain += "<td>"+ i++ +"</td>";
                        tableMain += "<td>"+dataMain[rownumber][2]+"</td>";
                        tableMain += "<td>"+dataMain[rownumber][3]+"</td>";
                        tableMain += "<td>"+dataMain[rownumber][4]+"</td>";
                        tableMain += "<td>"+dataMain[rownumber][6]+"</td>";
                        tableMain += "<td>"+dataMain[rownumber][7]+"</td>";
                        tableMain += "</tr>"; 
						
                  rownumber++;
             }
         }
            //  document.getElementById("gridviewmainrender").innerHTML = tableMain;
    		 dataTables.rows.add($(tableMain)).draw();
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
       url:"<?php echo base_url();?>List_ticket/listTicket",
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




function dataTablef(){
    dataTables = $('#example1').DataTable( {
    lengthChange: false,
		pageLength : 100,
    //buttons: ['excel', 'pdf', 'colvis']
    buttons: [
                // {
                //     extend: 'excelHtml5',
                //     text: '<i class="fa fa-file-excel-o"></i> Excel',
                //     //titleAttr: 'Export to Excel',
                //     title: 'Data_User',
                //     exportOptions: {
                //           //columns: [ 0, 1, 2, 3, 4, 5 ], setting statis kolom yang akan di export
                //           //columns: [':not(:last-child)'], hanya untuk kolom terakhir yang tidak di export
                //           columns: ':visible:not(.not-export-col)', // sesui show hide kolom
                //           modifier : {
                //           // DataTables core
                //           order : 'applied',  // 'current', 'applied', 'index',  'original'
                //           page : 'current',      // 'all',     'current'
                //           search : 'applied'     // 'none',    'applied', 'removed'
                //         }
                //     }
                // },
                // {
                //     extend: 'pdfHtml5',
                //     text: '<i class="fa fa-file-pdf-o"></i> PDF',
                //     title: 'Data_User',
                //     exportOptions: {
                //           columns: ':visible:not(.not-export-col)',
                //           modifier : {
                //           order : 'applied',
                //           page : 'current',
                //           search : 'applied'
                //         }
                //     }
                // },
                // {
                //   extend: 'print',
                //   text: '<i class="fa fa-print"></i> Print',
                //   title: 'Data_User',
                //   exportOptions: {
                //         columns: ':visible:not(.not-export-col)',
                //         modifier : {
                //         order : 'applied',
                //         page : 'current',
                //         search : 'applied'
                //       }
                //   }
                // },
                {
                  extend: 'colvis',
                  text: '<i class="fa fa-eye"> Lihat Kolom</i>',
                  columns: ':gt(0)', // list awal kolom tidak tampil
                  //columns: ':not(.noVis)' // list yang menggunkan class noVis tidak tampil
                }
            ],
            columnDefs: [
              {
                 // membuat class pada kolom awal dan akhir
                  targets: [0, -1],
                  className: 'noVis'
              },
              {
                 // kolom akhir tidak bisa di ordering
                  targets: [-1],
                  "orderable": false
              },
              {
                  // kolom 6 di hide saat awal default
                //   targets: [4, 5],
                //   "bVisible": false
              },
							{
								// targets: 6,
								// width: 80
							}
            ],
						// fixedColumns: true,
						// scrollY:        "400px",
		        // scrollX:        true,
		        // scrollCollapse: true,


    });
    dataTables.buttons().container().appendTo('#example1_wrapper .col-sm-6:eq(0)');
  }


</script>




		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">My Ticket</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="<?php echo base_url();?>departemen/add" style="text-decoration:none">List Ticket</a></div>
					<div class="panel-body">
						<!-- <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc"> -->
						    
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
						    <tr>
						        <th data-field="no" data-sortable="true" width="10px"> No</th>
						        <th data-field="idd3" data-sortable="true">kode</th>
						        <th data-field="iddds" data-sortable="true">Officer</th>
						        <th data-field="idddXs" data-sortable="true">Failure Date</th>
						        <th data-field="iddd" data-sortable="true">channel</th>
						        <th data-field="idddd" data-sortable="true">Satelitte</th>

						    </tr>
                            </thead>
                            <tbody id="gridviewmainrender">
							</tbody>
						    
						</table>
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


	dataTablef();
	
	callChannel();


});
</script>







					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
