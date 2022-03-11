<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover" id="InvTable">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
<tr id="firstRow">
	<td></td> 
	<td><p style="height:30px;width:98%;" id="data_*0" name="data[*][description]" onclick="turnTextIntoInputField('data[*][description]' ,'data_*0');"></p></td>
	<td><p style="height:30px;width:98%;" id="data_*1" name="data[*][quantity]" onclick="turnTextIntoInputField('data[*][quantity]','data_*1'); "></p></td>
	<td><p style="height:30px;width:98%;" id="data_*2" name="data[*][unit_price]" onclick="turnTextIntoInputField('data[*][unit_price]' ,'data_*2'); "></p></td>
</tr> 

</tbody>

</table>
 
<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>


<?php $this->start('script_own');?>
<script>
$(document).ready(function(){

	$("#add_item_button").click(function(){
		updateRowNo(true);
	});  
	
});

var firstRowHTML = $("#firstRow").html(); 

function updateRowNo(isNewRow) {
		var rowCount = $('#InvTable tr').length; 	   
		var newRowHTML = firstRowHTML.replaceAll('*',(!isNewRow) ? 1 : rowCount);
		if( isNewRow )
			$("#InvTable tbody").append($("<tr></tr>").html(newRowHTML)); 
		else $("#InvTable tbody").html($("<tr></tr>").html(newRowHTML));  
}

updateRowNo(false); 
 

function turnTextIntoInputField(inputName ,inputId) {
    var inputIdWithHash = "#" + inputId;
    var elementValue = $(inputIdWithHash).text();
    $(inputIdWithHash).replaceWith('<input style="height:30px;width:98%;" name="'+inputName+'" id="' + inputId + '" type="text" value="' + elementValue + '">');
		$(inputIdWithHash).focus();

    $(document).on('click.' + inputId, function (event) {
        if (!$(event.target).closest(inputIdWithHash).length) {
            $(document).off('click.' + inputId);
            var value = $(inputIdWithHash).val();  
            $(inputIdWithHash).replaceWith('<p style="height:30px;width:98%;" id="'+inputId+'" name ="'+inputName+'" onclick="turnTextIntoInputField(\'' + inputName + '\',\'' + inputId + '\')">'+ value + '</p>');
        }

    });
}
 
</script>
<?php $this->end();?>

