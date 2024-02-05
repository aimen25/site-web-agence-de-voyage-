

  <aside class="main-sidebar">

    
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
      

        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['full_name']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Tableau de bord</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Mon Compte</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Mon Profil</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">


            <li><a href="profile.php?user=<?php echo $_SESSION['user']; ?> "><i class="fa fa-circle-o"></i>Modifier mes informations</a></li>
          </ul>
        </li>




        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>poste</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
           
            <li><a href="post-new.php"><i class="fa fa-circle-o"></i>Ajouter un poste</a></li>
<
          </ul>
        </li>


<?php if($_SESSION["user_role"]=="Admin" || $_SESSION["user_role"]=="Owner")
{?>     
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Mes Demandes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          
        </li>
<?php }?>

<?php if($_SESSION["user_role"]=="Admin" || $_SESSION["user_role"]=="Subscriber" || $_SESSION["user_role"]=="Owner")
{?>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Mes réservations</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="booking-show.php"><i class="fa fa-circle-o"></i> Réservation Hotel</a></li>
            <li><a href="tour-show.php"><i class="fa fa-circle-o"></i> Réservation séjour</a></li>
            
          </ul>
        </li>
<?php }?>
<?php if($_SESSION["user_role"]=="Admin" || $_SESSION["user_role"]=="Subscriber" || $_SESSION["user_role"]=="Owner")
{?>
<li class="treeview">
    <a href="#"><i class="fa fa-envelope"></i> <span>Réclamations </span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="./send_reclamation.php"><i class="fa fa-circle-o"></i> Envoyer une réclamation</a></li>
      
    </ul>
  </li>
  <?php }?>
      </ul>
    
    </section>
  </aside>