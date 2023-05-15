const mainImage = document.querySelector('#mainImage');
smallImages.forEach(function(img) {
  img.addEventListener('click', function() {
    mainImage.src = this.src;
  });
});