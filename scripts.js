const name = document.querySelector(".name");

function openProfilePhotos(signed) {
    alert('profile');
    if (signed) {
        window.location.replace("../signed_user/profile_photos_s.html");
    }
    else {
        window.location.replace("../unsigned_user/profile_photos_us.html");
    }
}

function openProfile(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_s.html");
    }
    else {
        window.location.replace("../unsigned_user/profile_us.html");
    }
}

function openProfileFeatures(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_features_s.html");
    }
    else {
        window.location.replace("../unsigned_user/profile_features_us.html");
    }
}

function openProfileReviews(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_reviews_s.html");
    }
    else {
        window.location.replace("../unsigned_user/profile_reviews_us.html");
    }
}

function logOut() {
    // window.location.replace("../unsigned_user/profile_reviews_s.html");
    // alert('successfull');
    alert('successful');
    window.location.replace("C:/Users/azgel/Desktop/OSPanel/domains/localhost/pitomchiki/log_out.php");
}