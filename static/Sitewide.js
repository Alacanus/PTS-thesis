    var submitcnt = 0;
    var submitcnt2 = 0;

$(document).ready(function(){
    $('form').submit(function(e){

        submitcnt++;
        if(submitcnt > 1){
            console.log('submit prevented, please let the page load');
            alert('form submited, please let the page reload');
            e.preventDefault();
        }
    })
    $('form2').submit(function(e){

        submitcnt2++;
        if(submitcnt > 1){
            console.log('submit prevented, please let the page load');
            alert('form submited, please let the page reload');
            e.preventDefault();
        }
    })
})
