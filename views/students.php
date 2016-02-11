<?php foreach ($students as $student): ?>

<article>

    <h2><?php echo $student->getName() ?></h2>

    <p><?php echo $student->getFirstname() ?></p>

</article>

<?php endforeach ?>