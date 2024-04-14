const name = document.querySelector(".name");

function openProfile(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_s.php");
    }
    else {
        window.location.replace("../unsigned_user/profile_us.html");
    }
}

function openProfilePhotos(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_photos_s.html");
    }
    else {
        window.location.replace("../unsigned_user/profile_photos_us.html");
    }
}


function openProfileFeatures(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_features_s.php");
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
    window.location.replace("C:/Users/azgel/Desktop/OSPanel/domains/localhost/pitomchiki/log_out.php");
}