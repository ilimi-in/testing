var FORM_URL = $("#formData").attr("FORM_URL");
var form_id = $("#formData").attr("form_id");
var task_id = $("#formData").attr("task_id");
var user_id = $("#formData").attr("user_id");
var formKey = $("#formData").attr("form_type");
var mode = $("#formData").attr("mode");
var TYPE = $("#formData").attr("type");
var customForm = '';        
var customFilterValue = $("#formData").attr("custom_filter_v");
var isMandatory = $("#formData").attr("is_mandatory");
var schCom; 
var formsaveddata='';
var formDataChanged = false;
var type_k = $("#formData").attr("type_k");

$(document).ready(function () {
    $('#nav-icon4').click(function () {
        $(this).toggleClass('open');
    });         
});

window.onload = function () {
    $("#home-loader-overlay").show();
    window.addEventListener("beforeunload", function (e) {
        var confirmationMessage = 'It looks like you have been editing something. If you leave before saving, your changes will be lost.';
        if(typeof(formDataChanged)!='undefined' && formDataChanged){
            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        }
    });
    getFormData({id: form_id, tb: 'pe_form_data',mode: mode});
};

function getFormData(d) {           
    $.ajax({
        url: $('#formData').attr('getFormData'),
        type: 'POST',
        data: d,
        success: function success(response) {
            var data = response.data;
            data = JSON.stringify(data);
            data = data.replace(/"true"/g, true);
            data = data.replace(/"false"/g, false);
            data = JSON.parse(data);
            if (d.id !== undefined && d.id !== null && d.id != '') {
                loadForm(data, d.id);
            } else {
                loadForm(data, $('#formData').attr('form_id'));
            }
        },
        error: function (err) {
            if (err.status == 401) {
                location.reload();
            } else {
                console.log('it failed!');
            }
        }
    })
}


