
$('#uploadBack').on('click', function () {
	
	/* var file_size = $('#backfile').size;

  if (file_size > 3072) {
    alert('max upload size is 3M');
	return false;
  }	 */
  $.ajax({
    // Your server script to process the upload
    //url: $("#pathwayDetails").attr("uploadBackGroungImageUrl")+ $("#pathwayDetails").attr("pathwayId"),
	url: $("#pathwayDetails").attr("uploadBackGroungImageUrl"),
    type: 'POST',

    // Form data
    data: new FormData($('form')[0]),
	cache: false,
    contentType: false,
    processData: false,
	success: function success(response) {
              if (response.success) {
                location.reload();
                } else {
                 alert(response.message);  
                }
            }               
  });
});

//#############################
document.querySelectorAll(".upButton").forEach(function(a) {
    a.addEventListener("click", function() {
    var current_id = $(a).attr('data-current');
    var prev_id = $(a).attr('data-node');
    
    $.ajax({
            url: $("#pathwayDetails").attr("changeSectionPositionUrl"),
            type: 'POST',
            data: {'current_id': current_id, 'prev_id': prev_id, 'act': 'prev'},
            success: function success(response) {
              if (response.success) {
                location.reload();
                } else {
                   
                }
            }               
          });
    });
});

document.querySelectorAll(".downButton").forEach(function(a) {
    a.addEventListener("click", function() {
        var current_id = $(a).attr('data-current');
        var next_id = $(a).attr('data-node');

    $.ajax({
            url: $("#pathwayDetails").attr("changeSectionPositionUrl"),
            type: 'POST',
            data: {'current_id': current_id, 'prev_id': next_id, 'act': 'prev'},
            success: function success(response) {
              if (response.success) {
                location.reload();
                } else {
                   
                }
            }               
          });


    });
});

document.querySelectorAll(".upButtonLO").forEach(function(a) {
    a.addEventListener("click", function() {
    var li = $(this).closest('div');
    var prev = li.prev();

    if(prev.length){
        li.detach().insertBefore(prev);
    }

    var current_id = $(a).attr('data-current');
    var prev_id = $(a).attr('data-node');


    $.ajax({
            url: $("#pathwayDetails").attr("changeLOPositionUrl"),
            type: 'POST',
            data: {'current_id': current_id, 'prev_id': prev_id, 'act': 'prev'},
            success: function success(response) {
              if (response.success) {
                location.reload();
                } else {
                   
                }
            }               
          });
    });
});




document.querySelectorAll(".downButtonLO").forEach(function(a) {
    a.addEventListener("click", function() {
    var li = $(this).closest('div');
    var next = li.next();

    if(next.length){
        li.detach().insertAfter(next);
    }

    var current_id = $(a).attr('data-current');
    var next_id = $(a).attr('data-node');

    $.ajax({
            url: $("#pathwayDetails").attr("changeLOPositionUrl"),
            type: 'POST',
            data: {'current_id': current_id, 'prev_id': next_id, 'act': 'prev'},
            success: function success(response) {
              if (response.success) {
                location.reload();
                } else {
                   
                }
            }               
          });
    });
});


document.querySelectorAll(".delete_lo").forEach(function(li) {
    li.addEventListener("click", function() {
    
    //var result = confirm("Are you sure you want to delete the learning item (LO) you’ve added? You’ll not be able to undo it.");
   // if (result) {

    $("#myModalLO").show();
      
    $("#closelBtnLO").click(function(){
        $("#myModalLO").hide();
        return false;
    });

    $("#cancelBtnLO").click(function(){
        $("#myModalLO").hide();
        return false;
    });


        var id = $(li).attr('id');
        

        $("#confirmBtnLO").click(function(){
         $.ajax({
                url: $("#pathwayDetails").attr("deleteLO"),
                type: 'POST',
                data: {'id': id},
                success: function success(response) {
                  if (response.success) {
                    location.reload();
                    } else {
                       
                    }
                }               
              });
        $("#myModalLO").hide();
      });
 
    });
});


