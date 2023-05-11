const urlField = document.querySelector(".field input"),
previewArea = document.querySelector(".preview-area"),
imgTag = previewArea.querySelector(".thumbnail");
hiddenInput = previewArea.querySelector(".hidden-input");

urlField.onkeyup = () => {
    let imgUrl = urlField.value;
    previewArea.classList.add("active");

    if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
        let vidId = imgUrl.split("v=")[1].substring(0, 11);
        let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytThumbUrl;
    } else if (imgUrl.indexOf("https://youtu.be/") != -1) {
        let vidId = imgUrl.split("be/")[1].substring(0, 11);
        let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytThumbUrl;
    } else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
        imgTag.src = imgUrl;
    } else {
        previewArea.classList.remove("active");
        imgTag.src = "";
    }
    hiddenInput.value = imgTag.src;
}