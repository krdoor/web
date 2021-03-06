<div class="image twolines">

    <div id="map"></div>

     <?php
        $imageFile = App::make("Controllers\ImageController")->getLatestImage();

        if($imageFile)
        {
            $image = Image::make($imageFile['path']);
            $src = $imageFile['src'];
        }
        else
        {
            // fake an image
            $image = Image::canvas(800, 640);
            $src = '';
        }
    ?>

    <script type="text/javascript">

        // Select two lines
        require([_jsBase + 'main.js'], function(common)
        {
            require(["app/controllers/twolines"], function(twolines)
            {
                twolines.setElement($(".twolines #map"));
                twolines.setImage("{{$src}}");
                twolines.setImageSize("{{$image->width()}}","{{$image->height()}}");
                twolines.setCoordinates("{{$value}}");
                twolines.setName("{{$file."__".$attribute}}");
                twolines.initialize();
            });
        });

    </script>
</div>