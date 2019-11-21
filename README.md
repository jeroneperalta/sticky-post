# sticky-post
A sticky, random post plugin for WordPress

### Requirements
* [Bootstrap 4](https://getbootstrap.com/)
* [Fontawesome 5](https://fontawesome.com/)

### Usage

1. Download and extract
2. Upload the downloaded file
3. Use the shortcode below:

* via **WYSIWYG**
```[ sticky_post $post_type ]```

* via **PHP** 
```<?php echo do_shortcode( '[ sticky_post $post_type ]' ); ?>```

### Reminders
* where ``$post_type`` is the **Post Type Slug**
* parent wrapper should have a css property of 
```position: relative;```
