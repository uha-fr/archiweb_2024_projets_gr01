<?php

function trierA2Z($tableau) {
  usort($tableau, function($a, $b) {
      return strcmp($a->getNom(), $b->getNom());
  });
  return $tableau;
}

function trierCategorie($tableau) {
  usort($tableau, function($a, $b) {
      return strcmp($a->getCategorie(), $b->getCategorie());
  });
  return $tableau;
}

function trierCalorie($tableau) {
    usort($tableau, function($a, $b) {
        return $a->getCalorie() - $b->getCalorie();
    });
    return $tableau;
  }


  ?>