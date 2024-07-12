<div class="gallery-container flex flex-col gap-4 bg-green-700 w-full h-[600px] md:h-[600px]">
    <div class="full-image-container h-4/5 w-full bg-red-700">
        <img src={{ $product1->img_path[0] }} class="w-full h-full bg-no-repeat bg-cover object-cover rounded-2xl"/>
    </div>
    <div class="image-list-container bg-pink-600 overflow-x-scroll flex gap-4 w-full h-1/6 md:h-1/5">
        @foreach ($product1->img_path as $index => $image)
            <img src={{ $image }} class="h-full rounded-xl"/>
        @endforeach
    </div>
</div>

<script>
    let currentImage_Id = 0
</script>