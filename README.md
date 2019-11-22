# sticky-post
A sticky, random post plugin for WordPress.

### Usage

1. Download
2. Upload the downloaded file
3. Use the shortcode ```<?php echo do_shortcode( '[sticky_post $post_type $theme]' ); ?>```

     Option | Type | Description
     ------------ | ------------- | -------------
     $post_type | String |  Default: ```post``` <br> The Post Type Slug. <br> e.g. ```testimonial```
     $theme | "light \| "dark" | Default: ```light``` <br> Desired color theme. <br> e.g. ```dark```

4. Paste it before ```<header></header>``` in your **header.php**

### Reminders
* parent wrapper should have a css property of 
```position: relative;```

