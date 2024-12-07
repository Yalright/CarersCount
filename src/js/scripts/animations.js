// window.addEventListener('DOMContentLoaded', () => {

//   // INTERSECTION OBSERVER API

// const observerOptions = {
//   root: null, // Null = based on viewport
//   rootMargin: "0px", // Margin for root if desired
//   threshold: 0.5 // Percentage of visibility needed to execute function
// };

// function observerCallback(entries, observer) {
//   entries.forEach(entry => {
//     if (entry.isIntersecting) {
//       // Fade in observed elements that are in view
//       entry.target.classList.add('fadeIn');
//     }
//     // else {
//     //   // Fade out observed elements that are not in view
//     //   entry.target.classList.replace('fadeIn', 'fadeOut');
//     // }
//   });
// }

// // Grab all relevant elements from DOM
// const animateOne = document.querySelectorAll('.guten-block');
// const animateTwo = document.querySelectorAll('header, footer');

// // Call function for each element
// const observer = new IntersectionObserver(observerCallback, observerOptions);
// animateOne.forEach(el => observer.observe(el));
// animateTwo.forEach(el => observer.observe(el));



// });