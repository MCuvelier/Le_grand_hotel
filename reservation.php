<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_Reservation = array(
      "id_reservation" => $_POST['id_reservation'],
      "date_resa"  => $_POST['date_resa'],
      "date_debut"  => $_POST['date_debut'],
      "date_fin"  => $_POST['date_fin'],
      "resa_std_sup_exc"  => $_POST['resa_std_sup_exc'],
      "resa_std_sup_petitdej"  => $_POST['resa_std_sup_petitdej'],
      "resa_adulte"  => $_POST['resa_adulte'],
      "resa_enfant"  => $_POST['resa_enfant'],
      "resa_nb_adulte" => $_POST['resa_nb_adulte'],
      "resa_nb_enfant" => $_POST['resa_nb_enfant']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "Reservation",
      implode(", ", array_keys($new_Reservation)),
      ":" . implode(", :", array_keys($new_Reservation))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_Reservation);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>
<div class="grid-x grid-padding-x grid-margin-x">
	<div class="callout primary large-4 medium-4 cell">
  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo escape($_POST['id_reservation']); ?> successfully added.</blockquote>
  <?php endif; ?>

  <h2>Réserver</h2>

  <form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <label for="id_reservation">id_reservation</label>
    <input type="bigint" name="id_reservation" id="id_reservation">
    <label for="date_resa">date_resa</label>
    <input type="date" name="date_resa" id="date_resa">
    <label for="date_debut">date_debut</label>
    <input type="date" name="date_debut" id="date_debut">
    <label for="date_fin">date</label>
    <input type="date" name="date_fin" id="date_fin">
    <label for="resa_std_sup_exc">resa_std_sup_exc</label>
    <input type="int" name="resa_std_sup_exc" id="resa_std_sup_exc">
    <label for="resa_std_sup_petitdej">resa_std_sup_petitdej</label>
    <input type="int" name="resa_std_sup_petitdej" id="resa_std_sup_petitdej">
    <label for="resa_adulte">resa_adulte</label>
    <input type="int" name="resa_adulte" id="resa_adulte">
    <label for="resa_enfant">resa_enfant</label>
    <input type="int" name="resa_enfant" id="resa_enfant">
    <label for="resa_nb_adulte">resa_nb_adulte</label>
    <input type="bigint" name="resa_nb_adulte" id="resa_nb_adulte">
    <label for="resa_nb_enfant">resa_nb_enfant</label>
    <input type="bigint" name="resa_nb_enfant" id="resa_nb_enfant">
    <br><input type="submit" name="Reserver" value="Reserver">
  </form>
  <a href="index.php">Back to home</a>
</div>
<?php require "templates/footer.php"; ?>
