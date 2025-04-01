# Alpha Web Consult WordPress Boilerplate with TailwindCSS

A modern WordPress classic theme boilerplate for developers who know PHP and TailwindCSS. This lightweight, performance-focused boilerplate provides a solid foundation for custom WordPress theme development with modern frontend tooling and Advanced Custom Fields (ACF) integration.

There is no overly-complicated set up in the backend.

## Who is this boilerplate for?

For developers who would love to use WordPress and feel like it is a headless CMS. The data are set up using ACF and all the page structures are done in your code. The Block Editor styles are even dequeued in order to get a better performing WordPress website. Be in control of your WordPress website.

If I can do something with WordPress, is to ensure it is fast without the user spending too much on plugins every year. This approach helps me get at least 80/100 in performance and 100 in other Lighthouse metrics.

## Demo site

Check https://alphawebconsult.com

## Features

- 🎨 TailwindCSS integration for utility-first styling
- 🧩 Advanced Custom Fields (ACF) support and integration
- 📱 Responsive design out of the box
- 🔍 SEO-friendly structure
- 🔒 Security best practices
- ⚡ Performance optimized
- 💻 Developer-friendly architecture
- 🧩 Simple and straightforward build process

## Requirements

- WordPress 5.8+
- PHP 7.4+
- Node.js 14+
- npm or yarn
- Advanced Custom Fields plugin (PRO is needed if you want repeater and others)
- Basic knowledge of PHP, JS, WordPress, TailwindCSS, and ACF

## Getting Started

### Installation

1. Clone the repository to your WordPress themes directory:

   ```bash
   cd wp-content/themes/
   git clone https://github.com/Dapo-Obembe/alphawebplate-tw.git your-theme-name
   cd your-theme-name
   ```

2. Install dependencies:

   ```bash
   npm install
   ```

3. Update `style.css` with your theme information:

   ```css
   /*
   Theme Name: Your Theme Name
   Theme URI: https://yourwebsite.com
   Author: Your Name
   Author URI: https://yourwebsite.com
   Description: Your theme description
   Version: 1.0.0
   License: GNU General Public License v2 or later
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
   Text Domain: your-theme-name
   */
   ```

4. Ensure Advanced Custom Fields Pro is installed and activated.

5. Activate the theme in the WordPress admin panel.

## Development Workflow

### Development Mode

Start the development environment with:

```bash
npm run dev
```

This will:

- Compile TailwindCSS with all classes available for development
- Watch for changes in your PHP, JS, and CSS files

### Production Build

Create a production-ready build with:

```bash
npm run build
```

This will:

- Minify and optimize all assets
- Purge unused TailwindCSS classes
- Generate production CSS file in the dist/

## Theme Structure

```
your-theme-name/
├── assets/                 # Compiled assets (auto-generated)
│   ├── css/
│   ├── js/
│   └── images/
├── inc/                    # PHP includes
│   ├── components/         # Custom functions that act independently of the theme templates
│   ├── custom-functions/   # Custom functions that act independently of the theme templates
│   ├── google-recaptcha/   # Google recaptcha setup
│   ├── head-and-footer-codes/ # Adds codes/tags to the theme head
│   ├── post-types/         # Register all your post types
│   ├── shortcodes/         # Shortcodes used in the theme
│   ├── filters/            # All filtering actions
│   ├── setup/              # Theme setup files
│   └── template-tags/      # Template tags
├── src/                    # Source files
│   ├── css/                # CSS source files
│   ├── js/                 # JavaScript source files
│   └── images/             # Image source files
├── template/               # Template partials
│   ├── content/            # Content template parts
│   ├── header/             # Header template parts
│   └── footer/             # Footer template parts
├── acf-json/               # ACF JSON configuration files
├── functions.php           # Theme functions
├── index.php               # Main template file
├── header.php              # Header template
├── footer.php              # Footer template
├── sidebar.php             # Sidebar template
├── page.php                # Page template
├── single.php              # Single post template
├── archive.php             # Archive template
├── search.php              # Search template
├── 404.php                 # 404 template
├── style.css               # Theme metadata
├── tailwind.config.js      # TailwindCSS configuration
├── package.json            # NPM dependencies and scripts
└── README.md               # This file
```

## Customization

### TailwindCSS Configuration

Customize TailwindCSS in the `tailwind.config.js` file:

```js
module.exports = {
  content: [
    "./**/*.php", // Scan all PHP files
    "./src/js/**/*.js", // Scan all JavaScript files
    "./src/css/pages/**/*.css",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
```

### Advanced Custom Fields Integration

This boilerplate is built with ACF support in mind and includes:

- ACF JSON for version control of field groups
- Helper functions for ACF fields in the `inc/custom-functions/` directory
- Template parts that integrate with ACF flexible content fields
- Examples of ACF field usage in various components

#### ACF Field Setup

ACF Fields you create in the backend are auto-saved in the acf-json/.
Check the inc/custom-functions for the acf setup function.

#### ACF Usage Example

```php
// Example of using ACF fields in template/content/hero.php
<div class="hero-section bg-primary text-white py-12">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold">
            <?php echo get_field('hero_title'); ?>
        </h1>
        <?php if (get_field('hero_subtitle')) : ?>
            <p class="text-xl mt-4">
                <?php echo get_field('hero_subtitle'); ?>
            </p>
        <?php endif; ?>
    </div>
</div>
```

### WordPress Hooks

The theme uses WordPress hooks for extensibility. Check files in `inc/filters/` and `inc/setup/` for examples of how to use action and filter hooks.

### Adding Custom Templates

Create custom page templates by adding files to the theme directory with the following header:

```php
<?php
/**
 * Template Name: Your Template Name
 *
 * @package Your_Theme_Name
 */

get_header();
?>

<!-- Your template code here -->

<?php get_footer(); ?>
```

Name your page file like so: page-about.php (for your about page and the slug must be example.com/about).

## Best Practices To Follow

### PHP

- Follow WordPress PHP coding standards
- Use namespaced functions when possible
- Validate and sanitize user input
- Use WordPress' native functions for database queries

### TailwindCSS

- Use TailwindCSS utility classes instead of custom CSS when possible
- Create components for reusable UI elements
- Use responsive variants for mobile-first design
- Extract common patterns to custom components

### Advanced Custom Fields

- Store field groups in JSON for version control
- Use ACF flexible content for modular page building
- Create reusable field groups with the clone field
- Limit field visibility with conditional logic

### JavaScript

- Use modern ES6+ syntax
- Split code into modular components
- Use event delegation for better performance
- Avoid jQuery when possible (use vanilla JS)

## Performance Optimization

- TailwindCSS is purged of unused classes in production
- CSS and JavaScript are minified for production
- Proper enqueuing of scripts and styles
- Optimized asset loading
- Efficient ACF field usage and queries

## Security Considerations

- All user input is sanitized
- Admin-ajax.php endpoints are nonce-protected
- Template files are protected against direct access
- No sensitive information in public-facing files
- Google reCAPTCHA integration for forms

## Troubleshooting

### Common Issues

- **CSS not updating**: Clear browser cache or run `npm run build` again
- **PHP errors**: Check the WordPress debug log
- **Node errors**: Delete `node_modules` and run `npm install` again
- **ACF fields not showing**: Check if ACF Pro is activated and fields are properly registered

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the GPL v2 or later.

## Credits

- Built by [Dapo Obembe/Alpha Web Consult]
- TailwindCSS: https://tailwindcss.com
- WordPress: https://wordpress.org
- Advanced Custom Fields: https://www.advancedcustomfields.com

## Contact

For support or inquiries, please contact [obembedapo@gmail.com].
