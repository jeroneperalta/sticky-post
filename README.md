# sticky-post
A sticky, random post plugin for WordPress.

### Usage

1. Download
2. Upload the downloaded file
3. Use the shortcode ```<?php echo do_shortcode( '[sticky_post $post_type $theme]' ); ?>```

     Option | Type | Description | Defaults | e.g.
     ------------ | ------------- | ------------- | ------------- | -------------
     $post_type | String | The Post Type Slug | ```post``` | ```testimonial```
     $theme |  light \| dark | Your desired color theme | ```light``` | ```dark```
     
     **e.g.** ```<?php echo do_shortcode( '[sticky_post testimonial dark]' ); ?>```

4. Paste it before ```<header></header>``` in your **header.php**

   _* parent wrapper should have a css property of ```position: relative;```_

### Extra Fields
In your current post type, you can add 2 extra **custom fields** namely ```location```_(string)_ and ```rating```_(int)_.
Sticky Post will then display those values.
