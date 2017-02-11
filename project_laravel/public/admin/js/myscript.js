/**
 * Created by Administrator on 05/02/2017.
 */
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });

    // tìm đến div alert delay 5s
    $("div.alert").delay(5000).slideUp();
});

function xacnhanxoa(msg) {
    if(window.confirm(msg)){
        return true;
    }
    else{
        return false;
    }

}