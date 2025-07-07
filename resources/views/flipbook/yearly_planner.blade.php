<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/flipbook.css')}}" />
         <style>
             .page-image-wrapper {
  position: relative;
}
.clip-icon {
  position: absolute;
  top: 8px;
  right: 8px;
  background: white;
  border: 1px solid #ccc;
  cursor: pointer;
  padding: 4px;
  border-radius: 4px;
}
            body {
      background: #f5f5f5;
      font-family: sans-serif;
      text-align: center;
      padding: 200px;
    }
    #demoBookExample {
      margin: auto;
      max-width: 1000px;
    }
    .page img {
      width: 100%;
      height: auto;
      display: block;
    }

         </style>

    </head>
    <body>
<div class="container">
   <h2>Yearly Academic Planner</h2>

  <div id="demoBookExample">
    @for ($i = 1; $i <= 6; $i++)  {{-- Change to match your total number of images --}}
      <div class="page">
        @php
            $index = str_pad($i, 4, '0', STR_PAD_LEFT); // Pads to 0001, 0002, ...
            $imgPath = "frontend/assets/images/Yearly_Planner/Yearly_Planner_page-{$index}.jpg";
        @endphp
        <img src="{{ asset($imgPath) }}" alt="Page {{ $i }}">
      </div>
    @endfor
  </div>

</div>

        <script src="https://unpkg.com/page-flip/dist/page-flip.browser.min.js"></script>
  <script src="{{ asset('frontend/assets/js/page-flip.browser.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/page-flip.module.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/copper.js')}}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {

    const pageFlip = new St.PageFlip(
        document.getElementById("demoBookExample"),
        {
            width: 550, // base page width
            height: 400, // base page height

            size: "stretch",
            // set threshold values:
            minWidth: 315,
            maxWidth: 1000,
            minHeight: 420,
            maxHeight: 1350,

            maxShadowOpacity: 0.5, // Half shadow intensity
            showCover: true,
            mobileScrollSupport: false // disable content scrolling on mobile devices
        }
    );

    // load pages
    pageFlip.loadFromHTML(document.querySelectorAll(".page"));

    document.querySelector(".page-total").innerText = pageFlip.getPageCount();
    document.querySelector(
        ".page-orientation"
    ).innerText = pageFlip.getOrientation();

    document.querySelector(".btn-prev").addEventListener("click", () => {
        pageFlip.flipPrev(); // Turn to the previous page (with animation)
    });

    document.querySelector(".btn-next").addEventListener("click", () => {
        pageFlip.flipNext(); // Turn to the next page (with animation)
    });

    // triggered by page turning
    pageFlip.on("flip", (e) => {
        document.querySelector(".page-current").innerText = e.data + 1;
    });

    // triggered when the state of the book changes
    pageFlip.on("changeState", (e) => {
        document.querySelector(".page-state").innerText = e.data;
    });

    // triggered when page orientation changes
    pageFlip.on("changeOrientation", (e) => {
        document.querySelector(".page-orientation").innerText = e.data;
    });
});
  </script>
  <script>
let cropper;

document.querySelectorAll('.clip-icon').forEach(btn => {
  btn.addEventListener('click', function () {
    const imgSrc = this.getAttribute('data-img');
    const img = document.getElementById('cropperImage');
    img.src = imgSrc;

    // Show modal
    document.getElementById('cropperModal').style.display = 'flex';

    // Wait for image to load before creating cropper
    img.onload = () => {
      if (cropper) cropper.destroy();
      cropper = new Cropper(img, {
        viewMode: 1,
        aspectRatio: NaN,
        autoCropArea: 1
      });
    };
  });
});

document.getElementById('cropSaveBtn').addEventListener('click', () => {
  if (!cropper) return;
  const canvas = cropper.getCroppedCanvas();
  const croppedDataUrl = canvas.toDataURL();

  // Optionally replace original or do something with croppedDataUrl
  console.log('Cropped Image URL:', croppedDataUrl);
  closeCropper();
});

function closeCropper() {
  if (cropper) {
    cropper.destroy();
    cropper = null;
  }
  document.getElementById('cropperModal').style.display = 'none';
}
</script>


    </body>
</html>