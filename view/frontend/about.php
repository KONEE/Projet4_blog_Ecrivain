<?php $title ='APROPOS'; ?>

<?php ob_start(); ?>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Né le 17 mai 1972 à Paris, Jean Forteroche découvra rapidement la poésie puisque sa mère, 
      très cultivée et parlant plusieurs langues, est passionnée de théâtre. 
      Jean Forteroche se prend de passion rapidement pour la littérature, consacrant tout son temps libre à dévorer des livres à la bibliothèque de son école. Grâce à un concours de nouvelles proposé par son professeur de français, il découvre le bonheur de l'écriture. À compter de ce jour, il ne cessera plus de noircir les pages de carnets.</p>
      <p>À 22 ans, il souhaite enrichir son imagination et décide donc de quitter la France pour s'exiler quelques temps aux États-Unis. Ce long voyage, ses rencontres, développeront chez lui des projets de roman. En 2003, il écrira son premier roman : "Le champ du feu", mais c'est le suivant, "Un jour viendra..." qui consacre sa rencontre avec le public. Aujour'hui, Jean revient avec un nouveau roman "Billet simple pour l'Alaska" inspiré par ses vacances passées en Alaska. Jean décide cette fois de mettre en avant première, son livre sur le web. Mais pas de panique, une édition est prévue d'ici la fin de l'année 2019 pour 
      ceux et celles qui désirent tourner les pages d'un livre. </p>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/templateAbout.php'); ?>

