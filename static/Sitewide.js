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


document.querySelector("#show-editprofile").addEventListener("click", function(){
    // document.querySelector(".edit-profile").classList.add("active"); 
    $(document).ready(function(){ $('.edit-profile').modal('show'); });
});

document.querySelector(".edit-profile .close-btn").addEventListener("click", function(){
    document.querySelector(".edit-profile").classList.remove("active");
});

// function onoverlay() {
//     document.getElementById("overlaybg-hidden").style = "block";
// }

// function offoverlay() {
//     document.getElementById("overlaybg-hidden").style = "none";
// }

function upload_progress() 
{
    var formdata = new formdata();
    var userfiles = document.getElementsByName("videoFile");
    for(var i =0; i < userfiles.length; i++){
        if(file){
            formdata.append("file_"+i, file);
        }
    }
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeProgress, false);
    ajax.open("POST", "/../src/loggedin/youtube.php")
}

function progressHandler(event){
    _("load_total").innerHTML = "Uploaded "+event.loaded+" bytes of " +event.total;
    var percent = (event.loaded / event.total)*100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeProgress(event){
    _("load_total").innerHTML = "Uploaded "+event.loaded+" bytes of " +event.total;
    var percent = (event.loaded / event.total)*100;
    _("progressBar").value = 0;
    _("status").innerHTML = event.target.responseText;
}


