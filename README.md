## Taekwondo Theme

- Flexbox and CSS Grid Wordpress Theme, chunks of functionality is broken down into smaller components.
  Uses object-fit: cover and does not provide fall back for older browsers at this point.

## Live Demo

Avalible at: [nicklasbryntesson.se](https://taekwondo.nicklasbryntesson.se)

All live demo images captured and edited by Nicklas Bryntesson.

### Requirements

- Requires mu-plugin - "Instructors" custom post types avalible at: [Instructors-Post Type](https://github.com/nicklas-bryntesson/Assets/blob/main/Taekwondo%20Theme%20Assets/mu-plugins/instructors.php) to fully function.

- Heavy use of Advanced Custom Fields Pro in page-templates: frontpage.php, page-instructors.php and single-instructor.php.
  The files work without the plugin and defaults to page.php markup if ACF Pro is not installed
  ACF JSON field data is avalible at: [Taekwondo ACF Pro.json](https://github.com/nicklas-bryntesson/Assets/blob/main/Taekwondo%20Theme%20Assets/tkd-acf.json)

```html
<article class="hentry">
  <header class="entry-header">
    <h2 class="entry-title">
      <a>Title</a>
    </h2>

    <div class="entry-meta">
      Posted On
    </div>
    <!-- .entry-meta -->
  </header>
  <!-- .entry-header -->

  <div class="entry-content"></div>
  <!-- .entry-content -->

  <footer class="entry-footer">
    <span class="cat-links">Posted in <a>Categories</a></span>
    <span class="tags-link">Tagged <a>Tags</a></span>
    <span class="comments-link"></span>
    <span class="edit-link"></span>
  </footer>
  <!-- .entry-footer -->
</article>
<!-- .hentry -->
```
