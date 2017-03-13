# Envisionary-Starter-Theme-2017

General HTML Structure

- #wrapper.off-canvas-wrapper (used for fade in on load)
    - .off-canvas-wrapper-inner (foundation adds classes to this element for off-canvas menu)
        - .off-canvas
            - ul#menu-top-navigation
        - .off-canvas-content
            - header#scrollheader (optional short header on scroll)
            - header#header
                - #top-bar-menu.top-bar.row
                    - .top-bar-left
                        - a > h1/h2 > img
                    - nav.top-bar-right (show for widths X and up)
                        - ul#menu-top-navigation-1
                    - .top-bar-right.menu-toggle (hide for widths X and up)
                        - ul.toggle-icon
                            - a > span.menu-icon
            - main
                - header#page_header or #page_slider
                    - static image or slider or custom content
                - #content.row
                    - #inner-content
                        - article (class - post, page, resource, etc)
                            - header.article-header
                                - h1/h2
                                - date and author info
                            - section.entry-content
                                - featured image
                                - all text content styled here (i.e.. anchor tags underlined)
                            - footer.article-footer
                                - taxonomy lists
                                - recommended posts
                - #cta (optional global editor area for marketing)
            - footer#footer
                - .row
                    - copyright
                    - social media
                    - footer menu

Functionality

Default:
Fixed (change on scroll) or Static Header
Customized Homepage

- static header image with positionable text
- shortcode field

Default Page Template

- static header image or shortcode field
- Foundation element shortcodes for editor

Right Sidebar Page Template

- static header image or shortcode field
- Foundation element shortcodes for editor
- general widgets styles

Left Sidebar Page Template

- static header image or shortcode field
- Foundation element shortcodes for editor
- general widgets styles

Full Width Template

- empty edge-to-edge for use with Visual Composer

Contact Page with Map in Header
     Separate script and use AJAX to get server data: http://stackoverflow.com/questions/23740548/how-to-pass-variables-and-data-from-php-to-javascript
Global Elements

- Visual Composer elements styled
- Gravity Forms Styled
- Styles for Hubspot forms (button specifically)
- Common Social Media Buttons
- Editor Section Above Footer
- Editable Client Contact info

Styled Page Navigation
Widget-capable Sidebar
Custom 404 Page

Special Functions/Features:

- html5 shiv
- ???modernizer
- no-js class removed with js
- fade in on load
- stop css animations on load
- prevent FLOUC
- load-with-js class - fade in on load
- fadein class - show on scroll
- skip nav link
- wf-loading class (hide content until Typeset loads)
- Foundation Equalizer works after Typekit, etc loads
- flexbox for equal heights
- move Yoast to bottom
- hide ACF menu
- code for ACF option page
- Gravity Forms indexing
- Images swap per device/page-width
- Image max-width option is size dropdown of media library
- Lightbox on clickable images
- CSS and JS is minified
- Translation-ready
- Schemas
- ARIA
- Styled Admin Login
- Cleaned up admin
- env_field functions for ACF
- starter theme content
- plugins packaged?
- script section in footer, editable in Global Section
- preview image for Facebook, etc

Add-Ons:

- Search
    - Customize Form
    - Search Results Page
        - Use Relevansii
        - Show number of results
        - Display
            - Linked Title
            - Blurb
            - If Post or News: Date
            - If Event: Date & Location
            - If Staff: Job Title
- Blog
    - Post type: thumbnail sizes, display featured function and shortcode
    - Feed as list (for main and archives, custom header image)
        - Taxonomies (show selected on archives)
            - slide-sort taxonomy drop-down (no-pagination)
            - ajax reload taxonomy drop-down with infinite scroll/pagination
            - slide-sort taxonomy tabs
            - ajax reload taxonomy tabs
        - Posts include:
            - Linked Title
            - Post date
            - Post author
            - Featured Image (zoom on hover)
            - Blurb
            - Comma-Separated Linked Taxonomy Lists
            - Read More Button
    - Single
        - Custom Header Image
        - Title
        - Date
        - Author
        - Featured Image
        - Content
        - Comma-Separated Linked Taxonomy Lists
        - Recommended Posts
        - Comments
- Resources
    - Post type: thumbnail sizes, display featured function and shortcode
    - Feed as list and for masonry block (for main and archives, custom header image)
        - Taxonomies (show selected on archives)
            - slide-sort taxonomy drop-down (no-pagination)
            - ajax reload taxonomy drop-down with infinite scroll/pagination
            - slide-sort taxonomy tabs
            - ajax reload taxonomy tabs
        - Posts include (link to Hubspot or Single):
            - Linked Title
            - Custom Header Image
            - Featured Image (zoom on hover)
            - Blurb
            - Comma-Separated Linked Taxonomy Lists
            - Read More Button or Download Button (no clickthrough)
    - Single post (“Featured?” option)
        - Custom Header Image
        - Title
        - Featured Image
        - Content
        - Download Button
        - Comma-Separated Linked Taxonomy Lists
        - Recommended Posts