document.querySelectorAll(".delete_subsec").forEach(function(li) {
    li.addEventListener("click", function() {
    var title = $(li).attr('data-title');
    $('#secmsg').empty();
    $('#sechead').empty();


    if(title=='section'){
        $('#sechead').append('Delete section?');
        $('#secmsg').append('Are you sure you want to delete the section you’ve added? Your all linked subsection and learning items (LOs) will be deleted.');
    }else{
        $('#sechead').append('Delete subsection?');
        $('#secmsg').append('Are you sure you want to delete the subsection you’ve added? Your all linked learning items (LOs) will be deleted.');
    
    }

    

    $("#myModalSection").show();
      
    $("#closelBtnsection").click(function(){
        $("#myModalSection").hide();
        return false;
    });

    $("#cancelBtnsetion").click(function(){
        $("#myModalSection").hide();
        return false;
    });
    
        var id = $(li).attr('id');
        

       $("#confirmBtnSection").click(function(){
         $.ajax({
                url: $("#pathwayDetails").attr("deleteSubSectionUrl"),
                type: 'POST',
                data: {'id': id, 'title': title},
                success: function success(response) {
                  if (response.success) {
                    
                    location.reload();
                    } else {
                       
                    }
                }               
              });
        $("#myModalSection").hide();
      });  
  
    });
});

$(document).on('click', '.publish-pathway', function() {
    
    var pathwayId = $(this).attr('pathway-id');
    
    $.ajax({
        url: $("#pathwayDetails").attr("publishPathwayUrl"),
        type: 'POST',
        data: {'pathwayId': pathwayId, 'showPreview': false},
        success: function success(response) {

            if (response.success) {
                console.log(response);
                window.location.href = $("#pathwayDetails").attr("taskListUrl");
            } else {
               //console.log(response);
               
               $("#validation_"+response.publishData.section_id).css("border","solid 2px red");
      
               $('#msg1').html(response.publishData.message).fadeIn('slow'); //also show a success message 
               $('#msg1').delay(3000).fadeOut('slow');
            }
        }               
    });
})


$(document).on('click', '#showPreview', function() {

    var pathwayId = $(this).attr('pathway-id');
    $.ajax({
        url: $("#pathwayDetails").attr("publishPathwayUrl"),
        type: 'POST',
        data: {'pathwayId': pathwayId, 'showPreview': true},
        success: function success(response) {

            if (response.success) {
                var win = window.open(response.url, "_blank");
                win.focus();
            }
        }               
    });
})


$(document).on('change', '.min-complition', function() {
    var complitionMin = $(this).val();
    var pathwayId = $(this).attr('pathway-id');
    var mode = $(this).attr('mode');
    $.ajax({
        url: $("#pathwayDetails").attr("saveMinimumComplitionUrl"),
        type: 'POST',
        data: {'complitionMin': complitionMin, 'pathwayId': pathwayId, 'mode':mode},
        success: function success(response) {
            if (response.success) {
                
            } else {
               
            }
        }               
    });
})

$(document).on('change', '.min-complition-session', function() {
    var complitionMin = $(this).val();
    var pathwayId = $(this).attr('pathway-id');
    var sessionId = $(this).attr('session-id');
    var mode = $(this).attr('mode');
    $.ajax({
        url: $("#pathwayDetails").attr("saveMinimumComplitionUrl"),
        type: 'POST',
        data: {'complitionMin': complitionMin, 'pathwayId': pathwayId, 'sessionId':sessionId, 'mode':mode},
        success: function success(response) {
            if (response.success) {
                
            } else {
               
            }
        }               
    });
})


$(document).on('change', '.add-sequence', function() {
    var sequenceStart = $(this).val();
    var pathwayId = $(this).attr('pathway-id');
    var mode = $(this).attr('mode');
    $.ajax({
        url: $("#pathwayDetails").attr("saveSequenceStartUrl"),
        type: 'POST',
        data: {'sequenceStart': sequenceStart, 'pathwayId': pathwayId, 'mode':mode},
        success: function success(response) {
            if (response.success) {
                
            } else {
               
            }
        }               
    });
})

$(document).on('change', '.add-sequence-sec', function() {
    var sequenceStart = $(this).val();
    var pathwayId = $(this).attr('pathway-id');
    var sectionId = $(this).attr('section-id');
    var mode = $(this).attr('mode');
    $.ajax({
        url: $("#pathwayDetails").attr("saveSequenceStartUrl"),
        type: 'POST',
        data: {'sequenceStart': sequenceStart, 'pathwayId': pathwayId, 'sectionId': sectionId, 'mode':mode},
        success: function success(response) {
            if (response.success) {
                
            } else {
               
            }
        }               
    });
})



