function changeImage(imageSrc) {
    document.getElementById('displayed-image').src = imageSrc;
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(thumb => thumb.classList.remove('active'));
    event.target.classList.add('active');
}