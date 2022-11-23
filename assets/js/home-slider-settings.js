/**************************/
//CAROUSEL SETTINGS 
/**************************/
window.keenWhenReady(function(){
  var sliderElement = document.getElementById("home_slider")
  if(sliderElement){
  var interval = 0;
  function autoplay(run) {
    clearInterval(interval)
    interval = setInterval(() => {
      if (run && slider) {
        slider.next();
      }
    }, 10000 ) //10000 
  }

  var slides=sliderElement.querySelectorAll('.keen-slider__slide');
  var slider = new KeenSlider(sliderElement, {
    loop: true,
    duration: 1000,
    dragStart: () => {
      autoplay(false);
    },
    dragEnd: () => {
      autoplay(true);
    },
    afterChange:(s)=>{
      //console.log(s);
    },
    move: (s) => {
      var opacities = s.details().positions.map((slide) => slide.portion);
      slides.forEach((s, idx) => {
        if(opacities[idx] > .5 &&  !s.classList.contains('active')){
          s.classList.add('active');
        }else if(opacities[idx] < .5 &&  s.classList.contains('active')){
          s.classList.remove('active');
        }
        if(opacities[idx] > .1 &&  !s.classList.contains('show')){
          s.classList.add('show');
        }else if(opacities[idx] < .1 &&  s.classList.contains('show')){
          s.classList.remove('show');
        }
        s.style.opacity = opacities[idx];
        s.style.transform = '';
        s.style['-webkit-transform'] = '';
      });
    }
  });

  sliderElement.addEventListener("mouseover", () => {
    autoplay(false);
  })
  sliderElement.addEventListener("mouseout", () => {
    autoplay(true);
  })
  setTimeout(()=>autoplay(true),5000);
  }
});
