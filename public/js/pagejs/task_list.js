function downloadPathwayExl(obj){
   if($(obj).attr('data-download') == 'yes'){
	   //var url = $("#task_list_js").attr("downloadPathwayUrl");
	   //var page_no = $("#task_list_js").attr('page_no');
	   let sel_ids = [];
	   var i = 0;
	   $('#fbody .form-check-input').each(function (){
			if($(this).prop('checked')){
				var sid = $(this).attr('pathway-id');
				sel_ids[i] = $.trim(sid);
				i++;
			}
	   });
	   var conf = false;
	   if(sel_ids.length > 25){
			if(confirm('You Have selected more than 25 record to download, only first 25 record will be download!')){
					conf = true;
					sel_ids.length=25;
			}
	   }else{
	   	  conf = true;
	   }
	   var pub = sessionStorage.getItem("published");
	   if(conf){
	   $.ajax({
               url: $("#task_list_js").attr("downloadPathwayUrl"),
			   data: {'selected_ids' : sel_ids},
                type: 'POST',                               
                success: function success(response) {
                    //alert(response.file_name);
					var get_url = $("#task_list_js").attr("downloadPathwayExcel")+'?file='+response.file_name;
					window.location= get_url
                    
                },
                error: function error(err) {
                    if (err.status == 401) {
                        location.reload();
                    }
                }
            });
	   }
			
   
   }
}
$('#durationBtn').click(function(){
	 //event.stopPropagation();
	  $('.filtersection ul').each(function (){
	 	  if($(this).attr('id') != 'duration'){
		  	  $(this).removeClass('show');
		  }
	 });
	 var cls = $('#duration').attr('class');
	 cls = cls.split(' ');
	 if($.trim(cls[1]) == 'show'){
		 $('#duration').removeClass('show');
		 $(this).removeClass('show');
	 }else{
		$('#duration').addClass('show');
		$(this).addClass('show');
	 }
	 
});
$('#levelBtn').click(function(){
	 //event.stopPropagation();
	 
	 $('.filtersection ul').each(function (){
	 	  if($(this).attr('id') != 'level_sel_id'){
		  	  $(this).removeClass('show');
		  }
	 });
	 var cls = $('#level_sel_id').attr('class');
	 cls = cls.split(' ');
	 if($.trim(cls[1]) == 'show'){
		 $('#level_sel_id').removeClass('show');
		 $(this).removeClass('show');
	 }else{
		$('#level_sel_id').addClass('show');
		$(this).addClass('show');
	 }
	 
});
$('#avlBtn').click(function(){
	 //event.stopPropagation();
	 $('.filtersection ul').each(function (){
	 	  if($(this).attr('id') != 'avail_menu'){
		  	  $(this).removeClass('show');
		  }
	 });
	 var cls = $('#avail_menu').attr('class');
	 cls = cls.split(' ');
	 if($.trim(cls[1]) == 'show'){
		 $('#avail_menu').removeClass('show');
		 $(this).removeClass('show');
	 }else{
		$('#avail_menu').addClass('show');
		$(this).addClass('show');
	 }
	 
});
$('#ptypeBtn').click(function(){
	 //event.stopPropagation();
	  $('.filtersection ul').each(function (){
	 	  if($(this).attr('id') != 'pathway_menu'){
		  	  $(this).removeClass('show');
		  }
	 });
	 var cls = $('#pathway_menu').attr('class');
	 cls = cls.split(' ');
	 //alert(cls[1]);
	 if($.trim(cls[1]) == 'show'){
		 $('#pathway_menu').removeClass('show');
		 $(this).removeClass('show');
	 }else{
		$('#pathway_menu').addClass('show');
		$(this).addClass('show');
	 }
	 
});
$('#statusBtn').click(function(){
	 //event.stopPropagation();
	  $('.filtersection ul').each(function (){
	 	  if($(this).attr('id') != 'status_menu'){
		  	  $(this).removeClass('show');
		  }
	 });
	 var cls = $('#status_menu').attr('class');
	 cls = cls.split(' ');
	 if($.trim(cls[1]) == 'show'){
		 $('#status_menu').removeClass('show');
		 $(this).removeClass('show');
	 }else{
		$('#status_menu').addClass('show');
		$(this).addClass('show');
	 }
	 
});
$('.filtersection .cancelbtn').click(function(){
  $('.filtersection ul').removeClass('show');
  $('.filtersection button').removeClass('show');
});