- Events Feed
    - Post type: thumbnail sizes, display list function, display featured function and shortcode
    - Feed as list (for main and archives, custom header image) …show in order from today
        - Taxonomies (show selected on archives)
            - slide-sort taxonomy drop-down (no-pagination)
            - ajax reload taxonomy drop-down with infinite scroll/pagination
            - slide-sort taxonomy tabs
            - ajax reload taxonomy tabs
        - Posts include:
            - Linked Title
            - Event Date
            - Event Location
            - Featured Image (zoom on hover)
            - Blurb
            - Comma-Separated Linked Taxonomy Lists
            - Read More Button
    - Single post
        - Custom Header Image
        - Title
        - Event Date
        - Event Location
        - Featured Image
        - Content
        - Comma-Separated Linked Taxonomy Lists
        - Recommended Posts
- News
    - Post type: thumbnail sizes, display list function, display featured function and shortcode
    - Feed as list (custom header image)
        - Posts include:
            - Linked Title
            - News Date
            - Featured Image (zoom on hover)
            - Blurb
            - Read More Button
    - Single post
        - Title
        - News Date
        - Featured Image
        - Content
        - Latest News Feed
- Staff
    - Post type: thumbnail sizes, display featured function and shortcode
    - Feed as masonry grid (for main and archive)
        - Taxonomies (show selected on archives)
            - slide-sort taxonomy drop-down (no-pagination)
            - ajax reload taxonomy drop-down with infinite scroll/pagination
            - slide-sort taxonomy tabs
            - ajax reload taxonomy tabs
        - Posts include:
            - Linked Name
            - Job Title
            - Featured Image (zoom on hover)
            - Blurb
            - Comma-Separated Linked Taxonomy Lists
            - Read More Button
    - Single post
        - Name
        - Start Date
        - Job Title
        - Department
        - Featured Image (zoom on hover)
        - Content
        - Download Link
        - LinkedIn Link
        - Comma-Separated Linked Taxonomy Lists
        - Read More Button
- Image Portfolio
    - Post type: thumbnail sizes, display featured function and shortcode
    - Feed as block grid or masonry grid (for main and archives, title bar / no header image)
        - Taxonomies (show selected on archives)
            - slide-sort taxonomy drop-down (no-pagination)
            - ajax reload taxonomy drop-down with infinite scroll/pagination
            - slide-sort taxonomy tabs
            - ajax reload taxonomy tabs
        - Posts include:
            - Linked Name
            - Featured Image (zoom on hover, light box or click-through links)
            - Read More Button
    - Single post (title bar / no header image)
        - Name
        - Featured Images Slider (with light box)
        - Video option
        - Content
        - Comma-Separated Linked Taxonomy Lists
        - Recommended Posts
- WooCommerce Integration
    - Include product variation meta search patch

Plugins:

- Advanced Custom Fields Pro (required)
- Yoast SEO
- Gravity Forms (see notes below)
- Visual Composer (see notes below)
- MasterSlider
- TinyMCE Advanced (see notes below)
- Advanced Responsive Video Embedder + Shortcode UI (see notes below)
- Responsive Lightbox (see notes below)
- Admin Menu Tree Page View
- Simple Page Ordering
- Sucuri - enable for launch (consider Wordfence for free Firewall on non-WPE sites)
- Minify HTML Markup - enable for launch
- Hubspot Tracking Code - enable for launch
- WP Smush Pro + WPMUDEV Updates - enable for launch

Header Options

- replace “logo.svg" in "assets/images/"
    - set $max-logo-width variable in _basics.scss
- optional static header slides in on scroll (include “_scrollheader.scss” and get_template_part( 'parts/nav', 'scroll-header’))
- “parts/nav-offcanvas-topbar" (shows menu until mobile widths) or “parts/nav-offcanvas" (shows toggle icon only)
    - if using “parts/nav-offcanvas” remove the “with-menu” class from #wrapper
- style dropdown with $dropitem-pad-v and $dropitem-pad-h in “_custom.scss"

Global/Custom Page Header & Page Footer

- Can be styled in "Global Info" section and overwritten at the page level
- Edit Field Group to add fields to custom post types
- Header only: Can opt to show page title in this section. If you use an H1 manually in the editor of the page header, the page title below will convert to an H2.

Page Content Images:

- enable Responsive Lightbox plugin and
    - use Featherlight.js in settings
    - enable "Single images as gallery”
    - change gallery image size to “Page Full Width Image"

Page Content Videos

- enable Advanced Responsive Video Embedder & Shortcake (Shortcode UI)
    - set max width

TinyMCE Advanced

- remove “Font Sizes” and “Font Family” dropdowns
- add “Formats"

Gravity Forms

- Disable CSS in GF settings
- There is a gravity forms stylesheet within the theme
- There is also a forms overwrite stylesheet

Visual Composer

- Based on your site design, you might overwrite the button style so it doesn’t need to be set consistently in the editor each time

Footer

- social icons are css-based with a white png for the logo - style in “_basics.scss"
- Widget area available