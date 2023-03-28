<?= $this->extend('Students/Layouts') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">
          <div class="header mt-md-5">
              <div class="header-body">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Overview
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Widgets
                </h1>

              </div>
            </div>
          <div class="card">

<!-- Dropdown -->
<div class="dropdown card-dropdown">
  <a href="#" class="dropdown-ellipses dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fe fe-more-vertical"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-end">
    <a href="#!" class="dropdown-item">
      Action
    </a>
    <a href="#!" class="dropdown-item">
      Another action
    </a>
    <a href="#!" class="dropdown-item">
      Something else here
    </a>
  </div>
</div>

<!-- Image -->
<img src="<?=base_url()?>public/assets/img/covers/profile-cover-2.jpg" alt="..." class="card-img-top">

<!-- Body -->
<div class="card-body">

  <!-- Image -->
  <a href="profile-posts.html" class="avatar avatar-xl card-avatar card-avatar-top">
    <img src="<?=base_url()?>public/assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-4 border-card" alt="...">
  </a>

  <!-- Heading -->
  <h2 class="card-title text-center">
    <a href="profile-posts.html">Ab Hadley</a>
  </h2>

  <!-- Text -->
  <p class="small text-center text-muted mb-3">
    Woprking on the latest API integration.
  </p>

  <!-- Badges -->
  <p class="text-center mb-4">
    <span class="badge bg-secondary-soft">
      UX Team
    </span>
    <span class="badge bg-secondary-soft">
      Research Team
    </span>
  </p>

  <!-- Stats -->
  <div class="row g-0 border-top border-bottom">
    <div class="col-6 py-4 text-center">

      <!-- Heading -->
      <h6 class="text-uppercase text-muted">
        Followers
      </h6>

      <!-- Value -->
      <h2 class="mb-0">10.2k</h2>

    </div>
    <div class="col-6 py-4 text-center border-start">

      <!-- Heading -->
      <h6 class="text-uppercase text-muted">
        Following
      </h6>

      <!-- Value -->
      <h2 class="mb-0">2.7k</h2>

    </div>
  </div>

  <!-- List group -->
  <div class="list-group list-group-flush mb-4">
    <div class="list-group-item">
      <div class="row align-items-center">
        <div class="col">

          <!-- Title -->
          <small>Joined</small>

        </div>
        <div class="col-auto">

          <!-- Time -->
          <time class="small text-muted" datetime="1988-10-24">
            10/24/88
          </time>

        </div>
      </div> <!-- / .row -->
    </div>
    <div class="list-group-item">
      <div class="row align-items-center">
        <div class="col">

          <!-- Title -->
          <small>Location</small>

        </div>
        <div class="col-auto">

          <!-- Text -->
          <small class="text-muted">
            Los Angeles, CA
          </small>

        </div>
      </div> <!-- / .row -->
    </div>
    <div class="list-group-item">
      <div class="row align-items-center">
        <div class="col">

          <!-- Title -->
          <small>Product</small>

        </div>
        <div class="col-auto">

          <!-- Link -->
          <a class="small text-muted">
            Landkit
          </a>

        </div>
      </div> <!-- / .row -->
    </div>
  </div>

  <!-- Footer -->
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">

      <!-- Status -->
      <small>
        <span class="text-success">●</span> Online
      </small>

    </div>
    <div class="col-auto">

      <!-- Link -->
      <a href="#!" class="btn btn-sm btn-primary">
        Subscribe
      </a>

    </div>
  </div>

</div>

