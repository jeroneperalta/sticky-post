# sticky-post
A sticky, random post plugin for WordPress

### Requirements
* [Bootstrap 4](https://getbootstrap.com/)
* [Fontawesome 5](https://fontawesome.com/)

### Usage

1. Download and extract
2. Move the extracted folder (sticky-post-master) in **wp-content/plugins**
3. Use the shortcode below:
###### via WYSIWYG
```[ sticky_post $post_type ]```

###### via PHP
```<?php echo do_shortcode( '[ sticky_post $post_type ]' ); ?>```

> where **$post_type** is the **Post Type Slug**
