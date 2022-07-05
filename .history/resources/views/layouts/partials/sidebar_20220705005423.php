 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="<?php echo SERVERURL; ?>home/">
                 <i class="bi bi-grid"></i>
                 <span>Tabalero</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-people"></i><span>Terceros</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="<?php echo SERVERURL; ?>clientes/">
                         <i class="bi bi-circle"></i><span>Clientes</span>
                     </a>
                 </li>
                 <li>
                     <a href="<?php echo SERVERURL; ?>vendedores/">
                         <i class="bi bi-circle"></i><span>Vendedores</span>
                     </a>
                 </li>
                 <!-- <li>
                     <a href="components-accordion.html">
                         <i class="bi bi-circle"></i><span>Administradores</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-breadcrumbs.html">
                         <i class="bi bi-circle"></i><span>Usuarios</span>
                     </a>
                 </li> -->
             </ul>
         </li>
         <!-- End Components Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-building"></i><span>Almac&egrave;n</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="<?php echo SERVERURL; ?>categorias/">
                         <i class="bi bi-circle"></i><span>Categorias</span>
                     </a>
                 </li>
                 <li>
                     <a href="<?php echo SERVERURL; ?>unidades/">
                         <i class="bi bi-circle"></i><span>Unidades</span>
                     </a>
                 </li>
                 <li>
                     <a href="<?php echo SERVERURL; ?>productos/">
                         <i class="bi bi-circle"></i><span>Productos</span>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- End Forms Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-calendar3"></i><span>Logistica</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="<?php echo SERVERURL; ?>rutas/">
                         <i class="bi bi-circle"></i><span>Rutas</span>
                     </a>
                 </li>
                 <li>
                     <a href="<?php echo SERVERURL; ?>dias/">
                         <i class="bi bi-circle"></i><span>Dias Rutas</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Tables Nav -->

         <li class="nav-heading">Finanzas & Sistema</li>

         <li class="nav-item">
             <a class="nav-link collapsed" href="users-profile.html">
                 <i class="bi bi-cart-check"></i>
                 <span>Ventas</span>
             </a>
         </li>
         <!-- End Profile Page Nav -->

         <!-- <li class="nav-item">
             <a class="nav-link collapsed" href="pages-faq.html">
                 <i class="bi bi-file-earmark-text"></i>
                 <span>Consolidados</span>
             </a>
         </li> -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#forms-consol" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-file-earmark-text"></i><span>Consolidados</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="forms-consol" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="forms-elements.html">
                         <i class="bi bi-circle"></i><span>Cosolidado General</span>
                     </a>
                 </li>
                 <li>
                     <a href="forms-editors.html">
                         <i class="bi bi-circle"></i><span>Cosolidado Vendedores</span>
                     </a>
                 </li>
                 <!-- <li>
                     <a href="forms-layouts.html">
                         <i class="bi bi-circle"></i><span>Productos</span>
                     </a>
                 </li> -->
             </ul>
         </li>
         <!-- End F.A.Q Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="pages-contact.html">
                 <i class="bi bi-file-earmark-pdf"></i>
                 <span>Reportes</span>
             </a>
         </li>
         <!-- End Contact Page Nav -->

     </ul>

 </aside>