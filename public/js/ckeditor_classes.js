 class CkeditorInit {

	constructor() {

	}

	insertEditorScript() {

		var baseUrl = $('#dynamicUrlGen').attr('url');
		var externalScript = document.createElement( 'script' );
    	externalScript.setAttribute( 'src',baseUrl+'js/ckeditor/ckeditor.js' );
    	externalScript.setAttribute("type", "text/javascript");
    	document.head.appendChild( externalScript );
	}

	replaceWithCkeditor(textareaname) {

		CKEDITOR.replace(textareaname)
		CKEDITOR.config.toolbar = 'Full';
	    CKEDITOR.config.toolbar_Full =
	    [
	        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','RemoveFormat' ] },
	        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
	        '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	        { name: 'insert', items : [ 'Image','HorizontalRule','Smiley','SpecialChar' ] },
	        '/',
	        { name: 'styles', items : [ 'Format','FontSize' ] },
	        { name: 'colors', items : [ 'TextColor','BGColor' ] },
	        { name: 'snddocument', items : [ 'Source' ] },
	        { name: 'clipboard', items : [ 'Undo','Redo','Paste','PasteText','PasteFromWord' ] },	
            { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },			
	    ];
	}

	getDataFromEditor(textareaname){

		return  CKEDITOR.instances[textareaname].getData();
	}

	setDataViewMode(textareaname, setdata) {

        CKEDITOR.instances[textareaname].setData(setdata);
        CKEDITOR.config.readOnly = true;
	}

	changeEvent(textareaname, formCusData) {
		var self = this;
		CKEDITOR.instances[textareaname].on('change', function() {
			formCusData.getComponent(textareaname).setValue(self.getDataFromEditor(textareaname));
			console.log('test', formCusData.getComponent(textareaname).getValue().length)
			if(!self.getDataFromEditor(textareaname)) {
				formCusData.getComponent('currdesccheck').setValue('')
				$('.formio-component-curriculumDescription').addClass('has-error'); 
                $('.formio-component-curriculumDescription').find('.formio-errors').html('<div class="form-text error" id="curriculumDescriptionError" tabindex="-1" aria-hidden="true">Curriculum description is required</div>')
			}
			else {
				formCusData.getComponent('currdesccheck').setValue('1')
				$('.formio-component-curriculumDescription').addClass('has-error'); 
                $('.formio-component-curriculumDescription').find('.formio-errors').html('')
			}
		});
	}

	changeEventTextarea(textareaname, formCusData) {
		var self = this;
		CKEDITOR.instances[textareaname].on('change', function() {
			formCusData.getComponent(textareaname).setValue(self.getDataFromEditor(textareaname));
			//console.log('test2', formCusData.getComponent(textareaname).getValue().length)
		});
	}

}

