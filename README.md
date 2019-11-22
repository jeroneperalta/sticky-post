# sticky-post
A sticky, random post plugin for WordPress.

### Instructions

1. Download
2. Upload the downloaded file
3. Shortcode syntax:

    [sticky post_type="**$post**" theme="**$theme**"]

     Option | Type | Description | Defaults | e.g.
     ------------ | ------------- | ------------- | ------------- | -------------
     $post_type | String | The Post Type Slug | ```post``` | ```testimonial```
     $theme |  light \| dark | Switch between light & dark theme | ```light``` | ```dark```
     
     **Usage:** ```<?php echo do_shortcode( '[sticky_post post dark]' ); ?>```

4. Paste it inside ```<body>``` tag.

   _* parent wrapper should have a css property of ```position: relative;```_

### Extra Fields
In your current post type, you can add 2 extra [**custom fields**](https://www.advancedcustomfields.com/) namely ```location```_(string)_ and ```rating```_(int)_.
Sticky Post will then display those values.
