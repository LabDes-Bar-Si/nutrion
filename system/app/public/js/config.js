var config = {
    'require' : function(namefile){
        var src = "/nutrion/system/app/public/js/" + namefile;
        jQuery("main").after("<script type='text/javascript' src='" + src + ".js'></script>");
    }
}