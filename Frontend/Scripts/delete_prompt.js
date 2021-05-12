
function del_user(user_id, user_name, url){
    if (confirm("Are you sure you want to delete '" + user_name + "'")){
        // return true;
        // window.location.href = '../delete.php?teacher=' + user_id;
        window.location.href = url + user_id;
    }else{
        return false;
    }
}