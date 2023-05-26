var FORM_URL = $("#formData").attr("FORM_URL");
var form_id = $("#formData").attr("form_id");
var formKey = $("#formData").attr("formKey");
var customForm = ''; 
var formsaveddata='';
var formDataChanged = false;
var tpId = $("#formData").attr("type_id");
      
window.onload = function () {
    $("#home-loader-overlay").show();
    window.addEventListener("beforeunload", function (e) {
        var confirmationMessage = 'It looks like you have been editing something. If you leave before saving, your changes will be lost.';
        if(typeof(formDataChanged)!='undefined' && formDataChanged){
            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        }
    });
    loadForm(null, null);
};
             
            
function loadForm(form_data, selected_value) {
    Formio.createForm(document.getElementById('formio-id'), FORM_URL, {
        noAlerts: false,
        hooks: {
            beforeSubmit: function (submission, next) {
                $('.btn').prop('disabled', true);
                var message = [];
                var error = false;
                setTimeout(function () {
                    
                    if (error) {
                        $('.btn').prop('disabled', false);
                        next(message);
                    } else {
                        next();
                    }
                }, 10);
            }
        }
    }).then(function (form) {
    customForm = form;  
    form.loading = false;
    form.nosubmit = true;
    form.submitMessage = '';

    if (formKey == 'pwc-create-pathway') {
        changeComponentDynamicURL(form,'pathwayAvailability','get-field-master-data');
        changeComponentDynamicURL(form,'pathwayLevel','get-field-master-data');
        changeComponentDynamicURL(form,'pathwaySkills','get-skills-data');
    }


                
                        
    form.on('change', function (changed) {

        /////////////////------------page on load  finished - on change start ---------------------//
        // check if saved data is different 
        if(form.loading==false && formsaveddata==''){
            formsaveddata=JSON.stringify(form.submission.data);
        }           
        if(formsaveddata != JSON.stringify(form.submission.data)){
            formDataChanged =true;  
        }else if(formsaveddata == JSON.stringify(form.submission.data)){
            formDataChanged =false; 
        }  
        ///////////////----------------on change end -----------------//

        $(".control-label--hidden").replaceWith('<label class="control-label control-label--hidden" style="display:none;">control-label</label>');
        //tab code start
        $('.pagination .page-item').each(function(i){
            var text = $(this).text();                      
            if(text == 'ProEdge catalog'){
               $(this).addClass('proedge_catalog');
            }
            if(text == 'External content'){
               $(this).addClass('external_content');
            }
            if(text == 'Custom filter'){
               $(this).addClass('pwc_settings');
               
            }
           
        });
        //$('.page-item').removeClass('active');                    
        $('.pwc_settings').hide()
        $(".btn-wizard-nav-cancel").hide();
        $(".btn-wizard-nav-next").hide();
        
        
    //tab code end
        
    });
                
    form.on('render', function () {
        /* ----- start ckeditor 5 ------*/
        var cid = '';
        if (formKey == 'pwc-create-pathway') {

            changeComponentDynamicURL(form,'pathwayAvailability','get-field-master-data');
            changeComponentDynamicURL(form,'pathwayLevel','get-field-master-data');
            changeComponentDynamicURL(form,'pathwaySkills','get-skills-data');

            cid = 'pathwayDescription';
            $('.draftAutoSave').html('');
        }
        else if (formKey == 'pwc-section-details') {
            cid = 'sectiondetailsDescription';
        }
        else if (formKey == 'pwc-sub-section-details') {
            cid = 'subSectiondetailsDescription';
        }
        else if (formKey == 'pwc-external-learning-object') {

            changeComponentDynamicURL(form,'loLevel','get-field-master-data');
            
            setTimeout(function() {
                if($('.external_content').hasClass('active')) {
                    cid = 'loDescription';
                }
            }, 100)
            
        }


    
    
        setTimeout(function() {
            if(cid) {
                ClassicEditor
                // Note that you do not have to specify the plugin and toolbar configuration — using defaults from the build.
                .create( document.querySelector( '#'+cid ) , {
                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                    
                    // 'style' is pending
                    // Removed 'fontSize',
                                    
                    toolbar: {                                                                              
                      items: ['bold', 'italic', 'strikethrough', 'underline', 'RemoveFormat','code', 'subscript', 'superscript', '|','bulletedList','numberedList', 'todoList', '|','outdent', 'indent','blockQuote', 'alignment','|','link','insertImage','mediaEmbed','horizontalLine','specialCharacters','|', '|','heading','|', '|','-','fontSize', 'fontColor','|', 'SelectAll', 'findAndReplace','wproofreader','|','undo', 'redo'], 
                    shouldNotGroupWhenFull: true
                    },
                    htmlEmbed: {showPreviews: true },
                    image: {styles: ['alignCenter', 'alignLeft','alignRight'],
                    resizeOptions: [
                    {
                        name: 'resizeImage:original',
                        label: 'Original',
                        value: null
                    },
                    {
                        name: 'resizeImage:50',
                        label: '50%',
                        value: '50'
                    },
                    {
                        name: 'resizeImage:75',
                        label: '75%',
                        value: '75'
                    }
                    ],
                    toolbar: ['imageTextAlternative', 'toggleImageCaption', '|','imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText', 'imageStyle:side', '|','resizeImage' ],
                    insert: {
                        integrations: ['insertImageViaUrl']
                    }
                    },
                    list: {properties: {styles: false,startIndex: false,reversed: false}},
                    link: {decorators: {addTargetToExternalLinks: true,
                                    defaultProtocol: 'https://',
                                    toggleDownloadable: { mode: 'manual',
                                    label: 'Downloadable',attributes: {download: 'file'}
                                    }
                                    }
                    },
                    style: {
                        definitions: [
                            {
                                name: 'Article category',
                                element: 'h3',
                                classes: [ 'category' ]
                            },
                            {
                                name: 'Info box',
                                element: 'p',
                                classes: [ 'info-box' ]
                            },
                        ]
                    }
                    
                    })
                    
                    
                .then( editor => {                                     
                    
                    if (formKey == 'pwc-create-pathway') {
                        editor.model.document.on('change:data', (evt, data) => {
                            const editorData = editor.getData();    
                            form.getComponent(cid).setValue(editorData);
                        });
                    }
                    else if (formKey == 'pwc-section-details') {
                        editor.model.document.on('change:data', (evt, data) => {
                            const editorData = editor.getData();    
                            form.getComponent(cid).setValue(editorData);                                
                        });
                    }
                    else if (formKey == 'pwc-sub-section-details') {
                        editor.model.document.on('change:data', (evt, data) => {
                            const editorData = editor.getData();    
                            form.getComponent(cid).setValue(editorData);                                
                        });
                    }
                    else if (formKey == 'pwc-external-learning-object') {
                        editor.model.document.on('change:data', (evt, data) => {
                            const editorData = editor.getData();    
                            form.getComponent(cid).setValue(editorData);
                            //console.log('testing111', form.getComponent(cid).getValue());
                        });
                    }
                })
                .catch( error => {
                    console.error( error.stack );
                });
            }
        }, 1000)
    
        /* ------ end ckeditor 5 -------*/
        
        if(formKey == 'pwc-section-details') {
            var pathwayId = $('#formData').attr('pathwayId');
			var pathwayIdCom = customForm.getComponent('pathwayId');						
			$('.formio-component-pathwayId').hide()
			pathwayIdCom.setValue(pathwayId);					
			$('#sectiondetailsSectiontitle').attr( 'autocomplete', 'off' );
			$('#sectiondetailsSectiontitle').attr( 'maxlength', '255' );
            
        }
        else if(formKey == 'pwc-sub-section-details') {
			var pathwayId = $('#formData').attr('pathwayId');
			var sectionId = $('#formData').attr('sectionId');
			var pathwayIdCom = customForm.getComponent('pathwayId');
			var sectionIdCom = customForm.getComponent('sectionId');
			$('.formio-component-pathwayId').hide()
			$('.formio-component-sectionId').hide()
			pathwayIdCom.setValue(pathwayId)
			sectionIdCom.setValue(sectionId)
			
			$('#subSectiondetailsCancel').addClass('secondary-btn');
			$('#submit').addClass('primary-btn');
			$('#subSectiondetailsSubSectiontitle').attr( 'autocomplete', 'off' );
			$('#subSectiondetailsSubSectiontitle').attr( 'maxlength', '255' );		
            
        }
        else if(formKey == 'pwc-external-learning-object') {
            var pathwayId = $('#formData').attr('pathwayId');
            var sectionId = $('#formData').attr('sectionId');
            var pathwayIdCom = customForm.getComponent('pathwayId');
            var sectionIdCom = customForm.getComponent('sectionId');
            $('.formio-component-pathwayId').hide()
            $('.formio-component-sectionId').hide()
            if(pathwayIdCom) {
                pathwayIdCom.setValue(pathwayId)
                sectionIdCom.setValue(sectionId)
            }
            $('#page1ExternalLearningObjectButtonCancel').addClass('secondary-btn');
            $('#submit').addClass('primary-btn');
            
            $('.formio-component-loHours .control-label').removeClass('field-required');
            $('.formio-component-loMinutes .control-label').removeClass('field-required');
            $('.formio-component-loThumbnail .control-label').removeClass('field-required');
            $('.list-inline').css("display","none");
            //$('.pagination').css("display","none");
            $('.formio-component-loDescriptionRadio').css("display","none");
            $('.formio-component-loDescription2').css("display","none");
            $('.formio-component-page1ExternalLearningObject').removeClass('formsection');
            
            if(tpId == 3) {
              $('.formio-component-thisMandatory').show();
              $('.formio-component-page1ExternalLearningObjectContent4').show();
            }else{
              $('.formio-component-thisMandatory').hide();
              $('.formio-component-page1ExternalLearningObjectContent4').hide();
            }
            $('#loTitle').attr( 'autocomplete', 'off' );
            $('#sourceUrl').attr( 'autocomplete', 'off' );
            $('#loHours').attr( 'autocomplete', 'off' );
            $('#loMinutes').attr( 'autocomplete', 'off' );
            $('#loProvider').attr( 'autocomplete', 'off' );
            $('.addToggle').find('label').addClass('switch')
            $('.addToggle').find('span').addClass('slider') 
            var toggleCom = ['formio-component-thisMandatory']
            var inct;
            for(inct = 0; inct < toggleCom.length; inct++) {
                var toggleMsg = $('.'+toggleCom[inct]).find('.slider').text();
                $('.'+toggleCom[inct]).find('.slider').html(`<p>${toggleMsg}</p>`)
            }                       
        
        }
        else if(formKey == 'pwc-create-pathway') {

            var pathwaySetting = ['A pathway with no branching or sequencing rules.', 
                                'The admin gives the learner a choice between two branches at the section level.',
                                'The admin requires the learner to complete the sections in a linear path.',
                                'The admin specifies the number of sections the learner must complete in order to receive credit for the pathway.'];
            $('.formio-component-pathwayType').find('.form-group div').each(function(index) {
                $(this).addClass('mb-4');
                 $(this).append(`<div class="pathway-type-desc"> - ${pathwaySetting[index]}</div>`)
            })

            $('.addToggle').find('label').addClass('switch')
            $('.addToggle').find('span').addClass('slider')

            var toggleCom = ['formio-component-pathwayAccreditation', 'formio-component-pathwaySearchRecom', 'formio-component-proedgeRecom', 'formio-component-proedgeRatingReview', 'formio-component-pathwaySearch', 'formio-component-displayProgress', 'formio-component-enableFilters', 'formio-component-contentType', 'formio-component-provider', 'formio-component-duration']
            var inct;
            for(inct = 0; inct < toggleCom.length; inct++) {
                var toggleMsg = $('.'+toggleCom[inct]).find('.slider').text();
                $('.'+toggleCom[inct]).find('.slider').html(`<p>${toggleMsg}</p>`)
            }
            
        }
        
    })
                
    form.on('submit', function (submission) {
        form.submission.form = form.wizard !== undefined ? form.wizard._id : form._form._id;
            form.submission.owner = form.wizard !== undefined ? form.wizard.owner : form._form.owner;
            if (selected_value !== undefined && selected_value !== null) {
                form.submission.submission_id = selected_value;
            } else {
                form.submission.submission_id = '';
            } 
            
            if(formKey == 'pwc-create-pathway') {
                var filterIds = [];
                $('.customFilterShowRecord').each(function(i){
                    var filId = $(this).attr('filId');
                    var filName = $(this).attr('filName');
                    var radioValue = $("input[name='"+filId+"']:checked").val();
                    if(!radioValue) {
                        radioValue = '0';
                    }
                    var filterData = {
                        id: filId,
                        name: filName,
                        value: radioValue
                    }
                    filterIds.push(filterData)
                })

                $.ajax({
                    url: $("#formData").attr("addPathwayDataUrl"),
                    type: 'POST',
                    data: {data: submission, formKey: formKey, FORM_URL: FORM_URL, filterIds:filterIds},
                    success: function success(response) {
                      if (response.success) {
                            formDataChanged = false;
                           window.location.href = $("#formData").attr("taskListUrl")
                        } else {
                           
                        }
                    }               
                });
            
            }

            if(formKey == 'pwc-section-details') {

                var pathwayId = $('#formData').attr('pathwayId');
            
                $.ajax({
                        url: $("#formData").attr("addSectionDetailsUrl"),
                        type: 'POST',
                        data: {data: submission, formKey: formKey, FORM_URL: FORM_URL},
                        success: function success(response) {
                          if (response.success) {
                                formDataChanged = false;
                               window.location.href = $("#formData").attr("pathwayDetailsUrl")
                            } else {
                               
                            }
                        }               
                      });
                  
            }   
            
            if(formKey == 'pwc-sub-section-details') {
            
                $.ajax({
                        url: $("#formData").attr("addSectionDetailsUrl"),
                        type: 'POST',
                        data: {data: submission, formKey: formKey, FORM_URL: FORM_URL},
                        success: function success(response) {
                          if (response.success) {
                                formDataChanged = false;
                                window.location.href = $("#formData").attr("pathwayDetailsUrl")
                            } else {
                               
                            }
                        }               
                      });
                  
            }

            if(formKey == 'pwc-external-learning-object') {
                
                $.ajax({
                        url: $("#formData").attr("addExternalLearningUrl"),
                        type: 'POST',
                        data: {data: submission, formKey: formKey, FORM_URL: FORM_URL, tpId:tpId},
                        success: function success(response) {
                          if (response.success) {
                                formDataChanged = false;
                                window.location.href = $("#formData").attr("pathwayDetailsUrl")
                            } else {
                               
                            }
                        }               
                    });
            }

        });

    });
            
}
             
