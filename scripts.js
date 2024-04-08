const name = document.querySelector(".name");

function openProfilePhotos(signed) {
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

function saveChanges() {
    
}