function loadForm(form_data, selected_value) {
    Formio.createForm(document.getElementById('formio-id'), FORM_URL, {  readOnly: false, noAlerts: false,
        hooks: {
            beforeSubmit: function(submission, next) {
                $('.btn').prop('disabled', true);
                var message = [];
                var error = false;

                setTimeout(function(){
                    if(submission.state !='draft'){
                       
                        
                    }
                    if(error){
                        $('.btn').prop('disabled', false);            
                        next(message);
                    }else{    
                        next();
                    }
                },10);
            }
        }
    }).then(function (form) {
        customForm = form;
        schCom = form.schema.components;
        if (form_data !== undefined && form_data !== null) {
            form.submission = {
                data: form_data
            };
        }
        

        form.loading = false;
        form.nosubmit = true;

        if (formKey == 'pwc-create-pathway') {

            changeComponentDynamicURL(form,'pathwayAvailability','get-field-master-data');
            changeComponentDynamicURL(form,'pathwayLevel','get-field-master-data');
            changeComponentDynamicURL(form,'pathwaySkills','get-skills-data');
        }

        if(formKey == 'pwc-external-learning-object') {

            //tab code start
            $('.pagination .page-item').each(function(i){
                var text = $(this).text();                      
                if(text == 'Proedge catalog'){
                   $(this).addClass('proedge_catalog');
                }
                if(text == 'External content'){
                   $(this).addClass('external_content');
                }
                if(text == 'Custom filter'){
                   $(this).addClass('pwc_settings');
                   
                }
            });

            $('.proedge_catalog').remove()
            setTimeout(function() {
                $( ".external_content" ).trigger( "click" );
                setTimeout(function() {
                    $('.proedge_catalog').addClass('d-none')
                }, 100)
            }, 100)

            /*setTimeout(function() {
                var schemaTab = [...schCom];
                delete schemaTab[0];
                delete schemaTab[3];
                schemaTab = schemaTab.filter(elm => elm);
                console.log('schemaTab', schemaTab);
                customForm.pages = schemaTab
                customForm.wizard.components = schemaTab
                customForm.redraw()
            }, 1000)*/

            
        }

        form.on('submit', function (submission) {
            $('.btn').prop('disabled', true);
            $('.alert-success').remove();
            //window.stream.taskAction('edit-task', 'submit', task_id, 'update');
            
            var error = false;
            var message = '';
            
            if(error){
                var html ='<p>Please fix the following errors before submitting.</p><ul>'+message+'</ul>'
                form.setAlert('danger', html);
                $("#submit").children().remove();
                $("#submit").append('<div class="has-error"></div>');
                $('.btn').prop('disabled', false);
                $("html, body").animate({scrollTop: 0}, 0);
                return false;
            }
        
            var url ='';
            var data ='';
            
            if(mode !== 'copy'){
                url = $("#formData").attr("updatDraft");
                data = {submission: submission, FORM_URL: FORM_URL, TYPE: TYPE}
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
                    url: $("#formData").attr("updatDraft"),
                    type: 'POST',
                    data: {submission: submission, formKey: formKey, FORM_URL: FORM_URL, TYPE: TYPE, filterIds:filterIds},
                    success: function success(response) {
                      if (response.success) {
                            formDataChanged = false;
                           window.location.href = $("#formData").attr("taskListUrl")
                        } else {
                           
                        }
                    }               
                });
            
            }
            else { 
                  
    
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        
                        //var tt = response.pathwayId;
                        if(!response.success){
                            $('.btn').prop('disabled', false);
                        }else{
                            formDataChanged = false;
                            if(formKey == 'pwc-section-details' || formKey == 'pwc-sub-section-details' || formKey == 'pwc-external-learning-object') {
                                window.location.href = $("#formData").attr("pathwayDetailsUrl");
                            }else{
                                window.location.href = $("#formData").attr("taskListUrl");
                            }
                        }
                    },
                    error: function (err) {
                        if (err.status == 401) {
                            location.reload();
                        } else {
                            $('.btn').prop('disabled', false);
                            //console.log('it failed!');
                        }
                    }
                });                 
                
            }
            
             

            
        });
        form.on('error', function () {
            $("html, body").animate({scrollTop: 0}, 0);
            $('.btn').removeClass('submit-fail');  
            $('.btn').removeClass('alert-danger'); 
            $('.btn').prop('disabled', false);            
        });

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

        });
                
        form.on('render', function () { 

            /* ----- start ckeditor 5 ------*/
            var cid = '';
            if (formKey == 'pwc-create-pathway') {

                changeComponentDynamicURL(form,'pathwayAvailability','get-field-master-data');
                changeComponentDynamicURL(form,'pathwayLevel','get-field-master-data');
                changeComponentDynamicURL(form,'pathwaySkills','get-skills-data');

                
                var autoSaveText = $("#formData").attr("autoSaveText");
                $('.draftAutoSave').html(autoSaveText);

                cid = 'pathwayDescription';
            }
            else if (formKey == 'pwc-section-details') {
                cid = 'sectiondetailsDescription';
            }
            else if (formKey == 'pwc-sub-section-details') {
                cid = 'subSectiondetailsDescription';
            }
            else if (formKey == 'pwc-external-learning-object') {

                //changeComponentDynamicURL(form,'loContentType','get-field-master-data');
                changeComponentDynamicURL(form,'loLevel','get-field-master-data');
                setTimeout(function() {
                    if($('.external_content').hasClass('active')) {
                        cid = 'loDescription';
                    }
                }, 100)

                //tab code end         
                var actionUrl = $("#formData").attr("getFormCustomFilterLoUrl");                            
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: {formId: form_id}, // serializes the form's elements.
                    success: function(data)
                    {                           
                       
                        if(data.success) {                                          
                              var getD = data.cDropdown;                                          
                            //$('#page3PageColumns').append(cDropdown);
                            $(".formio-component-page3PageColumns").html(getD); 
                            
                                

                            
                                
                        }
                    }
                });
                //custom filter end
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
                          items: ['bold', 'italic', 'strikethrough', 'underline', 'RemoveFormat', '|','numberedList','bulletedList', 'todoList', '|','outdent', 'indent','blockQuote', 'alignment','|','link', 'horizontalLine','specialCharacters','|', '|','heading','|',    '|','-','fontSize', 'fontColor','|', 'SelectAll', 'findAndReplace', 'wproofreader', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '|','sourceEditing','undo', 'redo'],
                        
                         //items: ['bold', 'italic', 'strikethrough', 'underline', '|','numberedList','bulletedList','|','link','|','sourceEditing'],
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
                            editor.setData(form.data.pageContainer.pathwayDescription);
                            editor.model.document.on('change:data', (evt, data) => {
                                const editorData = editor.getData();    
                                form.getComponent(cid).setValue(editorData);
                            });
                        }
                        else if (formKey == 'pwc-section-details') {
                            editor.setData(form.data.sectiondetails.sectiondetailsDescription);
                            editor.model.document.on('change:data', (evt, data) => {
                                const editorData = editor.getData();    
                                form.getComponent(cid).setValue(editorData);
                            });
                        }
                        else if (formKey == 'pwc-sub-section-details') {
                            editor.setData(form.data.subSectiondetails.subSectiondetailsDescription);
                            editor.model.document.on('change:data', (evt, data) => {
                                const editorData = editor.getData();    
                                form.getComponent(cid).setValue(editorData);
                            });
                        }
                        else if (formKey == 'pwc-external-learning-object') {
                            editor.setData(form.data.page1ExternalLearningObject.loDescription);
                            editor.model.document.on('change:data', (evt, data) => {
                                const editorData = editor.getData();    
                                form.getComponent(cid).setValue(editorData);
                            });
                        }
                    })
                    .catch( error => {
                        console.error( error.stack );
                    });
                }
            }, 1000)
            
            /* ------ end ckeditor 5 -------*/          
        
                
             

            /*$('.external_content').removeClass('active');                                 
           // alert(customFilterValue);
             $('.pwc_settings').hide()               
             $('.proedge_catalog').hide()
             if(customFilterValue == 'yes') {
                 $('.pwc_settings').show()                   
                 //$('.external_content').addClass('active');
                 //$( ".external_content" ).trigger( "click" );                                          
             }else{
                 $('.external_content').addClass('active');
                 $( ".external_content" ).trigger( "click" );   
             }*/
            //$(".external_content").removeAttr("style");
             //$(".pagination .external_content span").html("Details");

             
             $(".btn-wizard-nav-cancel").hide();
             $(".btn-wizard-nav-previous").hide();
             $(".btn-wizard-nav-submit").hide();
             $(".formio-component-page3Cancel").hide();
             $(".formio-component-page3Submit").hide();
             $(".btn-wizard-nav-next").hide();
              
              
            
            
           
             
                
            
            if(formKey == 'pwc-create-pathway') {
                

                getCustomFilter(form_id);

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

                $("#submit").html("Save");
            }
            if(formKey == 'pwc-section-details') {
                
                $('#sectiondetailsCancel').addClass('secondary-btn');
                $('#submit').addClass('primary-btn');
                $(".formio-component-pathwayId").hide(); 
                $("#submit").html("Save");                      
            }  
            if(formKey == 'pwc-sub-section-details') {
                
                $('#subSectiondetailsCancel').addClass('secondary-btn');
                $('#submit').addClass('primary-btn');
                $(".formio-component-pathwayId").hide();  
                $(".formio-component-sectionId").hide(); 
                $("#submit").html("Save");                          
            }  
            if(formKey == 'pwc-external-learning-object') {
                
                $(".formio-component-pathwayId").hide(); 
                $(".formio-component-sectionId").hide(); 
                $('.formio-component-loHours .control-label').removeClass('field-required');
                $('.formio-component-loMinutes .control-label').removeClass('field-required');
                $(".btn-wizard-nav-cancel").hide(); 
                $(".btn-wizard-nav-previous").hide();
                $(".btn-wizard-nav-next").hide();
                                        
                $('#page1ExternalLearningObjectButtonCancel').addClass('secondary-btn');
                $('#submit').addClass('primary-btn');

                $('.pagination .page-item').each(function(i){
                    var text = $(this).text();                      
                    if(text == 'Proedge catalog'){
                       $(this).addClass('proedge_catalog d-none');
                    }
                    if(text == 'External content'){
                       $(this).addClass('external_content');
                    }
                    if(text == 'Custom filter'){
                       $(this).addClass('pwc_settings');
                       
                    }
                });
                $(".pagination .external_content span").html("Details");
                $('.pwc_settings').hide()   
                if(customFilterValue == 'yes') {
                 $('.pwc_settings').show() 
                }
                //alert(type_k);
                if(isMandatory == 3) {
                  $('.formio-component-thisMandatory').show();
                  $('.formio-component-page1ExternalLearningObjectContent4').show();    
                }else{
                  $('.formio-component-thisMandatory').hide();                        $('.formio-component-page1ExternalLearningObjectContent4').hide();                      
                } 
                $('.addToggle').find('label').addClass('switch')
                $('.addToggle').find('span').addClass('slider') 
                var toggleCom = ['formio-component-thisMandatory']
                var inct;
                for(inct = 0; inct < toggleCom.length; inct++) {
                    var toggleMsg = $('.'+toggleCom[inct]).find('.slider').text();
                    $('.'+toggleCom[inct]).find('.slider').html(`<p>${toggleMsg}</p>`)
                }                                   
            }  
            
        });             

    }).then(function () {
        scrollToTheTop();
        setTimeout(function () {
            $("#home-loader-overlay").hide();
        }, 2000);
        
    });
}

