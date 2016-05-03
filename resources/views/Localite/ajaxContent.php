    <?php
   dd("rien");
$contact = \DB::table('ville')->all();
while ($contact ) { ?>
  <option value=""><?php echo $contact['ville']; ?><option>
  <?php
    }

    ?>
