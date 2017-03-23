var num_table = $("#num_table").val();
if(num_table==0){num_table=10;}
var show_table = $("#show_table").val();
var sort_value = "id";
var sort = "desc";
var page = 1;
var search = $("#search").val();
$(function () {
    $('#show').DataTable({
    "scrollX": true,
    "paging": false,
    "lengthChange": true,
    "searching": false,
    "ordering": false,
    "info": false,
    "autoWidth": true
    });
});
// paging
$("#show_table").change(function(){
	show_table = $("#show_table").val();
	page = $(".jPag-current").text();
	$("#info").text(((page - 1)*show_table)+1+" to "+page*show_table+" of ");
	$.ajax({
			url : window.location.href,
			type : "get",
			dataType : "text",
			data : {
				show_table : show_table,
				sort_value : sort_value,
				sort : sort,
				search : search,
				page : page
			},
			success : function (data){
				$("#show tbody").html(data);
				$("#pagination").paginate({
					count 		: Math.ceil(num_table/show_table),
					start 		: 1,
					display     : 7,
					border					: false,
					text_color  			: '#956add',
					background_color    	: 'none',	
					text_hover_color  		: 'blue',
					background_hover_color	: 'none', 
					images		: false,
					mouse		: 'press',
					onChange    : function(page){
						$.ajax({
							url : window.location.href,
							type : "get",
							dataType : "text",
							data : {
								show_table : show_table,
								sort_value : sort_value,
								sort : sort,
								search : search,
								page : page
							},
							success : function (data){
								$("#show tbody").html(data);
								$("#info").text(((page - 1)*show_table)+1+" to "+page*show_table+" of ");
							}
						});
					 }
				});			
			}
		});
});
// pagination
$("#pagination").paginate({
	count 		: Math.ceil(num_table/show_table),
	start 		: 1,
	display     : 7,
	border					: false,
	text_color  			: '#956add',
	background_color    	: 'none',	
	text_hover_color  		: 'blue',
	background_hover_color	: 'none', 
	images		: false,
	mouse		: 'press',
	onChange    : function(page){
		$.ajax({
			url : window.location.href,
			type : "get",
			dataType : "text",
			data : {
				page : page,
				show_table : show_table,
				sort_value : sort_value,
				search : search,
				sort : sort
			},
			success : function (data){
			$("#show tbody").html(data);
			$("#info").text(((page - 1)*show_table)+1+" to "+page*show_table+" of ");
			}
		});
	 }
});
// sort
$(".sort").click(function(){
	if($(this).find("i").hasClass("fa-sort-amount-desc")==true){
		$(this).html("<i class=\"fa fa-sort-amount-asc active\"></i>");
		sort_value = $(this).siblings(".sort_value").text();
		sort = "ASC";
	}
	else{
		$(".sort").html("<i class=\"fa fa fa-arrows-v\"></i>");
		$(this).html("<i class=\"fa fa-sort-amount-desc active\"></i>");
		sort_value = $(this).siblings(".sort_value").text();
		sort = "DESC";
	}
	$.ajax({
		url : window.location.href,
		type : "get",
		dataType : "text",
		data : {
			page : page,
			show_table : show_table,
			sort_value : sort_value,
			search : search,
			sort : sort
		},
		success : function (data){
			$("#show tbody").html(data);
			$("#info").text(((page - 1)*show_table)+1+" to "+page*show_table+" of ");
		}
	});
});
// search
$("#search").keyup(function(){
	search = $("#search").val();
		$.ajax({
		url : window.location.href,
		type : "get",
		dataType : "text",
		data : {
			page : page,
			show_table : show_table,
			sort_value : sort_value,
			search : search,
			sort : sort
		},
		success : function (data){
			$("#show tbody").html(data);
			$("#info").text(((page - 1)*show_table)+1+" to "+page*show_table+" of ");
		}
	});
});