function scrollToTheTop() {
    $('.btn-wizard-nav-next').on('click', function () {
        $("html, body").animate({scrollTop: 0}, "slow");
    });
    $('.page-item').on('click', function () {
        $("html, body").animate({scrollTop: 0}, "slow");
    });
    $('.btn-wizard-nav-previous').on('click', function () {
        $("html, body").animate({scrollTop: 0}, "slow");
    });
}

function getFieldData(type,val){
    var d = '';
    $.ajax({
        url: $("#formData").attr("HTTP_SERVER") + "get-master-data?type="+type+"&org_id=1&val="+val,
        type: 'GET',
        async:false,
        success: function (response) {                   
            d = response;
        },
        error: function (err) {
            if (err.status == 401) {
                location.reload();
            }
        }
    });
    return d;
}


function getCustomFilter(formId) {

    var actionUrl = $("#formData").attr("getFormCustomFilterUrl");
    
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: {formId: formId}, // serializes the form's elements.
        success: function(data)
        {
            if(data.success) {
                
                var inc;
                for(inc = 0; inc < data.getFilterRes.length; inc++) {

                    var insertedId = data.getFilterRes[inc].custom_filter_id;
                    var customFilterName = data.getFilterRes[inc].title;
                    var customFilterValue = data.getFilterRes[inc].is_enable;
                    var valYes = '';
                    if(customFilterValue == '1') {
                        valYes = 'checked';
                    }
                    else {
                        valYes = '';
                    }
                    var showData = `
                        <div class="customFilterShowRecord" id="cfilter-${insertedId}" filId="${insertedId}"  filName="${customFilterName}">
                            <label class="control-label form-check-label switch cus-filter-pathway">
                                <input type="checkbox" name="${insertedId}" value="1" ${valYes}>
                                <span class="slider">
                                    <p id="fil-${insertedId}">${customFilterName}</p>
                                </span>
                            </label>
                            <a class="editCustomFilter" filterId="${insertedId}"> <i class="edit-btnbar"></i> Edit</a> 
                            <a class="deleteCustomFilter" filterId="${insertedId}"> <i class="delete-btnbar"></i> Delete</a>
                        <div>`;
                    $('#showCustomFilterDiv').append(showData);
                }
            }
        }
    });
}

function selectFilterValue(name, value) {     
   //var name = '@@' + name + '--' + value;    
   //alert(name);
   //document.getElementById("Selectedfilter").setAttribute('value', name);
   var actionUrl = $("#formData").attr("saveFilterValueUrl"); 
   $.ajax({         
        type: "POST",
        url: actionUrl,
        data: {form_id:form_id,name:name,value:value},
        success: function(data)
        {
            if(data.success) {

            }
        }
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

        var actionUrl = $("#formData").attr("deleteCustomFilterUrl");
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: {filterId:filterId},
            success: function(data)
            {
                if(data.success) {

                }
            }
        });
    }
})
        
$(document).on('click', 'button.back-btn', function(e){
    e.preventDefault();
    window.history.back();
}); 
        
     
        
