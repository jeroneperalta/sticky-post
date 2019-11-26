# sticky-post
A sticky, random post plugin for WordPress.

### How to use

1. Upload the downloaded file
2. Shortcode syntax:

    [sticky_post post_type="**$post**" theme="**$theme**"]

     Option | Type | Description | Defaults | e.g.
     ------------ | ------------- | ------------- | ------------- | -------------
     $post_type | String | The post type slug | ```post``` | ```testimonial```
     $theme |  light \| dark | Switch between light & dark theme | ```light``` | ```dark```
     
     **Usage:** ```<?php echo do_shortcode( '[sticky_post post_type="post" theme="dark"]' ); ?>```

3. Paste it before ending ```</body>``` tag.

   _* sticky-post plugin adds ```position: relative;``` property to its parent_

### Display

* on Desktop = maximized display
    
* on Mobile = minimized display

### Extra Fields
In your current post type, you can add 2 extra [**custom fields**](https://www.advancedcustomfields.com/) namely ```location```_(string)_ and ```rating```_(int)_.
Sticky Post will then display those values.
