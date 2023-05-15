//<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  //const heartIcon = document.querySelector('.heart-icon');
//   heartIcon.addEventListener('click', () => {
//     const icon = heartIcon.querySelector('i');
//     if (icon.classList.contains('fa-heart')) {
//       icon.classList.remove('fa-heart');
//       icon.classList.add('fa-solid');
//     } else {
//       icon.classList.remove('fa-solid');
//       icon.classList.add('fa-heart');
//     }
//   });

const heartLink = document.querySelector('.heart-link');
heartLink.addEventListener('click', () => {
  heartLink.classList.toggle('clicked');
});