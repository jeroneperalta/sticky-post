# sticky-post
A sticky, random post plugin for WordPress.

### Instructions

1. Upload the downloaded file
2. Shortcode syntax:

    [sticky_post post_type="**$post**" theme="**$theme**"]

     Option | Type | Description | Defaults | e.g.
     ------------ | ------------- | ------------- | ------------- | -------------
     $post_type | String | The Post Type Slug | ```post``` | ```testimonial```
     $theme |  light \| dark | Switch between light & dark theme | ```light``` | ```dark```
     
     **Usage:** ```<?php echo do_shortcode( '[sticky_post post_type="post" theme="dark"]' ); ?>```

3. Paste it inside ```<body>``` tag.

   _* parent wrapper should have a css property of ```position: relative;```_
   
   _* Desktop = maximized display; Mobile = minimized display_

### Extra Fields
In your current post type, you can add 2 extra [**custom fields**](https://www.advancedcustomfields.com/) namely ```location```_(string)_ and ```rating```_(int)_.
Sticky Post will then display those values.
