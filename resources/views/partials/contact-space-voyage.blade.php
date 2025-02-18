<style>
  #contact-wrap {
    position: relative;
  }
  #contact {
    background-image:url(https://spaceracedigital.com/wp-content/uploads/2024/06/Vostok3.jpg);
    background-size: 100%;
    animation: play 80s steps(1000) forwards;
} 
    @keyframes  play {
   from { 
  background-size: 100%;
   
   }
     to { background-size: 400%;
      }
}

  
</style>
<div id="contact-wrap" class="bg-black">
<div id="contact" class="bg-black">
  @php echo do_shortcode('[contact-form-7 id="7110611" title="Contact form 1"]') @endphp
  <h1>hello></h1>
  </div></div>