$(document).on('change', '.unlock-this', function() {
    var unlock = $(this).val();
    var pathwayId = $(this).attr('pathway-id');
    var sectionId = $(this).attr('section-id');
    var learningObject = $(this).attr('learning-object');
    var mode = $(this).attr('mode');
    $.ajax({
        url: $("#pathwayDetails").attr("sequenceUnlockUrl"),
        type: 'POST',
        data: {'unlock': unlock, 'pathwayId': pathwayId, 'sectionId':sectionId, 'learningObject': learningObject, 'mode':mode},
        success: function success(response) {
            if (response.success) {
                
            } else {
               
            }
        }               
    });
})


$(document).on('change', '.add-branch', function(){
    var branchId = $(this).val();
    var sectionId = $(this).attr('section-id');
    $.ajax({
        url: $("#pathwayDetails").attr("addBranchUrl"),
        type: 'POST',
        data: {'branchId': branchId, 'sectionId': sectionId},
        success: function success(response) {
            if (response.success) {
                
            } else {
               
            }
        }               
    });
})



document.querySelectorAll(".deletePathway").forEach(function(li) {
    li.addEventListener("click", function() {
    var id = $(li).attr('pathway-id');
    //var result = confirm("Are you sure you want to delete all the information you’ve added? You’ll not be able to undo it.");
    //if (result) {


    $("#myModal").show();
      
    $("#closelBtn").click(function(){
        $("#myModal").hide();
        return false;
    });

    $("#cancelBtn").click(function(){
        $("#myModal").hide();
        return false;
    });

      $("#confirmBtn").click(function(){
         $.ajax({
                url: $("#pathwayDetails").attr("deletePathwayUrl"),
                type: 'POST',
                data: {'id': id},
                success: function success(response) {
                  if (response.success) {
                     window.location.href = $("#pathwayDetails").attr("taskListUrl");
                    } else {
                       
                    }
                }               
              });
        $("#myModal").hide();
      });    

        
   // }

  
    });
});


$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('.backtop-bar').fadeIn();
    } else {
        $('.backtop-bar').fadeOut();
    }
});

$(".backtop-bar").click(function () {
   
   $("html, body").animate({scrollTop: 0}, 500);
});



$(document).ready(function() {
    var showChar = 400;
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});

/*document.querySelectorAll(".upButtonLO").forEach(function(a) {
    a.addEventListener("click", function() {
    var current_id = $(a).attr('data-current');
    var prev_id = $(a).attr('data-node');
    var label = $(a).attr('data-label');
    var para = $(a).attr('data-para');

    var label2 = $('.changepos'+prev_id).attr('data-label');
    var para2 = $('.changepos'+prev_id).attr('data-para');

    $('.labeldata'+prev_id).html(label);
    $('.labeldata'+current_id).html(label2);

    $('.labeldesc'+prev_id).html(para);
    $('.labeldesc'+current_id).html(para2);


    return false;
    $.ajax({
            url: '{{path_for("changeLOPosition")}}',
            type: 'POST',
            data: {'current_id': current_id, 'prev_id': prev_id, 'act': 'prev'},
            success: function success(response) {
              if (response.success) {
                
                } else {
                   
                }
            }               
          });
    });
});


document.querySelectorAll(".downButtonLO").forEach(function(a) {
    a.addEventListener("click", function() {
    var current_id = $(a).attr('data-current');
    var next_id = $(a).attr('data-node');
    
    var label = $(a).attr('data-label');
    var para = $(a).attr('data-para');

    var label2 = $('.changepos'+next_id).attr('data-label');
    var para2 = $('.changepos'+next_id).attr('data-para');

    $('.labeldata'+next_id).html(label);
    $('.labeldata'+current_id).html(label2);

    $('.labeldesc'+next_id).html(para);
    $('.labeldesc'+current_id).html(para2);
return false;
    $.ajax({
            url: '{{path_for("changeLOPosition")}}',
            type: 'POST',
            data: {'current_id': current_id, 'prev_id': next_id, 'act': 'prev'},
            success: function success(response) {
              if (response.success) {
                
                } else {
                   
                }
            }               
          });
    });
});*/       
 