$(document).on('click', '#editCustomFilter', function() {
    $('#customFilterName').val('')
    $('#customFilterId').val('')
    var inc;
    var customFilterValue = '';
    $("#customFilterValueShow").html(customFilterValue)
    for(inc = 0; inc < 4; inc++) {
        var numCount = inc+1;
        customFilterValue = `<div class="form-group">
                <label for="customFilterValue${numCount}">Custom filter value ${numCount}</label>
                <input type="text" class="form-control" name="customFilterValue[]" id="customFilterValue${numCount}" value="" placeholder="Value">
            </div>`;
        $("#customFilterValueShow").append(customFilterValue)
    }
    $('#customFilterModal').modal('show')
})

$(document).on('click', '#addAdditionalValue', function() {
    var inc = 0;
    $('#customFilterValueShow div').each(function(index) {
        inc++;
    })
    var numCount = inc+1;
    var customFilterValue = `<div class="form-group">
                <label for="customFilterValue${numCount}">Custom filter value ${numCount}</label>
                <input type="text" class="form-control" name="customFilterValue[]" id="customFilterValue${numCount}" value="" placeholder="Value">
            </div>`;
    $("#customFilterValueShow").append(customFilterValue)
})
             
$( "#customFormSubmit" ).submit(function( event ) {
    event.preventDefault();

    var form = $(this);
    var actionUrl = $("#formData").attr("saveCustomFilterUrl");
    
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          if(data.success) {
            var customFilterName = data.customFilterName;
            var insertedId = JSON.stringify(data.insertedId);
            insertedId = insertedId.split('"');
            insertedId = insertedId[3]
            if(data.mode == "add") {
                var showData = `
                    <div class="customFilterShowRecord" id="cfilter-${insertedId}" filId="${insertedId}" filName="${customFilterName}">
                        <label class="control-label form-check-label switch cus-filter-pathway">
                            <input type="checkbox" name="${insertedId}" value="1" checked>
                            <span class="slider">
                                <p id="fil-${insertedId}">${customFilterName}</p>
                            </span>
                        </label>
                        <a class="editCustomFilter" filterId="${insertedId}"> <i class="edit-btnbar"></i> Edit</a> 
                        <a class="deleteCustomFilter" filterId="${insertedId}"> <i class="delete-btnbar"></i> Delete</a>
                    <div>`;
                $('#showCustomFilterDiv').append(showData);
            }
            else {
                $('#fil-'+insertedId).html(customFilterName);
            }
            form[0].reset()
            $('.close').trigger('click')
          }
        }
    });
});

