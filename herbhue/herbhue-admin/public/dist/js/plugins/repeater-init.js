function addOption()
		{
			var optionNum = parseInt($('#total_options').val());
			var selecttag="";
			  
			
			
		  	var table = document.getElementById("myTable");
			  var row = table.insertRow(optionNum+1);
			   var cell1 = row.insertCell(0);
			  var cell2 = row.insertCell(1);
			  var cell3 = row.insertCell(2);
			  var cell4 = row.insertCell(3);
			  var cell5 = row.insertCell(4);
			  var cell6 = row.insertCell(5);
			  row.setAttribute("id",optionNum);
			  cell1.innerHTML ='<input type="text" onkeypress="return onlyNumberKey(event)" name="opt_qty_'+optionNum+'" id="opt_qty_'+optionNum+'" class="form-control" required>' ;
			  cell2.innerHTML = '<select name="opt_qtytype_'+optionNum+'" id="opt_qtytype_'+optionNum+'" class="form-select" required><option value="">Select</option><option value="Kg">Kg</option><option value="Gm">Gm</option><option value="Dz">Dz</option><option value="Pcs">Pcs</option><option value="Ltr">Ltr</option><option value="Ml">Ml</option></select>';
			  cell3.innerHTML='<input type="text" onkeypress="return onlyNumberKey(event)" name="opt_price_'+optionNum+'" id="opt_price_'+optionNum+'" class="form-control" required>';
			  cell4.innerHTML='<input type="text" onkeypress="return onlyNumberKey(event)" name="opt_mrp_price_'+optionNum+'" class="form-control" required>';
			  cell5.innerHTML='<input type="text" onkeypress="return onlyNumberKey(event)" name="opt_stock_'+optionNum+'" class="form-control" required>';
			  cell6.innerHTML = '<button title="Remove this option" class="btn btn-danger" id="removeOptionBtn" type="button" onClick="removeThisOption('+optionNum+');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 feather-sm fill-white"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
			optionNum=optionNum+1;
			$('#total_options').val(optionNum);
		}
		function removeThisOption(val)
		{
			var optionNum = parseInt($('#total_options').val());
			if(optionNum>1)
			{
				
				document.getElementById(val).remove();
				optionNum=optionNum-1;
				$('#total_options').val(optionNum);
			}
			else
			{
				alert("You cannot remove the rows");
			}
		}
