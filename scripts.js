const name = document.querySelector(".name");

function openProfile(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_s.php");
    }
    else {
        window.location.replace("../unsigned_user/profile_us.php");
    }
}

function openProfilePhotos(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_photos_s.php");
    }
    else {
        window.location.replace("../unsigned_user/profile_photos_us.php");
    }
}

function openProfileFeatures(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_features_s.php");
    }
    else {
        window.location.replace("../unsigned_user/profile_features_us.php");
    }
}

function openProfileReviews(signed) {
    if (signed) {
        window.location.replace("../signed_user/profile_reviews_s.php");
    }
    else {
        window.location.replace("../unsigned_user/profile_reviews_us.php");
    }
}

function logOut() {
    window.location.replace("C:/Users/azgel/Desktop/OSPanel/domains/localhost/pitomchiki/log_out.php");
}

function fileInputClick() {
    alert('click handled');
    $("#fileInput").click();
}