function changeComponentDynamicURL(form, componentKey,dynamic_url){	
    var fieldComponent = form.getComponent(componentKey);
    if(fieldComponent != null){			
        var fieldComponentArr = fieldComponent.component.data.url.split("?");			
        var druIndex = eval(fieldComponentArr.length)-1;
        if(druIndex >= 0 && druIndex !=''){
            fieldComponent.component.data.url = $('#getConstant').attr('HTTP_SERVER')+""+dynamic_url+"?"+fieldComponentArr[druIndex];	
        }else{
             fieldComponent.component.data.url = $('#getConstant').attr('HTTP_SERVER')+""+dynamic_url;
        }
    }
}

