
@extends('customer.layout.app')
@section('title', 'Dashboard')
@section('content')
 <div class="nk-content ">
<div class="container wide-xl">
    <div class="nk-content-inner">
     
        <div class="nk-content-body">
            <div class="nk-content-wrap">
<div class="row d-flex justify-content-center">

        <div class="col-md-offset-2 col-md-6">
            <div class="content">
                <h3 id="installation"><a href="#installation" aria-hidden="true" class="header-anchor">#</a>
                    Installation</h3>
                    <div class="clearfix"></div>
                <h4 id="server-requirements"><a href="#server-requirements" aria-hidden="true"
                        class="header-anchor">#</a> Server Requirements</h4>
                <p>Before you install make sure your server meets the following requirements:</p>
                <ul>
                    <li>PHP 7.2+</li>
                    <li>Laravel 7.2 | 8.0</li>
                    <li>MySQL 5.6+ or MariaDB 10.0+</li>
                    <li>Vue.js 2.5</li>
                </ul>
                <h3 id="installing-"><a href="#installing-" aria-hidden="true" class="header-anchor">#</a> Installing
                </h3>
                <h4 id="step-1-extract-and-upload"><a href="#step-1-extract-and-upload" aria-hidden="true"
                        class="header-anchor">#</a> Step 1: Extract and Upload</h4>
                <p>Unzip the downloaded archive package. Rename the <code></code> directory to your desired
                    directory name and upload the directory to your web server through FTP or Control Panel.</p>
                <h4 id="step-2-creating-database"><a href="#step-2-creating-database" aria-hidden="true"
                        class="header-anchor">#</a> Step 2: Creating Database</h4>
                <p>Create a database for through your server control panel. If your server has phpMyAdmin,
                    then you can also create a database using phpMyAdmin.</p>
                <h4 id="step-3-run-installation-wizard"><a href="#step-3-run-installation-wizard" aria-hidden="true"
                        class="header-anchor">#</a> Step 3: Run Installation Wizard</h4>
                <p>Go to your website address, then you'll see an installation wizard.</p>
                <div class="danger custom-block">
                    <p class="custom-block-title">WARNING</p>
                    <p>You should configure your web server's document / web root to be the <code>public</code>
                        directory.</p>
                </div>
                <h4 id="pre-installation"><a href="#pre-installation" aria-hidden="true" class="header-anchor">#</a> Pre
                    Installation</h4>
                <p>Pre Installation page checks if your server meets the requirements and has the correct directory
                    permissions to setup .</p>
                <p>Directories within the <code>storage</code> and the <code>bootstrap/cache</code> directories should
                    be writable by your web server or will not run.</p>
                <p><img src="#" alt="install page pre installation step"></p>
                <h4 id="configuration"><a href="#configuration" aria-hidden="true" class="header-anchor">#</a>
                    Configuration</h4>
                <p>You need to fill the database connection details, administration details, and store details, then
                    click the <code>Install</code> button to install .</p>
                <p><img src="" alt="install page configuration step"></p>
                <h4 id="complete"><a href="#complete" aria-hidden="true" class="header-anchor">#</a> Complete</h4>
                <p>You'll see a success message after successfully installing . You now have the option to
                    browse your online store or log into the administration panel.</p>
                <p><img src="" alt="install page complete step"></p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
   
@endsection
@section('script')


@endsection