</div>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Documentation
                </h6>

                <!-- Title -->
                <h1 class="header-title display-4">
                  Getting Started
                </h1>

              </div>
            </div>

            <!-- Text -->
            <p>
              This guide will help you get started with Dashkit! All the important stuff – compiling the source, file
              structure, build tools, file includes – is documented here, but should you have any questions, always feel
              free to reach out to support@goodthemes.co.
            </p>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  New &amp; Extended Components
                </h1>

              </div>
            </div>

            <!-- Text -->
            <p>
              Dashkit extends Bootstrap by not only building on top of its existing components, but also introducing
              entirely new components and plugins. The best way to get an overview of this is to run through the <code><a href="components.html#alerts">components.html</a></code> page.
            </p>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  Dev Setup
                </h1>

              </div>
            </div>

            <!-- Text -->
            <p>
              To get started, you need to do the following:
            </p>

            <!-- List -->
            <ol>
              <li>
                <strong>Make sure you have Node installed</strong> since Dashkit uses npm to manage dependencies. If you
                don't, installing is quite easy, just visit the <a href="https://nodejs.org/en/download/">Node Downloads
                  page</a> and install it.
              </li>
              <li>
                <strong>Unzip your theme and open your command line</strong>, making sure your command line prompt is at
                the root of the unzipped theme directory.
              </li>
              <li>
                <strong class="badge bg-primary-soft"><code>npm install</code></strong>: Open your command line to
                the root directory of your unzipped theme and run to install all of Dashkit's dependencies.
              </li>
            </ol>

            <!-- Text -->
            <p>
              It's that simple! If you're not used to using terminal, don't worry, this is as advanced as it gets. If you
              want to kill the server, just hit <code>Control + C</code>.
            </p>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  Compiling
                </h1>

              </div>
            </div>

            <!-- Text -->
            <p>
              Webpack and npm-scripts are used to manage Dashkit development. Open your command line to the root directory of the theme to
              use the following commands:
            </p>

            <!-- List -->
            <ul>
              <li>
                <strong class="badge bg-primary-soft"><code>npm start</code></strong>: Compile and watch the SCSS/JS/HTML,
                use Live Reload to update browsers instantly, start a server, and pop a tab in your default browser. Any
                changes made to the source files will be compiled as soon as you save the file.
              </li>
              <li>
                <strong class="badge bg-primary-soft"><code>npm run build</code></strong>: Generates a <code>/dist</code>
                directory with all the production files.
              </li>
            </ul>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  File Structure
                </h1>

              </div>
            </div>

            <!-- List -->
            <ul>
              <li>
                <strong>📁 dist</strong> - Generated production files
              </li>
              <li>
                <strong>📁 node_modules</strong> - Directory where <code>npm</code> installs dependencies
              </li>
              <li>
                <strong>📁 src</strong>
                <ul>
                  <li>
                    <strong>📁 favicon</strong> - Favicon files
                  </li>
                  <li>
                    <strong>📁 fonts</strong> - Cerebri font and Feather Icon font
                  </li>
                  <li>
                    <strong>📁 html</strong> - HTML source
                  </li>
                  <li>
                    <strong>📁 img</strong> - Image assets
                  </li>
                  <li>
                    <strong>📁 js</strong> - Javascript source
                  </li>
                  <li>
                    <strong>📁 partials</strong> - HTML partials
                  </li>
                  <li>
                    <strong>📁 scss</strong> - SCSS source for theme
                  </li>
                  <li>
                    <strong>📁 vendor</strong> - Third party plugins
                  </li>
                </ul>
              </li>
              <li>
                <strong>📄 .browserslistrc</strong> - Config to share target browsers and Node.js versions between different front-end tools
              </li>
              <li>
                <strong>📄 .gitignore</strong> - Hide all unnecessary files from Git
              </li>
              <li>
                <strong>📄 config.json</strong> - Theme config file
              </li>
              <li>
                <strong>📄 LICENSE.md</strong> - Theme license
              </li>
              <li>
                <strong>📄 package.json</strong> - List of dependencies and npm information
              </li>
              <li>
                <strong>📄 package-lock.json</strong> - Describes the exact dependency tree that was generated
              </li>
              <li>
                <strong>📄 README.md</strong> - Theme info
              </li>
              <li>
                <strong>📄 webpack.config.js</strong> - Webpack config file
              </li>
            </ul>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  Handlebars Webpack Plugin
                </h1>

              </div>
            </div>

            <!-- List -->
            <p>
              The <a href="https://www.npmjs.com/package/handlebars-webpack-plugin" target="_blank">handlebars-webpack-plugin</a> package
              is used to make partials easier to use for initial development. For Dashkit, we only use it for a handful of
              components that are found on most pages. The following partials are available:
            </p>

            <!-- List -->
            <ul>
              <li>
                <code>head.html</code>
                <ul>
                  <li>
                    <code>title (string)</code> - Parameter for the page title
                  </li>
                </ul>
              </li>
              <li>
                <code>modals.html</code>
              </li>
              <li>
                <code>navs.html</code>
                <ul>
                  <li>
                    <code>category (string)</code> - Parameter for which category of the navigation should be open.
                  </li>
                  <li>
                    <code>subcategory (string)</code> - Parameter for which subcategory of the navigation should be open.
                  </li>
                  <li>
                    <code>page (string)</code> - Parameter for which page of the navigation should be given an active
                    state.
                  </li>
                </ul>
              </li>
              <li>
                <code>script.html</code>
              </li>
            </ul>

            <!-- Text -->
            <p>
              Easily create new <code>.html</code> partials inside the <code>/partials</code> folder and point to them
              from any file by specifying the path to the partial file inside <code>{{> }}</code> curly brackets.
            </p>

            <!-- Text -->
            <p>
              Please read the <a href="https://www.npmjs.com/package/handlebars-webpack-plugin" target="_blank">official package
                documentation</a> for more info.
            </p>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  Customizing SCSS
                </h1>

              </div>
            </div>

            <!-- Text -->
            <p>
              There are 2 basic ways to customize your theme...
            </p>

            <!-- List -->
            <ol>
              <li>
                <strong>Customizing SCSS.</strong> This is more versatile and sustainable way to customize Dashkit, but
                requires the <code>webpack</code> compilation steps outlined above. The 2 major benefits of this strategy are
                using variable overrides to easily customize theme styles, plus you never have to touch Bootstrap or
                Dashkit's source, meaning future updates will be much, much, simpler. There are 2 provided files that make
                this strategy simple to implement:
                <ul>
                  <li>
                    <code>user-variables.scss</code>: This file can be used override Bootstrap core and Dashkit variables
                    for customizing elements that have been tied to variables.
                  </li>
                  <li>
                    <code>user.scss</code>: This file can be used for writing custom SCSS that will be compiled alongside
                    Bootstrap and Dashkit's core files.
                  </li>
                </ul>
              </li>
              <li>
                <strong>Compiled CSS.</strong> If you plan on using Dashkit "as is", or only need limited customization,
                feel free to simply attach the compiled <code>theme.bundle.css</code> file in the
                <code>dist/assets/css</code> directory.
              </li>
            </ol>

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <!-- Title -->
                <h1 class="header-title">
                  Configuration
                </h1>

              </div>
            </div>

            <!-- Text -->
            <p>
              You can easily customize the layout and color scheme of your theme by modifying the content of the
              <code>config.json</code> file located in the root folder. The config is only used by Webpack to decide what to
              include during compilation. The config object properties accept the following values:
            </p>

            <!-- Table -->
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Options</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <code class="text-nowrap">demoMode</code>
                  </td>
                  <td>
                    Boolean
                  </td>
                  <td>
                    true | false
                  </td>
                  <td>
                    Whether you want to enable users toggle layout options. This will also enable the config modal and its
                    toggler button.
                  </td>
                </tr>
                <tr>
                  <td>
                    <code class="text-nowrap">colorScheme</code>
                  </td>
                  <td>
                    String
                  </td>
                  <td>
                    "light" | "dark"
                  </td>
                  <td>
                    The default color scheme. Works with <code>demoMode</code> set to <code>false</code>.
                  </td>
                </tr>
                <tr>
                  <td>
                    <code class="text-nowrap">navPosition</code>
                  </td>
                  <td>
                    String
                  </td>
                  <td>
                    "sidenav" | "topnav" | "combo"
                  </td>
                  <td>
                    The default navigation positioning. Works with <code>demoMode</code> set to <code>false</code>.
                  </td>
                </tr>
                <tr>
                  <td>
                    <code class="text-nowrap">navColor</code>
                  </td>
                  <td>
                    String
                  </td>
                  <td>
                    "default" | "vibrant"
                  </td>
                  <td>
                    The default navigation styling. Works with <code>demoMode</code> set to <code>false</code>.
                  </td>
                </tr>
                <tr>
                  <td>
                    <code class="text-nowrap">sidebarSize</code>
                  </td>
                  <td>
                    String
                  </td>
                  <td>
                    "base" | "small"
                  </td>
                  <td>
                    The default sidebar size. Works with <code>demoMode</code> set to <code>false</code>.
                  </td>
                </tr>
              </tbody>
            </table>

            <p>
              <span class="badge bg-warning-soft">Heads up!</span> Modifying <code>config.json</code> requires you to
              restart any of the currently active Webpack tasks.
            </p>

          </div>
        </div> <!-- / .row -->

        <?= $this->endSection() ?>