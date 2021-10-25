   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-light-primary elevation-4">
       <!-- Brand Logo -->
       <a href="<?= base_url("menu/index")?>" class="brand-link">
           <img src="<?php echo base_url().'assets/dist/img/logo.png' ?>" alt="AdminLTE Logo"
               class="brand-image img-circle ">
           <span class="brand-text font-weight-light">Arsip Surat</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">

           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                   <li class="nav-item">
                       <a href="<?= base_url("menu/index")?>" class="nav-link">
                           <i class="nav-icon fas fa-envelope"></i>
                           <p>
                               Arsip
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="<?= base_url("menu/about") ?>" class="nav-link">
                           <i class="nav-icon fas fa-user"></i>
                           <p>
                               About
                           </p>
                       </a>
                   </li>
               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>