$(document).on('click', '.editCustomFilter', function() {

    var filterId = $(this).attr('filterId')
    var actionUrl = $("#formData").attr("getCustomFilterUrl");
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: {filterId:filterId},
        success: function(data)
        {
            if(data.success) {
                var filterValues = data.filterData.customFilterValue;
                $('#customFilterName').val(data.filterData.customFilterName)
                $('#customFilterId').val(filterId);
                
                var inc;
                var customFilterValue = '';
                $("#customFilterValueShow").html(customFilterValue)
                for(inc = 0; inc < filterValues.length; inc++) {
                    var numCount = inc+1;
                    customFilterValue = `<div class="form-group">
                            <label for="customFilterValue${numCount}">Custom filter value ${numCount}</label>
                            <input type="text" class="form-control" name="customFilterValue[]" id="customFilterValue${numCount}" value="${filterValues[inc]}" placeholder="Value">
                        </div>`;
                    $("#customFilterValueShow").append(customFilterValue)
                }
                
                $('#customFilterModal').modal('show')
            }
        }
    })
    
})

$(document).on('click', '.deleteCustomFilter', function() {
    if(confirm("Are you sure to delete the custom filter!")) {
        var filterId = $(this).attr('filterId');
        $("#cfilter-"+filterId).remove();
    }
})

$(document).on('click', 'button.back-btn', function(e){
    e.preventDefault();
    window.history.back();
});
            
    