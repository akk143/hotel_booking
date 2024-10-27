<style>
   .gallery_img img{
      height: 250px;
      width: 100%;
      object-fit: cover;
   }
</style>

<div class="gallery">
   <div class="container">

      <div class="row">
         <div class="col-md-12">
            <div class="titlepage text-center mb-4">
               <h2>Gallery</h2>
            </div>
         </div>
      </div>

      <div class="row">
        @foreach ($galleries as $gallery)
          <div class="col-md-4 col-sm-6 mb-4">
             <div class="gallery_img">
                <img src="/gallery/{{$gallery->image}}" class="img-fluid rounded" alt="Gallery Img" />
             </div>
          </div>
        @endforeach
      </div>
      
   </div>
</div>

