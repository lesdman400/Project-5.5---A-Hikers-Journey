// Page Load grab user info and save in cache. Update daily?
// TODO:
function addReadMore(){
    jQuery("section .section__overflow").each(function(index, item){
        let id = jQuery(this).parent()[0].id;
        let section = jQuery(this)[0].firstElementChild.id;
        jQuery("#"+id+" .section__show-more").remove();
        sessionHelper.addReadMore(id, section);
    });
}

var timeout;
window.onresize = function(){
  clearTimeout(timeout);
  timeout = setTimeout(addReadMore, 500);
};