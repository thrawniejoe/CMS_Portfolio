 <?php

function get_homepage() {
      global $db;
      $query = 'SELECT * FROM SiteInformation where id=1';
      $statement = $db->prepare($query);
      $statement->execute();
      $homePage = $statement->fetch();
      $statement->closeCursor();
      return $homePage;
}